<?php
include "classes/dbh.classes.php";


$assignmentId = $_GET['id'];

$pdo = new PDO("mysql:host=localhost;dbname=rsinfo", "root", "");

// Fetch the assignment data by ID
$stmt = $pdo->prepare("SELECT * FROM assignments WHERE id = ?");
$stmt->execute([$assignmentId]);
$assignment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$assignment) {
    die("Assignment not found");
}

// Set the appropriate headers for file download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($assignment['file_path']) . '"');
header('Content-Length: ' . filesize($assignment['file_path']));

// Output the file content
readfile($assignment['file_path']);
?>
