<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSINFO STUDENT LOGIN | RECTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
       display: flex;
        align-items: center;
        justify-content: center;;
        margin: 0;
       background-image: url('images/bg.jpg');
       background-size: cover;
       background-repeat: no-repeat;
       height: 100vh;
        filter: blur(0.5px);
    z-index: -1;
    }
    .body__login {
        margin: auto; 
        padding: 0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        display: flex;
        height: 60vh;
        width: 60%;
        background-color: rgba(0, 0, 0, 0.7);
        margin-top: 7rem;
        border-radius: 5px;
       
    }

    #image-side {
    position: relative;
    float: left;
    width: 50%;
    height: 100%;
    border-radius: 5px;
    overflow: hidden; /* Ensure the overlay doesn't overflow */
}

#image-side::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('images/backimg.jpg') center/cover no-repeat;
    filter: blur(0.5px);
    z-index: -1;
}


    #form-side {
        float: right;
        width: 50%;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-container {
        max-width: 400px;
    }

    .form-label {
        color: white;
        font-weight: bold;
    }
   .text-head {
   text-align: center;
   margin-top: 7rem;

}
.form-control {
    background: transparent; 
    color: white;
}
.text-head h3 {
    color: white;
    font-size: 30px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.text-head h4 {
    color: #ff9900;
    font-size: 30px;
    font-style: italic;
}

@media screen and (max-width: 900px) {
    #image-side {
   display: none;
}
        .body__login {
        margin: auto; 
        padding: 0;
        background-size: auto;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        height: auto;
        width: 40%;
        background-color: rgba(0, 0, 0, 0.7);
        margin-top: 7rem;
        border-radius: 5px;
    }

    #form-side {
        float: right;
        width: auto;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

}

@media screen and (max-width: 900px) {
    #image-side {
   display: none;
}
        .body__login {
        margin: auto; 
        padding: 0;
        background-size: auto;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        height: auto;
        width: 80%;
        background-color: rgba(0, 0, 0, 0.7);
        margin-top: 7rem;
        border-radius: 5px;
    }

    #form-side {
        float: right;
        width: auto;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

}

</style>

<body>
  <div class="body__login">
    <div id="image-side">
        <div class="text-head">
             <h3 >Student Login</h3>
             <h4>RECTEM STUDENTS INFO</h4>
     </div>
    </div>

    <div id="form-side">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    

                    <?php
                    if (isset($_GET['error'])) {
                        $errorCode = $_GET['error'];
                        switch ($errorCode) {
                            case 'stmtfailed':
                                echo '<div class="alert alert-danger" role="alert">An unexpected error occurred.</div>';
                                break;
                            case 'wrongpassword':
                                echo '<div class="alert alert-danger" role="alert">Wrong Password</div>';
                                break;
                            case 'usernotfound':
                                echo '<div class="alert alert-danger" role="alert">Student not found.</div>';
                                break;
                            default:
                                echo '<div class="alert alert-danger" role="alert">Login Here.</div>';
                                break;
                        }
                    } else {
                        echo '<p class=" text-center text-success">Kindly fill in all the details correctly.</p>';
                    }
                    ?>

                    <form method="post" action="includes/slogin.inc.php" class="form-container">
                        <div class="form-outline">
                            <label class="form-label" for="matric">Matric No:</label>
                            <input class="form-control" type="text" name="matric" placeholder="Matric No" id="matric"
                                required>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="pwd">Password:</label>
                            <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block w-100">Login</button>

                        <p class="mt-3 text-center">Don't have an account? <a href="studentssignup.php"
                                class="text-danger">Create Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
 