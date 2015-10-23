<?php
//include"../../../config/sambung.php";
$go="content/mod_kontak/aksikontak.php";
$act=isset($_GET['act']) ? $_GET['act'] : '';
switch($act){
	default :
			echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Ilomata</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=kontak&act=tambahkontak'>tambah pemilih</button>
			<button class='btn'>import dari xl</button>
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Daftar Phone Book
                </div>";
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
				}else if($state == 'ubah'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil diubah
							</div>";
				}else if($state == 'hapus'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dihapus
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						<th>nik</th>
						<th>nkk</th>
						<th>nama</th>
						<th>tps</th>
						<th>#</th>
						<th>#</th>
						<th>#</th>
					</tr></thead><tbody>";
					$no=1;
			$query="select * from pemilih where ID_DESA=6";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				<td>".$data['NIK']."</td>
				<td>".$data['NKK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$data['TPS']."</td>
				<td align='center'><a href=?syafrin=kontak&act=send&id=".$data['DP_ID']."><i class='fa fa-envelope fa-fw'></i></a></td>
				<td align='center'><a href=?syafrin=kontak&act=editkontak&id=".$data['DP_ID']."><i class='fa fa-edit'></i></a></td>
				<td align='center'><a href='$go?syafrin=kontak&perintah=hapus&id=".$data['DP_ID']."' onclick=\"return confirm('yakin akan menghapus data ini ?')\">
				<i class='fa fa-trash-o'></i></a></td>
			</tr>";
			$no++;
			}
			echo"</tbody></table>
			</div>
			  </div>
			</div>
		  </div>
		</div></div>";
break;
case "send" :
			$sel=mysqli_query($konek,"select * from kontak where idkontak='$_GET[id]'");
			$dapet=mysqli_fetch_array($sel); ?>
			  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Kirim Sms</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sms
                        </div>
							<div class="panel-body">
							<div class="row">
							<div class="col-lg-6">
			 <?php echo "
          <form class='form-group' role='form' method=\"POST\"  action=\"$go?syafrin=kirimsms&perintah=sendto\">
			
          <div class='form-group'>
			<label>Kepada</label>
			<input class='form-control' type='text' name='nama' value='".$dapet['nama']."' disabled>
		  </div>
		  <div class='form-group'>
			<label>Nomor</label>
			<input class='form-control' type='text' name='nomor' value='".$dapet['nohp']."'>			
		  </div>
		  <div class='form-group'>
			<label>Sms</label>
			<textarea class='form-control' name='isi' id='lokomedia' style='width: 800px; height: 180px;' required></textarea>
		  </div>
         <button class='btn btn-success' type='submit' name='kirim'>kirim</button>
                                <button class='btn btn-danger' type='button' value='Batal' onclick='self.history.back()'>batal</button></td></tr>
        
          </form>"; ?>
		   </div>
						</div>
					</div>
				</div>
			</div>
<?php
break;
case 'tambahkontak' :
			echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Input Kontak</h2>
					</div>
				</div>
				<div class='row'>
				<div class='col-lg-12'>
				<div class='panel panel-default'>
							<div class='panel-heading'>
								Kontak 
							</div>
						<div class='panel-body'>
						<div class='row'>
						<div class='col-lg-6'>
				
			<form  role='form' class='form-group' method='post' action='$go?syafrin=kontak&perintah=simpan'>
				<div class='form-group'>
				<label>nama</label>
				<input class='form-control' type='text' name='nama' size='20' style='width:300px;' required>
				</div>
				<div class='form-group'>
					<label>Nomor Telpon/Hp</label>
					<input class='form-control' type='text' name='telpon' style='width:300px;' size='40' required>
				</div>
				<div class='form-group'>
					<label>email</label>
					<select name='grup'>
						<option value='' selected>:. pilih .:</option>";
						$rt=mysqli_query($konek,"select * from groupk");
						while($get=mysqli_fetch_array($rt)){
							echo"<option value='".$get['idgroup']."'>".$get['nmgroup']."</option>";
						}
						echo"</select>
				</div>
				<div class='form-group'>
				<label>Alamat</label>
				<input class='form-control' type='text' name='alamat' size='20' style='width:300px;' required>
				</div>
				<div class='form-group'>
					<button type='submit' name='simpan' class='btn btn-success'>simpan</button>
					<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
				</div>
			
			</form></div></div></div></div></div></div>";
break;
case 'editkontak' :
			$fg=mysqli_query($konek, "select * from kontak where idkontak='".$_GET['id']."'");
			$h=mysqli_fetch_array($fg);
			echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Edit Kontak</h2>
					</div>
				</div>
				<div class='row'>
				<div class='col-lg-12'>
				<div class='panel panel-default'>
							<div class='panel-heading'>
								Kontak 
							</div>
						<div class='panel-body'>
						<div class='row'>
						<div class='col-lg-6'>
				
			<form  role='form' class='form-group' method='post' action='$go?syafrin=kontak&perintah=update'>
			<input type='hidden' name='key' value='".$h['idkontak']."'>
				<div class='form-group'>
				<label>nama</label>
				<input class='form-control' type='text' name='nama' size='20' style='width:300px;' value='".$h['nama']."' required>
				</div>
				<div class='form-group'>
					<label>Nomor Telpon/Hp</label>
					<input class='form-control' type='text' name='telpon' style='width:300px;' size='40' value='".$h['nohp']."' required>
				</div>
				<div class='form-group'>
					<label>email</label>
					<select name='grup'>
						<option value='' selected>:. pilih .:</option>";
						$rt=mysqli_query($konek,"select * from groupk");
						while($get=mysqli_fetch_array($rt)){
							if($h['idgroup']== $get['idgroup']){
								echo"<option value='".$get['idgroup']."' selected>".$get['nmgroup']."</option>";
							}else{
							
							echo"<option value='".$get['idgroup']."'>".$get['nmgroup']."</option>";
							}
						}
						echo"</select>
				</div>
				<div class='form-group'>
				<label>Alamat</label>
				<input class='form-control' type='text' name='alamat' size='20' style='width:400px;' value='".$h['alamat']."' required>
				</div>
				<div class='form-group'>
					<button type='submit' name='ubah' class='btn btn-success'>simpan</button>
					<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
				</div>
			
			</form></div></div></div></div></div></div>";
break;


}
?>