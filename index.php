<?php
define('GALLERY_PATH', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img');

include 'classSimpleImage.php';

function getImages($path)
{
	return array_splice(scandir($path), 2);
}

$images = getImages(GALLERY_PATH . '/small');

if(!empty($_FILES)) {
	$path = GALLERY_PATH . '/big/';
	$filename = $_FILES['myfile']['name'];
		
	// проверка на расширение файла
	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $filename)) {
		echo "Загрузка php-файлов запрещена!";
		exit;
		}
	}

	// Проверка на размер

	if($_FILES['myfile']['size'] > 1024*5*1024)
	{
		echo ("Размер файла не больше 5 мб");
		exit;
	}

	// Сама загрузка и создание миниатюры

	if(move_uploaded_file($_FILES['myfile']['tmp_name'], $path . $filename)){
		$image = new SimpleImage();
		$image->load($path . $filename);
		$image->resizeToWidth(150);
		$image->save(GALLERY_PATH . '/small/' . $filename);
		$message = "Файл загружен!";
		header("Location: /?message=ok");
		die();
	} else {
		$message = "Ошибка загрузки!";
		header("Location: /?message=err");
		die();
	}
}

$codes = [
	'ok' => 'Файл загружен',
	'err' => 'Ошибка загрузки',
];
$messageCode = strip_tags($_GET['message']);
$message = $codes[$messageCode];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Моя галерея</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("a.photo").fancybox({
				transitionIn: 'elastic',
				transitionOut: 'elastic',
				speedIn: 500,
				speedOut: 500,
				hideOnOverlayClick: false,
				titlePosition: 'over'
			});	
		}); 
	</script>
</head>

<body>
<div id="main">
<div class="post_title"><h2>Моя галерея</h2></div>
	<div class="gallery">
		<?php foreach ($images as $img): ?>
			<a rel="gallery" class="photo" href="gallery_img/big/<?=$img ?>"><img src="gallery_img/small/<?=$img ?>" width="150" height="100" /></a>
		<?php endforeach; ?>
	</div>
	<div class="upload_form">
			<form method="post" enctype="multipart/form-data">
					<input type="file" name="myfile">
					<input type="submit" value="Загрузить">
			</form>
	</div>
	<div>
		<?=$message?>
	</div>
</div>

</body>
</html>
