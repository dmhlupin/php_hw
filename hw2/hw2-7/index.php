<?php
function currentTime() {
    $h = timeToString(date('H'), 'часов', 'час', 'часа');
    $m = timeToString(date('i'), 'минут', 'минута', 'минуты');
    return $h . $m;
};

function timeToString($value, $str1, $str2, $str3){
    if($value%10 == 0 || $value%10 >= 5 || ($value >= 10 && $value <= 19)) {
        $value = "{$value} {$str1} ";
    } elseif ($value%10 == 1) {
        $value = "{$value} {$str2} ";
    } else {
        $value = "{$value} {$str3} ";
    };
    return $value;
};
echo currentTime();