

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity | RSINFO</title>
</head>
<body>

    <div class="container my-5">
        <h2>Edit Activities</h2>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rsinfo";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

            session_start();
            include "classes/dbh.classes.php";
            include "classes/login.classes.php";
            include "classes/login-contr.php";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["activities_id"])) {
            $activities_id = $_GET["activities_id"];
            $sql = "SELECT * FROM activities WHERE activities_id = $activities_id";
            $result = $connection->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>

        <form action="includes/update_activities.inc.php" method="post">
                        
             <input type="hidden" name="activities_id" value="<?php echo $row['activities_id']; ?>">

                 
            
                <label for="">Activities Name</label>
                <input type="text" class="form-control" name="activities_type" value="<?php echo $row['activities_type']; ?>" required>
                    
                <textarea name="activities_description"><?php echo $row['activities_description'] ?></textarea>

          
                <label for="" class="form-label">Activities Date</label>
                <input type="date" class="form-control" name="activities_date" value="<?php echo $row['activities_date']; ?>" required>

                <input type="hidden" name="sender" value="<?php echo $_SESSION['title']. " " .$_SESSION['name']; ?>">

            <button type="submit">Update</button>
            <a href="createactivities.php" class="btn btn-outline-danger">Cancel</a>
        </form>

        <?php
            } else {
                echo "Not found.";
            }
        }

        $connection->close();
        ?>
    </div>
    

</body>
</html>
