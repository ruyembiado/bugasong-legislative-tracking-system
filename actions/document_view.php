<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $user_id = $_POST['user_id'];
    $document_type = $_POST['document_type'];
    $document_id = $_POST['document_id'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO document_views (document_id, user_id, document_type) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("iis", $document_id, $user_id, $document_type);
        $stmt->execute();
        $stmt->close();
    } else {
        die('Prepare failed: ' . $conn->error);
    }
}
