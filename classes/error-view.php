<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
</head>
<body>

<div>
    <h2>Error Occurred</h2>

    <?php if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];
        switch ($errorCode) {
            case 'emptyinput':
                echo '<p>Empty input. Please fill in all fields.</p>';
                break;
            case 'email':
                echo '<p>Invalid email format. Please enter a valid email address.</p>';
                break;
            case 'passwordnotmatch':
                echo '<p>Passwords do not match. Please re-enter your password.</p>';
                break;
            case 'useroremailtaken':
                echo '<p>Username or matric number is already taken. Please choose a different one.</p>';
                break;
            // Add more cases for other error codes if needed
            default:
                echo '<p>An unexpected error occurred.</p>';
                break;
        }
    } else {
        echo '<p>An error occurred, but no specific error code was provided.</p>';
    }
    ?>

    <p><a href="javascript:history.back()">Go back</a></p>
</div>

</body>
</html>
