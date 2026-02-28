<?php
$host = '192.168.1.250';          // обычно localhost, если всё на одном сервере
$dbname = 'definitions';              // имя вашей базы данных
$username = 'user';       // пользователь БД
$password = 'user';   // пароль пользователя

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>