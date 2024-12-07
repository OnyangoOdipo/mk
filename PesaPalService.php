<?php

class PesaPalService {
    private $consumer_key;
    private $consumer_secret;
    private $base_url;
    private $token;
    private $ipn_id;

    public function __construct($is_sandbox = true) {
        // Set environment-specific variables
        $this->base_url = $is_sandbox 
            ? 'https://cybqa.pesapal.com/pesapalv3'
            : 'https://pay.pesapal.com/v3';
            
        // Set credentials
        $this->consumer_key = 'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW';
        $this->consumer_secret = 'osGQ364R49cXKeOYSpaOnT++rHs=';
        
        // Set your registered IPN ID
        $this->ipn_id = 'eea6071f-f10c-44b6-96de-dc6d513ce6c2';

        // Get authentication token on initialization
        $this->getAuthToken();
    }

    private function getAuthToken() {
        $url = $this->base_url . '/api/Auth/RequestToken';
        
        $payload = [
            'consumer_key' => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        error_log("Auth Response: " . $response);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            if (isset($result['token'])) {
                $this->token = $result['token'];
                return $result['token'];
            }
        }

        throw new Exception("Failed to get auth token: " . $response);
    }

    public function submitOrder($order_data) {
        if (empty($this->token)) {
            $this->getAuthToken();
        }

        $url = $this->base_url . '/api/Transactions/SubmitOrderRequest';

        // Ensure phone number is in correct format
        $phone = preg_replace('/[^0-9]/', '', $order_data['billing_address']['phone_number']);
        if (strlen($phone) === 10 && substr($phone, 0, 1) === '0') {
            $phone = '254' . substr($phone, 1);
        }
        
        $payload = [
            'id' => $order_data['id'],
            'currency' => 'KES',
            'amount' => floatval(7700),
            'description' => 'Invitation Letter Application',
            'callback_url' => 'https://d611-197-232-255-163.ngrok-free.app/mk/callback.php',
            'notification_id' => $this->ipn_id,
            'billing_address' => [
                'email_address' => $order_data['billing_address']['email_address'],
                'phone_number' => $phone,
                'country_code' => 'KE',
                'first_name' => $order_data['billing_address']['first_name'],
                'middle_name' => '',
                'last_name' => $order_data['billing_address']['last_name'],
                'line_1' => 'Address Line 1', // Required by PesaPal
                'line_2' => '',
                'city' => 'Nairobi', // Required by PesaPal
                'state' => 'NBI',
                'postal_code' => '00100',
                'zip_code' => '00100'
            ]
        ];

        error_log("Submitting order with payload: " . json_encode($payload, JSON_PRETTY_PRINT));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $this->token
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        error_log("PesaPal Response (HTTP $httpCode): " . $response);

        $result = json_decode($response, true);

        if ($httpCode === 200 && isset($result['redirect_url'])) {
            return $result;
        }

        // Log detailed error information
        error_log("PesaPal Error Response: " . print_r($result, true));
        throw new Exception(isset($result['error']['message']) 
            ? $result['error']['message'] 
            : 'Failed to get payment URL: ' . $response);
    }

    public function getTransactionStatus($orderTrackingId) {
        if (empty($this->token)) {
            $this->getAuthToken();
        }

        $url = $this->base_url . '/api/Transactions/GetTransactionStatus?orderTrackingId=' . urlencode($orderTrackingId);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $this->token
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return json_decode($response, true);
    }
}