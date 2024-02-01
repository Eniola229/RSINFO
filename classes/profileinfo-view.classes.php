<?php

class ProfileInfoView extends ProfileInfo {
	
	public function fetchName($students_id) {
        $profileInfo = $this->getProfileInfo($students_id);

        echo $profileInfo[0]["name"];
}

	public function fetchMatric($students_id) {
        $profileInfo = $this->getProfileInfo($students_id);

        echo $profileInfo[0]["matric"];
}
		public function fetchCourse($students_id) {
        $profileInfo = $this->getProfileInfo($students_id);

        echo $profileInfo[0]["course"];
}
        public function fetchEmail($students_id) {
                $profileInfo = $this->getProfileInfo($email);

                echo $profileInfo[0]["course"];
        }

        public function fetchNumber($students_id) {
                $profileInfo = $this->getProfileInfo($number);

                echo $profileInfo[0]["course"];
        }

        public function fetchLevel($students_id) {
                $profileInfo = $this->getProfileInfo($students_id);

        echo $profileInfo[0]["lvl"];
}

}