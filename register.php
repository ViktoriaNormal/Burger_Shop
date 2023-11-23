<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Бургерная</title>
	<link rel="stylesheet" href="stylelogin.css">
</head>
<header>
		<nav>
			<ul>
				<li><a href="index.php" class="active">Главная</a></li>
				<li><a href="menu.php" class="active">Меню</a></li>
				<li><a href="login.php" class="active">Войти</a></li>
				<li><a href="register.php" class="active">Регистрация</a></li>
				<li><a href="cart.php" class="active">Корзина</a></li>
			</ul>
		</nav>
	</header>
    <main class="parent">
    <h1>Регистрация</h1>
	<div>
		<section>    
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
<div>
    <label for="username">Имя пользователя:</label>
    <input  class="inputfield" type="text" name="username" id="username" required>
</div>

    <div>
    <label for="password">Пароль:</label>
    <input  class="inputfield" type="password" name="password" id="password" required>
</div>

    <div>
    <button type="submit">Зарегистрироваться</button>
</div>
</form>
</main>
</div>
</section>
</body>
<div>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</div>
</html>
