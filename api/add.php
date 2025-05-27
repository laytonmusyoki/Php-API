<?php

include '../connection.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['name'], $input['email'], $input['phone'], $input['date'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$name = $input['name'];
$email = $input['email'];
$phone = $input['phone'];
$date = $input['date'];

$sql = "INSERT INTO students (name, email, phone, date) VALUES ('$name', '$email', '$phone', '$date')";
if ($conn->query($sql) === TRUE) {
    http_response_code(201);
    echo json_encode(['message' => 'New record created successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $conn->error]);
}
$conn->close();


?>