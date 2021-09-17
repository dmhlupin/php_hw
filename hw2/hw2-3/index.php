<?php






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

echo div(4, 1);