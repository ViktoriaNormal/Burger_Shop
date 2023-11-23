
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Images</title>
    <link rel="stylesheet" href="style_images.css">
</head>
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
        <body>
            <main>
            <div class="box">
                <?php
                    include "db_connect.php";
                    
                    $result = mysqli_query($conn, "SELECT * FROM `images`"); 
                    while($name = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="filters__img">
                            
                            <img class="photo" title="<?php echo $name['name'];?>" src="../<?php echo $name['img'];?>" >
                            </div>

                            <div><button type="button" <?php echo 'onClick="moreInfo('.$name['id_img'].')"' ?>>Перейти к подробному описанию</button></div>

                            <div class="block"><p><?php echo $name['description'];?></p></div>
        
    
                        <?php
                        
                    }
                ?>
            </div> 
                </main>
        </body>
    <footer>
        Сформировано <?php echo date('d.m.Y в H:i:s'); ?>
    </footer> 
</html>
<script>

function moreInfo(item) {
        window.location.replace('product.php?id='+item);
    }
</script>