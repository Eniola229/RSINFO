<?php
session_start();
include "classes/dbh.classes.php";
include "classes/login.classes.php";
include "classes/login-contr.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | RSINFO</title>
</head>
<body>
<a href="lecturehome.php">
	<button>Home</button>
</a>

<a href="updatedash.php">
	<button>Profile Settings</button>
</a>

<h1>Dashboard</h1>

<h3>Name: <?php echo $_SESSION['title']. " " .$_SESSION['name']; ?></h3>
<h3>Department: <?php echo $_SESSION['dept']; ?></h3>
<h3>Course: <?php echo $_SESSION['courses']; ?></h3>
<h3>email: <?php echo $_SESSION['email']; ?></h3>
<h3>Joined: <?php echo $_SESSION['createdat']; ?></h3>


</body>
</html>
