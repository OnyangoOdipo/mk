<?php
session_start();
require_once 'PesaPalService.php';

try {
    $pesapal = new PesaPalService(
        'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW',
        'osGQ364R49cXKeOYSpaOnT++rHs='
    );

    // Get authentication token
    $token = $pesapal->getToken();
    if (!$token) {
        throw new Exception('Authentication failed');
    }

    // Generate unique order ID
    $orderId = 'INV-' . time() . '-' . substr(uniqid(), -4);

    // Simple order data
    $orderData = [
        "id" => $orderId,
        "currency" => "KES",
        "amount" => 7700.00,
        "description" => "Invitation Letter Application",
        "callback_url" => "https://d611-197-232-255-163.ngrok-free.app/mk/callback.php",
        "redirect_mode" => "",
        "notification_id" => "eea6071f-f10c-44b6-96de-dc6d513ce6c2",
        "branch" => "Store Name - HQ",
        "billing_address" => [
            "email_address" => "info@mk.co.ke",
            "phone_number" => "0742244246",
            "country_code" => "KE",
            "first_name" => "Mk",
            "middle_name" => "",
            "last_name" => "Kenya",
            "line_1" => "P.O. Box 10212",
            "line_2" => "",
            "city" => "",
            "state" => "",
            "postal_code" => "",
            "zip_code" => ""
        ]
    ];

    // Submit order to PesaPal
    $result = $pesapal->submitOrder($orderData);

    if (isset($result->redirect_url)) {
        header("Location: " . $result->redirect_url);
        exit;
    } else {
        throw new Exception('Payment initialization failed');
    }

} catch (Exception $e) {
    error_log("[Payment Error] " . $e->getMessage());
    echo "Payment Error: Please try again later.";
}
?>