<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Ask me</title>
    <link rel="stylesheet" href="styleform.css">
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
<form style="color:white;">
    <?php
    echo ' <label class="text1">Здраствуйте '.$_POST['name'].'<p></label>';
    if ($_POST['select'] == 'complaint'){
    echo '<label class="text1">Просим прощения за сложившую ситуацию, мы всеми силами попытаемся исправить указанный вами недостаток:<p></label>';
    }else {
    echo '<label class="text1">Спасибо за ваше предложение:<p></label>';
    }
    echo '<label class="text1">'.$_POST['comment'].'<p></label>';
    if (isset($_POST['file']) & $_POST['file'] != '') echo '<label class="label_box">Вы приложили следующий файл: '.$_POST['file'].'<p></label>';
    echo '<a class="text1" href="index.php?N='.$_POST['name'].'&E='.$_POST['email'].'&S='.$_POST['radio'].'" style="background-color:white; padding:5px; color: black; border-radius: 7px; ">Заполнить снова</a>';
    ?>
    </form>
    </main>
</body>
<div>
<footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</div>
</html>