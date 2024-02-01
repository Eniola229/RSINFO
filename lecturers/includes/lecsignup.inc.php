<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// data from the inputs
		$name = htmlspecialchars($_POST['name']);
		$title = htmlspecialchars($_POST['title']);
		$courses = htmlspecialchars($_POST['courses']);
		$dept = htmlspecialchars($_POST['dept']);
		$email = htmlspecialchars($_POST['email']);
		$pwd = htmlspecialchars($_POST['pwd']);
		$pwdRepeat = htmlspecialchars($_POST['pwdRepeat']);


		//instantaite signupContr class
		include "../classes/dbh.classes.php";
		include "../classes/signup.classes.php";
		include "../classes/signup-contr.classes.php";

		$signup = new SignupContr($name, $title, $courses, $dept, $email, $pwd, $pwdRepeat);

	//Running error handlers and user signup
	$signup->signupUser();

	// $userId = $signup->fetchuserId($fullname);
	// //instantaite ProfileInfoContr class
	// include "../classes/profileinfo.classes.php";
	// include "../classes/profileinfo-contr.classes.php";
	// $profileInfo = new ProfileInfoContr($userId, $fullname);
	// $profileInfo->defaultProfileInfo();

	//going to back to front page
	header("location: ../lecturerlogin.php?error=none");


	}