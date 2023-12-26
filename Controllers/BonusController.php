<?php
    class BonusController {
        public function handleSearchBonus() {
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $khoa = $_POST['khoa'];
            $phongBan = $_POST['phongBan'];
            $result = $model->getSearchBonus($khoa, $phongBan);
            return $result;
        }

        public function handleGetBonus() {
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $bonus = $model->getBonus();
            return [$bonus];
        }

        public function handleCreateBonus() {
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $model->createBonus();
        }

        public function handleGetSearchBonus() {
            $maKT = $_GET['paramMKT'];
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $bonus = $model->searchBonus($maKT);
            // $penalty = $model->searchPenalty($maKT);
            return [$bonus];
        }

        public function handleChangeBonus() {
            $maKT = $_GET['paramMKT'];
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $model->changeBonus($maKT);
        }

        public function handleDeleteBonus() {
            $maKT = $_GET['paramMKT'];
            require_once('./Models/BonusModel.php');
            $model = new BonusModel();
            $model->deleteBonus($maKT);
        }
    }
?>