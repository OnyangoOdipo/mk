<?php
require_once 'PesaPalService.php';
require_once 'config/database.php';

session_start();

// Create database connection
$database = new Database();
$pdo = $database->getConnection();

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
    $pesapal = new PesaPalService(true);
    
    // Get transaction status
    $status = $pesapal->getTransactionStatus($orderTrackingId);
    
    // Log status response
    file_put_contents($log_file, date('Y-m-d H:i:s') . ' - Status response: ' . print_r($status, true) . "\n", FILE_APPEND);

    // Update application payment status
    $sql = "UPDATE invitation_applications SET 
            payment_status = ?,
            payment_date = NOW()
            WHERE order_id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $status['payment_status_description'],
        $orderTrackingId
    ]);

    // Process based on status
    switch ($status['payment_status_description']) {
        case 'COMPLETED':
            header('Location: application.php?status=payment_success');
            break;
            
        case 'FAILED':
            header('Location: application.php?status=payment_failed');
            break;
            
        default:
            header('Location: application.php?status=payment_pending');
            break;
    }
} catch (Exception $e) {
    file_put_contents($log_file, date('Y-m-d H:i:s') . ' - Error: ' . $e->getMessage() . "\n", FILE_APPEND);
    header('Location: application.php?status=error&message=' . urlencode($e->getMessage()));
}