<?php 
class ProfileInfoContr extends ProfileInfo {
    
    private $students_id;
    private $name;

    public function __construct($students_id, $name) {
        $this->students_id = $students_id;
        $this->name = $name;
    }

    public function updateProfileInfo($name, $matric, $course, $email, $lvl) {
        // error handlers
        if ($this->emptyInputCheck($name, $matric, $course, $email, $lvl)) {
            header("location: profilesettings.php?error=emptyinput");
            exit();
        }

        $this->setNewProfileInfo($name, $matric, $course, $email, $lvl, $this->students_id);
    }

    private function emptyInputCheck($name, $matric, $course, $email, $lvl) {
        $result;
        if (empty($name) || empty($matric) || empty($course) || empty($email) || empty($lvl)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    } 
}
