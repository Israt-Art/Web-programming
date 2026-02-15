<?php

$conn = new mysqli("localhost", "root", "", "252_sundarban");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h3>Task 1: Total revenue per category</h3>";

$sql1 = "
SELECT CategoryName, SUM(Revenue) AS totalRevenue
FROM sales_data
GROUP BY CategoryName
";

$result1 = $conn->query($sql1);


if(!$result1){
    die("Task 1 error: " . $conn->error);
}

while($row = $result1->fetch_assoc()){
    echo $row['CategoryName'] . " : " . $row['totalRevenue'] . "<br>";
}

echo "<h3>Task 2: Update category to Low Performing</h3>";

$sql2 = "
UPDATE sales_data
SET CategoryName = 'Low Performing'
WHERE Revenue < 40000
";

if(!$conn->query($sql2)){
    die("Task 2 error: " . $conn->error);
}

echo "Rows updated: " . $conn->affected_rows . "<br>";

echo "<h3>Task 3: Add 10% bonus revenue</h3>";

$sql3 = "
UPDATE sales_data
SET Revenue = Revenue * 1.10
WHERE Revenue > 70000
";

if(!$conn->query($sql3)){
    die("Task 3 error: " . $conn->error);
}

echo "Rows updated: " . $conn->affected_rows . "<br>";

echo "<h2>4. Product Status (Based on Category Average)</h2>";

$sql4 = "
SELECT ProductName, CategoryName, Revenue,
       (SELECT AVG(Revenue) 
        FROM sales_data 
        WHERE CategoryName = s1.CategoryName) AS AvgRev
FROM sales_data s1
ORDER BY Revenue DESC
";

$result4 = $conn->query($sql4);

while ($row = $result4->fetch_assoc()) {
    $status = ($row['Revenue'] > $row['AvgRev']) ? "Top Seller" : "Regular Seller";

    echo "Product: " . $row['ProductName'] .
         " | Revenue: " . number_format($row['Revenue'], 2) .
         " | Status: <b>" . $status . "</b><br>";
}

$conn->close();

?>
