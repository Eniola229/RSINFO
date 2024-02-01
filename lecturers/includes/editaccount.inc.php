<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rsinfo";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"];
    $course_name = htmlspecialchars($_POST['course_name']);
    $course_code = htmlspecialchars($_POST['course_code']);
    $dept_name = htmlspecialchars($_POST['dept_name']);
    $level_r = htmlspecialchars($_POST['level_r']);
    $teacher_name = htmlspecialchars($_POST['teacher_name']);
    $day_of_week = htmlspecialchars($_POST['day_of_week']);
    $time_start = htmlspecialchars($_POST['time_start']);
    $time_end = htmlspecialchars($_POST['time_end']);

    $sql = "UPDATE accountingtable 
            SET course_name='$course_name', course_code='$course_code', dept_name='$dept_name', level_r='$level_r', teacher_name='$teacher_name', day_of_week='$day_of_week', time_start='$time_start', time_end='$time_end'
            WHERE course_id=$course_id";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../lecturehome.php"); // Redirect back to the lecturehome page after successful update
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

$connection->close();
?>
