<?php
    class PenaltyModel {
        public function getPenalty() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM kyluat WHERE 1;";
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
        
        public function getSearchPenalty($khoa, $phongBan) {
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
                    $sql1 = "SELECT * FROM kyluat WHERE maNhanVien= ?;";
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
                    $sql1 = "SELECT * FROM kyluat WHERE maNhanVien= ?;";
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
                    $sql1 = "SELECT * FROM kyluat WHERE maNhanVien= ?;";
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

        public function createPenalty() {
            require('./Config/DBConn.php');
            $maKL = '';
            for ($i = 0; $i < 7; $i++) {
                $maKL .= mt_rand(0, 9); 
            }
            
            $maNhanVien = isset($_POST['maNhanVien']) ? $_POST['maNhanVien'] : '';
            $loaiHinhKyLuat = $_POST['loaiHinhKyLuat'];
            $ngayKyLuat = $_POST['ngayKyLuat'];
            $hinhThucKyLuat = $_POST['hinhThucKyLuat'];
            $trangThai = $_POST['trangThai'];

            $sql = "INSERT INTO kyluat (maKyLuat, maNhanVien, loaiHinhKyLuat, ngayKyLuat, hinhThucKyLuat, trangThai) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("ssssss", $maKL, $maNhanVien, $loaiHinhKyLuat, $ngayKyLuat, $hinhThucKyLuat, $trangThai);

            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully create penalty")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=penalty';
                </script>";
            } else {
                echo '<script>alert("Failed to create penalty")</script>';
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function searchPenalty($maKL) {
            require('./Config/DBConn.php');
            
            $sql = "SELECT * FROM kyluat WHERE maKyLuat= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $maKL);

            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();

            while ($row = mysqli_fetch_assoc($resultData)) {
                $array[] = $row;
            }

            return $array;
        }

        public function changePenalty($maKL) {
            require('./Config/DBConn.php');

            $loaiHinhKyLuat = $_POST['loaiHinhKyLuat'];
            $ngayKyLuat = $_POST['ngayKyLuat'];
            $hinhThucKyLuat = $_POST['hinhThucKyLuat'];
            $trangThai = $_POST['trangThai'];
            
            $sql = "UPDATE kyluat SET
            loaiHinhKyLuat = ?,
            ngayKyLuat = ?,
            hinhThucKyLuat = ?,
            trangThai = ?
            WHERE maKyLuat = ?";

            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $loaiHinhKyLuat, $ngayKyLuat, $hinhThucKyLuat, $trangThai, $maKL);
        
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Successfully change penalty")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=penalty';
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

        public function deletePenalty($maKL) {
            require('./Config/DBConn.php');

            $sql = "DELETE FROM kyluat WHERE maKyLuat = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("s", $maKL);
            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully delete penalty")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=penalty';
                </script>";
            } else {
                echo '<script>alert("Failed to delete penalty")</script>';   
            }
        }
    }
?>