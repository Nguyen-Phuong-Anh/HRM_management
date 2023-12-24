<form action="" method="post">
  <h2 class="mb-4 mt-3">Tạo nhân viên</h2>
  <div class="modal-body">
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="bangCap" type="text" class="form-control form-control-lg">
            <label class="form-label">Bằng cấp</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="chucVu" type="text" class="form-control form-control-lg">
            <label class="form-label">Chức vụ</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="phongBan" type="text" class="form-control form-control-lg">
            <label class="form-label">Phòng ban</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="khoa" type="text" class="form-control form-control-lg">
            <label class="form-label">Khoa</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="email" type="text" class="form-control form-control-lg">
            <label class="form-label">Email</label>
        </div>

        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="ngayBatDau" type="date" class="form-control form-control-lg">
            <label class="form-label">Ngày bắt đầu</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="ngayKetThuc" type="date" class="form-control form-control-lg">
            <label class="form-label">Ngày kết thúc</label>
        </div>

  <button type="submit" name="create_prf" class="btn btn-primary mt-4 mb-2" data-mdb-ripple-init>Save</button>
</form>

<?php
  if(isset($_POST['create_prf'])) {
    require_once('./Controllers/ProfileController.php');
    $controller = new ProfileController();
    $controller->handleCreateEmployee();
  }
?>