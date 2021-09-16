<?php
    $a = 23;
    $b = 65;

    echo ' Даны: a = '. $a . '; b = '. $b . '<br>'; 

    // решение через XOR: 
    //1.  $a ^ $b - получаем промежуточное значение c,
    //2.  ($b = $a) - присваиваем значению b значение а
    //3.  Вычисляем а как с ^ b (b уже равно a)

    //           (------- b -------)
    //           (- c -)   (-- a --)
            $a = $a ^ $b ^ ($b = $a);
    
    echo 'Получаем: a = '. $a . '; b = '. $b; 
    