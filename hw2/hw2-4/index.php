<?php

function arithmetic($a, $b, $oper){
    switch($oper){
        case "сложить": 
            return $a + $b;
            break;
        case "вычесть": 
            return $a - $b;
            break;
        case "умножить": 
            return $a * $b;
            break;
        case "разделить":
            return $b == 0 ? "Деление на 0!" : $a / $b; 
            break;
        default:
            return "Нет такой операции";
            break;
    };

};

echo arithmetic(4,6,"умножить");

# Вариант 2 с передачей функции-операции в качестве аргумента в функцию MathOperation

echo "<br><br> ========== V2 ========== <br><br>";

function mathOperation($a, $b, $oper){
    return function_exists($oper)?$oper($a, $b):"Операция не определена!";
};

function sum($a, $b){
    return $a + $b;
};

function diff($a, $b){
    return $a - $b;
};

function mult($a ,$b){
    return $a * $b;
};

function div($a, $b){
    return $b == 0 ? "Деление на 0!" : $a / $b; 
};

echo mathOperation(5,0,"sad");