<?php
session_start();

// Get JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['application_id'])) {
    $_SESSION['application_id'] = $data['application_id'];
    echo json_encode(['success' => true]);
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No application ID provided']);
} 