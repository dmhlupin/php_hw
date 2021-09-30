<?php

$db = @mysqli_connect("localhost:3307", "test", "12345", 'gallery') or die("Ошибка соединения: ". mysqli_connect_error());

$images = mysqli_query($db, "SELECT * FROM `images` WHERE 1 ORDER BY views_count DESC");

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
		<h2>Галерея изображений</h2>
		<div class="container">
			<?php foreach ($images as $image): ?> 
				<div class="small_image">
					<a href="image.php?id=<?=$image['id']?>">
						<img src="<?=$image['small_img_address'] . "/" . $image["img_name"]?>" alt="">
					</a>
					<p class="small_text">Количество просмотров: <?=$image['views_count']?></p>
					<p class="small_text">Размер: <?=$image['img_size']?></p><br> 
				</div>
			<?php endforeach;?>
		</div>
	</div>
</body>
</html>