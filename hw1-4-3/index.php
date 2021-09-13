<?php
    $title = "Главная страница - страница обо мне";
	$mainHeader = "Информация обо мне";
	$currentYear = getdate()[year];

    $content = file_get_contents("templates/template.tmpl");

    $content = str_replace("{{ title }}", $title, $content);
    $content = str_replace("{{ mainHeader }}", $mainHeader, $content);
    $content = str_replace("{{ currentYear }}", $currentYear, $content);

    echo $content;