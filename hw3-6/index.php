<?php
$menu = 
[
    ["href" => "index.php", "item" => "Главная"],
    ["href" => "catalog.php", "item" => "Каталог"],
    ["href" => "about.php", "item" => "О нас"],
];

function renderMenu($arr) 
{
    $resultStr = "<ul>";
    foreach($arr as $value) {
        $resultStr .= "<li><a href = {$value['href']}>{$value['item']}</li>";
        // для вложенного меню здесь можно провести проверку если $item is_array и рекурсивно вызвать эту же функцию
    }
    return $resultStr . "</ul>";
}

echo renderMenu($menu);