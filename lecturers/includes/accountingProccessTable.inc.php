<?php
// Connect to your MySQL database
$mysqli = new mysqli("localhost", "root", "", "rsinfo");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$course_name = htmlspecialchars($_POST['course_name']);
$course_code = htmlspecialchars($_POST['course_code']);
$dept_name = htmlspecialchars($_POST['dept_name']);
$level_r = htmlspecialchars($_POST['level_r']);
$teacher_name = htmlspecialchars($_POST['teacher_name']);
$day_of_week = htmlspecialchars($_POST['day_of_week']);
$time_start = htmlspecialchars($_POST['time_start']);
$time_end = htmlspecialchars($_POST['time_end']);

// Insert data into the timetable table
$query = "INSERT INTO accountingtable (course_name, course_code, dept_name, level_r, teacher_name, day_of_week, time_start, time_end)
          VALUES ('$course_name', '$course_code', '$dept_name', '$level_r', '$teacher_name', '$day_of_week', '$time_start', '$time_end')";

if ($mysqli->query($query) === TRUE) {
    echo "Timetable entry added successfully.";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}


$mysqli->close();
?>
