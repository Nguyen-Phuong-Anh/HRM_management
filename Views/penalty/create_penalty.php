<form action="" method="post">
  <h2 class="mb-4 mt-3">Tạo hồ sơ</h2>
  <div class="form-outline" data-mdb-input-init>
    <input readonly name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMNV']) ? $_GET['paramMNV'] : ''; ?>" />
    <label class="form-label">Mã nhân viên</label>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="loaiHinhKyLuat" type="text" class="form-control form-control-lg" />
    <label class="form-label">Loại hình kỷ luật</label>
  </div>
  <div class="form-outline mt-3" data-mdb-input-init>
    <input required name="ngayKyLuat" type="date" class="form-control form-control-lg" />
    <label class="form-label">Ngày kỷ luật</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="hinhThucKyLuat" type="text" class="form-control form-control-lg" />
    <label class="form-label">Hình thức kỷ luật</label>
  </div>
  <div class="d-flex mt-4">
    <p class="me-3">Trạng thái kỷ luật</p>
    <div class="form-check me-3">
      <input class="form-check-input" type="radio" name="trangThai" value="Đã kỷ luật">
      <label class="form-check-label">
        Đã kỷ luật
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="trangThai" value="Đã duyệt">
      <label class="form-check-label">
      Đã duyệt
      </label>
    </div>
    <div class="form-check ms-3">
      <input class="form-check-input" type="radio" name="trangThai" value="Chưa duyệt">
      <label class="form-check-label">
      Chưa duyệt
      </label>
    </div>
  </div>
  <button type="submit" name="create_penalty" class="btn btn-primary mt-3 mb-2" data-mdb-ripple-init>Lưu</button>
</form>

<?php
  if(isset($_POST['create_penalty'])) {
    require_once('./Controllers/PenaltyController.php');
    $controller = new PenaltyController();
    $controller->handleCreatePenalty();
  }
?>