<?php 
	class LoginContr extends Login {

		private $matric;
		private $pwd;
		private $pwdRepeat;
		private $email;

		public function __construct($matric, $pwd) {

			$this->matric = $matric;
			$this->pwd = $pwd;
		}

		public function loginUser()
		{
			if ($this->emptyInput() == false) {
				//echo "Empty Input";
				header('location: ../studentslogin.php?error=emptyinput');
				exit();
			}
			
			$this->getUser($this->matric, $this->pwd);
		}

		private function emptyInput() {

			$result;
			if(empty($this->matric) || empty($this->pwd)) {
				$result = false;

			} else {
				$result = true;
			}
			return $result;
		}

		
		
	}