<?php
session_start();
header('Content-Type: application/json');

require_once 'config/database.php';

try {
    $database = new Database();
    $pdo = $database->getConnection();

    if (!$pdo) {
        throw new Exception('Database connection failed');
    }

    // Validate request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

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

    // Insert application data
    $sql = "INSERT INTO invitation_applications (
        first_name, last_name, email, phone, dob, nationality,
        address, visit_purpose, destination_country, destination_state,
        travel_date, duration, travel_info, passport_number,
        passport_issue_date, passport_expiry_date,
        passport_copy_path, photo_id_path,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $applicationData['firstName'],
        $applicationData['lastName'],
        $applicationData['email'],
        $applicationData['phone'],
        $applicationData['dob'],
        $applicationData['nationality'],
        $applicationData['address'],
        $applicationData['visitPurpose'],
        $applicationData['country'],
        $applicationData['state'],
        $applicationData['travelDate'],
        $applicationData['duration'],
        $applicationData['travelInfo'],
        $applicationData['passportNumber'],
        $applicationData['passportIssue'],
        $applicationData['passportExpiry'],
        $uploadedFiles['passportCopy'] ?? null,
        $uploadedFiles['photoId'] ?? null
    ]);

    $application_id = $pdo->lastInsertId();
    $_SESSION['application_id'] = $application_id;

    echo json_encode([
        'success' => true,
        'application_id' => $application_id,
        'message' => 'Application saved successfully'
    ]);
    exit;

} catch (Exception $e) {
    error_log('Save Application Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while saving your application: ' . $e->getMessage()
    ]);
    exit;
} 