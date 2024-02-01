<?php
session_start();
include "classes/dbh.classes.php";
include "classes/login.classes.php";
include "classes/login-contr.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME | RSINFO</title>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['title']; ?> <?php echo $_SESSION['name']; ?></h1>

	<a href="lecturerdash.php">
		<button>Dashboard</button>
	</a>

	<a href="createactivities.php">
		<button>Create General Activites</button>
	</a> <br><br>
	<a href="includes/logout.inc.php">
	<button>Logout</button>
	</a>

	<div>
		
	<?php
    switch ($_SESSION['dept']) {
        case "Computer Science":
            include "dept/computerscience.php"; 
            break;
        case "Accountancy":
             include "dept/accounting.php"; 
            break;
        case "Business Administration and Management":
            echo "<h1>Business Administration and Management</h1>";
            break;
        case "Computer Engineering":
            echo "<h1>Computer Engineering</h1>";
            break;
        case "Civil Engineering Technology":
            echo "<h1>Civil Engineering </h1>";
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
        case "DSA":
            include "admin/dsa.php";
            break;
        default:
            echo "No Position Yet. Kindly Update your profile or Contact the support term";
    }
?>

	</div>
</body>
</html> 