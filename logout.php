<?php
session_start(); // Добавь это в начало файла
session_destroy(); // Уничтожаем сессию
header("Location: main.php"); // Перенаправляем на главную страницу
exit();
?>