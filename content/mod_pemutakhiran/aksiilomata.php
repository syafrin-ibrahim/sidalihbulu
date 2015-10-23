<?php
include"../../config/koneksi.php";

$act=isset($_GET['act']) ? $_GET['act'] : '';
$syafrin=$_GET['syafrin'];
$perintah=$_GET['perintah'];


if($syafrin=='P_ilomata' && $perintah=='simpan'){
	if(isset($_POST['simpan'])){
			$sql="insert into pemilih(DP_ID, NKK, NIK, NAMA, TTL, TMPLAHIR, JK, ALAMAT, DUSUN, RT, RW, TPS, DISABILITAS, SARING, SUMBER, STS_KAWIN, ID_DESA)
						values('".$_POST['dp']."','".$_POST['nkk']."','".$_POST['nik']."','".$_POST['nama']."','".$_POST['ttl']."','".$_POST['tmplhr']."','".$_POST['jk']."',
								'".$_POST['alamat']."','".$_POST['dusun']."','".$_POST['rt']."','".$_POST['rw']."','".$_POST['tps']."','".$_POST['dis']."','0',
								'".$_POST['sumber']."','".$_POST['sts']."','1')";
		
			$simpan=mysqli_query($konek, $sql);
			if($simpan){
					header("location:../../halaman.php?syafrin=P_ilomata&state=berhasil");
			}else{
					echo"data gagal bro";
			}
	}
}else if($syafrin=='P_ilomata' && $perintah=='update'){
		if(isset($_POST['ubah'])){
			$key=$_POST['dp'];
			$wrt="update pemilih set DP_ID='".$_POST['dp1']."', NKK='".$_POST['nkk']."', NIK='".$_POST['nik']."', NAMA='".$_POST['nama']."', TTL='".$_POST['ttl']."',
								TMPLAHIR='".$_POST['tmplhr']."', JK='".$_POST['jk']."', ALAMAT='".$_POST['alamat']."', DUSUN='".$_POST['dusun']."', RT='".$_POST['rt']."',
								RW='".$_POST['rw']."', TPS='".$_POST['tps']."', DISABILITAS='".$_POST['dis']."',
								SUMBER='".$_POST['sumber']."', STS_KAWIN='".$_POST['sts']."', ID_DESA='1' where DP_ID='$key'";
			$eg=mysqli_query($konek, $wrt);
			if($eg){
				header("location:../../halaman.php?syafrin=P_ilomata&state=ubah");
			}else{
				echo"data gagal diubah";
			}
			
		}
}else if($syafrin=='P_ilomata' && $perintah == 'hapus'){
		$hapus=mysqli_query($konek, "delete from pemilih where DP_ID='".$_GET['id']."'");
		if($hapus){
			header("location:../../halaman.php?syafrin=P_ilomata&state=hapus");
		}else{
			echo"data gagal dihapus";
		}
}else if($syafrin=='P_ilomata' && $perintah == 'kembalikan'){
		$kembali=mysqli_query($konek, "update pemilih set SARING=0 where DP_ID='".$_GET['id']."'");
		if($kembali){
			header("location:../../halaman.php?syafrin=P_ilomata&state=kembali");
		}else{
			echo"data gagal dikembalikan";
		}
}else if($syafrin=='P_ilomata' && $perintah == 'penyaringan'){
		
		
		$saring=mysqli_query($konek, "update pemilih set SARING='".$_POST['sa']."' where DP_ID='".$_POST['dp']."'");
		if($saring){
			header("location:../../halaman.php?syafrin=P_ilomata&act=saring&state=tersaring");
		}else{
			echo"data gagal disaring";
		}
}

?>