<form action="" method="post">
  <h2 class="mb-4 mt-3">Tạo hồ sơ</h2>
  <div class="form-outline" data-mdb-input-init>
    <input name="hoTen" type="text" class="form-control form-control-lg" />
    <label class="form-label">Họ và tên</label>
  </div>

  <div class="d-flex mt-4">
    <p class="me-3">Giới tính</p>
    <div class="form-check me-3">
      <input class="form-check-input" type="radio" name="gioiTinh" value="Nam">
      <label class="form-check-label">
        Nam
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gioiTinh" value="Nữ">
      <label class="form-check-label">
        Nữ
      </label>
    </div>
  </div>

  <div class="form-outline mt-3" data-mdb-input-init>
    <input name="ngaySinh" type="date" class="form-control form-control-lg" />
    <label class="form-label">Ngày sinh</label>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="queQuan" type="text" class="form-control form-control-lg" />
    <label class="form-label">Nguyên quán</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="hoKhauThuongTru" type="text" class="form-control form-control-lg" />
    <label class="form-label">Nơi đăng ký hộ khẩu thường trú</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="diaChi" type="text" class="form-control form-control-lg" />
    <label class="form-label">Địa chỉ</label>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="dienThoai" type="text" class="form-control form-control-lg" />
    <label class="form-label">Điện thoại</label>
  </div>

  <div class="d-flex">
    <div class="form-outline mt-4" data-mdb-input-init>
      <input name="danToc" type="text" class="form-control form-control-lg" />
      <label class="form-label">Dân tộc</label>
    </div>
    <div class="form-outline mt-4 ms-3" data-mdb-input-init>
      <input name="tonGiao" type="text" class="form-control form-control-lg" />
      <label class="form-label">Tôn giáo</label>
    </div>
  </div>

  <div class="d-flex">
    <div class="form-outline mt-4" data-mdb-input-init>
      <input name="CCCD" type="text" class="form-control form-control-lg" />
      <label class="form-label">CCCD</label>
    </div>
    <div class="form-outline mt-4 ms-3" data-mdb-input-init>
      <input name="CCCDNgayCap" type="date" class="form-control form-control-lg" />
      <label class="form-label">Ngày cấp</label>
    </div>
    <div class="form-outline mt-4 ms-3" data-mdb-input-init>
      <input name="CCCDNoiCap" type="text" class="form-control form-control-lg" />
      <label class="form-label">Nơi cấp</label>
    </div>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="trinhDoVanHoa" type="text" class="form-control form-control-lg" />
    <label class="form-label">Trình độ văn hóa</label>
  </div>
  <div class="d-flex">
    <div class="form-outline mt-4" data-mdb-input-init>
      <input name="noiKetNapDoan" type="text" class="form-control form-control-lg" />
      <label class="form-label">Nơi kết nạp đoàn</label>
    </div>
    <div class="form-outline mt-4 ms-3" data-mdb-input-init>
      <input name="ngayKetNapDoan" type="date" class="form-control form-control-lg" />
      <label class="form-label">Ngày kết nạp đoàn</label>
    </div>
  </div>
  <div class="d-flex">
    <div class="form-outline mt-4" data-mdb-input-init>
      <input name="noiKetNapDang" type="text" class="form-control form-control-lg" />
      <label class="form-label">Nơi kết nạp đảng</label>
    </div>
    <div class="form-outline mt-4 ms-3" data-mdb-input-init>
      <input name="ngayKetNapDang" type="date" class="form-control form-control-lg" />
      <label class="form-label">Ngày kết nạp đảng</label>
    </div>
  </div>

  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="khenThuong" type="text" class="form-control form-control-lg" />
    <label class="form-label">Khen thưởng</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="kyLuat" type="text" class="form-control form-control-lg" />
    <label class="form-label">Kỷ luật</label>
  </div>
  <div class="form-outline mt-4" data-mdb-input-init>
    <input name="soTruong" type="text" class="form-control form-control-lg" />
    <label class="form-label">Sở trường</label>
  </div>

  <button type="submit" name="create_prf" class="btn btn-primary mt-4 mb-2" data-mdb-ripple-init>Save</button>
</form>

<?php
  if(isset($_POST['create_prf'])) {
    require_once('./Controllers/ProfileController.php');
    $controller = new ProfileController();
    $controller->handleCreateProfile();
  }
?>