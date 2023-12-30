<?php
    class ContractModel {
        public function getContract() {
            require('./Config/DBConn.php');

            $maHP = $_GET['maHP'];
            $sql = "SELECT * FROM hopdong WHERE maHopDong= ?;";
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
    }
?>