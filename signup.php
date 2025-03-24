<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $country = $_POST['country'] ?? '';
        $city = $_POST['city'] ?? '';
        $address = $_POST['address'] ?? '';
        $userId = $_POST['id'] ?? null;

        if ($userId) {
            $stmt = $conn->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, phone = :phone, country = :country, city = :city, address = :address WHERE id = :id");
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':id', $userId);
            
            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Профиль обновлён. Регистрация окончена!"]);
            } else {
                http_response_code(500);
                echo json_encode(["success" => false, "message" => "Ошибка при обновлении профиля."]);
            }
            exit;
        }
        
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->fetch()) {
            echo json_encode(["success" => false, "message" => "Такой пользователь уже существует."]);
            exit;
        }
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        
        if ($stmt->execute()) {
            $userId = $conn->lastInsertId();
            echo json_encode(["success" => true, "id" => $userId]);
        } else {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => "Ошибка при регистрации."]);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Ошибка сервера: " . $e->getMessage()]);
    }
    exit;
}
?>