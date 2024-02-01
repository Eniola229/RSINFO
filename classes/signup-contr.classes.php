<?php 
	class SignupContr extends Signup {

		private $name;
		private $matric;
		private $course;
		private $email;
		private $number;
		private $level;
		private $pwd;
		private $pwdRepeat;
		

		public function __construct($name, $matric, $course, $email, $number, $level, $pwd, $pwdRepeat) {
		    $this->name = $name;
		    $this->matric = $matric;
		    $this->course = $course;
		    $this->email = $email;
		    $this->number = $number;
		    $this->level = $level;
		    $this->pwd = $pwd;
		    $this->pwdRepeat = $pwdRepeat;
}


		public function signupUser()
		{
			if ($this->emptyInput() == false) {
				header('location: ../studentssignup.php?error=emptyinput');
				exit();
			}
			// if ($this->invalidUid() == false) {
			// 	echo "Invalid username";
			// 	header('location: ../studentsignup.php?error=username');
			// 	exit();
			// }
				if ($this->invalidEmail() == false) {
				header('location: ../studentssignup.php?error=invalidEmail');
				exit();
			}
				if ($this->pwdMatch() == false) {
				header('location: ../studentssignup.php?error=passwordnotmatch');
				exit();
			}
				if ($this->uidTakenCheck() == false) {
				header('location: ../studentssignup.php?error=useroremailtaken');
				exit();
			}

			$this->setUser($this->name, $this->matric, $this->course, $this->email, $this->number, $this->level, $this->pwd);
		}

		private function emptyInput() {

			$result;
			if (empty($this->name) || empty($this->matric) || empty($this->course) || empty($this->email) || empty($this->number) || empty($this->level) || empty($this->pwd) || empty($this->pwdRepeat)) {

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
			if (!$this->checkUser($this->name, $this->matric))
			{
				$result = false;
			} else
			{
				$result = true;
			}
			return $result;
		}

		public function fetchuserId($name) {
			$userId = $this->getUserId($matric);
			return $userId[0]["students_id"];
		}

	}