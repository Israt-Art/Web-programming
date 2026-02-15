<?php
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    function summation($x, $y){
        $result = $x + $y;
        return $result;
    }

    echo summation($num1,$num2);
  
?>