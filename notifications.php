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
            $sql = "SELECT * FROM activities ORDER BY created_at DESC";
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

	<title>NOTIFICATION | RSINFO</title>
</head>
<body>
	<a href="studenthome.php">
		<button>Back to home</button>
	</a>
	
		<h2>NOTIFICATIONS</h2>
		 <table>
          <thead>
            <tr>
                <th>Activities  Name</th>
                <th> Activities Description</th>
                <th> Activities Date</th>
            </tr>
          </thead>
           <tbody>
          <?php

           while ($row = $result->fetch_assoc()) {
    echo "
        <tr>
            <td>{$row['activities_type']}</td>
            <td>{$row['activities_description']}</td>
            <td>{$row['activities_date']}</td>
            <td>{$row['sender']}</td>
           
            <td>
            	<button>Add to Bookmark</button>
  				<button>Delete Notification</button>
            </td>
        </tr>";
}

          ?>
            </tbody>
        </table>

	</div>

</body>
</html>