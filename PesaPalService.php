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
            
        // Load credentials from config or environment variables
        $this->consumer_key = $is_sandbox ? 'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW' : 'your-live-consumer-key';
        $this->consumer_secret = $is_sandbox ? 'osGQ364R49cXKeOYSpaOnT++rHs=' : 'your-live-consumer-secret';
        
        // Set your registered IPN ID
        $this->ipn_id = 'eea6071f-f10c-44b6-96de-dc6d513ce6c2';
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

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            $this->token = $result['token'];
            return $result['token'];
        }

        throw new Exception("Failed to get auth token: " . $response);
    }

    public function submitOrder($order_data) {
        if (empty($this->token)) {
            $this->getAuthToken();
        }

        $url = $this->base_url . '/api/Transactions/SubmitOrderRequest';
        
        $payload = [
            'id' => $order_data['reference'], // Your unique order reference
            'currency' => $order_data['currency'],
            'amount' => floatval($order_data['amount']),
            'description' => $order_data['description'],
            'callback_url' => $order_data['callback_url'],
            'notification_id' => $this->ipn_id,
            'billing_address' => [
                'email_address' => $order_data['email'],
                'phone_number' => $order_data['phone'],
                'first_name' => $order_data['first_name'],
                'last_name' => $order_data['last_name']
            ]
        ];

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

        return json_decode($response, true);
    }

    public function getTransactionStatus($orderTrackingId) {
        if (empty($this->token)) {
            $this->getAuthToken();
        }

        $url = $this->base_url . '/api/Transactions/GetTransactionStatus?orderTrackingId=' . $orderTrackingId;

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