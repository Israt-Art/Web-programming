<?php

if (
    isset($_POST['students']) &&
    isset($_POST['slices_per_student']) &&
    isset($_POST['slices_per_pizza'])
) {

    $students = intval($_POST['students']);
    $slicesPerStudent = intval($_POST['slices_per_student']);
    $slicesPerPizza = intval($_POST['slices_per_pizza']);

    $pricePerPizza = 1050;

    $totalSlicesNeeded = $students * $slicesPerStudent;

    $totalPizzas = ceil($totalSlicesNeeded / $slicesPerPizza);

    $totalSlicesBought = $totalPizzas * $slicesPerPizza;

    $leftoverSlices = $totalSlicesBought - $totalSlicesNeeded;

    $pricePerSlice = $pricePerPizza / $slicesPerPizza;

    $wastedMoney = $leftoverSlices * $pricePerSlice;

    echo "Number of Students: " . $students . "<br>";
    echo "Slices per Student: " . $slicesPerStudent . "<br>";
    echo "Slices per Pizza: " . $slicesPerPizza . "<br><br>";

    echo "Total Pizzas: " . $totalPizzas . "<br>";
    echo "Leftover Slices: " . $leftoverSlices . "<br>";
  echo "Wasted Money (BDT): " . number_format($wastedMoney, 2);

}

?>
