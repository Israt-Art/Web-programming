<?php

// Connect to database
$conn = new mysqli("localhost", "root", "", "243_uiuweb_final");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* ---------------- TASK 1 ----------------
Show total number of students for each letter grade
------------------------------------------*/
echo "<h3>Task 1: Total students for each letter grade</h3>";

$sql1 = "SELECT LetterGrade, COUNT(*) AS total
         FROM `243_student_final`
         GROUP BY LetterGrade";

$result1 = $conn->query($sql1);

if(!$result1){
    die("Task 1 error: " . $conn->error);
}

while ($row = $result1->fetch_assoc()) {
    echo "Letter Grade: " . $row['LetterGrade'] .
         " - Total Students: " . $row['total'] . "<br>";
}

/* ---------------- TASK 2 ----------------
If grade < 75 and letter grade is not D, set it to C
------------------------------------------*/
echo "<h3>Task 2: Update letter grade</h3>";

$sql2 = "UPDATE `243_student_final`
         SET LetterGrade = 'C'
         WHERE Grade < 75
         AND LetterGrade != 'D'";

if(!$conn->query($sql2)){
    die("Task 2 error: " . $conn->error);
}

echo "Updated rows: " . $conn->affected_rows . "<br>";

// Show updated table after Task 2
echo "<h4>After Task 2 update</h4>";

$sql_show = "SELECT * FROM `243_student_final`";
$result_show = $conn->query($sql_show);

if(!$result_show){
    die("Show error: " . $conn->error);
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Grade</th>
        <th>Letter Grade</th>
      </tr>";

while($row = $result_show->fetch_assoc()){
    echo "<tr>
            <td>".$row['StudentID']."</td>
            <td>".$row['StudentName']."</td>
            <td>".$row['CourseTitle']."</td>
            <td>".$row['Grade']."</td>
            <td>".$row['LetterGrade']."</td>
          </tr>";
}

echo "</table>";

/* ---------------- TASK 3 ----------------
If grade > 80 add 5 bonus points only if result <= 90
------------------------------------------*/
echo "<h3>Task 3: Add bonus marks</h3>";

$sql3 = "UPDATE `243_student_final`
         SET Grade = Grade + 5
         WHERE Grade > 80
         AND Grade + 5 <= 90";

if(!$conn->query($sql3)){
    die("Task 3 error: " . $conn->error);
}

echo "Updated rows: " . $conn->affected_rows . "<br>";

// Show table after Task 3
echo "<h4>After Task 3 update</h4>";

$result_show2 = $conn->query("SELECT * FROM `243_student_final`");
if(!$result_show2){
    die("Show error: " . $conn->error);
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Grade</th>
        <th>Letter Grade</th>
      </tr>";

while($row = $result_show2->fetch_assoc()){
    echo "<tr>
            <td>".$row['StudentID']."</td>
            <td>".$row['StudentName']."</td>
            <td>".$row['CourseTitle']."</td>
            <td>".$row['Grade']."</td>
            <td>".$row['LetterGrade']."</td>
          </tr>";
}

echo "</table>";

/* ---------------- TASK 4 ----------------
Course title and number of students, sorted by popularity
------------------------------------------*/
echo "<h3>Task 4: Course wise student count</h3>";

$sql4 = "SELECT CourseTitle, COUNT(*) AS totalStudents
         FROM `243_student_final`
         GROUP BY CourseTitle
         ORDER BY totalStudents DESC";

$result4 = $conn->query($sql4);

if(!$result4){
    die("Task 4 error: " . $conn->error);
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Course Title</th>
        <th>Total Students</th>
      </tr>";

while ($row = $result4->fetch_assoc()) {
    echo "<tr>
            <td>".$row['CourseTitle']."</td>
            <td>".$row['totalStudents']."</td>
          </tr>";
}

echo "</table>";


$conn->close();

?>
