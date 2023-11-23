<?php
include 'header.php';
?>
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