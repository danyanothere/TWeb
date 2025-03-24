<?php
require 'db.php';

$email = $_GET['email'] ?? '';

if ($email) {
    try {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            echo json_encode(["available" => false]); // Email занят
        } else {
            echo json_encode(["available" => true]); // Email доступен
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => "Ошибка сервера: " . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Email не указан"]);
}
?>