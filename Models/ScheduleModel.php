<?php
    class ScheduleModel {
        public function getKhoa() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM khoa WHERE 1;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 
            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $resultData;
        }

        public function getHocPhan() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM hocphan WHERE 1;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 
            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $resultData;
        }

        public function getSchedule() {
            require('./Config/DBConn.php');

            $maHP = $_GET['maHP'];
            $sql = "SELECT * FROM giangday WHERE maHocPhan= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }
            
            mysqli_stmt_bind_param($stmt, "s", $maHP);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();
            while ($row = mysqli_fetch_assoc($resultData)) {
                $sql2 = "SELECT maHoSo FROM nhanvien WHERE maNhanVien = ?;";
                $stmt2 = mysqli_stmt_init($conn);
            
                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    header("Location: ./");
                    exit();
                }
            
                mysqli_stmt_bind_param($stmt2, "s", $row['maNhanVien']);
                mysqli_stmt_execute($stmt2);
            
                $data2 = mysqli_stmt_get_result($stmt2);
                while ($row2 = mysqli_fetch_assoc($data2)) {
                    $sql1 = "SELECT hoTen FROM thongtincoban WHERE maHoSo = ?;";
                
                    if (!mysqli_stmt_prepare($stmt, $sql1)) {
                        header("Location: ./");
                        exit();
                    }
                
                    mysqli_stmt_bind_param($stmt, "s", $row2['maHoSo']);
                    mysqli_stmt_execute($stmt);
                
                    $data1 = mysqli_stmt_get_result($stmt);
                    while ($row1 = mysqli_fetch_assoc($data1)) {
                        $row['hoTen'] = $row1['hoTen'];
                    }

                }
                
                $array[] = $row;
            }

            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $array;
        }

        public function searchSchedule() {
            require('./Config/DBConn.php');
            
            $hocKy = $_POST['hocky_selector'];
            $namHoc = $_POST['namhoc_selector'];
            $sql = "SELECT * FROM giangday WHERE hocKy= ? AND namHoc= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ss", $hocKy, $namHoc);

            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();

            while ($row = mysqli_fetch_assoc($resultData)) {
                $sql2 = "SELECT hoTen FROM nhanvien WHERE maNhanVien = ?;";
            
                if (!mysqli_stmt_prepare($stmt, $sql2)) {
                    header("Location: ./");
                    exit();
                }
            
                mysqli_stmt_bind_param($stmt, "s", $row['maNhanVien']);
                mysqli_stmt_execute($stmt);
            
                $data2 = mysqli_stmt_get_result($stmt);
                while ($row2 = mysqli_fetch_assoc($data2)) {
                    $row['hoTen'] = $row2['hoTen'];
                }
                
                $array[] = $row;
            }

            return $array;
        }

        public function getSearchHP() {
            require('./Config/DBConn.php');

            $khoa = $_GET['khoa'];
            $sql = "SELECT * FROM hocphan WHERE khoa= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }
            
            mysqli_stmt_bind_param($stmt, "s", $khoa);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 

            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $resultData;
        }

        public function createSchedule() {
            require('./Config/DBConn.php');
            require_once('./Hooks/ValidationHooks.php');

            $stmt = mysqli_stmt_init($conn);
            
            $maGiangDay = '';
            for ($i = 0; $i < 7; $i++) {
                $maGiangDay .= mt_rand(0, 9); 
            }

            $maNhanVien = $_POST['maNhanVien'];
            $soTiet = $_POST['soTiet'];
            $soTuanGiangDay = $_POST['soTuanGiangDay'];
            $nhiemVu = $_POST['nhiemVu'];
            $hocKy = $_POST['hocky_selector'];
            $namHoc = $_POST['namhoc_selector'];
            $hocPhan = $_POST['hocPhan'];
            $gioGiangDay = $soTiet * $soTuanGiangDay;

            if(checkSchedule($maNhanVien, $hocPhan)) {
                echo '<script>alert("Khối lượng giảng dạy của giảng viên này cho học phần này đã tồn tại!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=schedule';
                </script>";
                exit();
            }

            if($hocKy === '' || $namHoc === '' || $hocPhan === '') {
                echo '<script>alert("Điền đầy đủ thông tin")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=schedule';
                </script>";
                exit();
            }

            $sql = "INSERT INTO giangday (maGiangDay, maNhanVien,soTiet,  gioGiangDay, tuanGiangDay, nhiemVu, hocKy, namHoc, maHocPhan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssiiissss", $maGiangDay, $maNhanVien, $soTiet, $gioGiangDay, $soTuanGiangDay, $nhiemVu, $hocKy, $namHoc, $hocPhan);

            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully added to schedule")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=schedule';
                </script>";
            } else {
                echo '<script>alert("Failed to add to schedule")</script>';
            }
        }

        public function getSearchSchedule() {
            require('./Config/DBConn.php');
            
            $maGD = $_GET['paramMGD'];
            $sql = "SELECT * FROM giangday WHERE maGiangDay= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $maGD);

            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();

            while ($row = mysqli_fetch_assoc($resultData)) {
                $array[] = $row;
            }

            return $array;
        }

        public function changeSchedule($maGD) {
            require('./Config/DBConn.php');

            $soTiet = $_POST['soTiet'];
            $soTuanGiangDay = $_POST['tuanGiangDay'];
            $nhiemVu = $_POST['nhiemVu'];
            $hocKy = $_POST['hocky_selector'];
            $namHoc = $_POST['namhoc_selector'];
            $gioGiangDay = $soTiet * $soTuanGiangDay;
            
            $sql = "UPDATE giangday
            SET soTiet = ?,
                tuanGiangDay = ?,
                nhiemVu = ?,
                hocKy = ?,
                namHoc = ?,
                gioGiangDay = ?
            WHERE maGiangDay = ?"; 

            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "iisssis", $soTiet, $soTuanGiangDay, $nhiemVu, $hocKy, $namHoc, $gioGiangDay, $maGD);
        
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Successfully change schedule")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=schedule';
                    </script>";
                } else {
                    header("Location: ./");
                    exit();
                }
        
                mysqli_stmt_close($stmt);
            } else {
                header("Location: ./");
                exit();
            }
        }

        public function deleteSchedule($maGD) {
            require('./Config/DBConn.php');

            $sql = "DELETE FROM giangday WHERE maGiangDay = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("s", $maGD);
            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully delete schedule")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=schedule';
                </script>";
            } else {
                echo '<script>alert("Failed to delete schedule")</script>';   
            }
        }
    }
?>