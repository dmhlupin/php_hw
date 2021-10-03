<?php
//Добавляем модуль с математикой
include "math.php";

//функция ищет в массиве нужное значение и выводит операцию
//по идее в не нужно подавать обработанный массив, а не массив $_POST, но я пока сделал так
function getOperation($arr) 
{
    if(in_array('+', $arr)){
        return 'sum';
    }
    elseif(in_array('-', $arr)){
        return 'diff';
    }
    elseif(in_array('*', $arr)){
        return 'mult';
    }
    elseif(in_array('/', $arr)){
        return 'div';
    }
    else return '';
} 
var_dump($_POST);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $val1 = (int)$_POST['value1'];
    $val2 = (int)$_POST['value2'];
    $operation = getOperation($_POST);
    $result = mathOperation($val1, $val2, $operation);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW6-1_Calc</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="value1" value="<?=$val1?>">
        <input type="text" name="value2" value="<?=$val2?>">
        <input type="submit" name="sum" value="+">
        <input type="submit" name="diff" value="-">
        <input type="submit" name="mult" value="*">
        <input type="submit" name="div" value="/">
        <input type="text" name="result" value="<?=$result?>" readonly>
    </form>
</body>
</html>