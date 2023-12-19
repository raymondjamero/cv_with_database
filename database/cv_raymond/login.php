<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$database = "cv_logins";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $response['message'] = "Login successful";
} else {
    $response['message'] = "Login failed";
}

echo json_encode($response);

$conn->close();
?>