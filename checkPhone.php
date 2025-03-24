<?php
require 'db.php';

$phone = $_GET['phone'] ?? '';

// Логируем полученный номер для отладки
error_log("Полученный номер телефона: " . $phone);

if ($phone) {
    try {
        
        $phone = trim($phone); // лишние пробелы
        $phone = str_replace([' ', '-', '(', ')'], '', $phone); // лишние символы

        error_log("Обработанный номер телефона: " . $phone);

        $stmt = $conn->prepare("SELECT id FROM users WHERE phone = :phone");
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        if ($stmt->fetch()) {
            echo json_encode(["available" => false]); // Телефон занят
        } else {
            echo json_encode(["available" => true]); // Телефон доступен
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => "Ошибка сервера: " . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Телефон не указан"]);
}
?>