<?php
    class ProfileController {
        public function handleGetProfileFilter() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel();
            $khoa = $model->getKhoa();
            $phongban = $model->getPhongBan();
            return [$khoa, $phongban];
        }

        public function handleSearchEmployee() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel();
            $tenNV = $_POST['tenNV'];
            $khoa = $_POST['khoa'];
            $phongBan = $_POST['phongBan'];
            $result = $model->getSearchNV($tenNV, $khoa, $phongBan);
            return $result;
        }

        public function handleGetNV() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel();
            $nhanvien = $model->getNhanVien();
            return [$nhanvien];
        }

        public function handleCreateProfile() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $model->createProfile();  
        }

        public function handleGetProfile() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $result = $model->getProfile();
            return $result;
        }

        public function handleChangeProfile() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $model->saveChangeProfile();
        }

        // employee
        public function handleGetEmployee() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $result = $model->getEmployee();
            $khoa = $model->getKhoa();
            $phongban = $model->getPhongBan();
            return [$result, $khoa, $phongban];
        }

        public function handleChangeEmployee() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $model->saveChangeEmployee();
        }

        public function handleCreateEmployee() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $model->createEmployee();  
        }

        public function handleDeleteEmployee() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            $model->deleteEmployee();
        }

        public function handleDeleteProfile() {
            require_once('./Models/ProfileModel.php');
            $model = new ProfileModel(); 
            
        }
    }
?>