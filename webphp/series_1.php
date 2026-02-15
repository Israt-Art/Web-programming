<?php
$n = $_POST['n'];

$a = 1;
$b = 3;

echo $a . " + " . $b;

for ($i = 1; $i <= $n - 2; $i++) {
    $c = $a + $b;
    echo " + " . $c;
    $a = $b;
    $b = $c;
}
?>
