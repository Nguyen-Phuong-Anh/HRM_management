<?php
    require_once('./Controllers/ProfileController.php');
	$controller = new ProfileController();
    $data = $controller->handleGetProfile();
?>

<style>
    .textbox p, span {
        font-size: 1.2rem;
    }

    .textbox p {
        font-weight: 700;
        margin: 0;
    }

    .textbox span {
        font-weight: lighter;
        display: block;
    }

    .textbox td {
        padding: 10px;
    }

    .textbox td:first-child {
        width: 200px;
    }

    .textbox td:nth-child(2) {
        width: 300px;
    }

    .textbox {
        border-bottom: 1px solid #B6BBC4;
    }
</style>

<div class="mt-4 mb-4">
    <h1>Hồ sơ</h1>
    <h5 class="fst-italic mb-0">Mã hồ sơ: <?php echo $data[0]['maHoSo']; ?></h5>

    <table class="tb mt-5 mb-3">
        <thead>
            <th></th>
            <th></th>
        </thead>

        <tbody>
            <tr class="textbox">
                <td>
                    <p>Họ và tên</p> 
                </td>
                <td>
                    <span><?php echo isset($data[0]['hoTen']) ? $data[0]['hoTen'] : ''; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Giới tính</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['gioiTinh']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Ngày sinh</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['ngaySinh']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Quê quán</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['queQuan']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Hộ khẩu thường trú</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['hoKhauThuongTru']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Địa chỉ</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['diaChi']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Điện thoại</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['dienThoai']; ?></span>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Dân tộc</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['danToc']; ?></span>
                </td>
                <td>
                    <td>
                        <p>Tôn giáo</p> 
                    </td>
                    <td>
                    <span><?php echo isset($data[0]['tonGiao']) ? $data[0]['tonGiao'] : ''; ?></span>
                    </td>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>CCCD</p> 
                </td>
                <td>
                    <span><?php echo $data[0]['CCCD']; ?></span>
                    <td>
                        <td>
                            <p>Ngày cấp</p> 
                        </td>
                        <td>
                            <span><?php echo $data[0]['CCCDNgayCap']; ?></span>
                        </td>
                    </td>
                    <td>
                        <td>
                            <p>Nơi cấp</p> 
                        </td>
                        <td>
                            <span><?php echo $data[0]['CCCDNoiCap']; ?></span>
                        </td>
                    </td>
                </td>
            </tr>
            
            <tr class="textbox">
                <td>
                    <p>Trình độ văn hóa</p> 
                </td>
                <td>
                    <span><?php echo isset($data[0]['trinhDoVanHoa']) ? $data[0]['trinhDoVanHoa'] : ''; ?></span>

                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Ngày kết nạp đoàn</p> 
                </td>
                <td>
                    <span><?php echo isset($data[0]['ngayKetNapDoan']) ? $data[0]['ngayKetNapDoan'] : ''; ?></span>

                </td>
                <td>
                    <td>
                        <p>tại</p> 
                    </td>
                    <td>
                        <span><?php echo isset($data[0]['noiKetNapDoan']) ? $data[0]['noiKetNapDoan'] : ''; ?></span>
                    </td>
                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Ngày kết nạp đảng</p> 
                </td>
                <td>
                    <span><?php echo isset($data[0]['ngayKetNapDang']) ? $data[0]['ngayKetNapDang'] : ''; ?></span>

                </td>
                <td>
                    <td>
                        <p>tại</p> 
                    </td>
                    <td>
                        <span><?php echo isset($data[0]['noiKetNapDang']) ? $data[0]['noiKetNapDang'] : ''; ?></span>
                    </td>
                </td>
            </tr>

            <tr class="textbox">
                <td>
                    <p>Khen thưởng/ Kỷ luật</p> 
                </td>
                <td>
                    <span><?php echo isset($data[0]['khenThuong']) ? $data[0]['khenThuong'] : ''; ?></span>
                    <span><?php echo isset($data[0]['kyLuat']) ? $data[0]['kyLuat'] : ''; ?></span>

                </td>
            </tr>
            <tr class="textbox">
                <td>
                    <p>Sở trường</p>
                </td>
                <td>
                    <span><?php echo isset($data[0]['soTruong']) ? $data[0]['soTruong'] : ''; ?></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- modal -->
<div class="modal modal-lg fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Sửa hồ sơ lí lịch</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="" method="post">
            <div class="modal-body">
            <div class="form-outline" data-mdb-input-init>
                <input name="hoTen" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['hoTen']) ? $data[0]['hoTen'] : ''; ?>">
                <label class="form-label">Họ và tên</label>
            </div>

            <div class="d-flex mt-4">
                <p class="me-3">Giới tính</p>
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="gioiTinh" value="Nam" <?php echo (isset($data[0]['gioiTinh']) && $data[0]['gioiTinh'] === 'Nam') ? 'checked' : ''; ?>>
                <label class="form-check-label">
                    Nam
                </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioiTinh" value="Nữ" <?php echo (isset($data[0]['gioiTinh']) && $data[0]['gioiTinh'] === 'Nữ') ? 'checked' : ''; ?>>
                <label class="form-check-label">
                    Nữ
                </label>
                </div>
            </div>

            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="ngaySinh" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['ngaySinh']) ? $data[0]['ngaySinh'] : ''; ?>">
                <label class="form-label">Ngày sinh</label>
            </div>

            <div class="form-outline mt-4" data-mdb-input-init>
                <input name="queQuan" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['queQuan']) ? $data[0]['queQuan'] : ''; ?>">
                <label class="form-label">Nguyên quán</label>
            </div>
            <div class="form-outline mt-4" data-mdb-input-init>
                <input name="hoKhauThuongTru" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['hoKhauThuongTru']) ? $data[0]['hoKhauThuongTru'] : ''; ?>">
                <label class="form-label">Nơi đăng ký hộ khẩu thường trú</label>
            </div>
            <div class="form-outline mt-4" data-mdb-input-init>
                <input name="diaChi" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['diaChi']) ? $data[0]['diaChi'] : ''; ?>">
                <label class="form-label">Địa chỉ</label>
            </div>

            <div class="form-outline mt-4" data-mdb-input-init>
                <input name="dienThoai" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['dienThoai']) ? $data[0]['dienThoai'] : ''; ?>">
                <label class="form-label">Điện thoại</label>
            </div>

            <div class="d-flex">
                <div class="form-outline mt-4" data-mdb-input-init>
                <input name="danToc" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['danToc']) ? $data[0]['danToc'] : ''; ?>">

                <label class="form-label">Dân tộc</label>
                </div>
                <div class="form-outline mt-4 ms-3" data-mdb-input-init>
                <input name="tonGiao" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['tonGiao']) ? $data[0]['tonGiao'] : ''; ?>">

                <label class="form-label">Tôn giáo</label>
                </div>
            </div>

            <div class="d-flex">
                <div class="form-outline mt-4" data-mdb-input-init>
                <input name="CCCD" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['CCCD']) ? $data[0]['CCCD'] : ''; ?>">

                <label class="form-label">CCCD</label>
                </div>
                <div class="form-outline mt-4 ms-3" data-mdb-input-init>
                <input name="CCCDNgayCap" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['CCCDNgayCap']) ? $data[0]['CCCDNgayCap'] : ''; ?>">

                <label class="form-label">Ngày cấp</label>
                </div>
                <div class="form-outline mt-4 ms-3" data-mdb-input-init>
                <input name="CCCDNoiCap" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['CCCDNoiCap']) ? $data[0]['CCCDNoiCap'] : ''; ?>">

                <label class="form-label">Nơi cấp</label>
                </div>
            </div>

            <div class="form-outline mt-4" data-mdb-input-init>
                <input name="trinhDoVanHoa" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['trinhDoVanHoa']) ? $data[0]['trinhDoVanHoa'] : ''; ?>">
                <label class="form-label">Trình độ văn hóa</label>
            </div>
            <div class="d-flex">
                <div class="form-outline mt-4" data-mdb-input-init>
                <input name="noiKetNapDoan" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['noiKetNapDoan']) ? $data[0]['noiKetNapDoan'] : ''; ?>">

                <label class="form-label">Nơi kết nạp đoàn</label>
                </div>
                <div class="form-outline mt-4 ms-3" data-mdb-input-init>
                <input name="ngayKetNapDoan" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['ngayKetNapDoan']) ? $data[0]['ngayKetNapDoan'] : ''; ?>">

                <label class="form-label">Ngày kết nạp đoàn</label>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-outline mt-4" data-mdb-input-init>
                <input name="noiKetNapDang" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['noiKetNapDang']) ? $data[0]['noiKetNapDang'] : ''; ?>">

                <label class="form-label">Nơi kết nạp đảng</label>
                </div>
                <div class="form-outline mt-4 ms-3" data-mdb-input-init>
                <input name="ngayKetNapDang" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['ngayKetNapDang']) ? $data[0]['ngayKetNapDang'] : ''; ?>">

                <label class="form-label">Ngày kết nạp đảng</label>
                </div>
            </div>

            <div class="form-outline mt-4" data-mdb-input-init>
            <input name="khenThuong" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['khenThuong']) ? $data[0]['khenThuong'] : ''; ?>">

                <label class="form-label">Khen thưởng</label>
            </div>
            <div class="form-outline mt-4" data-mdb-input-init>
            <input name="kyLuat" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['kyLuat']) ? $data[0]['kyLuat'] : ''; ?>">

                <label class="form-label">Kỷ luật</label>
            </div>
            <div class="form-outline mt-4" data-mdb-input-init>
            <input name="soTruong" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['soTruong']) ? $data[0]['soTruong'] : ''; ?>">

                <label class="form-label">Sở trường</label>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="saveChange">Lưu</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="mb-3">
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Sửa</button>
    <button class="btn btn-danger" type="submit" name="delete_profile">Xóa</button>
</div>
<?php
    if(isset($_POST['saveChange'])) {
        echo $_POST['trinhDoVanHoa'];
        require_once('./Controllers/ProfileController.php');
        $controller = new ProfileController();
        $controller->handleChangeProfile();
    } else if(isset($_POST['delete_profile'])) {
        require_once('./Controllers/ProfileController.php');
        $controller = new ProfileController();
        $controller->handleDeleteProfile();
    }
?>