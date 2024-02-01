<?php 
	class SignupContr extends Signup {

		private $name;
		private $tile;
		private $courses;
		private $dept;
		private $email;
		private $pwd;
		private $pwdRepeat;
		

		public function __construct($name, $title, $courses, $dept, $email, $pwd, $pwdRepeat) {
		    $this->name = $name;
		    $this->title = $title;
		    $this->courses = $courses;
		    $this->dept = $dept;
		    $this->email = $email;
		    $this->pwd = $pwd;
		    $this->pwdRepeat = $pwdRepeat;
} 


		public function signupUser()
		{
			if ($this->emptyInput() == false) {
				header('location: ../lecturersignup.php?error=emptyinput');
				exit();
			}
			// if ($this->invalidUid() == false) {
			// 	echo "Invalid username";
			// 	header('location: ../studentsignup.php?error=username');
			// 	exit();
			// }
				if ($this->invalidEmail() == false) {
				header('location: ../lecturersignup.php?error=invalidEmail');
				exit();
			}
				if ($this->pwdMatch() == false) {
				header('location: ../lecturersignup.php?error=passwordnotmatch');
				exit();
			}
				if ($this->uidTakenCheck() == false) {
				header('location: ../lecturersignup.php?error=useroremailtaken');
				exit();
			}

			$this->setUser($this->name, $this->title, $this->courses, $this->dept, $this->email, $this->pwd);
		}

		private function emptyInput() {

			$result;
			if (empty($this->name) || empty($this->title) || empty($this->courses) || empty($this->dept) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat)) {

    			$result = false;
		}
		 else {
				$result = true;
			}
			return $result;
		}

		// private function invalidUid() {
		// 	$result;

		// 	if(!preg_match("/^[a-zA-Z0-9]*$/", $this->fullname))
		// 	{
		// 		$result = false;
		// 	} else 
		// 	{
		// 		$result = true;
		// 	} 
		// 	return $result;
		// }

		private function invalidEmail() 
		{
			$result;
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
			{
				$result = false;
			} else
			{
				$result = true;
			}
			return $result;
		}

		private function pwdMatch()
		{
			$result;
			if ($this->pwd !== $this->pwdRepeat)
			{
				$result = false;
			} else
			{
				$result = true;
			}
			return $result;
		}

			private function uidTakenCheck()
		{
			$result;
			if (!$this->checkUser($this->name, $this->email))
			{
				$result = false;
			} else
			{
				$result = true;
			}
			return $result;
		}

		public function fetchuserId($name) {
			$userId = $this->getUserId($name);
			return $userId[0]["lecturer_id"];
		}

	}