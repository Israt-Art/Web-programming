<?php
    $quantity = $_POST['quantity'];
    $hd = $_POST['hd'];
    $address = $_POST['address'];
    $tip = $_POST['tip'];

    $base = 12.5;
    $base = $base * $quantity;
    if($quantity>=1 && $quantity<=9){
        $base = $base * 0.90; // 100-10= 90 = 0.90
    }
    else if($quantity>=10 && $quantity<=19){
        $base = $base * 0.85; // 100-15= 85 = 0.85
    }
    else if($quantity>=20){
        $base = $base * 0.80; // 100-20= 80 = 0.80
    }

    if($hd == "yes"){
        $base = $base + 40;
    }
    if($address == "dhk"){
        $base = $base * 1.20; // 100+20 = 120 = 1.20
    }
    else{
        $base = $base * 1.15; // 100+15 = 115 = 1.15
    }
    $base = $base + $tip;

    echo "Your total bill is: $base";


?>