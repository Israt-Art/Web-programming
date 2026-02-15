<?php

$n=$_POST['n'];
$result=1;

for($i=1;$i<=$n;$i++){
    echo $result;

    $result=($result*$result)+2;

    if($i%2==0){
        echo "-";
    }
    else{
         echo "+";
    }
}

?>