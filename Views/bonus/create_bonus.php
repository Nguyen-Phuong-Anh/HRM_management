<form action="" method="post">
  <h2 class="mb-4 mt-3">Tạo khen thưởng</h2>
  <div class="form-outline" data-mdb-input-init>
    <input readonly name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMNV']) ? $_GET['paramMNV'] : ''; ?>" />
    <label class="form-label">Mã nhân viên</label>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="tenDotKhenThuong" type="text" class="form-control form-control-lg" />
    <label class="form-label">Tên đợt khen thưởng</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="soQuyetDinh" type="text" class="form-control form-control-lg" />
    <label class="form-label">Số quyết định khen thưởng</label>
  </div>
  <div class="form-outline mt-3" data-mdb-input-init>
    <input required name="ngayKhenThuong" type="date" class="form-control form-control-lg" />
    <label class="form-label">Ngày khen thưởng</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="loaiKhenThuong" type="text" class="form-control form-control-lg" />
    <label class="form-label">Loại khen thưởng</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input required name="hinhThucKhenThuong" type="text" class="form-control form-control-lg" />
    <label class="form-label">Hình thức khen thưởng</label>
  </div>
  <div class="d-flex mt-4">
    <p class="me-3">Trạng thái khen thưởng</p>
    <div class="form-check me-3">
      <input class="form-check-input" type="radio" name="trangThai" value="Đã trao thưởng">
      <label class="form-check-label">
        Đã trao thưởng
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
  <button type="submit" name="create_bonus" class="btn btn-primary mt-3 mb-2" data-mdb-ripple-init>Lưu</button>
</form>

<?php
  if(isset($_POST['create_bonus'])) {
    require_once('./Controllers/BonusController.php');
    $controller = new BonusController();
    $controller->handleCreateBonus();
  }
?>