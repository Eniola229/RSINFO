<?php
class Signup extends Dbh {

  protected function setUser($name, $title, $courses, $dept, $email, $pwd) {
    $stmt = $this->connect()->prepare("INSERT INTO lecturer (name, title, courses, dept, email, pwd) VALUES (?, ?, ?, ?, ?, ?);");

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Bind parameters
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $title);
    $stmt->bindParam(3, $courses);
    $stmt->bindParam(4, $dept);
    $stmt->bindParam(5, $email);
    $stmt->bindParam(6, $hashedPwd);

    // Execute the statement
    if (!$stmt->execute()) {
        $stmt = null;
        header("location: ../lecturersignup.php?error=stmtfailed");
        exit();
    }

    $stmt = null;
}

    protected function checkUser($name, $email) {
        $stmt = $this->connect()->prepare('SELECT name FROM lecturer WHERE name = ? OR email = ?');

        if (!$stmt->execute(array($name, $email))) {
            $stmt = null;
            header("location: ../lecturersignup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
