<?php
class TeachingModel
{

    public function getTeaching()
    {
        require_once('./Config/DBConn.php');
        $result = $conn->query('SELECT  hoTen, namHoc, maHocPhan, gioGiangDay, tuanGiangDay, loaiCongViec
        FROM GiangDay AS GD JOIN NhanVien AS NV ON NV.maNhanVien = GD.maNhanVien JOIN ThongTinCoBan AS TTCB ON TTCB.maHoSo = NV.maHoSo');
        
        $teachings = array();
        if ($result->num_rows > 0) {
            while ($teaching = mysqli_fetch_assoc($result)) {
                $teachings[] = $teaching;
            }
        }
        return $teachings;
    }
    // function teachingInsert(){
    //     require_once('./Config/DBConn.php');
    //     $sql = "SELECT  hoTen, namHoc, maMonHoc, gioGiangDay, tuanGiangDay, loaiCongViec
    //             FROM GiangDay AS GD JOIN NhanVien AS NV ON NV.maNhanVien = GD.maNhanVien";
    //     $result = new TeachingModel;
    //     $result->
    //     return $result;
    // }
}