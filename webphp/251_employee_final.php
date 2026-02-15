<?php

$conn = new mysqli("localhost", "root", "", "251_uiutech_final");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


/* ---------------- Task 1 ----------------
Total employees for each performance rating
------------------------------------------*/

echo "<h3>Task 1: Total employees for each performance rating</h3>";

$sql1 = "
SELECT PerformanceRating, COUNT(*) AS total
FROM employee_final
GROUP BY PerformanceRating
";

$result1 = $conn->query($sql1);

if (!$result1) {
    die("Task 1 error: " . $conn->error);
}

while ($row = $result1->fetch_assoc()) {
    echo "Rating " . $row['PerformanceRating'] . " : " . $row['total'] . "<br>";
}


/* ---------------- Task 2 ----------------
Salary < 40000 and rating is not D
Change rating to C
------------------------------------------*/

echo "<h3>Task 2: Update rating to C</h3>";

$sql2 = "
UPDATE employee_final
SET PerformanceRating = 'C'
WHERE Salary < 40000
AND PerformanceRating <> 'D'
";

if (!$conn->query($sql2)) {
    die("Task 2 error: " . $conn->error);
}

echo "Rows updated: " . $conn->affected_rows . "<br>";


/* ---------------- Task 3 ----------------
Add 5000 bonus if salary > 50000
but final salary must be <= 60000
------------------------------------------*/

echo "<h3>Task 3: Add bonus</h3>";

$sql3 = "
UPDATE employee_final
SET Salary = Salary + 5000
WHERE Salary > 50000
AND (Salary + 5000) <= 60000
";

if (!$conn->query($sql3)) {
    die("Task 3 error: " . $conn->error);
}

echo "Rows updated: " . $conn->affected_rows . "<br>";


/* ---------------- Task 4 ----------------
Employees per department (largest first)
------------------------------------------*/

echo "<h3>Task 4: Employees per department</h3>";

$sql4 = "
SELECT DepartmentName, COUNT(*) AS totalEmployees
FROM employee_final
GROUP BY DepartmentName
ORDER BY totalEmployees DESC
";

$result4 = $conn->query($sql4);

if (!$result4) {
    die("Task 4 error: " . $conn->error);
}

while ($row = $result4->fetch_assoc()) {
    echo $row['DepartmentName'] . " : " . $row['totalEmployees'] . "<br>";
}

$conn->close();

?>
