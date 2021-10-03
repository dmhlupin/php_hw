<?php
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