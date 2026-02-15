<?php
session_start();

/* ---------------- RESET LOGIC ---------------- */
// Check if reset was triggered by the POST form button
if (isset($_POST['reset'])) {
    session_unset();     // remove all session variables
    session_destroy();   // destroy the session
    header("Location: 243_ques1.html");
    exit();
}

// Generate the secret number if it doesn't exist in the session
if (!isset($_SESSION['secret_number'])) {
    $_SESSION['secret_number'] = rand(500, 5000);
    $_SESSION['attempts'] = 0;
}

// Check if a guess was submitted
if (isset($_POST['user_guess'])) {

    $userGuess = intval($_POST['user_guess']);
    $_SESSION['attempts']++;

    $secretNumber   = $_SESSION['secret_number'];
    $currentAttempts = $_SESSION['attempts'];

    echo "<h2>Game Feedback</h2>";
    echo "Current Attempt: " . $currentAttempts . " of 5<br><br>";

    if ($userGuess == $secretNumber) {
        echo "<strong>Result: Correct!</strong>";
        session_destroy();
    }
    elseif ($currentAttempts > 5) {

        echo "<strong>Result: Out of guesses!</strong><br>";
        echo "The secret number was: " . $secretNumber;
        session_destroy();
    }
    else {

        if ($userGuess > $secretNumber) {
            echo "Feedback: Too high!";
        } else {
            echo "Feedback: Too low!";
        }

        echo "<br><br><a href='243_ques1.html'><button type='button'>Try Next Guess</button></a>";
    }
}
?>
