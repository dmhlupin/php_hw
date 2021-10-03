<?php
include "sources.php";
$goods = mysqli_query($db, "SELECT 
								g.id,
								name, 
								price, 
								ANY_VALUE(i.filename) AS fname 
							FROM goods g JOIN images i ON i.goods_id = g.id 
							GROUP BY g.id 
							ORDER BY price DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Галерея</title>
</head>
<body>
	<div class="wrapper">
		<h2>Магазин товаров</h2>
		<div class="container">
			<?php foreach ($goods as $good): ?> 
				<div class="small_image">
					<a href="good.php?id=<?=$good['id']?>">
						<img src="<?=$small_img_address . $good["fname"]?>" alt="">
					</a>
					<p class="small_text">Название: <?=$good['name']?></p>
					<p class="small_text">Цена: <?=$good['price']?></p><br> 
				</div>
			<?php endforeach;?>
		</div>
	</div>
</body>
</html>