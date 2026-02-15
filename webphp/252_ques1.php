<?php
session_start();

if (isset($_POST['reset'])) {

    session_unset();        
    session_destroy();     

    header("Location: 252_ques1.html");
    exit();
}
if (isset($_POST['add'])) {
    if (!isset($_SESSION['total_calories'])) {
        $_SESSION['total_calories'] = 0;
        $_SESSION['entry_count'] = 0;
    }

    $calories = intval($_POST['calories']);

    $_SESSION['total_calories'] += $calories;
    $_SESSION['entry_count']++;

    $total   = $_SESSION['total_calories'];
    $entries = $_SESSION['entry_count'];
    $goal    = 2000;

    if ($total <= 800) {
        $feedback = "You're off to a healthy start!";
    } elseif ($total <= 1600) {
        $feedback = "Good progress, keep it balanced!";
    } elseif ($total <= 1999) {
        $feedback = "Almost at your limit!";
    } else {
        $feedback = "Goal reached! Stay mindful!";
    }

    echo "Total Calories: $total <br>";
    echo "Entries Made: $entries <br>";
    echo "<strong>$feedback</strong><br>";

    if ($entries > 10 && $total < $goal) {
        echo "<p>Be cautious of frequent snacking!</p>";
    }

    echo "<br><a href='252_ques1.html'>Go Back</a>";
}
?>
