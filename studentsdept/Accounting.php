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

	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accounting | RSINFO</title>
</head>
<body>
	<div>
	<?php
switch ($_SESSION['lvl']) {
    case "ND1":
    case "ND2":
    case "HND1":
    case "HND2":
        $sql = "SELECT * FROM accountingtable WHERE level_r = '{$_SESSION['lvl']}'";
        $result = $connection->query($sql);

        if (!$result) {
            die("Invalid Query: " . $connection->error);
        }

        echo '
        <table class="table">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Department Name</th>
                    <th>Level</th>
                    <th>Lecturer Name</th>
                    <th>Days</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                </tr>
            </thead>
            <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>' . $row['course_name'] . '</td>
                    <td>' . $row['course_code'] . '</td>
                    <td>' . $row['dept_name'] . '</td>
                    <td>' . $row['level_r'] . '</td>
                    <td>' . $row['teacher_name'] . '</td>
                    <td>' . $row['day_of_week'] . '</td>
                    <td>' . $row['time_start'] . '</td>
                    <td>' . $row['time_end'] . '</td>
                   
                   
                </tr>';
        }

        echo '
            </tbody>
        </table>';
        break;
    default:
        echo "<h1>Could not find your level or Timetable. Kindly Inform Us</h1>";
        break;
}
?>

	</div>

</body>
</html>