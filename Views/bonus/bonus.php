<?php
	require_once('./Controllers/ProfileController.php');
	$controller = new ProfileController();
	$result = $controller->handleGetProfileFilter();	
?>

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
                    <h2>Bảng khen thưởng</h2>
                </div>
                <div class="col-sm-8" style="display: flex; justify-content: end;">						
                    <form action="" method="post">
						<button class="btn btn-light me-2" name="refresh">
							<span class="pe-2 pb-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
									<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
								</svg>
							</span>
						<span>Refresh</span></button>
					</form>
                </div>
            </div>
        </div>
        <div class="table-filter">
            <div class="row">
                <div class="col">
					<form action="" method="post">
						<div class="filter-group">
							<button type="submit" class="btn btn-primary" name="search_bonus">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
								</svg>
							</button>
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
						<div class="filter-group">
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
					</form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên nhân viên</th>
                    <th>Tên đợt khen thưởng</th>
                    <th>Số quyết định</th>						
                    <th>Ngày khen thưởng</th>						
                    <th>Loại khen thưởng</th>
                    <th>Hình thức khen thưởng</th>
                    <th>Trạng thái khen thưởng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody> 
				<?php
					$index = 0;
					if(isset($_POST['search_bonus'])) {
						if(empty($_POST['khoa']) && empty($_POST['phongBan'])) {
							return;
						} else {
							require_once("./Controllers/BonusController.php");
							$controller = new BonusController();
							$result = $controller->handleSearchBonus();
                            if(!empty($result)) {
                                foreach($result as $row) {
                                    echo '<tr>';
                                    echo"<td class='table-cell'>".$index."</td>";
                                    echo"<td class='table-cell'>".$row["hoTen"]."</td>";
                                    echo"<td class='table-cell'>".$row["tenDotKhenThuong"]."</td>";
                                    echo"<td class='table-cell'>".$row["soQuyetDinh"]."</td>";
                                    echo"<td class='table-cell'>".$row["ngayKhenThuong"]."</td>";
                                    echo"<td class='table-cell'>".$row["loaiKhenThuong"]."</td>";
                                    echo"<td class='table-cell'>".$row["hinhThucKhenThuong"]."</td>";
                                    echo"<td class='table-cell'>".$row["trangThai"]."</td>";
                                    echo '<td><a href="?route=change_bonus&paramMKT='.$row['maKhenThuong'].'" class="view" title="View Details" data-toggle="tooltip">Sửa</a></td>';
                                    echo '</tr>';
                                    $index++;
                                }
                            }
						}
					} else {
						require_once('./Controllers/BonusController.php');
						$controller = new BonusController();
						$result = $controller->handleGetBonus();	
						foreach($result[0] as $row) {
							echo '<tr>';
							echo"<td class='table-cell'>".$index."</td>";
							echo"<td class='table-cell'>".$row["hoTen"]."</td>";
							echo"<td class='table-cell'>".$row["tenDotKhenThuong"]."</td>";
							echo"<td class='table-cell'>".$row["soQuyetDinh"]."</td>";
							echo"<td class='table-cell'>".$row["ngayKhenThuong"]."</td>";
							echo"<td class='table-cell'>".$row["loaiKhenThuong"]."</td>";
							echo"<td class='table-cell'>".$row["hinhThucKhenThuong"]."</td>";
							echo"<td class='table-cell'>".$row["trangThai"]."</td>";
							echo '<td><a href="?route=change_bonus&paramMKT='.$row['maKhenThuong'].'" class="view" title="View Details" data-toggle="tooltip">Sửa</a></td>';
							echo '</tr>';
							$index++;
						}
					}
				?>
            </tbody>
        </table>
    </div>

</div> 