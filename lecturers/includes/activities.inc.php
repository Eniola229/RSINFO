<?php
$servername = "localhost";
$username = "root";
// Database connection details
$password = "";
$database = "rsinfo";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $activities_type = htmlspecialchars($_POST["activities_type"]);
    $activities_description = htmlspecialchars($_POST["activities_description"]);
    $activities_date = htmlspecialchars($_POST["activities_date"]);
    $sender = htmlspecialchars($_POST["sender"]);
    
    //  insert data into the database
    $sql = "INSERT INTO activities (activities_type, activities_description, activities_date, sender) 
            VALUES ('$activities_type','$activities_description', '$activities_date', '$sender')";

    if ($connection->query($sql) === TRUE) {
        echo "Activity Uploaded successfully. All RECTEM Students will resive this on there notification dashboard.";
        ?>
        <a href="../createactivities.php">
        <button>Go Back</button>
    </a>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>
