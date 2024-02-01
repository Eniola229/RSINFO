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
    $activities_id = $_POST["activities_id"];

    $sql = "DELETE FROM activities WHERE activities_id = $activities_id";

    if ($connection->query($sql) === TRUE) {
        echo "This Activity has been deleted successfully. This Activity has been deleted from all RECTEM Students notification dashboard";
        ?>
        <a href="../createactivities.php">
            <button>Go Back</button>
        </a>
        <?php
    } else {
        echo "Error deleting Activities: " . $connection->error;
    }
}

$connection->close();
?>
