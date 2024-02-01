<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "rsinfo";

			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($connection->connect_error) {
			    die("Connection failed: " . $connection->connect_error);
			}
            $sql = "SELECT * FROM timetable";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid Query: " . $connection->error);
            }
    
			
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> RSINFO| Computer Science </title>
</head>
<body>
	<div>
		<div>
			<h1>Computer Science</h1>
			<a href="dept/ctcomputer.php">
				<button>
				Insert New Timetabe
			</button>
			</a>
			<div>
				<h2>Department TimeTable</h2>
			</div>
			<div>
				<h2>ND1</h2>
			</div>
			  <table class="table">
          <thead>
            <tr>
                <th> Course Name</th>
                <th> Course Code</th>
                <th> Department Name</th>
                <th> Level </th>
                <th> Lecturer Name</th>
                <th> Days </th>
                <th> Time Start</th>
                <th> The End</th>
            </tr>
          </thead>
           <tbody>
          <?php

           while ($row = $result->fetch_assoc()) {
    echo "
        <tr>
        	
            <td>{$row['course_name']}</td>
            <td>{$row['course_code']}</td>
            <td>{$row['dept_name']}</td>
            <td>{$row['level_r']}</td>
            <td>{$row['teacher_name']}</td>
            <td>{$row['day_of_week']}</td>
            <td>{$row['time_start']}</td>
            <td>{$row['time_end']}</td>
            <td>
                <a class='btn btn-primary btn-um' href='dept/editcomputer.php?timetable_id={$row['timetable_id']}'>Edit</a>
            </td>
            <td>
                <form action='includes/delete_com.inc.php' method='post'>
                    <input type='hidden' name='timetable_id' value='{$row['timetable_id']}'>
                    <button type='submit'>Delete</button>
                </form>
            </td>
        </tr>";
}

          ?>
            </tbody>
        </table>
		</div>
	</div>
</body>
</html>