<?php
class Signup extends Dbh {

    protected function setUser($name, $matric, $course, $email, $number, $level, $pwd) {
        $stmt = $this->connect()->prepare("INSERT INTO students (name, matric, course, email, number, lvl, pwd) VALUES (?, ?, ?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Bind parameters
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $matric);
        $stmt->bindParam(3, $course);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $number);
        $stmt->bindParam(6, $level);
        $stmt->bindParam(7, $hashedPwd);

        // Execute the statement
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../studentsignup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($matric, $name) {
        $stmt = $this->connect()->prepare('SELECT matric FROM students WHERE matric = ? OR name = ?');

        if (!$stmt->execute(array($matric, $name))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
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
