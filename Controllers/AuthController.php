<?php
    class AuthController {
        public function showLoginForm() {
            require_once('./Views/auth/login.php');
        }

        public function processLogin() {
            if(isset($_POST['submit'])) {
                if(!$_POST['username'] || !$_POST['password']) {
                    header("Location: ./");
                }
                $username = $_POST['username'];
                $pwd = $_POST['password'];

                require_once('./Models/AuthModel.php');
                $authoMod = new AuthModel();
                $data = $authoMod->authenticate($username, $pwd);
                if(isset($data['tenTaiKhoan'])) {
                    session_start();
                    $_SESSION['username'] = $data['tenTaiKhoan'];
                    header("Location: .?route=profile");
                    exit();
                } else {
                    echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!")</script>';
                    echo "<script>
                        window.location = 'http://localhost/HRM_management/';
                    </script>";
                }

                // $pwdHashed = $data['matKhau'];
                // $checkPwd = password_verify($pwd, $pwdHashed);
                // if($checkPwd === false) {
                //     echo '<script>alert("Password or username is invalid!")</script>';
                //     echo "<script>
                //         window.location = 'http://localhost/HRM_management/';
                //     </script>";
                // } else {
                //     session_start();
                //     $_SESSION['username'] = $data['tenTaiKhoan'];
                //     $_SESSION['role'] = $data['maVaiTro'];
                //     header("Location: .?route=home");
                //     exit();
                // }
                
            }
        }

        public function processLogout() {
            session_start();
            session_unset();
            session_destroy();

            header("Location: ./");
            exit();
        }
    }
?>