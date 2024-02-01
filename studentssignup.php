<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RECTEM STUDENTS INFO RSINFO</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="includes/studentsignup.inc.php" method="post">

            <?php
            if (isset($_GET['error'])) {
                $errorCode = $_GET['error'];
                switch ($errorCode) {
                    case 'emptyinput':
                        echo '<div class="alert alert-danger" role="alert">Empty input. Please fill in all fields.</div>';
                        break;
                    case 'invalidEmail':
                        echo '<div class="alert alert-danger" role="alert">Invalid email format. Please enter a valid email address.</div>';
                        break;
                    case 'passwordnotmatch':
                        echo '<div class="alert alert-danger" role="alert">Passwords do not match. Please re-enter your password.</div>';
                        break;
                    case 'useroremailtaken':
                        echo '<div class="alert alert-danger" role="alert">Username or matric number is already taken. Please choose a different one.</div>';
                        break;
                    default:
                        echo '<div class="alert alert-danger" role="alert">An unexpected error occurred.</div>';
                        break;
                }
            } else {
                echo '<p>Kindly Fill all the details correctly.</p>';
            }
            ?>

            <h2 class="mb-4">Students</h2>
            <h3>Create Account</h3>
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="matricNo">Matric No / Application No:</label>
                <input type="text" class="form-control" id="matric" name="matric" required>
            </div>

            <div class="form-group">
                <label for="course">Course:</label>
                <select class="form-control" name="course">
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
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" class="form-control" id="number" name="number" required>
            </div>

            <div class="form-group">
                <label for="level">Level:</label>
                <select class="form-control" name="level">
                    <option value="ND1">ND1</option>
                    <option value="ND2">ND2</option>
                    <option value="HND1">HND1</option>
                    <option value="HND2">HND2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password (We strongly advise that you use your surname as the password):</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword" name="pwdRepeat" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
