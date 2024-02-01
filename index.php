<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RECTEM STUDENTS INFO RSINFO</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('images/bg.jpg'); 
            background-size: cover;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            color: white; 
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            width: 40%;
            height: 70vh;
        }

        h1, h3 {
            color: white;
        }
        h1 {
        	font-size: 30px;
        }
		.btn-group a {
    		margin-right: 10px; /* Adjust the margin as needed */
		}

		.btn-group .btn {
		    height: 50vh;
            width: 200px; 
            color: white;
            font-weight: bold;
            font-size: 1.5rem;

		} 
		.btn-group .btn:hover{
			background-color: #0000CD;
			color: white;
		}
		
    </style>
</head>
<body class="text-center">
   <div class="container  text-center">
  <div class="row align-items-start">
    <div class="col">
     <h1> RECTEM STUDENTS INFO </h1>
    </div>
  </div>
  <div class="btn-group" role="group" aria-label="Basic outlined example">
  	  <a href="studentslogin.php">
	  <button type="button" class="btn btn-outline-primary">Students Login</button>
	</a>
	<a href="lecturers/lecturerlogin.php">
	  <button type="button" class="btn btn-outline-primary">Staff Login</button>
	</a>
</div>
</div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
