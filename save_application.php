<?php
session_start();
header('Content-Type: application/json');

try {
    // Debug incoming data
    file_put_contents(
        'debug_log.txt',
        date('Y-m-d H:i:s') . " - POST Data: " . json_encode($_POST, JSON_PRETTY_PRINT) . "\n",
        FILE_APPEND
    );

    // Collect form data with proper validation
    $applicationData = [
        'firstName' => trim($_POST['firstName'] ?? ''),
        'lastName' => trim($_POST['lastName'] ?? ''),
        'email' => filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL),
        'phone' => trim($_POST['phone'] ?? ''),
        'dob' => $_POST['dob'] ?? '',
        'nationality' => $_POST['nationality'] ?? '',
        'address' => trim($_POST['address'] ?? ''),
        'visitPurpose' => $_POST['visitPurpose'] ?? '',
        'country' => $_POST['country'] ?? '',
        'state' => $_POST['state'] ?? '',
        'travelDate' => $_POST['travelDate'] ?? '',
        'duration' => $_POST['duration'] ?? '',
        'travelInfo' => trim($_POST['travelInfo'] ?? ''),
        'passportNumber' => trim($_POST['passportNumber'] ?? ''),
        'passportIssue' => $_POST['passportIssue'] ?? '',
        'passportExpiry' => $_POST['passportExpiry'] ?? '',
    ];

    // Validate required fields
    $requiredFields = ['firstName', 'lastName', 'email', 'phone'];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (empty($applicationData[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        throw new Exception('Missing required fields: ' . implode(', ', $missingFields));
    }

    // Handle file uploads
    $uploadedFiles = [];
    $uploadDir = 'uploads/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handle passport copy
    if (isset($_FILES['passportCopy']) && $_FILES['passportCopy']['error'] === UPLOAD_ERR_OK) {
        $fileName = uniqid() . '_' . basename($_FILES['passportCopy']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['passportCopy']['tmp_name'], $targetPath)) {
            $uploadedFiles['passportCopy'] = $targetPath;
        }
    }

    // Handle photo ID
    if (isset($_FILES['photoId']) && $_FILES['photoId']['error'] === UPLOAD_ERR_OK) {
        $fileName = uniqid() . '_' . basename($_FILES['photoId']['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['photoId']['tmp_name'], $targetPath)) {
            $uploadedFiles['photoId'] = $targetPath;
        }
    }

    // Add uploaded files to application data
    $applicationData['uploadedFiles'] = $uploadedFiles;

    // Store in session
    $_SESSION['application_data'] = $applicationData;

    // Debug redirect
    file_put_contents(
        'debug_log.txt',
        date('Y-m-d H:i:s') . " - Redirecting to payment page\n",
        FILE_APPEND
    );

    echo json_encode([
        'success' => true,
        'message' => 'Application data saved successfully',
        'data' => $applicationData
    ]);

} catch (Exception $e) {
    file_put_contents(
        'debug_log.txt',
        date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n",
        FILE_APPEND
    );
    
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} 