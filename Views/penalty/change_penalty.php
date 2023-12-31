<?php
    require_once('./Controllers/PenaltyController.php');
    $controller = new PenaltyController();
    $data = $controller->handleGetSearchPenalty();
?>

<h2 class="mt-5">Sửa kỷ luật</h2>
<form action="" method="post">
    <div class="modal-body">
    <div class="form-outline" data-mdb-input-init>
        <input readonly name="maKyLuat" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMKL']) ? $_GET['paramMKL'] : ''; ?>" />
        <label class="form-label">Mã kỷ luật</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['maNhanVien']) ? $data[0][0]['maNhanVien'] : ''; ?>">
        <label class="form-label">Mã nhân viên</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="loaiHinhKyLuat" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['loaiHinhKyLuat']) ? $data[0][0]['loaiHinhKyLuat'] : ''; ?>">
        <label class="form-label">Loại hình kỷ luật</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="ngayKyLuat" type="date" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['ngayKyLuat']) ? $data[0][0]['ngayKyLuat'] : ''; ?>">
        <label class="form-label">Ngày kỷ luật</label>
    </div>
    
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="hinhThucKyLuat" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['hinhThucKyLuat']) ? $data[0][0]['hinhThucKyLuat'] : ''; ?>">
        <label class="form-label">Hình thức kỷ luật</label>
    </div>
    <div class="d-flex mt-4">
        <p class="me-3">Trạng thái kỷ luật</p>
        <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="trangThai" value="Đã kỷ luật"
            <?php echo ($data[0][0]['trangThai'] == 'Đã kỷ luật') ? 'checked' : ''; ?>>
            <label class="form-check-label">
                Đã kỷ luật
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
    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">
    Xóa
    </button>
</form>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Bạn có muốn xóa thông tin kỷ luật này?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Đóng</button>
        <form action="" method="post">
            <button class="btn btn-danger" type="submit" name="delete_penalty">Xóa</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
    if(isset($_POST['saveChange'])) {
        require_once('./Controllers/PenaltyController.php');
        $controller = new PenaltyController();
        $controller->handleChangePenalty();
    } else if(isset($_POST['delete_penalty'])) {
        require_once('./Controllers/PenaltyController.php');
        $controller = new PenaltyController();
        $controller->handleDeletePenalty();
    }
?>