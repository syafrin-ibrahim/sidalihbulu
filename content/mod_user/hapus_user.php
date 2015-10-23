<?php
include"../config/koneksi.php";
$delete=mysql_query("delete from user where id_user='$_GET[id]'");
if($delete){
	header("location:tampiluser.php");
}
?>