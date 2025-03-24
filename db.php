<?php
$host = 'localhost'; // Хост базы данных (обычно localhost)
$dbname = 'jogabonito'; // Имя твоей базы данных
$username = 'root'; // Имя пользователя MySQL (по умолчанию root)
$password = ''; // Пароль пользователя MySQL (по умолчанию пустой)

try {
    // Подключение к базе данных через PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Устанавливаем режим ошибок: исключения при ошибках
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Сообщение об успешном подключении (для отладки)
    // echo "Подключение к базе данных успешно!";
} catch (PDOException $e) {
    // Если подключение не удалось, выводим сообщение об ошибке
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>