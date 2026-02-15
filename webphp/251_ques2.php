<?php

if (isset($_POST['attendees']) && isset($_POST['cost']) && isset($_POST['capacity'])) {

$attendees = intval($_POST['attendees']);
$cost      = intval($_POST['cost']);
$capacity  = intval($_POST['capacity']);


    // Calculate total venues (must be full venues)
    $totalVenues = ceil($attendees / $capacity);

    // Calculate empty seats
    $emptySeats = ($totalVenues * $capacity) - $attendees;

    // Calculate wasted money
    $wastedMoney = $emptySeats * $cost;

    echo "<h3>Result</h3>";

echo "Attendees: " . $attendees . "<br>";
echo "Cost per Person: " . $cost . "<br>";
echo "Venue Capacity: " . $capacity . "<br>";
echo "Total Venues: " . $totalVenues . "<br>";
echo "Empty Seats: " . $emptySeats . "<br>";
echo "Wasted Money (BDT): " . number_format($wastedMoney);
}
?>