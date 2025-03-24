<?php
session_start(); 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Устанавливаем user_id в сессию
        $_SESSION['email'] = $user['email']; // Устанавливаем email в сессию
        header("Location: main.php"); // Перенаправляем на главную страницу
        exit();
    } else {
        echo "Неверный email или пароль.";
    }
}
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    echo "Сессия установлена: user_id = " . $_SESSION['user_id']; // Отладка
    header("Location: main.php");
    exit();
}
?>