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
    $activities_type = $_POST["activities_type"];
    $activities_description = $_POST["activities_description"];
    $activities_date = $_POST["activities_date"]; 
    $sender = $_POST["sender"]; 

    $sql = "UPDATE activities 
            SET activities_type='$activities_type', activities_description='$activities_description', activities_date='$activities_date', sender='$sender'
            WHERE activities_id=$activities_id";

    if ($connection->query($sql) === TRUE) {
        header("Location: ../createactivities.php"); // Redirect back to the lecturehome page after successful update
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

$connection->close();
?>
