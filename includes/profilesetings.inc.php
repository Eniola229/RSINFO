<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$students_id = $_SESSION['students_id'];
	$name = $_SESSION['name'];
	$matric = htmlspecialchars($_POST['matric']);
	$email = htmlspecialchars($_POST['email']);
	$course = htmlspecialchars($_POST['course']);
	$lvl = htmlspecialchars($_POST['lvl']);

	include "../classes/dbh.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";

   $profileInfo = new ProfileInfoContr($students_id, $name);

   $profileInfo->updateProfileInfo($name, $matric, $email, $course, $lvl);

   header("location: ../studentdash.php?error=none");
}