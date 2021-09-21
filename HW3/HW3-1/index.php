<?php

# 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
echo "Задание 1 <br><br>";
$i = 0;
while($i <= 100) {
    if ($i % 3 == 0) {
        echo "{$i} ,";
    }
    $i++;
}

/*
2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – ноль.
    1 – нечетное число.
    2 – четное число.
    3 – нечетное число.
    …
    10 – четное число.
*/
echo "<br><br> Задание 2 <br><br>";

function check($i){
    $str = "";
    if ($i == 0) {
        $str = " - ноль.";
    } 
    else {
        $str = ($i & 1)?" - нечетное число.": " - четное число.";
    }
    return "{$i}{$str}<br>";
}

$i = 0;
do {
    echo check($i);    
    $i++;
} while ($i <= 10);

/* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
    Московская область:
    Москва, Зеленоград, Клин.
    Ленинградская область:
    Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
    Рязанская область … (названия городов можно найти на maps.yandex.ru) строго соблюдать формат вывода выше, т.е. двоеточие и точка в конце
*/

echo "<br><br> Задание 3 <br><br>";

$regionArr = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург','Всеволжск','Павловск','Кронштадт'],
    'Рязанская область' => ['Рязань','Шацк','Михайлов'],
];

foreach($regionArr as $key => $value)
{
    echo "{$key}:";
    foreach($value as $index => $city){    
        echo " {$city}";
        echo ($index == array_key_last($value))?".<br>":",";
    }  
}