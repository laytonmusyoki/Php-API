<?php


include '../connection.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'PUT') {
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

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$name = $input['name'];
$email = $input['email'];
$phone = $input['phone'];
$date = $input['date'];
$sql = "UPDATE students SET name='$name', email='$email', phone='$phone', date='$date' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    http_response_code(200);
    echo json_encode(['message' => 'Record updated successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $conn->error]);
}
$conn->close();




?>