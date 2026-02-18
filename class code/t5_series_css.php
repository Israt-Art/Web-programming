<?php
/*
    $n = $_POST['n'];
    $a = 1;
    $b = 3;
    echo "$a + $b + ";
    for($i=1;$i<=$n;$i++){
        $c = $a + $b;
        echo "$c + ";
        $a = $b;   ///$a = 1, $a = 3 
        $b = $c;  ////$b = 3, $b = 4
    }
*/
$n = $_POST['n'];
$result = 1;
for($i = 1;$i<=$n;$i++){
    echo $result;
    $result = ($result * $result) + 2;
    if($i%2==0){
        echo "-";
    }
    else{
        echo "+";
    }
}


?>