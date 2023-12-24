<?php
    require_once('./Controllers/ProfileController.php');
	$controller = new ProfileController();
    $data = $controller->handleGetEmployee();
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
    <h1>Thông tin nhân viên</h1>
    <h5 class="fst-italic mb-0"><?php echo isset($data[0]['maHoSo']) ? 'Mã hồ sơ: ' . $data[0]['maHoSo'] : 'Chưa có thông tin về nhân viên'; ?></h5>

    <table class="tb mt-5 mb-3">
        <thead>
            <th></th>
            <th></th>
        </thead>

        <?php
            if (isset($data) && is_array($data) && count($data) > 0) {
                echo "
                    <tbody>
                        <tr class='textbox'>
                            <td>
                                <p>Mã nhân viên</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['maNhanVien']) ? $data[0]['maNhanVien'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Bằng cấp</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['bangCap']) ? $data[0]['bangCap'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Chức vụ</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['chucVu']) ? $data[0]['chucVu'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Phòng ban</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['phongBan']) ? $data[0]['phongBan'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Khoa</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['khoa']) ? $data[0]['khoa'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Email</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['email']) ? $data[0]['email'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Ngày bắt đầu</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['ngayBatDau']) ? $data[0]['ngayBatDau'] : '') . "</span>
                            </td>
                        </tr>
                        <tr class='textbox'>
                            <td>
                                <p>Ngày kết thúc</p> 
                            </td>
                            <td>
                                <span>" . (isset($data[0]['ngayKetThuc']) ? $data[0]['ngayKetThuc'] : '') . "</span>
                            </td>
                        </tr>
                    </tbody>";
            }
        ?>

        
    </table>
</div>

<!-- modal -->
<div class="modal modal-lg fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Sửa thông tin nhân viên</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="" method="post">
            <div class="modal-body">
            <div class="form-outline" data-mdb-input-init>
                <input name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['maNhanVien']) ? $data[0]['maNhanVien'] : ''; ?>">
                <label class="form-label">Mã nhân viên</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="bangCap" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['bangCap']) ? $data[0]['bangCap'] : ''; ?>">
                <label class="form-label">Bằng cấp</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="chucVu" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['chucVu']) ? $data[0]['chucVu'] : ''; ?>">
                <label class="form-label">Chức vụ</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="phongBan" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['phongBan']) ? $data[0]['phongBan'] : ''; ?>">
                <label class="form-label">Phòng ban</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="khoa" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['khoa']) ? $data[0]['khoa'] : ''; ?>">
                <label class="form-label">Khoa</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="email" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0]['email']) ? $data[0]['email'] : ''; ?>">
                <label class="form-label">Email</label>
            </div>

            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="ngayBatDau" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['ngayBatDau']) ? $data[0]['ngayBatDau'] : ''; ?>">
                <label class="form-label">Ngày bắt đầu</label>
            </div>
            <div class="form-outline mt-3" data-mdb-input-init>
                <input name="ngayKetThuc" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0]['ngayKetThuc']) ? $data[0]['ngayKetThuc'] : ''; ?>">
                <label class="form-label">Ngày kết thúc</label>
            </div>
            
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="saveChange">Lưu</button>
            </div>
        </form>
    </div>
  </div>
</div>
<?php
    if (isset($data) && is_array($data) && count($data) > 0) {
        echo '
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Sửa</button>
        ';
    } else {
        echo "
        <a href='?route=create_employee&paramMHS=" . urlencode($_GET["paramMHS"]) . "'>
            <button class='btn btn-primary'>Thêm nhân viên</button>
        </a>";
    }
?>

<?php
    if(isset($_POST['saveChange'])) {
        require_once('./Controllers/ProfileController.php');
        $controller = new ProfileController();
        $controller->handleChangeEmployee();
    }
?>