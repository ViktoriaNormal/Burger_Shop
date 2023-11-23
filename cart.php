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
session_start();

// Проверяем, есть ли уже массив корзины в сессии
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

// Добавление продукта в корзину
if (isset($_GET["add_to_cart"])) {
    $productId = $_GET["add_to_cart"];
    $_SESSION["cart"][] = $productId;

    // Возвращение списка позиций в корзине
    echo generateCartItems();
}

// Удаление продукта из корзины
if (isset($_GET["remove_from_cart"])) {
    $productId = $_GET["remove_from_cart"];
    $index = array_search($productId, $_SESSION["cart"]);

    if ($index !== false) {
        unset($_SESSION["cart"][$index]);
    }

    // Возвращение списка позиций в корзине
    echo generateCartItems();
}

// Функция для генерации списка позиций в корзине
function generateCartItems() {
    include 'db_connect.php';

    // Получение информации о каждом добавленном продукте из базы данных
    $addedProducts = $_SESSION["cart"];
    $cartItems = array();
    $totalPrice = 0;

    foreach ($addedProducts as $productId) {
        $sql = "SELECT * FROM menu WHERE id_burger = $productId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $price = $row["price"];
            $totalPrice += $price;
            $cartItems[] = "<li>".$row["term"]." - ".$price." руб. <button onclick='removeFromCart(".$productId.")'>Удалить</button></li>";
        }
    }

    // Добавление общей суммы позиций в корзине
    $cartItems[] = "<li>Общая сумма: ".$totalPrice." руб.</li>";

    return implode("", $cartItems);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Корзина</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#">Главная</a></li>
				<li><a href="#">Меню</a></li>
				<li><a href="login.php">Войти</a></li>
				<li><a href="register.php">Регистрация</a></li>
				<li><a href="cart.php">Корзина</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section class="cart">
			<h2>Корзина</h2>
			<ul id="cart-items">
				<?php echo generateCartItems(); ?>
			</ul>
			<a href="#" class="btn">Оформить заказ</a>
		</section>
	</main>
</body>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</html>
