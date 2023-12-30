<?php
    class BonusModel {
        public function getBonus() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM khenthuong WHERE 1;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

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

                if($data2) {
                    while ($row2 = mysqli_fetch_assoc($data2)) {
                        $sql1 = "SELECT hoTen FROM thongtincoban WHERE maHoSo=?;";
                        $stmt1 = mysqli_stmt_init($conn);
                    
                        if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                            header("Location: ./");
                            exit();
                        }
                    
                        mysqli_stmt_bind_param($stmt1, "s", $row2['maHoSo']);
                        mysqli_stmt_execute($stmt1);
                    
                        $data1 = mysqli_stmt_get_result($stmt1);

                        while ($row1 = mysqli_fetch_assoc($data1)) {
                            $row['hoTen'] = $row1['hoTen'];
                        }
                    }   
                }

                $array[] = $row;
            }

            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $array;
        }

        public function getSearchBonus($khoa, $phongBan) {
            require('./Config/DBConn.php');
            $stmt = mysqli_stmt_init($conn);
            
            if((!empty($khoa) && empty($phongBan))) {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE khoa= ?;";

                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "s", $khoa);
                mysqli_stmt_execute($stmt);
                $array = array();

                $resultData = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $sql1 = "SELECT * FROM khenthuong WHERE maNhanVien= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "s", $row['maNhanVien']); 
                    mysqli_stmt_execute($stmt);
                    $data1 = mysqli_stmt_get_result($stmt); 

                    while ($row2 = mysqli_fetch_assoc($data1)) {
                        $sql2 = "SELECT hoTen FROM thongtincoban WHERE maHoSo=?;";
                    
                        if (!mysqli_stmt_prepare($stmt, $sql2)) {
                            header("Location: ./");
                            exit();
                        }
                    
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                    
                        $data2 = mysqli_stmt_get_result($stmt);
                    
                        if ($data2) {
                            while ($row1 = mysqli_fetch_assoc($data2)) {
                                $row2['hoTen'] = $row1['hoTen'];
                            }
                        }
                        $array[] = $row2;
                    }
                }

                return $array;
            } else if(!empty($phongBan) && empty($khoa)) {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE phongBan= ?;";

                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "s", $phongBan);
                mysqli_stmt_execute($stmt);
                $array = array();

                $resultData = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $sql1 = "SELECT * FROM khenthuong WHERE maNhanVien= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "s", $row['maNhanVien']); 
                    mysqli_stmt_execute($stmt);
                    $data1 = mysqli_stmt_get_result($stmt); 

                    while ($row2 = mysqli_fetch_assoc($data1)) {
                        $sql2 = "SELECT hoTen FROM thongtincoban WHERE maHoSo=?;";
                    
                        if (!mysqli_stmt_prepare($stmt, $sql2)) {
                            header("Location: ./");
                            exit();
                        }
                    
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                    
                        $data2 = mysqli_stmt_get_result($stmt);
                    
                        if ($data2) {
                            while ($row1 = mysqli_fetch_assoc($data2)) {
                                $row2['hoTen'] = $row1['hoTen'];
                            }
                        }
                        $array[] = $row2;
                    }
                }

                return $array;
            } else {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE khoa=? AND phongBan= ?;";

                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ss", $khoa, $phongBan);
                mysqli_stmt_execute($stmt);
                $array = array();

                $resultData = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $sql1 = "SELECT * FROM khenthuong WHERE maNhanVien= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "s", $row['maNhanVien']); 
                    mysqli_stmt_execute($stmt);
                    $data1 = mysqli_stmt_get_result($stmt); 

                    while ($row2 = mysqli_fetch_assoc($data1)) {
                        $sql2 = "SELECT hoTen FROM thongtincoban WHERE maHoSo=?;";
                    
                        if (!mysqli_stmt_prepare($stmt, $sql2)) {
                            header("Location: ./");
                            exit();
                        }
                    
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                    
                        $data2 = mysqli_stmt_get_result($stmt);
                    
                        if ($data2) {
                            while ($row1 = mysqli_fetch_assoc($data2)) {
                                $row2['hoTen'] = $row1['hoTen'];
                            }
                        }
                        $array[] = $row2;
                    }
                }

                return $array;
            }
            
        }

        public function createBonus() {
            require('./Config/DBConn.php');
            $maKT = '';
            for ($i = 0; $i < 7; $i++) {
                $maKT .= mt_rand(0, 9); 
            }
            
            $maNhanVien = isset($_POST['maNhanVien']) ? $_POST['maNhanVien'] : '';
            $tenDotKhenThuong = isset($_POST['tenDotKhenThuong']) ? $_POST['tenDotKhenThuong'] : '';
            $soQuyetDinh = isset($_POST['soQuyetDinh']) ? $_POST['soQuyetDinh'] : '';
            $ngayKhenThuong = isset($_POST['ngayKhenThuong']) ? $_POST['ngayKhenThuong'] : '';
            $loaiKhenThuong = isset($_POST['loaiKhenThuong']) ? $_POST['loaiKhenThuong'] : '';
            $hinhThucKhenThuong = isset($_POST['hinhThucKhenThuong']) ? $_POST['hinhThucKhenThuong'] : '';
            $trangThai = isset($_POST['trangThai']) ? $_POST['trangThai'] : '';
            if($trangThai === '') {
                echo '<script>alert("Cần cung cấp trạng thái!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=profile';
                </script>";
                exit();
            }

            $sql = "INSERT INTO khenthuong (maKhenThuong, maNhanVien, tenDotKhenThuong, soQuyetDinh, ngayKhenThuong, loaiKhenThuong, hinhThucKhenThuong, trangThai)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("ssssssss", $maKT, $maNhanVien, $tenDotKhenThuong, $soQuyetDinh, $ngayKhenThuong, $loaiKhenThuong, $hinhThucKhenThuong, $trangThai);

            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully create bonus")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=bonus';
                </script>";
            } else {
                echo '<script>alert("Failed to create bonus")</script>';
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function searchBonus($maKT) {
            require('./Config/DBConn.php');
            
            $sql = "SELECT * FROM khenthuong WHERE maKhenThuong= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $maKT);

            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();

            while ($row = mysqli_fetch_assoc($resultData)) {
                $array[] = $row;
            }

            return $array;
        }

        public function changeBonus($maKT) {
            require('./Config/DBConn.php');

            $tenDotKhenThuong = $_POST['tenDotKhenThuong'];
            $soQuyetDinh = $_POST['soQuyetDinh'];
            $ngayKhenThuong = $_POST['ngayKhenThuong'];
            $loaiKhenThuong = $_POST['loaiKhenThuong'];
            $hinhThucKhenThuong = $_POST['hinhThucKhenThuong'];
            $trangThai = $_POST['trangThai'];
            
            $sql = "UPDATE khenthuong SET
            tenDotKhenThuong = ?,
            soQuyetDinh = ?,
            ngayKhenThuong = ?,
            loaiKhenThuong = ?,
            hinhThucKhenThuong = ?,
            trangThai = ?
            WHERE maKhenThuong = ?";

            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssssss", $tenDotKhenThuong, $soQuyetDinh, $ngayKhenThuong, $loaiKhenThuong, $hinhThucKhenThuong, $trangThai, $maKT);
        
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Successfully create bonus")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=bonus';
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

        public function deleteBonus($maKT) {
            require('./Config/DBConn.php');

            $sql = "DELETE FROM khenthuong WHERE maKhenThuong = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("s", $maKT);
            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully delete bonus")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=bonus';
                </script>";
            } else {
                echo '<script>alert("Failed to delete bonus")</script>';   
            }
        }
        
    }
?>