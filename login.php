<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Бургерная</title>
	<link rel="stylesheet" href="stylelogin.css">
</head>
<body>
<header>
		<nav>
			<ul>
            <li><a href="index.php" class="active">Главная</a></li>
				<li><a href="menu.php" class="active">Меню</a></li>
				<li><a href="login.php" class="active">Войти</a></li>
				<li><a href="register.php" class="active">Регистрация</a></li>
				<li><a href="cart.php" class="active">Корзина</a></li>
				<li><a href="form.php" class="active">Оставить обратную связь </a></li>
			</ul>
		</nav>
	</header>
    <main class="parent">
        <h1>Авторизация</h1>
	<div>
		<section>    
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

        if (isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array(); 
        }
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
    <div>
        <label for="username">Имя пользователя:</label>
        <input class="inputfield" type="text" name="username" id="username" required>
    </div>

    <div>
        <label for="password">Пароль:</label>
        <input class="inputfield" type="password" name="password" id="password" required>
    </div>

    <div>
        <button type="submit">Войти</button>
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
