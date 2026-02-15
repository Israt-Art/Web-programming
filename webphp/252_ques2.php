<?php

if(isset($_POST['submit'])){

$attendance=intval($_POST['attendees']);
$capacity=intval($_POST['capacity']);
$price=intval($_POST['price']);

$screens=ceil($attendees/$capacity);

$totalSeats=$screens*$capacity;

$emptySeats= $totalSeats - $attendees;

$wastedMoney=$emptySeats*$price;

echo "total secreens: $screens <br>";
echo "empty seats: $emptyseats <br>";
echo "wasted money: $wastedMoney <br>";

}
?>