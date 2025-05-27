<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';


header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$students = [];
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode($students);
} else {
    echo json_encode(['error' => 'No students']);
}
?>
