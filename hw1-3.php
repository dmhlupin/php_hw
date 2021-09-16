<?php
    $a = 5;
    $b = '05';
    
    var_dump($a==$b); // true - сравнение по значению. Тип не сравнивается. Работает приведение типов. Строка b преобразовалась в число.

    var_dump((int)'012345'); // (int)'012345' - приведение к типу integer. Строка преобразована в целое число.

    var_dump((float)123.0 === (int)123.0); // внутри var_dump строгое сравнение двух разных типов, поэтому false

    var_dump((int)0 === (int)'hello, world'); // - при преобразовании строки в число, если строка не числовая и не начинается на цифру, результат int(0)
                                              // - поэтому int(0) === int(0) - true