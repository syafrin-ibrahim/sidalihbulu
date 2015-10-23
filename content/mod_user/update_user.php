<?php
include"../config/koneksi.php";

if($_POST[update]){
	if(empty($_POST[nama]) or empty($_POST[level])or empty($_POST[pass1]) or empty($_POST[pass2])){
		echo"<script>alert('maaf data belum lengkap');self.history.back()</script>";
	}else if($_POST[pass1] != $_POST[pass2]){
		echo"<script>alert('maaf kata sandi harus sama dengan inputan pertama ');self.history.back()</script>";
	}else{
		
			$a=md5($_POST[pass1]);
			$insert=mysql_query("update user set pass='$_POST[pass1]', user_name='$_POST[nama]' where user_name='$_POST[key]'");
			if($insert){
				header("location:tampiluser.php");
			}
		
	}

}

?>