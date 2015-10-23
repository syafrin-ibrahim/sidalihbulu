<?php
//include"../../../config/sambung.php";
$go="content/mod_import/aksiimport.php";
$act=isset($_GET['act']) ? $_GET['act'] : '';
switch($act){
	default :
					echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Import Data Pemilih</h2>
					</div>
				</div>
				<div class='row'>
				<div class='col-lg-12'>
				<div class='panel panel-default'>
							<div class='panel-heading'>
								Data Pemilih
							</div>
						<div class='panel-body'>
						<div class='row'>
						<div class='col-lg-6'>";
						$state=isset($_GET['state']) ? $_GET['state'] : '';
				if($state == 'berhasil'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data Berhasil disimpan
							</div>";
				}else if($state == 'gagal'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data gagal disimpan
							</div>";
				}
				echo"
			<form  role='form' class='form-group' method='post' action='$go' enctype='multipart/form-data'>
				<div class='form-group'>
				<label>PILIH FILE XL (2003)</label>
				<input class='form-control' type='file' name='file' style='width:300px;' required>
				</div>
				<div class='form-group'>
					<label>desa</label>
					<select name='desa'>
						<option value='' selected>:. pilih desa.:</option>";
						$rt=mysqli_query($konek,"select * from desa");
						while($get=mysqli_fetch_array($rt)){
							echo"<option value='".$get['ID_DESA']."'>".$get['NMDESA']."</option>";
						}
						echo"</select>
				</div>
				
				<div class='form-group'>
					<button type='submit' name='simpan' class='btn btn-success'>simpan</button>
					<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
				</div>
			
			</form></div></div></div></div></div></div>";
break;


}
?>