<?php
    class ViewController {
        public function showHome() {
            require_once('./Views/home.php');
        }

        public function showProfile() {
            require_once('./Views/profile/profile.php');
        }

        public function showCreatePrf() {
            require_once('./Views/profile/createProfile.php');
        }

        public function showCreateEmployee() {
            require_once('./Views/profile/createEmployee.php');
        }

        public function showProfileInfo() {
            require_once('./Views/profile/profile_info.php');
        }

        public function showEmployeeInfo() {
            require_once('./Views/profile/employee_info.php');
        }
    }
?>