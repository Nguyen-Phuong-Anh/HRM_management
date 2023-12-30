<?php
    require_once("./Controllers/ScheduleController.php");
    $controller = new ScheduleController();
    $result = $controller->handleGetSearchHP();
?>

<form action="" method="post">
    <h2 class="mb-4 mt-5">Thêm khối lượng giảng dạy</h2>
    <div class="form-outline" data-mdb-input-init>
        <input readonly name="maNhanVien" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMNV']) ? $_GET['paramMNV'] : ''; ?>" />
        <label class="form-label">Mã nhân viên</label>
    </div>

    <div class="form-outline mt-4" data-mdb-input-init>
        <input required name="soTiet" type="number" class="form-control form-control-lg" />
        <label class="form-label" >Số tiết giảng dạy/ tuần</label>
    </div>

    <div class="form-outline mt-4" data-mdb-input-init>
        <input required name="soTuanGiangDay" type="number" class="form-control form-control-lg" />
        <label class="form-label" >Số tuần giảng dạy</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input required name="nhiemVu" type="text" class="form-control form-control-lg" />
        <label class="form-label">Nhiệm vụ</label>
    </div>

    <div class="form-outline mt-4" data-mdb-input-init>
        <label class="form-label">Học kỳ</label>
        <select name="hocky_selector" class="form-select" aria-label="Default select example">
            <option value="1">Học kỳ 1</option>
            <option value="2">Học kỳ 2</option>
        </select>
    </div>
    <div class="form-outline mt-4" data-mdb-input-init>
        <label class="form-label">Năm học</label>  
        <select name="namhoc_selector" class="form-select" aria-label="Default select example">
        <?php
            $currentYear = 2000;
            for($a = 1; $a < 30; $a++) {
                $year = $currentYear + 1;
                echo '<option value="Năm học '.$currentYear.' - '.$year.'">Năm học '.$currentYear.' - '.$year.'</option>';
                ++$currentYear;
            }
        ?>
        </select>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <label class="form-label">Học phần</label>
        <select class="form-select" name="hocPhan">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'.$row['maHocPhan'].'">'.$row['tenHocPhan'].'</option>';
                }
            ?>
        </select>
    </div>
    
    <button type="submit" name="create_schedule" class="btn btn-primary mt-3 mb-2" data-mdb-ripple-init>Lưu</button>
</form>

<?php
  if(isset($_POST['create_schedule'])) {
    require_once('./Controllers/ScheduleController.php');
    $controller = new ScheduleController();
    $controller->handleCreateSchedule();
  }
?>