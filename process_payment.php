<?php
require_once 'PesaPalService.php';
require_once 'config/database.php';

session_start();

// Validate session and required data
if (!isset($_SESSION['application_id'])) {
    error_log('Missing application_id in session');
    header('Location: failed.php?error=' . urlencode('Invalid application session'));
    exit;
}

try {
    // Debug logging
    error_log('POST data received: ' . print_r($_POST, true));

    // Create the order data structure
    $order_data = [
        'id' => 'INV-' . time() . '-' . substr(uniqid(), -4),
        'currency' => 'KES',
        'amount' => 7700,
        'description' => 'Invitation Letter Application',
        'callback_url' => 'https://d611-197-232-255-163.ngrok-free.app/mk/callback.php',
        'notification_id' => 'eea6071f-f10c-44b6-96de-dc6d513ce6c2',
        'billing_address' => [
            'email_address' => $_POST['email'] ?? '',
            'phone_number' => $_POST['phone'] ?? '',
            'country_code' => 'KE',
            'first_name' => $_POST['first_name'] ?? '',
            'middle_name' => '',
            'last_name' => $_POST['last_name'] ?? '',
            'line_1' => '',
            'line_2' => '',
            'city' => '',
            'state' => '',
            'postal_code' => '',
            'zip_code' => ''
        ]
    ];

    // Initialize PesaPal service
    $pesapal = new PesaPalService(true);
    
    // Submit order to PesaPal
    $response = $pesapal->submitOrder($order_data);
    
    if (isset($response['redirect_url'])) {
        $_SESSION['order_tracking_id'] = $response['order_tracking_id'];
        
        // Update application status
        $database = new Database();
        $pdo = $database->getConnection();
        
        $sql = "UPDATE invitation_applications SET 
                payment_status = 'PENDING',
                order_id = ?
                WHERE id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$response['order_tracking_id'], $_SESSION['application_id']]);
        
        header('Location: ' . $response['redirect_url']);
        exit;
    } else {
        throw new Exception('Failed to get payment URL: ' . print_r($response, true));
    }
} catch (Exception $e) {
    error_log('Payment Process Error: ' . $e->getMessage());
    header('Location: failed.php?error=' . urlencode($e->getMessage()));
    exit;
}