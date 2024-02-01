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
	<title>DSA | RSINFO</title>
</head>
<body>
	<div>
		

	<div class="container my-5">
		<h1>Create General Activites</h1>
		<form action="includes/activities.inc.php" method="post">
			<label>Activities Name</label>
			<input type="text" name="activities_type" placeholder="Activities Name" required>
			
			<label>Activities Description</label>
			<textarea name="activities_description" required></textarea>
			
			<label>Activities Data</label>
			<input type="date" name="activities_date" required>
			
			<input type="hidden" name="sender" value="From <?php echo $_SESSION['dept']. " " .$_SESSION['title']. " ".$_SESSION['name']; ?>">

			<button type="submit">Create</button>
			<br>
			<a href="lecturehome.php">Cancel</a>
		</form>

		 <table class="table">
          <thead>
            <tr>
             
                <th>Activities  Name</th>
                <th> Activities Description</th>
                <th> Activities Date</th>
                <th> Sender </th>

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
                <a class='btn btn-primary btn-um' href='edit.php?activities_id={$row['activities_id']}'>Edit</a>
            </td>
            <td>
                <form action='includes/delete_activities.inc.php' method='post'>
                    <input type='hidden' name='activities_id' value='{$row['activities_id']}'>
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