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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if both username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the user already exists
        $checkUserQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = $conn->query($checkUserQuery);

        if ($checkResult->num_rows > 0) {
            $response['message'] = "User already exists";
        } else {
            // Insert the new user
            $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $insertResult = $conn->query($insertQuery);

            if ($insertResult) {
                $response['message'] = "Signup successful";
            } else {
                $response['message'] = "Error inserting user: " . $conn->error;
            }
        }
    } else {
        $response['error'] = "Username and password are required";
    }
} else {
    $response['error'] = "Invalid request method";
}

echo json_encode($response);

$conn->close();
?>