<?php
include"../config/koneksi.php";

if($_POST[submit]){
	if(empty($_POST[nama]) or empty($_POST[level])or empty($_POST[pass1]) or empty($_POST[pass2])){
		echo"<script>alert('maaf data belum lengkap');self.history.back()</script>";
	}else if($_POST[pass1] != $_POST[pass2]){
		echo"<script>alert('maaf kata sandi harus sama dengan inputan pertama ');self.history.back()</script>";
	}else{
		$cek=mysql_query("select * from user where user_name='$_POST[nama]'");
		$ada = mysql_num_rows($cek);
		if($ada > 0){
			echo"<script>alert('kata user name sudah ada yang menggunakan, coba yang lain');self.history.back()</script>";
		}else{
			$a=md5($_POST[pass1]);
			$insert=mysql_query("insert into user(user_name,pass,level)
					values('$_POST[nama]','$a','$_POST[level]')");
			if($insert){
				header("location:tampiluser.php");
			}
		}
	}

}

?>