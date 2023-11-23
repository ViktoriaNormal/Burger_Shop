<?php
$servername = "localhost";
$username = "root";
$password = "PapaShokshat7879_#!";
$dbname = "burgers";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
	die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>
