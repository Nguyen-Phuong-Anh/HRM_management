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

        public function showTeaching() {
            require_once('./Views/teaching/teaching.php');
        }

        public function showCreateTch() {
            require_once('./Views/teaching/createTeaching.php');
        }
    }
?>