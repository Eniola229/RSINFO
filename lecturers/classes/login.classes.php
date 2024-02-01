<?php 

	class Login extends Dbh {

		
		protected function getUser($email, $pwd) {
			$stmt = $this->connect()->prepare('SELECT pwd FROM lecturer WHERE email = ? OR name = ?;');


			if (!$stmt->execute(array($email, $email))) {
	        $stmt = null;
	        header("location: ../lecturerlogin.php?error=stmtfailed");
	        exit();
    }
			if ($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../lecturerlogin.php?error=usernotfound");
				exit();
			}

			$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

			if ($checkPwd == false) {
				$stmt = null;
				header("location: ../lecturerlogin.php?error=wrongpassword");
				exit();
			}
			elseif ($checkPwd == true) {
				$stmt = $this->connect()->prepare('SELECT * FROM lecturer WHERE email = ? OR email = ? AND pwd = ?;');

			if (!$stmt->execute(array($email, $email, $pwd))) {
			    $stmt = null;
			    header("location: ../lecturerlogin.php?error=stmtfailed");
			    exit();
			}

			if ($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../lecturerlogin.php?error=usernotfound");
				exit();
			}

			$lecturer = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			$_SESSION['lecturer_id'] = $lecturer[0]["lecturer_id"];
			$_SESSION['name'] = $lecturer[0]["name"];
			$_SESSION['title'] = $lecturer[0]["title"];
			$_SESSION['courses'] = $lecturer[0]["courses"];
			$_SESSION['dept'] = $lecturer[0]["dept"];
			$_SESSION['email'] = $lecturer[0]["email"];
			$_SESSION['createdat'] = $lecturer[0]["created_at"];


			$stmt = null;

			}
			$stmt = null;
		}

	}
