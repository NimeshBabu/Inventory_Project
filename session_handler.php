<?php
session_start();
header('Content-Type: application/json');

$response = [];
if (isset($_SESSION['error'])) {
    $response['error'] = $_SESSION['error'];
    unset($_SESSION['error']); // Clear after reading
}
if (isset($_SESSION['success'])) {
    $response['success'] = $_SESSION['success'];
    unset($_SESSION['success']); // Clear after reading
}

echo json_encode($response);
?>
