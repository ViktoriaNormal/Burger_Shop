<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Бургерная</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
</head>
<header>
		<nav>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="menu.php">Меню</a></li>
				<li><a href="login.php">Войти</a></li>
				<li><a href="register.php">Регистрация</a></li>
				<li><a href="cart.php">Корзина</a></li>
			</ul>
		</nav>
	</header>
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Проверка, что пароль и имя пользователя уникальны

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Пользователь с таким именем уже существует";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Регистрация прошла успешно";
        } else {
            echo "Ошибка при регистрации: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- HTML форма для регистрации -->
<form method="POST" action="">
    <label for="username">Имя пользователя:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Зарегистрироваться</button>
</form>
</body>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</html>
