<?php

include"../../config/koneksi.php";
include"../../config/excel_reader2.php";

//membaca file yang di upload
//error_reporting(0);
if(isset($_POST['simpan'])){
ini_set('max_execution_time', 300);
$sukses =0;
$gagal=0;
$mod = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : '';
$data= new Spreadsheet_Excel_Reader($mod);
//membaca jumlah baris data dari excel
$baris=$data->rowcount($sheet_index=0);
//nilai awal counter utk jumlah data sukses dn gagal

for($i=2;$i<=$baris;$i++){
	$DP_ID=$data->val($i, 2);
	$NKK=$data->val($i, 3);
	$NIK=$data->val($i, 4);
	$NAMA=$data->val($i, 5);
	$TTL=$data->val($i, 6);
	$STSKAWIN=$data->val($i, 7);
	$ALAMAT=$data->val($i, 8);
	$DUSUN=$data->val($i, 9);
	$RT=$data->val($i, 10);
	$RW=$data->val($i, 11);
	$TPS=$data->val($i, 12);
	$DISABILITAS=$data->val($i, 13);
	$SARING=$data->val($i, 14);
	$SUMBER=$data->val($i, 15);
	
	$query="insert into pemilih(DP_ID,NKK,NIK,NAMA,TTL,TMPLAHIR,JK,ALAMAT,RT,RW,TPS,DISABILITAS,SARING,SUMBER,STS_KAWIN,ID_DESA)
								values('$DP_ID','$NKK','$NIK','$NAMA','$TTL','TMPLAHIR','JK','$ALAMAT','$RT','$RW','$TPS','$DISABILITAS',
								'$SARING','$SUMBER','$STSKAWIN','".$_POST['desa']."')";
	$hasil=mysqli_query($konek,$query);
	
	
	
}
	if($hasil){
			header("location:../../halaman.php?syafrin=import?state=berhasil");
	}else{
			header("location:../../halaman.php?syafrin=import?state=gagal");
	}


}



?>