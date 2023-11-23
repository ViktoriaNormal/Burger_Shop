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
				<li><a href="index.php" class="link">Главная</a></li>
				<li><a href="menu.php" class="link">Меню</a></li>
				<li><a href="login.php" class="link">Войти</a></li>
				<li><a href="register.php" class="link">Регистрация</a></li>
				<li><a href="cart.php" class="link">Корзина</a></li>
				<li><a href="form.php" class="link">Оставить обратную связь </a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<h1 class="title">Добро пожаловать в нашу бургерную!</h1>
			<p class="text">Мы предлагаем лучшие бургеры в городе.</p>
		</section>
		<section class="menu">
			<h2 class="title">Наше меню</h2>
			<ul class="menu-items">
				<?php
				session_start();

				// Проверяем, есть ли уже массив корзины в сессии
				if (!isset($_SESSION["cart"])) {
				    $_SESSION["cart"] = array();
				}

				include 'db_connect.php';

				// Получение списка продуктов из базы данных
				$sql = "SELECT * FROM menu";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // Вывод списка продуктов
				    while($row = $result->fetch_assoc()) {
				        echo "<li>".$row["term"]." - ".$row["price"]." руб. <button onclick='addToCart(".$row["id_burger"].")'>Добавить в корзину</button></li>";
				    }
				} else {
				    echo "Нет продуктов для отображения.";
				}

				mysqli_close($conn);
				?>
			</ul>
		</section>
	</main>

  <script type="text/javascript">
      function addToCart(productId) {
          fetch("cart.php?add_to_cart=" + productId)
              .then(response => response.text())
              .then(data => {
                  // Обработка ответа после добавления продукта в корзину
                  // Например, обновление списка позиций в корзине на странице
                  document.getElementById("cart-items").innerHTML = data;
              })
              .catch(error => {
                  console.log(error);
              });
      }
  </script>

<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 

</body>
</html>

