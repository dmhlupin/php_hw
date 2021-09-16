<?php

echo power(2, 8);

function power($val, $pow){
    if ($pow == 0) {
        return 1;
    };
    if ($pow < 0) {
        return "я не умею считать отрицательные степени!";
    }
    if ($pow == 1) {
        return $val;
    }
    else {
        return $val * power($val, --$pow);
    };
};