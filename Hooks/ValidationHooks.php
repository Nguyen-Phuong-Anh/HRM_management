<?php
    function phoneValidation($number) {
        $phoneRegex = '/^\d{10}$/';
        if (!preg_match($phoneRegex, $number)) {
            return false;
        }
        return true;
    }

    function idCardValidation($number) {
        $idRegex = '/^\d{11}$/';
        if (!preg_match($idRegex, $number)) {
            return false;
        }
        return true;
    }

    function checkNV($maHS) {
        require('./Config/DBConn.php');

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM nhanvien WHERE maHoSo= ?;";
        
        if(!mysqli_stmt_prepare($stmt, $sql)) { 
            header("Location: ./");
            exit();
        }

        $stmt->bind_param("s", $maHS);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt); 
        $array = array();
        while ($row = mysqli_fetch_assoc($resultData)) {
            $array[] = $row;
        }
        if(isset($array[0]['maNhanVien'])) {
            return true;
        } else return false;
    }

    function ProfileExisted($CCCD) {
        require('./Config/DBConn.php');

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM thongtincoban WHERE CCCD= ?;";
        
        if(!mysqli_stmt_prepare($stmt, $sql)) { 
            header("Location: ./");
            exit();
        }

        $stmt->bind_param("s", $CCCD);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt); 
        $array = array();
        while ($row = mysqli_fetch_assoc($resultData)) {
            $array[] = $row;
        }
        if(isset($array[0]['maNhanVien'])) {
            return true;
        } else return false;
    }

    function checkSchedule($maNV, $maHP) {
        require('./Config/DBConn.php');

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM giangday WHERE maNhanVien= ? AND maHocPhan= ?;";
        
        if(!mysqli_stmt_prepare($stmt, $sql)) { 
            header("Location: ./");
            exit();
        }

        $stmt->bind_param("s", $maNV, $maHP);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt); 
        $array = array();
        while ($row = mysqli_fetch_assoc($resultData)) {
            $array[] = $row;
        }
        if(isset($array[0]['maNhanVien'])) {
            return true;
        } else return false;
    }
?>