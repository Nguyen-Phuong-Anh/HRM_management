<?php
    require_once('./Controllers/ScheduleController.php');
    $controller = new ScheduleController();
    $data = $controller->handleGetSearchSchedule();
?>

<h2 class="mt-5">Khối lượng giảng dạy</h2>
<form action="" method="post">
    <div class="modal-body">
    <div class="form-outline" data-mdb-input-init>
        <input readonly name="maKyLuat" type="text" class="form-control form-control-lg" value="<?php echo isset($_GET['paramMGD']) ? $_GET['paramMGD'] : ''; ?>" />
        <label class="form-label">Mã giảng dạy</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="soTiet" type="number" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['soTiet']) ? $data[0][0]['soTiet'] : ''; ?>">
        <label class="form-label">Số tiết giảng dạy một tuần</label>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="tuanGiangDay" type="number" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['tuanGiangDay']) ? $data[0][0]['tuanGiangDay'] : ''; ?>">
        <label class="form-label">Số tuần giảng dạy</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <input name="nhiemVu" type="text" class="form-control form-control-lg" value="<?php echo isset($data[0][0]['nhiemVu']) ? $data[0][0]['nhiemVu'] : ''; ?>">
        <label class="form-label">Nhiệm vụ</label>
    </div>

    <div class="form-outline mt-3" data-mdb-input-init>
        <label class="form-label">Học kỳ</label>
        <select name="hocky_selector" class="form-select" aria-label="Default select example">
            <option value="1" <?php echo ($data[0][0]['hocKy'] === '1') ? 'selected' : ''; ?>>Học kỳ 1</option>
            <option value="2" <?php echo ($data[0][0]['hocKy'] === '2') ? 'selected' : ''; ?>>Học kỳ 2</option>
        </select>
    </div>
    <div class="form-outline mt-3" data-mdb-input-init>
    <label class="form-label">Năm học</label>  
        <select name="namhoc_selector" class="form-select" aria-label="Default select example">
        <?php
            $currentYear = 2000;
            for($a = 1; $a < 30; $a++) {
                $year = $currentYear + 1;
                $optionValue = 'Năm học ' . $currentYear . ' - ' . $year;
                $selected = ($data[0][0]['namHoc'] == $optionValue) ? 'selected' : '';
                echo '<option value="' . $optionValue . '" ' . $selected . '>' . $optionValue . '</option>';
                ++$currentYear;
            }
        ?>
        </select>
    </div>
    
    <div class="mt-3">
        <button class="btn btn-primary" type="submit" name="saveChange">Lưu</button>
        <button class="btn btn-danger" type="submit" name="delete_schedule">Xóa</button>
    </div>
</form>

<?php
    if(isset($_POST['saveChange'])) {
        require_once('./Controllers/ScheduleController.php');
        $controller = new ScheduleController();
        $controller->handleChangeSchedule();
    } else if(isset($_POST['delete_schedule'])) {
        require_once('./Controllers/ScheduleController.php');
        $controller = new ScheduleController();
        $controller->handleDeleteSchedule();
    }
?>