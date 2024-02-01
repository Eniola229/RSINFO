<?php 

	class Login extends Dbh {

		
		protected function getUser($matric, $pwd) {
			$stmt = $this->connect()->prepare('SELECT pwd FROM students WHERE matric = ? OR email = ?;');


			if (!$stmt->execute(array($matric, $matric))) {
	        $stmt = null;
	        header("location: ../studentslogin.php?error=stmtfailed");
	        exit();
    }
			if ($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../studentslogin.php?error=usernotfound");
				exit();
			}

			$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

			if ($checkPwd == false) {
				$stmt = null;
				header("location: ../studentslogin.php?error=wrongpassword");
				exit();
			}
			elseif ($checkPwd == true) {
				$stmt = $this->connect()->prepare('SELECT * FROM students WHERE matric = ? OR email = ? AND pwd = ?;');

			if (!$stmt->execute(array($matric, $matric, $pwd))) {
			    $stmt = null;
			    header("location: ../studentslogin.php?error=stmtfailed");
			    exit();
			}

			if ($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../studentslogin.php?error=usernotfound");
				exit();
			}

			$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			$_SESSION['students_id'] = $students[0]["students_id"];
			$_SESSION['name'] = $students[0]["name"];
			$_SESSION['matric'] = $students[0]["matric"];
			$_SESSION['course'] = $students[0]["course"];
			$_SESSION['lvl'] = $students[0]["lvl"];
			$_SESSION['number'] = $students[0]["number"];
			$_SESSION['email'] = $students[0]["email"];
			$_SESSION['createdat'] = $students[0]["created_at"];


			$stmt = null;

			}
			$stmt = null;
		}

	}
