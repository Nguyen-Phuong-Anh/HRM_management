<?php
    class ScheduleController {
        public function handleGetKhoaList() {
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $khoa = $model->getKhoa();
            $hocphan = $model->getHocPhan();
            return [$khoa, $hocphan];
        }

        public function handleGetSchedule() {
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $result = $model->getSchedule();
            return $result;
        }

        public function handleGetSearchHP() {
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $result = $model->getSearchHP();
            return $result;
        }

        public function handleSearchSchedule() {
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $result = $model->searchSchedule();
            return $result;
        }

        public function handleCreateSchedule() {
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $model->createSchedule();
        }

        public function handleGetSearchSchedule() {
            $maGD = $_GET['paramMGD'];
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $schedule = $model->getSearchSchedule($maGD);
            return [$schedule];
        }

        public function handleChangeSchedule() {
            $maGD = $_GET['paramMGD'];
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $model->changeSchedule($maGD);
        }

        public function handleDeleteSchedule() {
            $maGD = $_GET['paramMGD'];
            require_once('./Models/ScheduleModel.php');
            $model = new ScheduleModel();
            $model->deleteSchedule($maGD);
        }
    }
?>