<?php 

 include "classes/dbh.classes.php";
 include "classes/profileinfo.classes.php";
 include "classes/login.classes.php";
 include "classes/login-contr.classes.php";
 include "classes/profileinfo-view.classes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Profile || RSINFO</title>
</head>
<body>
	<a href="studentdash.php">
		<button>back</button>
	</a>
<h1>Update your pfofile</h1>
	<form action="includes/profilesetings.inc.php" method="post">
		  <label for="fullName">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php $profileInfo->fetchName($_SESSION["students_id"]); ?>" required>

            <label for="matricNo">Matric No:</label>
            <input type="text" id="matric" name="matric" required>

            <label for="course">Course:</label>
            <select  name="course">
            	<option>Course</option>
            	<option value="Accountancy">Accountancy</option>
            	<option value="Architectural Technology">Architectural Technology</option>
            	<option value="Business Administration and Management">Business Administration and Management</option>
            	<option value="Computer Science">Computer Science</option>
            	<option value="Computer Engineering">Computer Engineering</option>
            	<option value="Civil Engineering Technology">Civil Engineering Technology</option>
            	<option value="Computer Engineering">Computer Engineering</option>
            	<option value="Electrical Engineering">Electrical Engineering</option>
            	<option value="Science Laboratory Technology">Science Laboratory Technology</option>
            	<option value="Quantity Surveying">Quantity Surveying</option>
            	<option value="Business Administration and Management">Business Administration and Management</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
 
            <label for="phone number">Phone Number:</label>
            <input type="text" id="number" name="number" required>

            <label for="level">Level:</label>
             <select name="lvl">
            	<option value="ND1">ND1</option>
            	<option value="ND2">ND2</option>
            	<option value="HND1">HND1</option>
            	<option value="HND2">HND2</option>
            </select>

            <button type="submit">Updates</button>
	</form>

</body>
</html>