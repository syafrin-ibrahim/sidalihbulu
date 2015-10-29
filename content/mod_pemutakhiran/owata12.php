<?php
//include"../../../config/sambung.php";
$go="content/mod_pemutakhiran/aksimu.php";
$act=isset($_GET['act']) ? $_GET['act'] : '';
switch($act){
	default :
			echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Owata Tps 1 dan 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=tambah'>input data pemilih</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=saring'>pemilih tersaring</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=gandanik'>pemilih ganda nik</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=gandanama'>pemilih nama sama</button>
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Desa Owata
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
						<th>nkk</th>
						<th>nik</th>
						
						<th>nama</th>
						<th>tps</th>
						<th>#</th>
						<th>#</th>
						<th>#</th>
					</tr></thead><tbody>";
					$no=1;
			$query="select * from pemilih where ID_DESA=4 and SARING=0 order by NKK asc";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				<td>".$data['NKK']."</td>
				<td>".$data['NIK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$data['TPS']."</td>
				<td align='center'><a href=?syafrin=P_owata12&act=penyaringan&id=".$data['DP_ID'].">saring</i></a></td>
				<td align='center'><a href=?syafrin=P_owata12&act=edit&id=".$data['DP_ID']."><i class='fa fa-edit'></i></a></td>
				<td align='center'><a href='$go?syafrin=P_owata12&perintah=hapus&id=".$data['DP_ID']."' onclick=\"return confirm('yakin akan menghapus data ini ?')\">
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
case 'tambah' :
			echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Input Data Pemilih</h2>
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
				
								<form  role='form' class='form-group' method='post' action='$go?syafrin=P_owata12&perintah=simpan'>
									<div class='form-group'>
									<label>DP_ID</label>
									<input class='form-control' type='text' name='dp' size='20' style='width:300px;' placeholder='DP_ID..' >
									</div>
									<div class='form-group'>
										<label>NKK</label>
										<input class='form-control' type='number' name='nkk' style='width:300px;' size='40' placeholder='Nkk...' >
									</div>
									<div class='form-group'>
										<label>NIK</label>
										<input type='number' name='nik' class='form-control' style='width:300px;' size='40' placeholder='Nik...' > 
									</div>
									<div class='form-group'>
										<label>NAMA</label>
										<input type='text' name='nama' class='form-control' style='width:300px;' size='40' placeholder='Nama...' > 
									</div>
									<div class='form-group'>
										<label>Tanggal Lahir</label>
										<input type='date' name='ttl' class='form-control' style='width:300px;' size='40' placeholder='Tanggal Lahir...' > 
									</div>
								
								
								
									<div class='form-group'>
										<label>Tempat Lahir</label>
										<input type='text' name='tmplhr' class='form-control' style='width:300px;' size='40' placeholder='Tempat Lahir...' > 
									</div>
									<div class='form-group'>
										<label>Alamat</label>
										<input type='text' name='alamat' class='form-control' style='width:400px;' placeholder='Alamat...' > 
									</div>
									<div class='form-group'>
										<label>DESA</label><br/>
										<select name='desa' class='form-control' style='width:300px;'>
											<option value='' selected>:. pilih .:</option>
											<option value='1' >Ilomata</option>
											<option value='2' >Mongiilo</option>
											<option value='3' >Mongiilo Utara</option>
											<option value='4' >Owata</option>
											<option value='5' >Pilolaheya</option>
											<option value='6' >Suka Makmur</option>
											</select>
									</div>
									<div class='form-group'>
										<label>Dusun</label>
										<input type='text' name='dusun' class='form-control' style='width:300px;' placeholder='Dusun...' > 
									</div>
						</div>
						<div class='col-lg-6'>
									<div class='form-group'>
										<label>Jenis Kelamin</label>&nbsp;<br/>
										<input type='radio' name='jk' value='pria' checked>pria 
										
										
									
										<input type='radio' name='jk' value='wanita'>wanita
										
									</div>
									
									<div class='form-group'>
										<label>RT</label>
										<input type='number' name='rt' class='form-control' maxlength='2' style='width:80px;' > 
									</div>
									<div class='form-group'>
										<label>RW</label>
										<input type='number' name='rw' class='form-control' maxlength='2' style='width:80px;' > 
									</div>
									<div class='form-group'>
										<label>TPS</label>
										<input type='number' name='tps' class='form-control' maxlength='2' style='width:80px;' > 
									</div>							
									<div class='form-group'>
										<label>DISABILITAS</label><br/>
										<select name='dis' class='form-control' style='width:300px;'>
											<option value='' selected>:. pilih .:</option>
											<option value='1'>Tuna Daksa</option>
											<option value='2'>Tuna Netra</option>
											<option value='3'>Tuna Rungu/Wicara</option>
											<option value='4'>Tuna Grahita</option>
											<option value='4'>Disabilitas Lain</option>
											</select>
									</div>
									
									<div class='form-group'>
										<label>sumber</label><br/>
										<select name='sumber' class='form-control' style='width:300px;'>
											<option value='' selected>:. pilih .:</option>
											<option value='1' >DP4</option>
											<option value='2' >DPT</option>
											<option value='3' >BARU</option>
											
											</select>
									</div>
									<div class='form-group'>
										<label>Status</label>&nbsp;<br/>
										<input type='radio' name='sts' value='S' checked>kawin 				
										<input type='radio' name='sts' value='B'>belum kawin
										<input type='radio' name='sts' value='P'>pernahkawin
									</div>
									
									
								
						</div>
						
						</div>
						<div class='form-group'>
										<button type='submit' name='simpan' class='btn btn-success'>simpan</button>
										<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
						</div>
						</form>
			</div></div></div></div>";
break;
case 'edit' :
				$er=mysqli_query($konek, "select * from pemilih where ID_DESA=4 and DP_ID='".$_GET['id']."'");
				$get=mysqli_fetch_array($er);
				$kunci=$get['DP_ID'];
				$desa=$get['ID_DESA'];
				$disable=$get['DISABILITAS'];
				$saring=$get['SARING'];
				$sumber=$get['SUMBER'];
				$sex=$get['JK'];
				$a="";
				$b="";
				if($sex == 'P'){
						$a="checked";
				}else if($sex == 'W'){
						$b="checked";
				}
				$stskawin=$get['STS_KAWIN'];
				$r="";
				$s="";
				$t="";
				if($stskawin == 'Belum'){
					$r="checked";
				}else if($stskawin == 'Sudah'){
					$s="checked";
				}else if($stskawin == 'Pernah'){
					$t="checked";
				}
				
			echo"
				<div class='row'>
					<div class='col-lg-12'>
						<h2 class='page-header'>Ubah Data Pemilih $get[DP_ID]</h2>
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
				
								<form  role='form' class='form-group' method='post' action='$go?syafrin=P_owata12&perintah=update'>
								<input type='hidden' name='dp' value='".$get['DP_ID']."'>
									<div class='form-group'>
									<label>DP_ID</label>
									<input class='form-control' type='text' name='dp1' size='20' style='width:300px;' value='".$get['DP_ID']."'>
									</div>
									<div class='form-group'>
										<label>NKK</label>
										<input class='form-control' type='number' name='nkk' style='width:300px;' size='40' value='".$get['NKK']."'>
									</div>
									<div class='form-group'>
										<label>NIK</label>
										<input type='number' name='nik' class='form-control' style='width:300px;' size='40' value='".$get['NIK']."'> 
									</div>
									<div class='form-group'>
										<label>NAMA</label>
										<input type='text' name='nama' class='form-control' style='width:300px;' size='40' value='".$get['NAMA']."'> 
									</div>
									<div class='form-group'>
										<label>Tanggal Lahir</label>
										<input type='date' name='ttl' class='form-control' style='width:300px;' size='40' value='".$get['TTL']."'> 
									</div>
								
								
								
									<div class='form-group'>
										<label>Tempat Lahir</label>
										<input type='text' name='tmplhr' class='form-control' style='width:300px;' size='40' value='".$get['TMPLAHIR']."'> 
									</div>
									<div class='form-group'>
										<label>Alamat</label>
										<input type='text' name='alamat' class='form-control' style='width:400px;' value='".$get['ALAMAT']."'> 
									</div>
									<div class='form-group'>
										<label>DESA</label><br/>
										<select name='desa' class='form-control' style='width:300px;'>";
												$query=mysqli_query($konek, "select * from desa");
												while($g=mysqli_fetch_array($query)){
													if($g['ID_DESA'] == $desa){
														echo"<option value='".$g['ID_DESA']."' selected>".$g['NMDESA']."</option>";
													}else{
													echo"<option value='".$g['ID_DESA']."'>".$g['NMDESA']."</option>";
													}
												}
											
											echo"</select>
									</div>
									<div class='form-group'>
										<label>Dusun</label>
										<input type='text' name='dusun' class='form-control' style='width:300px;' value='".$get['DUSUN']."'> 
									</div>
						</div>
						<div class='col-lg-6'>
									
									<div class='form-group'>
										<label>RT</label>
										<input type='number' name='rt' class='form-control' maxlength='2' style='width:80px;' value='".$get['RT']."'> 
									</div>
									<div class='form-group'>
										<label>RW</label>
										<input type='number' name='rw' class='form-control' maxlength='2' style='width:80px;' value='".$get['RW']."'> 
									</div>
									<div class='form-group'>
										<label>TPS</label>
										<input type='number' name='tps' class='form-control' maxlength='2' style='width:80px;' value='".$get['TPS']."'> 
									</div>							
									<div class='form-group'>
										<label>DISABILITAS</label><br/>
										<select name='dis' class='form-control' style='width:300px;'>
											<option value='0'"; if($disable == 0){ echo"selected";}echo" ></option>
											<option value='1'"; if($disable == 1){ echo"selected";}echo" >TUNA DAKSA</option>
											<option value='2'"; if($disable == 2){ echo"selected";}echo" >TUNA NETRA</option> 
											<option value='3'"; if($disable == 3){ echo"selected";}echo" >TUNA RUNGU/TUNA WICARA</option>
											<option value='4'"; if($disable == 4){ echo"selected";}echo" >TUNA GRAHITA</option>
											<option value='5'"; if($disable == 5){ echo"selected";}echo" >DISABILITAS LAINNYA</option>
											</select>
									</div>
									
									<div class='form-group'>
										<label>sumber</label><br/>
										<select name='sumber' class='form-control' style='width:300px;'>
											<option value='DP4'"; if($sumber == 'DP4'){ echo"selected";}echo" >DP4</option>
											<option value='DPT'"; if($sumber == 'DPT'){ echo"selected";}echo" >DPT</option>
											<option value='BARU'"; if($sumber == 'BARU'){ echo"selected";}echo" >BARU</option>
										</select>
									</div>
									<div class='form-group'>
										<label>Jenis Kelamin</label>&nbsp;<br/>
										<input type='radio' name='jk' value='P' $a>pria 
										
										
									
										<input type='radio' name='jk' value='W' $b>wanita
										
									</div>
									
									<div class='form-group'>
										<label>Status</label>&nbsp;<br/>
										<input type='radio' name='sts' value='Kawin' $s>kawin 				
										<input type='radio' name='sts' value='Belum' $r>belum 
										<input type='radio' name='sts' value='Pernah' $t>Pernah 
									</div>
									
									
								
						</div>
						
						</div>
						<div class='form-group'>
										<button type='submit' name='ubah' class='btn btn-success'>simpan</button>
										<button type='button' name='batal' class='btn btn-danger' value='batal' onclick='self.history.back()'>batal</button>
						</div>
						</form>
			</div></div></div></div>";
break;
case 'saring' : 
		echo"<div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Data Pemilih Owata Tps 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12'>lihat pemilih aktif</button>
			
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
			$query="select * from pemilih where ID_DESA=4 and SARING!=0";
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
				<td align='center'><a href='$go?syafrin=P_owata12&perintah=kembalikan&id=".$data['DP_ID']."' onclick=\"return confirm('yakin akan mengembalikan data ini ?')\">
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
						<form  role='form' class='form-group' method='post' action='$go?syafrin=P_owata12&perintah=penyaringan'>
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
                    <h1 class='page-header'>Data Pemilih Owata Tps 1 Dan 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=saring'>pemilih tersaring</button>
			
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
			$query="SELECT NAMA, COUNT(*) as JML from pemilih where ID_DESA=4 and SARING=0 group by NAMA HAVING COUNT(NAMA) > 1";//"select * from pemilih where ID_DESA=4 and SARING=0";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td>".$data['NAMA']."</td>
				<td>".$data['JML']."</td>
				
				<td align='center'><a href='?syafrin=P_owata12&act=lihatgnama&k=".$data['NAMA']."'>lihat</a></td>
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
                    <h1 class='page-header'>Data Pemilih Owata Tps 1 dan 2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12&act=saring'>pemilih tersaring</button>
			
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
			$query="SELECT NIK, NAMA, COUNT(*) as JML from pemilih where ID_DESA=4 and NIK!=0 and SARING=0 group by NIK HAVING COUNT(NIK) > 1";//"select * from pemilih where ID_DESA=4 and SARING=0";
			$tampilku=mysqli_query($konek, $query);
			
			while($data=mysqli_fetch_array($tampilku)){
				echo"<tr>
				<td>$no</td>
				
				<td>".$data['NIK']."</td>
				<td>".$data['NAMA']."</td>
				<td>".$data['JML']."</a></td>
				<td align='center'><a href='?syafrin=P_owata12&act=lihatgnik&k=".$data['NIK']."'>lihat</a></td>
			
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
			<button type='button' class='btn' onclick=window.location.href='?syafrin=P_owata12'>daftar pemilih aktif</button>
			<button type='button' class='btn' onclick='self.history.back()'>kembali</button>
			
			<br/><br/>
			<div class='row'>
            <div class='col-lg-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
                            Desa Owata Tps 2
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
			$tampilku=mysqli_query($konek, "select * from pemilih where ID_DESA=4 and SARING=0 and NIK='$k'");
			
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
			$tampilku=mysqli_query($konek, "select * from pemilih where ID_DESA=4 and SARING=0 and NAMA like '%$k%'");
			
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