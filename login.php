<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Бургерная</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
</head>
<body>
<header>
		<nav>
			<ul>
				<li class="link"><a href="index.php">Главная</a></li>
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
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;

        header("Location: index.php");
        exit();
    } else {
        echo "Неверное имя пользователя или пароль";
    }
}

$conn->close();
?>

<!-- Форма для авторизации -->
<form method="POST" action="">
    <label for="username">Имя пользователя:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Войти</button>
</form>
</body>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</html>
