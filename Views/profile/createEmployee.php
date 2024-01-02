<?php
    require_once('./Controllers/ProfileController.php');
	$controller = new ProfileController();
	$result = $controller->handleGetProfileFilter();
?>
<form action="" method="post">
  <h2 class="mb-4 mt-5">Tạo nhân viên</h2>
  <div class="modal-body">
        <div class="form-outline mt-3" data-mdb-input-init>
            <input required name="bangCap" type="text" class="form-control form-control-lg">
            <label class="form-label">Bằng cấp</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input required name="chucVu" type="text" class="form-control form-control-lg">
            <label class="form-label">Chức vụ</label>
        </div>
        <div class="filter-group mt-3">
            <label>Phòng ban</label>
            <select class="form-control" name="phongBan">
                <option value="">Tất cả</option>
                <?php
                    while ($row = mysqli_fetch_assoc($result[1])) {
                        echo '<option value="'.$row['tenPB'].'">'.$row['tenPB'].'</option>';
                    }
                ?>					
            </select>
        </div>
        <div class="filter-group">
            <label>Khoa</label>
            <select class="form-control" name="khoa">
                <option value="">Tất cả</option>
                <?php
                    while ($row = mysqli_fetch_assoc($result[0])) {
                        echo '<option value="'.$row['tenKhoa'].'">'.$row['tenKhoa'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="email" type="email" class="form-control form-control-lg">
            <label class="form-label">Email</label>
        </div>

        <div class="form-outline mt-3" data-mdb-input-init>
            <input required name="ngayBatDau" type="date" class="form-control form-control-lg">
            <label class="form-label">Ngày bắt đầu</label>
        </div>
        <div class="form-outline mt-3" data-mdb-input-init>
            <input name="ngayKetThuc" type="date" class="form-control form-control-lg">
            <label class="form-label">Ngày kết thúc</label>
        </div>

  <button type="submit" name="create_prf" class="btn btn-primary mt-4 mb-2" data-mdb-ripple-init>Lưu</button>
</form>

<?php
  if(isset($_POST['create_prf'])) {
    require_once('./Controllers/ProfileController.php');
    $controller = new ProfileController();
    $controller->handleCreateEmployee();
  }
?>