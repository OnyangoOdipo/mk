<?php
require_once 'PesaPalService.php';

session_start();

try {
    // Get order details from form or session
    $order_data = [
        'reference' => 'ORDER-' . time(), // Generate unique reference
        'currency' => 'KES', // Or your preferred currency
        'amount' => $_POST['amount'],
        'description' => $_POST['description'],
        'callback_url' => 'https://d611-197-232-255-163.ngrok-free.app/mk/callback.php',
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name']
    ];

    // Initialize PesaPal service
    $pesapal = new PesaPalService(true); // true for sandbox, false for production
    
    // Submit order to PesaPal
    $response = $pesapal->submitOrder($order_data);
    
    if (isset($response['redirect_url'])) {
        // Store order tracking ID in session for later use
        $_SESSION['order_tracking_id'] = $response['order_tracking_id'];
        
        // Redirect to PesaPal payment page
        header('Location: ' . $response['redirect_url']);
        exit;
    } else {
        throw new Exception('Failed to get payment URL');
    }
} catch (Exception $e) {
    // Log error and redirect to error page
    error_log('Payment processing error: ' . $e->getMessage());
    header('Location: failed.php?error=' . urlencode($e->getMessage()));
    exit;
}