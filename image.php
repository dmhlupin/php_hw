<?php

$image_id = (int)$_GET['id'];

$db = @mysqli_connect("localhost:3307", "test", "12345", 'gallery') or die("Ошибка соединения: ". mysqli_connect_error());

mysqli_query($db, "UPDATE images SET views_count = views_count + 1 WHERE id = {$image_id}");

$images = mysqli_query($db, "SELECT * FROM `images` WHERE id = {$image_id}");

$image = $images->fetch_assoc(); //сделал через объектный стиль чтобы запомнить разные подходы

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($image != null):?>
        <h2><?=$image['img_name']?></h2>
        <img src="<?=$image['img_address'] . "/" . $image['img_name']?>" alt="<?=$image['img_name']?>"><br>
        <p>Количество просмотров: <?=$image['views_count']?></p>
        
    <?php else:?>
        <p>Нет такого изображения</p>
    <?php endif;?>
</body>
</html>