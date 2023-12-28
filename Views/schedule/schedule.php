<?php
	require_once('./Controllers/ScheduleController.php');
	$controller = new ScheduleController();
	$result = $controller->handleGetKhoaList();
	$khoa = array();
	$hocphan = array();
	while ($row = mysqli_fetch_assoc($result[0])) {
		$khoa[] = $row;
	}
	while ($row = mysqli_fetch_assoc($result[1])) {
		$hocphan[] = $row;
	}
?>

<style>
	a {
		color: black;
	}
</style>

<div class="row mt-5">
	<h1>Khối lượng giảng dạy</h1>
  	<div class="col-4">
		<div class="list-group list-group-light" id="list-tab" role="tablist">
			<?php
				$index = 0;
				foreach($khoa as $row) {
					if($index === 0) {
						$tenKhoa = str_replace(' ', '', $row['tenKhoa']);
						echo '<a class="list-group-item list-group-item-action active px-3 border-0" 
						id="list-'.$tenKhoa.'-list"
						data-mdb-list-init href="#list-'.$tenKhoa.'" role="tab" 
						aria-controls="list-'.$tenKhoa.'">'.$row['tenKhoa'].'</a>';
					} else {
						$tenKhoa = str_replace(' ', '', $row['tenKhoa']);
						echo '<a class="list-group-item list-group-item-action px-3 border-0" 
						id="list-'.$tenKhoa.'-list"
						data-mdb-list-init href="#list-'.$tenKhoa.'" role="tab" 
						aria-controls="list-'.$tenKhoa.'">'.$row['tenKhoa'].'</a>';
					}
					$index++;
				}
			?>
		</div>
	</div>
	<div class="col-8">
		<div class="tab-content" id="nav-tabContent">
			<?php
				$index = 0;
				foreach($khoa as $row) {
					$tenKhoa = str_replace(' ', '', $row['tenKhoa']);
					if($index === 0) {
						echo '<div class="tab-pane fade active show" id="list-'.$tenKhoa.'" role="tabpanel"
						aria-labelledby="list-'.$row['tenKhoa'].'-list">';
					} else {
						echo '<div class="tab-pane fade" id="list-'.$tenKhoa.'" role="tabpanel"
						aria-labelledby="list-'.$row['tenKhoa'].'-list">';
					}
					echo '<ul class="list-group list-group-light">';
					foreach($hocphan as $row1) {
						if($row['tenKhoa'] === $row1['khoa']) {
							echo '  <li class="list-group-item list-group-item-action px-3"><a href="?route=getSchedule&maHP='.$row1['maHocPhan'].'&tenHP='.$row1['tenHocPhan'].'">'.$row1['tenHocPhan'].'</a></li>';
						}
					}
					echo '</ul>';
					echo '</div>';
					$index++;
				}
			?>
		</div>
	</div>
</div>