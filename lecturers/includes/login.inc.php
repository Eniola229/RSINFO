<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//grabbing the data
	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);
	//instantaite signupContr class
	include "../classes/dbh.classes.php";
	include "../classes/login.classes.php";
	include "../classes/login-contr.php";

	$login = new LoginContr($email, $pwd);

	//Running error handlers and user signup
	$login->loginUser();

	//going to back to front page

	header("location: ../lecturehome.php?error=none");

}