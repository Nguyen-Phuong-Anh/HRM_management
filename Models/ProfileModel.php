<?php
    class ProfileModel {
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

        public function getPhongBan() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM phongban WHERE 1;";
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

        public function getNhanVien() {
            require('./Config/DBConn.php');
            $sql = "SELECT * FROM thongtincoban WHERE 1;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();
            while ($row = mysqli_fetch_assoc($resultData)) {
                // Select maNhanVien from nhanvien for each maHoSo
                $sql1 = "SELECT maNhanVien FROM nhanvien WHERE maHoSo=?;";
                $stmt1 = mysqli_stmt_init($conn);
            
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                    header("Location: ./");
                    exit();
                }
            
                mysqli_stmt_bind_param($stmt1, "s", $row['maHoSo']);
                mysqli_stmt_execute($stmt1);
            
                $data1 = mysqli_stmt_get_result($stmt1);
            
                if ($data1) {
                    while ($row1 = mysqli_fetch_assoc($data1)) {
                        $row['maNhanVien'] = $row1['maNhanVien'];
                    }
                }
            
                $array[] = $row;
            }

            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $array;
        }

        public function getSearchNV($tenNV, $khoa, $phongBan) {
            require('./Config/DBConn.php');
            $searchtenNV = "%{$tenNV}%";

            $stmt = mysqli_stmt_init($conn);
            if((!empty($khoa) && empty($phongBan))) {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE khoa= ?;";
    
                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }
    
                mysqli_stmt_bind_param($stmt, "s", $khoa);
                mysqli_stmt_execute($stmt);
                
                $resultData = mysqli_stmt_get_result($stmt);
                $rows = array();
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $rows[] = $row;
                }
                
                if(empty($tenNV)) {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                } else {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ? AND hoTen LIKE ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "ss", $row['maHoSo'], $searchtenNV);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                }
            } else if((!empty($phongBan) && empty($khoa))) {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE phongBan= ?;";
    
                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }
    
                mysqli_stmt_bind_param($stmt, "s", $phongBan);
                mysqli_stmt_execute($stmt);
                
                $resultData = mysqli_stmt_get_result($stmt);
                $rows = array();
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $rows[] = $row;
                }
                
                if(empty($tenNV)) {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                } else {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ? AND hoTen LIKE ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "ss", $row['maHoSo'], $searchtenNV);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                }
            } else if(!empty($khoa) && !empty($phongBan)) {
                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE khoa= ? AND phongBan= ?;";
    
                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }
    
                mysqli_stmt_bind_param($stmt, "ss", $khoa, $phongBan);
                mysqli_stmt_execute($stmt);
                
                $resultData = mysqli_stmt_get_result($stmt);
                $rows = array();
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $rows[] = $row;
                }
                
                if(empty($tenNV)) {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                } else {
                    $sql1 = "SELECT * FROM thongtincoban WHERE maHoSo= ? AND hoTen LIKE ?;";
                    if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                        header("Location: ./");
                        exit();
                    }
                    
                    $array = array();
                    foreach($rows as $row) {
                        mysqli_stmt_bind_param($stmt, "ss", $row['maHoSo'], $searchtenNV);
                        mysqli_stmt_execute($stmt);
                        
                        $data1 = mysqli_stmt_get_result($stmt);
                        if($data1) {
                            while($row1 = mysqli_fetch_assoc($data1)) {
                                $row1['maNhanVien'] = $row['maNhanVien'];
                                $array[] = $row1;
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                    $conn->close();
        
                    return $array;
                }
            } else {
                $sql1 = "SELECT * FROM thongtincoban WHERE hoTen LIKE ?;";
                if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                    header("Location: ./");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt, "s", $searchtenNV);
                mysqli_stmt_execute($stmt);
                
                $rows = array();
                $data1 = mysqli_stmt_get_result($stmt);
                if($data1) {
                    while($row1 = mysqli_fetch_assoc($data1)) {
                        $rows[] = $row1;
                    }
                }

                $sql = "SELECT maNhanVien, maHoSo FROM nhanvien WHERE maHoSo= ?;";

                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }
    
                $array = array();
                foreach($rows as $row) {
                    mysqli_stmt_bind_param($stmt, "s", $row['maHoSo']);
                    mysqli_stmt_execute($stmt);
                    
                    $data1 = mysqli_stmt_get_result($stmt);
                    if($data1) {
                        while($row1 = mysqli_fetch_assoc($data1)) {
                            $array[] = $row1;
                        }
                    }
                }

                mysqli_stmt_close($stmt);
                $conn->close();
    
                return $rows;
            }

        }

        public function createProfile() {
            require('./Config/DBConn.php');
            require_once('./Hooks/ValidationHooks.php');

            $maHS = '';
            for ($i = 0; $i < 7; $i++) {
                $maHS .= mt_rand(0, 9); 
            }
            
            $hoTen = isset($_POST['hoTen']) ? $_POST['hoTen'] : '';
            $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
            if($gioiTinh === '') {
                echo '<script>alert("Cần cung cấp giới tính!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            } 
            $ngaySinh = isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : '';
            $queQuan = isset($_POST['queQuan']) ? $_POST['queQuan'] : '';
            $hoKhauThuongTru = isset($_POST['hoKhauThuongTru']) ? $_POST['hoKhauThuongTru'] : '';
            $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : '';
            $dienThoai = isset($_POST['dienThoai']) ? $_POST['dienThoai'] : '';
            if(!phoneValidation($dienThoai)) {
                echo '<script>alert("Nhập chính xác số điện thoại!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            $danToc = isset($_POST['danToc']) ? $_POST['danToc'] : '';
            $tonGiao = isset($_POST['tonGiao']) ? $_POST['tonGiao'] : '';
            $CCCD = isset($_POST['CCCD']) ? $_POST['CCCD'] : '';
            if(!idCardValidation($CCCD)) {
                echo '<script>alert("Nhập chính xác số căn cước!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            if(ProfileExisted($CCCD)) {
                echo '<script>alert("Hồ sơ đã tồn tại!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            $CCCDNgayCap = isset($_POST['CCCDNgayCap']) ? $_POST['CCCDNgayCap'] : '';
            $CCCDNoiCap = isset($_POST['CCCDNoiCap']) ? $_POST['CCCDNoiCap'] : '';
            $trinhDoVanHoa = isset($_POST['trinhDoVanHoa']) ? $_POST['trinhDoVanHoa'] : '';
            $noiKetNapDoan = isset($_POST['noiKetNapDoan']) ? $_POST['noiKetNapDoan'] : '';
            $ngayKetNapDoan = isset($_POST['ngayKetNapDoan']) ? $_POST['ngayKetNapDoan'] : '';
            $noiKetNapDang = isset($_POST['noiKetNapDang']) ? $_POST['noiKetNapDang'] : '';
            $ngayKetNapDang = isset($_POST['ngayKetNapDang']) ? $_POST['ngayKetNapDang'] : '';
            $khenThuong = isset($_POST['khenThuong']) ? $_POST['khenThuong'] : '';
            $kyLuat = isset($_POST['kyLuat']) ? $_POST['kyLuat'] : '';
            $soTruong = isset($_POST['soTruong']) ? $_POST['soTruong'] : '';

            $sql = "INSERT INTO thongtincoban (maHoSo, hoTen, gioiTinh, ngaySinh, queQuan, hoKhauThuongTru, diaChi, dienThoai, danToc, tonGiao, CCCD, CCCDNgayCap, CCCDNoiCap)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("sssssssssssss", $maHS, $hoTen, $gioiTinh, $ngaySinh, $queQuan, $hoKhauThuongTru, $diaChi, $dienThoai, $danToc, $tonGiao, $CCCD, $CCCDNgayCap, $CCCDNoiCap);

            if(mysqli_stmt_execute($stmt)) {
                $sql = "INSERT INTO soyeulilich (maHoSo, trinhDoVanHoa, noiKetNapDoan, ngayKetNapDoan, noiKetNapDang, ngayKetNapDang, khenThuong, kyLuat, soTruong)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if(!mysqli_stmt_prepare($stmt, $sql)) { 
                    header("Location: ./");
                    exit();
                }

                $stmt->bind_param("sssssssss", $maHS, $trinhDoVanHoa, $noiKetNapDoan, $ngayKetNapDoan, $noiKetNapDang, $ngayKetNapDang, $khenThuong, $kyLuat, $soTruong);

                if(mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Thêm hồ sơ thành công!")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=profile';
                    </script>";
                } else {
                    echo '<script>alert("Thêm thất bại!")</script>';
                }

            } else {
                echo '<script>alert("Thêm thất bại!")</script>';
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function getProfile() {
            require('./Config/DBConn.php');
            
            $maHoSo = $_GET['paramMHS'];
            $sql = "SELECT TC.*, SL.*
            FROM thongtincoban AS TC
            LEFT JOIN soyeulilich AS SL ON TC.maHoSo = SL.maHoSo
            WHERE TC.maHoSo = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("s", $maHoSo);
            $array = array();

            if (mysqli_stmt_execute($stmt)) {
                $resultData = mysqli_stmt_get_result($stmt);
            
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $array[] = $row;
                }
            }
            
            mysqli_stmt_close($stmt);
            $conn->close();
            
            return $array;
        }

        public function saveChangeProfile() {
            require('./Config/DBConn.php');
            $maHoSo = $_GET['paramMHS'];

            $hoTen = isset($_POST['hoTen']) ? $_POST['hoTen'] : '';
            $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
            $ngaySinh = isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : '';
            $queQuan = isset($_POST['queQuan']) ? $_POST['queQuan'] : '';
            $hoKhauThuongTru = isset($_POST['hoKhauThuongTru']) ? $_POST['hoKhauThuongTru'] : '';
            $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : '';
            $dienThoai = isset($_POST['dienThoai']) ? $_POST['dienThoai'] : '';
            if(!phoneValidation($dienThoai)) {
                echo '<script>alert("Nhập chính xác số điện thoại!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            $danToc = isset($_POST['danToc']) ? $_POST['danToc'] : '';
            $tonGiao = isset($_POST['tonGiao']) ? $_POST['tonGiao'] : '';
            $CCCD = isset($_POST['CCCD']) ? $_POST['CCCD'] : '';
            if(!idCardValidation($CCCD)) {
                echo '<script>alert("Nhập chính xác số căn cước!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            if(ProfileExisted($CCCD)) {
                echo '<script>alert("Hồ sơ đã tồn tại!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=create_prf';
                </script>";
                exit();
            }
            
            $CCCDNgayCap = isset($_POST['CCCDNgayCap']) ? $_POST['CCCDNgayCap'] : '';
            $CCCDNoiCap = isset($_POST['CCCDNoiCap']) ? $_POST['CCCDNoiCap'] : '';
            $trinhDoVanHoa = isset($_POST['trinhDoVanHoa']) ? $_POST['trinhDoVanHoa'] : '';
            $noiKetNapDoan = isset($_POST['noiKetNapDoan']) ? $_POST['noiKetNapDoan'] : '';
            $ngayKetNapDoan = isset($_POST['ngayKetNapDoan']) ? $_POST['ngayKetNapDoan'] : '';
            $noiKetNapDang = isset($_POST['noiKetNapDang']) ? $_POST['noiKetNapDang'] : '';
            $ngayKetNapDang = isset($_POST['ngayKetNapDang']) ? $_POST['ngayKetNapDang'] : '';
            $khenThuong = isset($_POST['khenThuong']) ? $_POST['khenThuong'] : '';
            $kyLuat = isset($_POST['kyLuat']) ? $_POST['kyLuat'] : '';
            $soTruong = isset($_POST['soTruong']) ? $_POST['soTruong'] : '';

            $sql = "UPDATE thongtincoban SET 
            hoTen = ?, 
            gioiTinh = ?, 
            ngaySinh = ?, 
            queQuan = ?, 
            hoKhauThuongTru = ?, 
            diaChi = ?, 
            dienThoai = ?, 
            danToc = ?, 
            tonGiao = ?, 
            CCCD = ?, 
            CCCDNgayCap = ?, 
            CCCDNoiCap = ?
            WHERE maHoSo= ?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("sssssssssssss", $hoTen, $gioiTinh, $ngaySinh, $queQuan, $hoKhauThuongTru, $diaChi, $dienThoai, $danToc, $tonGiao, $CCCD, $CCCDNgayCap, $CCCDNoiCap, $maHoSo);

            if(mysqli_stmt_execute($stmt)) {
               $sql1 = "UPDATE soyeulilich SET 
                trinhDoVanHoa = ?, 
                noiKetNapDoan = ?, 
                ngayKetNapDoan = ?, 
                noiKetNapDang = ?, 
                ngayKetNapDang = ?, 
                khenThuong = ?, 
                kyLuat = ?, 
                soTruong = ?
               WHERE maHoSo= ?";
               
                if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                    header("Location: ./");
                    exit();
                }
                $stmt->bind_param("sssssssss", $trinhDoVanHoa, $noiKetNapDoan, $ngayKetNapDoan, $noiKetNapDang, $ngayKetNapDang, $khenThuong, $kyLuat, $soTruong, $maHoSo);

                if(mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Sửa hồ sơ thành công!")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=profile';
                    </script>";
                } else {
                    echo '<script>alert("Sửa hồ sơ thất bại!")</script>';
                }

            } else {
                echo '<script>alert("Sửa hồ sơ thất bại!")</script>';
            }
            
            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function getEmployee() {
            require('./Config/DBConn.php');
            
            $maHoSo = $_GET['paramMHS'];
            $sql = "SELECT * FROM nhanvien WHERE maHoSo= ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("s", $maHoSo);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt); 
            $array = array();
            while ($row = mysqli_fetch_assoc($resultData)) {
                $array[] = $row;
            }
            return $array;
        }

        public function saveChangeEmployee() {
            require('./Config/DBConn.php');
            $maHoSo = $_GET['paramMHS'];

            $bangCap = $_POST['bangCap'];
            $chucVu = $_POST['chucVu'];
            $phongBan = $_POST['phongBan'];
            $khoa = $_POST['khoa'];
            $email = $_POST['email'];
            $ngayBatDau = $_POST['ngayBatDau'];
            $ngayKetThuc = $_POST['ngayKetThuc'];

            $sql = "UPDATE nhanvien SET 
            bangCap = ?, 
            chucVu = ?, 
            phongBan = ?, 
            khoa = ?, 
            email = ?, 
            ngayBatDau = ?, 
            ngayKetThuc = ? 
            WHERE maHoSo = ?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }

            $stmt->bind_param("ssssssss", $bangCap, $chucVu, $phongBan, $khoa, $email, $ngayBatDau, $ngayKetThuc, $maHoSo);

            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Sửa nhân viên thành công!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=profile';
                </script>";
            } else {
                echo '<script>alert("Sửa thất bại!")</script>';
            }
            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function createEmployee() {
            require('./Config/DBConn.php');
            require_once('./Hooks/ValidationHooks.php');

            $maNhanVien = '';
            for ($i = 0; $i < 7; $i++) {
                $maNhanVien .= mt_rand(0, 9); 
            }
            
            $maHS = $_GET['paramMHS'];
            if(checkNV($maHS)) {
                echo '<script>alert("Nhân viên đã tồn tại")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=profile';
                </script>";
                exit();
            }
            $bangCap = $_POST['bangCap'];
            $chucVu = $_POST['chucVu'];
            $phongBan = $_POST['phongBan'];
            $khoa = $_POST['khoa'];
            $email = $_POST['email'];
            $ngayBatDau = $_POST['ngayBatDau'];
            $ngayKetThuc = $_POST['ngayKetThuc'];

            $sql = "INSERT INTO nhanvien (maHoSo, maNhanVien, bangCap, chucVu, phongBan, khoa, email, ngayBatDau, ngayKetThuc) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }
            $stmt->bind_param("sssssssss", $maHS, $maNhanVien, $bangCap, $chucVu, $phongBan, $khoa, $email, $ngayBatDau, $ngayKetThuc);

            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully create employee")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=profile';
                </script>";
            } else {
                echo '<script>alert("Failed to create employee")</script>';
            }
            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function deleteEmployee() {
            $maHS = $_GET['paramMHS'];
            require('./Config/DBConn.php');

            $sql = "DELETE FROM nhanvien WHERE maHoSo = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }
            
            $stmt->bind_param("s", $maHS);
            
            if(mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Xóa nhân viên thành công!")</script>';
                echo "<script>
                window.location = 'http://localhost/HRM_management/?route=profile';
                </script>";
            } else {
                echo '<script>alert("Xóa thất bại")</script>';   
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }

        public function deleteProfile() {
            $maHS = $_GET['paramMHS'];
            require('./Config/DBConn.php');

            $sql = "DELETE FROM soyeulilich WHERE maHoSo = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) { 
                header("Location: ./");
                exit();
            }
            
            $stmt->bind_param("s", $maHS);
            
            if(mysqli_stmt_execute($stmt)) {
                $sql1 = "DELETE FROM thongtincoban WHERE maHoSo = ?";

                if(!mysqli_stmt_prepare($stmt, $sql1)) { 
                    header("Location: ./");
                    exit();
                }
                
                $stmt->bind_param("s", $maHS);
                
                if(mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Xóa thành công!")</script>';
                    echo "<script>
                    window.location = 'http://localhost/HRM_management/?route=profile';
                    </script>";
                } else {
                    echo '<script>alert("Xóa thất bại")</script>';   
                }
            } else {
                echo '<script>alert("Xóa thất bại")</script>';   
            }

            mysqli_stmt_close($stmt);
            $conn->close();
        }
    }
?>