<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE ACCOUNT | RSINFO</title>
</head>
<body>

	<h2> Create Account</h2>
	<p>This page is strictly for HOD'S, DSA, and Lecturers</p>
	<form action="includes/lecsignup.inc.php" method="post">

       <?php if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];
        switch ($errorCode) {
            case 'emptyinput':
                echo '<p>Empty input. Please fill in all fields.</p>';
                break;
            case 'invalidEmail':
                echo '<p>Invalid email format. Please enter a valid email address.</p>';
                break;
            case 'passwordnotmatch':
                echo '<p>Passwords do not match. Please re-enter your password.</p>';
                break;
            case 'uidTakenCheck':
                echo '<p>Username or Email is already taken. Please choose a different one.</p>';
                break;
            default:
                echo '<p>An unexpected error occurred.</p>';
                break;
        }
	    } else {
	        echo '<p>Kindly Fill all the detail correctly.</p>';
	    }
	   ?>

		<label>Full Name*</label>
		<input type="text" name="name" placeholder="Full-Name" required />
		<label>*</label>
		 <select name="title" required>
            	<option value="Mr">Mr</option>
            	<option value="Mrs">Mrs</option>
            	<option value="Dr">Dr</option>
            	<option value="Prof">Prof</option>
          </select>
		 <label>Courses(Optional)</label>
          <input type="text" name="courses" placeholder="Courses" required />
          <label>Department*</label>
		 <select name="dept">
            	<option>Department</option>
            	<option value="Generals">General</option>
            	<option value="Accountancy">Accountancy</option>
            	<option value="Architectural Technology">Architectural Technology</option>
            	<option value="Business Administration and Management">Business Administration and Management</option>
            	<option value="Computer Science">Computer Science</option>
            	<option value="Computer Engineering">Computer Engineering</option>
            	<option value="Civil Engineering Technology">Civil Engineering Technology</option>
            	<option value="Computer Engineering">Computer Engineering</option>
            	<option value="DSA">Dean Of Students Affairs</option>
            	<option value="Electrical Engineering">Electrical Engineering</option>
            	<option value="Science Laboratory Technology">Science Laboratory Technology</option>
            	<option value="Quantity Surveying">Quantity Surveying</option>
            	<option value="Business Administration and Management">Business Administration and Management</option>
            	<option value="Others">Others</option>
	          </select>
	          <label>E-mail*</label>
	          <input type="email" name="email" placeholder="E-mail" required />

	          <label for="password">Password (We strongly advise that you use your sunname as the password)*:</label>
            <input type="password" id="pwd" name="pwd" required>

            <label for="confirmPassword">Confirm Password*:</label>
            <input type="password" id="confirmPassword" name="pwdRepeat" required>

          <button type="submit">Create Account</button>


	</form>

</body>
</html>