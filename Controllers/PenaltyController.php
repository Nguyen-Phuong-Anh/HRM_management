<?php
    class PenaltyController {
        public function handleSearchPenalty() {
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $khoa = $_POST['khoa'];
            $phongBan = $_POST['phongBan'];
            $result = $model->getSearchPenalty($khoa, $phongBan);
            return $result;
        }

        public function handleGetPenalty() {
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $bonus = $model->getPenalty();
            return [$bonus];
        }

        public function handleCreatePenalty() {
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $model->createPenalty();
        }  
        
        public function handleGetSearchPenalty() {
            $maKL = $_GET['paramMKL'];
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $penalty = $model->searchPenalty($maKL);
            return [$penalty];
        }

        public function handleChangePenalty() {
            $maKL = $_GET['paramMKL'];
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $model->changePenalty($maKL);
        }

        public function handleDeletePenalty() {
            $maKL = $_GET['paramMKL'];
            require_once('./Models/PenaltyModel.php');
            $model = new PenaltyModel();
            $model->deletePenalty($maKL);
        }
    }
?>