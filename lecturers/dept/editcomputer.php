

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity | RSINFO</title>
</head>
<body>

    <div class="container my-5">
        <h2>Edit TimeTable</h2>

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
            include "../classes/dbh.classes.php";
            include "../classes/login.classes.php";
            include "../classes/login-contr.php";

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["timetable_id"])) {
            $timetable_id = $_GET["timetable_id"];
            $sql = "SELECT * FROM timetable WHERE timetable_id = $timetable_id";
            $result = $connection->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>

        <form action="../includes/editcomputer.inc.php" method="post">
                        
             <input type="hidden" name="timetable_id" value="<?php echo $row['timetable_id']; ?>">

                 
                  <input type="hidden" name="timetable_id" value="<?php echo $row['timetable_id']; ?>">
                <label for="">Course Name</label>
                <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name']; ?>" required>
                
                <label for="">Course Code</label>
                <input type="text" class="form-control" name="course_code" value="<?php echo $row['course_code']; ?>" required>
                    
            <label for="">Department</label>
                <input type="text" class="form-control" name="dept_name" value="<?php echo $row['dept_name']; ?>" required>
               
               <label for="">Level</label>
                <input type="text" class="form-control" name="level_r" value="<?php echo $row['level_r']; ?>" required>
                
                <label for="">Lecturer Name</label>
                <input type="text" class="form-control" name="teacher_name" value="<?php echo $row['teacher_name']; ?>" required>

                <label for="">Day</label>
                <input type="text" class="form-control" name="day_of_week" value="<?php echo $row['day_of_week']; ?>" required>

                <label for="">Lecturer Name</label>
                <input type="time" class="form-control" name="time_start" value="<?php echo $row['time_start']; ?>" required>

                <label for="">Lecturer Name</label>
                <input type="time" class="form-control" name="time_end" value="<?php echo $row['time_end']; ?>" required>
                     
                
            <button type="submit">Update</button>
          
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
