<?php
$uploadDirectory = "../uploads/"; 
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $submission_date = htmlspecialchars($_POST['date']);
    $lvl = htmlspecialchars($_POST['lvl']);
    $course = htmlspecialchars($_POST['course']);
    $dept = htmlspecialchars($_POST['dept']);
 

    // File upload handling
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Generate a unique name for the file
    $uniqueFileName = uniqid() . '_' . $file_name;

    // Move the uploaded file to the server
    $uploadPath = $uploadDirectory . $uniqueFileName;
    move_uploaded_file($file_tmp, $uploadPath);

    // Database connection using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=rsinfo", "root", "");

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO assignments (name, description, file_path, submission_date, lvl, course, dept) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Execute the statement
    $stmt->execute([$name, $description, $uploadPath, $submission_date, $lvl, $course, $dept]);

    // Redirect to a success page or perform other actions
    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>Upload Assignment</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" required>
        
        <label>Description</label>
        <textarea name="description" placeholder="Description" required></textarea>
        
        <label>Assignment File</label>
        <input type="file" name="file" required>
        
        <label>Date to be submitted</label>
        <input type="date" name="date" required>

        <label>Level</label>
        <select name="lvl" required>
        	<option>ND1</option>
        	<option>ND2</option>
        	<option>HND1</option>
        	<option>HND2</option>
        </select>
        <label>Course</label>
         <input type="text" name="course" placeholder="Course" required>
         <label>Label</label>
         <select name="dept" required>
         	<option>Computer Science</option>
        	<option>General</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
