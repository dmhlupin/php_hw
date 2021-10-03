<?php
include "math.php";

function setSelected($thisOperation, $postOperation) 
{
    return $thisOperation == $postOperation ? 'selected' : ''; 
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $val1 = (int)$_POST['value1'];
    $val2 = (int)$_POST['value2'];
    $operation = $_POST['operation'];
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
        <select name="operation">
            <option value="sum" <?=setSelected("sum", $operation);?>>Сложить</option>
            <option value="diff" <?=setSelected("diff", $operation);?>>Вычесть</option>
            <option value="mult" <?=setSelected("mult", $operation);?>>Умножить</option>
            <option value="div" <?=setSelected("div", $operation);?>>Разделить</option>
        </select>
        <input type="text" name="value2" value="<?=$val2?>">
        <input type="submit" name="run" value="=">
        <input type="text" name="result" value="<?=$result?>" readonly>
    </form>
</body>
</html>