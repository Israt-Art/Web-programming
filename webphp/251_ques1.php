<?php
session_start();

if (isset($_POST['reset'])) {

    session_unset();        
    session_destroy();     

    header("Location: 251_ques1.html");
    exit();
}

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

if (isset($_POST['password'])) {
    $pwd = $_POST['password'];
} else {
    $pwd = '';
}
    if (empty($pwd)) {
        echo "Please enter a password first.";
    } else {
        $score = 0;
        $_SESSION['attempts']++;

        $len = strlen($pwd);
        if ($len >= 6) {
            $score += floor($len / 2) * 10;
        }

        if (preg_match('/[A-Z]/', $pwd)) 
            { $score += 15; }
        if (preg_match('/[a-z]/', $pwd)) 
            { $score += 15; }
        if (preg_match('/[0-9]/', $pwd))
             { $score += 20; }
        if (preg_match('/[!@#$%^&*]/', $pwd)) 
            { $score += 25; }

        if ($score >= 91) 
            { $level = "Very Strong"; }
        elseif ($score >= 71)
             { $level = "Strong"; }
        elseif ($score >= 51) 
            { $level = "Medium"; }
        elseif ($score >= 31) { $level = "Weak"; }
        else { $level = "Very Weak"; }

        echo "Strength: " . $level . " (Score: " . $score . ")<br>";

        if ($score >= 100) {
            echo "Perfect Password! Success Message: Goal Reached.<br>";
        }

        if ($_SESSION['attempts'] > 8 && $score <= 70) {
          
        echo "Need practice! Tip: Use longer passwords with symbols.<br>";
        }

        echo "Total Attempts: " . $_SESSION['attempts'];
    }

?>