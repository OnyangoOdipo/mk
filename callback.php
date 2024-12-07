<?php
require_once 'PesaPalService.php';

session_start();

// Log callback details
$log_file = 'callback_log.txt';
file_put_contents($log_file, date('Y-m-d H:i:s') . ' - Callback received: ' . print_r($_GET, true) . "\n", FILE_APPEND);

try {
    $orderTrackingId = $_GET['OrderTrackingId'] ?? null;
    $merchantReference = $_GET['OrderMerchantReference'] ?? null;
    
    if (!$orderTrackingId) {
        throw new Exception('Order tracking ID not found');
    }

    // Initialize PesaPal service
    $pesapal = new PesaPalService(true); // true for sandbox, false for production
    
    // Get transaction status
    $status = $pesapal->getTransactionStatus($orderTrackingId);
    
    // Log status response
    file_put_contents($log_file, date('Y-m-d H:i:s') . ' - Status response: ' . print_r($status, true) . "\n", FILE_APPEND);

    // Process based on status
    switch ($status['payment_status_description']) {
        case 'COMPLETED':
            // Payment successful
            // Update your database and redirect to success page
            header('Location: success.php?reference=' . $merchantReference);
            break;
            
        case 'FAILED':
            // Payment failed
            header('Location: failed.php?reference=' . $merchantReference);
            break;
            
        default:
            // Payment pending or other status
            header('Location: pending.php?reference=' . $merchantReference);
            break;
    }
} catch (Exception $e) {
    // Log error and redirect to error page
    file_put_contents($log_file, date('Y-m-d H:i:s') . ' - Error: ' . $e->getMessage() . "\n", FILE_APPEND);
    header('Location: failed.php?error=' . urlencode($e->getMessage()));
}