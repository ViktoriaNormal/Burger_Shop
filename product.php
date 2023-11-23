<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Бургерная</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
<?php include "db_connect.php"; ?>
    <h1 class="h1 text">Подробная информация о бургере</h1>
        <?php

        $result = mysqli_query($conn, "SELECT * FROM `images` WHERE id_img=".$_GET['id'].";");

        while ($name = mysqli_fetch_assoc($result)) {
            echo ' <div class="product">
                        <img class="logoProduct" src="../'.$name['img'].'" alt=' . $name['name'] . '>
                        <p class="text">' . $name['price'] . '₽</p>
                        <p class="text">Описание: ' . $name['description'] . '</p>
                        <p class="text">Количество: ' . $name['count'] . 'шт.</p>
                    </div>
                    ';
        }


        ?>

</main>
</body>
<div>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer>
</div>
</html>
<script>
    function moreInfo(item){
        window.location.replace('products.php');
    }
</script>

</body>