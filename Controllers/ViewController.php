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

        public function showBonus() {
            require_once('./Views/bonus/bonus.php');
        }

        public function showCreateBonus() {
            require_once('./Views/bonus/create_bonus.php');
        }

        public function showChangeBonus() {
            require_once('./Views/bonus/change_bonus.php');
        }

        public function showPenalty() {
            require_once('./Views/penalty/penalty.php');
        }

        public function showCreatePenalty() {
            require_once('./Views/penalty/create_penalty.php');
        }    
        
        public function showChangePenalty() {
            require_once('./Views/penalty/change_penalty.php');
        }

        public function showSchedule() {
            require_once('./Views/schedule/schedule.php');
        }

        public function showGetSchedule() {
            require_once('./Views/schedule/getSchedule.php');
        }

        public function showCreateSchedule() {
            require_once('./Views/schedule/create_schedule.php');
        }

        public function showChangeSchedule() {
            require_once('./Views/schedule/change_schedule.php');
        }

        public function showContract() {
            require_once('./Views/contract/contract.php');
        }
    }
?>