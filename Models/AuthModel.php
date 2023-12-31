<?php
    class AuthModel {
        public function authenticate($username, $pwd) {
            require_once('./Config/DBConn.php');
            $sql = "SELECT * FROM taiKhoan WHERE tenTaiKhoan= ? AND matKhau= ?;";
            $stmt = mysqli_stmt_init($conn); //create a beforehand statement to ensure the security

            if(!mysqli_stmt_prepare($stmt, $sql)) { //Prepares an SQL statement for execution -> return a boolean value
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ss", $username, $pwd); //
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($resultData)) { 
                return $row;
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }
    }
?>