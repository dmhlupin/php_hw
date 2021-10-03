<?php
include "sources.php";
$goods_id = (int)$_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feed_item = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feed'])));
    mysqli_query($db, 
        "INSERT INTO `feedback`(`author`, `feedback_text`, `goods_id`)
            VALUES ('{$name}', '{$feed_item}', {$goods_id})
        ");
    header('Location: /good.php?id='. $goods_id);
    die();
 }


$goods = mysqli_query($db, 
    "SELECT
        g.id, 
        name, 
        description,
        price, 
        ANY_VALUE(i.filename) AS fname 
        FROM goods g JOIN images i ON i.goods_id = g.id 
        WHERE g.id = {$goods_id}"
        );

$good = $goods->fetch_assoc();

//Отзывы
$feedback = mysqli_query($db, 
    "SELECT                            
        author,
        feedback_text,
        created_at 
    FROM feedback f 
    WHERE f.goods_id = {$goods_id}
    ORDER BY f.id DESC"
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <a href="index.php"> <-- Назад</a>
        </div>
        <div class="img_container">
            <?php if ($good != null):?>
                <h2><?=$good['name']?></h2>
                <img src="<?=$big_img_address . $good['fname']?>" alt="<?=$good['fname']?>"><br>
                <p class="small_text">Название товара: <?=$good['name']?></p>
                <p class="small_text">Описание товара: <?=$good['description']?></p>
                <p class="small_text">Стоимость товара: <?=$good['price']?></p>
                <form action="buy.php" method="GET">                <!-- Пока никуда не ведет -->
                    <input type="text" name="good_id" value="<?=$good['id']?>" hidden>
                    <input type="submit" name="Buy" value="Купить">
                </form>
                <?php foreach ($feedback as $feed): ?>
                    <h5>Отзыв от <?=$feed['author']?></h5>
                    <p class="small_text">Создан: <?=$feed['created_at']?></p>
                    <p class="small_text">Сообщение: <?=$feed['feedback_text']?></p>
                <?php endforeach;?>
                <h4>Оставить отзыв:</h4>
                <form action="" method="POST">
                    <label for="feed_author">Имя: </label>
                    <input type="text" name="name" id="feed_author">
                    <label for="feed_body"> Отзыв:</label>
                    <input type="text" name="feed" id="feed_body">
                    <input type="submit" name="submit" value="Отправить">
                </form>
            <?php else:?>
                <p>Нет такого товара</p>
            <?php endif;?>
        </div>
    </div>
</body>
</html>