<?php

$userLevel = $_SESSION['lvl'];

$pdo = new PDO("mysql:host=localhost;dbname=rsinfo", "root", "");

// Fetch assignments based on the user's level
switch ($userLevel) {
    case "ND1":
    case "ND2":
    case "HND1":
    case "HND2":
        $stmt = $pdo->prepare("SELECT * FROM assignments WHERE lvl = ?");
        $stmt->execute([$userLevel]);
        $assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
    default:
        $assignments = []; 
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment List</title>
</head>
<body>
    <h2>Assignment List - Level <?= $userLevel ?></h2>
    <?php if (!empty($assignments)): ?>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Submission Date</th>
                <th>Level</th>
                <th>Course</th>
                <th>Department</th>
                <th>Image</th>
                <th>Download</th>
            </tr>
            <?php foreach ($assignments as $assignment): ?>
                <tr>
                    <td><?= htmlspecialchars($assignment['name']); ?></td>
                    <td><?= htmlspecialchars($assignment['description']); ?></td>
                    <td><?= htmlspecialchars($assignment['submission_date']); ?></td>
                    <td><?= htmlspecialchars($assignment['lvl']); ?></td>
                    <td><?= htmlspecialchars($assignment['course']); ?></td>
                    <td><?= htmlspecialchars($assignment['dept']); ?></td>
                    <td>
                        <?php
                        // Check if the file is an image
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                        $fileExtension = pathinfo($assignment['file_path'], PATHINFO_EXTENSION);
                        
                        if (in_array(strtolower($fileExtension), $imageExtensions)) {
                            echo '<img src="' . $assignment['file_path'] . '" alt="Assignment Image" style="max-width: 100px; max-height: 100px;">';
                        } else {
                            echo 'Not an image';
                        }
                        ?>
                    </td>
                    <td><a href="ComDownAss.php?id=<?= $assignment['assignments_id']; ?>">Download</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No assignments found for the selected level.</p>
    <?php endif; ?>
</body>
</html>
