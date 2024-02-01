<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//grabbing the data
	$matric = htmlspecialchars($_POST['matric']);
	$pwd = htmlspecialchars($_POST['pwd']);
	//instantaite signupContr class
	include "../classes/dbh.classes.php";
	include "../classes/login.classes.php";
	include "../classes/login-contr.classes.php";

	$login = new LoginContr($matric, $pwd);

	//Running error handlers and user signup
	$login->loginUser();

	//going to back to front page

	header("location: ../studenthome.php?error=none");

}