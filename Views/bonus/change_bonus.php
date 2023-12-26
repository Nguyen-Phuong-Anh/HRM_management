<?php
    require_once('./Controllers/BonusController.php');
    $controller = new BonusController();
    $data = $controller->handleGetSearchBonus();
?>

<h2 class="mt-5">Sửa khen thưởng</h2>
<form action="" method="post">
    <div class="modal-body">
    <div class="form-outline" data-mdb-input-init>
        <input readonly name="maKhenThuong" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMKT']) ? $_GET['paramMKT'] : ''; ?>" />
        <label class="form-label">Mã khen thưởng</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input readonly name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['maNhanVien']) ? $data[0][0]['maNhanVien'] : ''; ?>">
        <label class="form-label">Mã nhân viên</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="tenDotKhenThuong" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['tenDotKhenThuong']) ? $data[0][0]['tenDotKhenThuong'] : ''; ?>">
        <label class="form-label">Tên đợt khen thưởng</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="soQuyetDinh" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['soQuyetDinh']) ? $data[0][0]['soQuyetDinh'] : ''; ?>">
        <label class="form-label">Số quyết định khen thưởng</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="ngayKhenThuong" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['ngayKhenThuong']) ? $data[0][0]['ngayKhenThuong'] : ''; ?>">
        <label class="form-label">Ngày khen thưởng</label>
    </div>
    
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="loaiKhenThuong" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['loaiKhenThuong']) ? $data[0][0]['loaiKhenThuong'] : ''; ?>">
        <label class="form-label">Loại khen thưởng</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="hinhThucKhenThuong" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['hinhThucKhenThuong']) ? $data[0][0]['hinhThucKhenThuong'] : ''; ?>">
        <label class="form-label">Hình thức khen thưởng</label>
    </div>
    <div class="d-flex mt-4">
        <p class="me-3">Trạng thái khen thưởng</p>
        <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="trangThai" value="Đã trao thưởng"
            <?php echo ($data[0][0]['trangThai'] == 'Đã trao thưởng') ? 'checked' : ''; ?>>
            <label class="form-check-label">
                Đã trao thưởng
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="trangThai" value="Đã duyệt"
            <?php echo ($data[0][0]['trangThai'] == 'Đã duyệt') ? 'checked' : ''; ?>>
            <label class="form-check-label">
            Đã duyệt
            </label>
        </div>
        <div class="form-check ms-3">
            <input classc="form-check-input" type="radio" name="trangThai" value="Chưa duyệt"
            <?php echo ($data[0][0]['trangThai'] == 'Chưa duyệt') ? 'checked' : ''; ?>>
            <label class="form-check-label">
            Chưa duyệt
            </label>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" name="saveChange">Lưu</button>
    <button class="btn btn-danger" type="submit" name="delete_bonus">Xóa</button>
</form>

<?php
    if(isset($_POST['saveChange'])) {
        require_once('./Controllers/BonusController.php');
        $controller = new BonusController();
        $controller->handleChangeBonus();
    } else if(isset($_POST['delete_bonus'])) {
        require_once('./Controllers/BonusController.php');
        $controller = new BonusController();
        $controller->handleDeleteBonus();
    }
?>