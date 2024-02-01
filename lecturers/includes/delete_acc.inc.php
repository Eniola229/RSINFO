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

    $sql = "DELETE FROM accountingtable WHERE course_id = $course_id";

    if ($connection->query($sql) === TRUE) {
        echo "This TimeTable has been deleted successfully.";
        ?>
        <a href="../lecturehome.php">
            <button>Go Back</button>
        </a>
        <?php
    } else {
        echo "Error deleting Activities: " . $connection->error;
    }
}

$connection->close();
?>
