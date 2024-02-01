<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN | RSINFO</title>
</head>
<body>

	<h2>HOD'S Login Page</h2>
	<p>This page is strictly for HOD'S, DSA, Lectures</p>
	<form action="includes/login.inc.php" method="post">

		 <?php if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];
        switch ($errorCode) {
            case 'stmtfailed':
                echo '<p>An Unexpected error occured</p>';
                break;
            case 'wrongpassword':
                echo '<p>Wrong Password</p>';
                break;
            case 'usernotfound':
                echo '<p>Account not found.</p>';
                break;
            default:
                echo '<p>Kindly Login</p>';
                break;
        }
	    } else {
	        echo '<p>Kindly Fill all the detail correctly.</p>';
	    }
	   ?>

		<label>E-mail</label>
		<input type="email" name="email" placeholder="E-mail">
		<label>Passsword</label>
		<input type="password" name="pwd" placeholder="Password">
		<button>Login</button>
		<p>Don't have an account? <a href="lecturersignup.php">
			Create An Account
		</a></p>
	</form>

</body>
</html>