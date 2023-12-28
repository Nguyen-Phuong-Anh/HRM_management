<style>
    body {
        color: #566787;
		background: #f5f5f5;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        cursor: context-menu;
    }

	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
	.table-title {
		color: #fff;
		background: #4b5366;		
		padding: 16px 25px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.show-entries select.form-control {        
        width: 60px;
		margin: 0 5px;
	}
	.table-filter .filter-group {
        float: right;
		margin-left: 15px;
    }
	.table-filter input, .table-filter select {
		height: 34px;
		border-radius: 3px;
		border-color: #ddd;
        box-shadow: none;
	}
	.table-filter {
		padding: 5px 0 15px;
		border-bottom: 1px solid #e9e9e9;
		margin-bottom: 5px;
	}

	.table-filter label {
		font-weight: normal;
		margin-left: 10px;
	}
	.table-filter select, .table-filter input {
		display: inline-block;
		margin-left: 5px;
	}
	.table-filter input {
		width: 200px;
		display: inline-block;
	}
	.filter-group select.form-control {
		width: 110px;
	}
	.filter-icon {
		float: right;
		margin-top: 7px;
	}
	.filter-icon i {
		font-size: 18px;
		opacity: 0.7;
	}	
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 80px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.view {        
		width: 30px;
		height: 30px;
		color: #2196F3;
		border: 2px solid;
		border-radius: 30px;
		text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
		margin: 2px 0 0 1px;
    } 
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

<div class="container mt-5">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Khối lượng giảng dạy</h2>
                </div>
                <h5 class="mt-3">Bộ môn: <?php echo $_GET['tenHP']; ?></h5>
            </div>
        </div>
        <div class="table-filter">
            <div class="row">
                <div class="col">
					<form action="" method="post">
						<div class="filter-group">
							<button type="submit" class="btn btn-primary" name="search_schedule">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
								</svg>
							</button>
						</div>
						<div class="filter-group">
                            <select name="hocky_selector" class="form-select" aria-label="Default select example">
                               <option value="1">Học kỳ 1</option>
                               <option value="2">Học kỳ 2</option>
                            </select>
						</div>
						<div class="filter-group">
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
					</form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã nhân viên</th>
                    <th>Họ và tên</th>
                    <th>Học kỳ</th>
                    <th>Năm học</th>
					<th>Số tiết giảng dạy/ tuần</th>
                    <th>Số tuần giảng dạy</th>
                    <th>Số giờ giảng dạy</th>
                    <th>Nhiệm vụ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody> 
				<?php
					$index = 0;
					if(isset($_POST['search_schedule'])) {
						if(empty($_POST['hocky_selector']) && empty($_POST['namhoc_selector'])) {
							return;
						} else {
							require_once("./Controllers/ScheduleController.php");
							$controller = new ScheduleController();
							$result = $controller->handleSearchSchedule();
                            if(!empty($result)) {
                                foreach($result as $row) {
                                    echo '<tr>';
                                    echo"<td class='table-cell'>".$index."</td>";
                                    echo"<td class='table-cell'>".$row["maNhanVien"]."</td>";
                                    echo"<td class='table-cell'>".$row["hoTen"]."</td>";
                                    echo"<td class='table-cell'>".$row["hocKy"]."</td>";
                                    echo"<td class='table-cell'>".$row["namHoc"]."</td>";
                                    echo"<td class='table-cell'>".$row["soTiet"]."</td>";
                                    echo"<td class='table-cell'>".$row["tuanGiangDay"]."</td>";
                                    echo"<td class='table-cell'>".$row["gioGiangDay"]."</td>";
                                    echo"<td class='table-cell'>".$row["nhiemVu"]."</td>";
                                    echo '<td><a href="?route=change_schedule&paramMGD='.$row['maGiangDay'].'" class="view" title="View Details" data-toggle="tooltip">Sửa</a></td>';
                                    echo '</tr>';
                                    $index++;
                                }
                            }
						}
					} else {
						require_once('./Controllers/ScheduleController.php');
                        $controller = new ScheduleController();
                        $result = $controller->handleGetSchedule();	
						foreach($result as $row) {
							echo '<tr>';
							echo"<td class='table-cell'>".$index."</td>";
                            echo"<td class='table-cell'>".$row["maNhanVien"]."</td>";
                            echo"<td class='table-cell'>".$row["hoTen"]."</td>";
                            echo"<td class='table-cell'>".$row["hocKy"]."</td>";
                            echo"<td class='table-cell'>".$row["namHoc"]."</td>";
                            echo"<td class='table-cell'>".$row["soTiet"]."</td>";
                            echo"<td class='table-cell'>".$row["tuanGiangDay"]."</td>";
                            echo"<td class='table-cell'>".$row["gioGiangDay"]."</td>";
                            echo"<td class='table-cell'>".$row["nhiemVu"]."</td>";
                            echo '<td><a href="?route=change_schedule&paramMGD='.$row['maGiangDay'].'" class="view" title="View Details" data-toggle="tooltip">Sửa</a></td>';
							echo '</tr>';
							$index++;
						}
					}
				?>
            </tbody>
        </table>
    </div>
</div> 