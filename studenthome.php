<?php
session_start();
include "classes/dbh.classes.php";
include "classes/login.classes.php";
include "classes/login-contr.classes.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME | RSINFO</title>
</head>
<body>
	<header>
		<a href="includes/logout.inc.php">
			<button>Logout</button>
		</a>
	</header>
	<h1>Welcome</h1>
	<h3>Hello! <?php echo $_SESSION['name']; ?></h3>
	<h3>Matric No: <?php echo $_SESSION['matric']; ?></h3>
	<h3>Level: <?php echo $_SESSION['lvl']; ?></h3>
	<a href="studentdash.php">
		<button>Dashboard</button>
	</a>

	<p>Always check your notification. Thank you.</p>
	<a href="notifications.php">
		<button>Notifications</button>
	</a>

	<?php
	switch ($_SESSION['course']) {
	    case "Computer Science":
	        include "studentsdept/comstudents.php";
	        break;
	    case "Accountancy":
	         include "studentsdept/Accounting.php";
	        break;
	    case "Business Administration and Management":
	        echo "<h1>Business Administration and Management</h1>";
	        break;
	    case "Computer Engineering":
	        echo "<h1>Computer Engineering</h1>";
	        break;
	    case "Civil Engineering Technology":
	        echo "<h1>Civil Engineering Technology</h1>";
	        break;
	    case "Electrical Engineering":
	        echo "<h1>Electrical Engineering</h1>";
	        break;
	    case "Science Laboratory Technology":
	        echo "<h1>Science Laboratory Technology</h1>";
	        break;
	    case "Quantity Surveying":
	        echo "<h1>Quantity Surveying</h1>";
	        break;
	    default:
	        echo "<h1>Could not find your course. Kindly Inform Us</h1>";
	}
	?>



</body>
</html>