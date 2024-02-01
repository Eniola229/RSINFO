<?php
class ProfileInfo extends Dbh {

    protected function getProfileInfo($students_id) {
        $stmt = $this->connect()->prepare('SELECT * FROM students WHERE students_id = ?;');

        if (!$stmt->execute(array($students_id))) {
            $stmt = null;
            header("location: ../studentsdash.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location:  ../studentsdash.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

    protected function setNewProfileInfo($name, $matric, $course, $email, $lvl) {
        $stmt = $this->connect()->prepare('UPDATE students SET name = ?, matric = ?, course = ?, email = ?, nummber = ?,lvl = ?,  WHERE matric = ?;');

        if (!$stmt->execute(array($name, $matric, $course, $email, $lvl))) {
            $stmt = null;
            header("location: ../studentsdash.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfileInfo($name, $matric, $course, $email, $lvl) {
        $stmt = $this->connect()->prepare('INSERT INTO students (name, matric, course, email, lvl, students_id) VALUES (?, ?, ?, ?);');

        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
