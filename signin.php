<?php
session_start(); 
require 'db.php';

// Set headers for JSON response
header('Content-Type: application/json');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify credentials
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Return success response
        echo json_encode([
            'status' => 'success',
            'message' => 'Авторизация успешна',
            'redirect' => 'main.php'
        ]);
        exit();
    } else {
        // Return error response
        http_response_code(401); // Unauthorized
        echo json_encode([
            'status' => 'error',
            'message' => 'Неверный email или пароль.'
        ]);
        exit();
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'status' => 'error',
        'message' => 'Недопустимый метод запроса.'
    ]);
    exit();
}
?>