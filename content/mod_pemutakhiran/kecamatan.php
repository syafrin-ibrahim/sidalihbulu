<?php
//include"../../../config/sambung.php";
$go="content/mod_pemutakhiran/aksimu.php";
$act=isset($_GET['act']) ? $_GET['act'] : '';
switch($act){
	default :
			echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Kecamatan Bulango Ulu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu&act=saring'>pemilih tersaring</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu&act=gandanik'>pemilih ganda nik</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu&act=gandanama'>pemilih nama sama</button>
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>";
				$fg=mysqli_query($konek, "select * from pemilih where saring=0");
				$jml=mysqli_num_rows($fg);
				echo" Jumlah Pemilih Kecamatan Bulango Ulu &nbsp; &nbsp;<strong> $jml</strong>";
                echo"</div>";
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
				}else if($state == 'kembali'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dikembalikan
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						<th>nkk</th>
						<th>nik</th>
						
						<th>nama</th>
						<th>tps</th>
						<th>desa</th>
						
					</tr></thead><tbody>";
					$no=1;
			$query="select * from pemilih where SARING=0 order by NKK asc";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				$desa="";
				if($data['ID_DESA'] == 1){
					$desa="Ilomata";
				}else if($data['ID_DESA'] == 2){
					$desa="Mongiilo";
				}else if($data['ID_DESA'] == 3){
					$desa="Mongiilo Utara";
				}else if($data['ID_DESA'] == 4){
					$desa="Owata";
				}else if($data['ID_DESA'] == 5){
					$desa="Pilolaheya";
				}else if($data['ID_DESA'] == 6){
					$desa="Suka Makmur";
				}
				
				echo"<tr>
				<td>$no</td>
				<td>".$data['NKK']."</td>
				<td>".$data['NIK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$data['TPS']."</td>
				<td>$desa</td>
				
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
case 'saring' : 
		echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Bulango Ulu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu'>lihat pemilih aktif</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Daftar Pemilih tersaring
                </div>";
				$state=isset($_GET['state']) ? $_GET['state'] : '';
				if($state == 'tersaring'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data Berhasil disaring
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
						<th>SARINGAN</th>
						<th>JK</th>
						<th>#</th>
						
					</tr></thead><tbody>";
					$no=1;
			$query="select * from pemilih where SARING!=0";
			$tampilku=mysqli_query($konek, $query);
			$tanda="";
			while($data=mysqli_fetch_array($tampilku)){
			if($data['SARING'] == 1){
				$tanda="Meninggal Dunia";
			}else if($data['SARING'] == 2){
				$tanda="Ganda";
			}else if($data['SARING'] == 3){
				$tanda="Dibawah Umur";
			}else if($data['SARING'] == 4){
				$tanda="Pindah Domisili";
			}else if($data['SARING'] == 5){
				$tanda="Tidak Dikenal";
			}else if($data['SARING'] == 6){
				$tanda="TNI";
			}else if($data['SARING'] == 7){
				$tanda="POLRI";
			}else if($data['SARING'] == 8){
				$tanda="Sakit Jiwa";
			}
			
				echo"<tr>
				<td>$no</td>
				<td>".$data['NIK']."</td>
				<td>".$data['NKK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$tanda."</td>
				<td align='center'>".$data['JK']."</td>
				<td align='center'><a href='$go?syafrin=P_bulu&perintah=kembalikan&id=".$data['DP_ID']."' onclick=\"return confirm('yakin akan mengembalikan data ini ?')\">
				kembalikan</a></td>
				
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
case 'penyaringan' :
		$er=mysqli_query($konek, "select * from pemilih where ID_DESA=4 and DP_ID='".$_GET['id']."'");
				$get=mysqli_fetch_array($er);
				
			echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Saring Data Pemilih</h2>
					</div>
				</div>
				<div class='row'>
				<div class='col-lg-12'>
				<div class='panel panel-default'>
							<div class='panel-heading'>
								Pemilih 
							</div>
						<div class='panel-body'>
						<div class='row'>
						<div class='col-lg-6'>
						<form  role='form' class='form-group' method='post' action='$go?syafrin=P_bulu&perintah=penyaringan'>
								<input type='text' name='dp' value='".$get['DP_ID']."'>
									<div class='form-group'>
									<label>DP_ID</label>
									<input class='form-control' type='text' name='dp1' size='20' style='width:300px;' value='".$get['DP_ID']."' disabled>
									</div>
									<div class='form-group'>
										<label>NKK</label>
										<input class='form-control' type='number' name='nkk' style='width:300px;' size='40' value='".$get['NKK']."' disabled>
									</div>
									<div class='form-group'>
										<label>NIK</label>
										<input type='number' name='nik' class='form-control' style='width:300px;' size='40' value='".$get['NIK']."' disabled> 
									</div>
									<div class='form-group'>
										<label>NAMA</label>
										<input type='text' name='nama' class='form-control' style='width:300px;' size='40' value='".$get['NAMA']."' disabled> 
									</div>
						</div>
						<div class='col-lg-6'>
									<div class='form-group'>
										<label>Tanggal Lahir</label>
										<input type='date' name='ttl' class='form-control' style='width:300px;' size='40' value='".$get['TTL']."' disabled> 
									</div>
								
								
								
									<div class='form-group'>
										<label>Tempat Lahir</label>
										<input type='text' name='tmplhr' class='form-control' style='width:300px;' size='40' value='".$get['TMPLAHIR']."' disabled> 
									</div>
									<div class='form-group'>
										<label>Alamat</label>
										<input type='text' name='alamat' class='form-control' style='width:400px;' value='".$get['ALAMAT']."' disabled> 
									</div>
									<div class='form-group'>
										<label>SARING</label><br/>
										<select name='sa' class='form-control' style='width:300px;'>
											<option value=0>:. pilih .:</option>
											<option value=1>MENINGGAL DUNIA</option>
											<option value=2>GANDA</option> 
											<option value=3>DIBAWAH UMUR</option>
											<option value=4>PINDAH DOMISILI</option>
											<option value=5>TIDAK DIKENAL</option>
											<option value=6>TNI</option>
											<option value=7>POLRI</option>
											<option value=8>SAKIT JIWA</option>
										</select>
									</div>
						</div>
						<div class='col-lg-6'>
									<div class='form-group'>
										<button type='submit' name='saring' class='btn btn-success'>saring</button>
										<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
									</div>
						</form>
						</div>
				</div></div></div></div>";
				
break;
case 'gandanama' :
					echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Kecamatan Bulango Ulu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu&act=saring'>pemilih tersaring</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Pemilih Ganda Nama
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
				}else if($state == 'kembali'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dikembalikan
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						
						<th>NAMA</th>
						<th>jml</th>
						<th>#</th>
						
					</tr></thead><tbody>";
					$no=1;
			$query="SELECT NAMA, COUNT(*) as JML from pemilih where SARING=0 group by NAMA HAVING COUNT(NAMA) > 1";//"select * from pemilih where ID_DESA=4 and SARING=0";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td>".$data['NAMA']."</td>
				<td>".$data['JML']."</td>
				
				<td align='center'><a href='?syafrin=P_bulu&act=lihatgnama&k=".$data['NAMA']."'>lihat</a></td>
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
case 'gandanik' :
					echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Bulango Ulu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu&act=saring'>pemilih tersaring</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Pemilih Ganda Nik
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
				}else if($state == 'kembali'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dikembalikan
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						
						<th>NIK</th>
						<th>NAMA</th>
						<th>JML</th>
						<th>#</th>
						
					</tr></thead><tbody>";
					$no=1;
			$query="SELECT NIK, NAMA, COUNT(*) as JML from pemilih where NIK!=0 and SARING=0 group by NIK HAVING COUNT(NIK) > 1";//"select * from pemilih where ID_DESA=4 and SARING=0";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td>".$data['NIK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$data['JML']."</a></td>
				<td align='center'><a href='?syafrin=P_bulu&act=lihatgnik&k=".$data['NIK']."'>lihat</a></td>
			
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
case 'lihatgnik' : 
			echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Ganda NIK </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_bulu'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick='self.history.back()'>kembali</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Pemilih Kecamatan Bulango Ulu
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
				}else if($state == 'kembali'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dikembalikan
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						
						<th>NKK</th>
						<th>NIK</th>
						<th>NAMA</th>
						<th>TPS</th>
						<th>TTL</th>
						<th>ALAMAT</th>
					</tr></thead><tbody>";
					$no=1;
			$k=$_GET['k'];
			//$query="SELECT NAMA, COUNT(*) as JML from pemilih where ID_DESA=2 and SARING=0 group by NAMA HAVING COUNT(NAMA) > 1";//"select * from pemilih where ID_DESA=2 and SARING=0";
			$tampilku=mysqli_query($konek, "select * from pemilih where SARING=0 and NIK='$k'");
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td align='center'>".$data['NKK']."</td>
				<td align='center'>".$data['NIK']."</td>
				<td align='center'>".$data['NAMA']."</td>
				<td align='center'>".$data['TPS']."</td>
				<td align='center'>".$data['TTL']."</td>
				<td align='center'>".$data['ALAMAT']."</td>
				
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
case 'lihatgnama' : 
			echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Ganda Nama </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata1'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick='self.history.back()'>kembali</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Pemilih Kecamatan Bulango Ulu
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
				}else if($state == 'kembali'){
						echo"<div class='panel-body'>
								<div class='alert alert-success'>
                                Data berhasil dikembalikan
							</div>";
				}
				
                echo"<div class='table-responsive'>
			<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
				<thead>
					<tr>
						<th>no</th>
						
						<th>NKK</th>
						<th>NIK</th>
						<th>NAMA</th>
						<th>TPS</th>
						<th>TTL</th>
						<th>ALAMAT</th>
					</tr></thead><tbody>";
					$no=1;
			$k=$_GET['k'];
			//$query="SELECT NAMA, COUNT(*) as JML from pemilih where ID_DESA=2 and SARING=0 group by NAMA HAVING COUNT(NAMA) > 1";//"select * from pemilih where ID_DESA=2 and SARING=0";
			$tampilku=mysqli_query($konek, "select * from pemilih where SARING=0 and NAMA like '%$k%'");
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td>".$data['NKK']."</td>
				<td>".$data['NIK']."</td>
				<td align='center'>".$data['NAMA']."</td>
				<td align='center'>".$data['TPS']."</td>
				<td align='center'>".$data['TTL']."</td>
				<td align='center'>".$data['ALAMAT']."</td>
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

}
?>