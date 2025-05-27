<?php


include '../connection.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'PUT') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get the ID from the url
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid ID']);
    exit;
}

$sql = "DELETE FROM students WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    http_response_code(200);
    echo json_encode(['message' => 'Record deleted successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error: ' . $conn->error]);
}
$conn->close(); 



?>