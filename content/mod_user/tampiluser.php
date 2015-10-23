<?php
echo"<h3 align='center'> DAFTAR USER </h3>";
echo"<input type='button' value='tambah user' onclick=window.location.href='form_user.php'>";
include"../config/koneksi.php";
$egi=mysql_query("select * from user");
$total=mysql_num_rows($egi);
echo"<div align=left id=top>data user<br/>
		jumlah data : $total </div>";
echo"<table border=1 id=table>";
echo"<tr>
		<th>nomor</th>
		<th>user name</th>
		<th>level</th>
		<th colspan=2>aksi</th>
	  </tr>";
//tampilkan data mahasiswa 

$no=1;
$maha=mysql_query("select * from user");
while($data=mysql_fetch_array($maha)){
	echo"<tr>
			<td>$no</td>
			<td>$data[user_name]</td>
			<td>$data[level]</td>
			<td><a href=edit_user.php?id=$data[id_user]>edit</a> </td>
			<td><a href=\"hapus_user.php?id=$data[id_user]\" onclick=\"return confirm('yakin akan menghapus data ini ? ')\" >hapus</a> </td>
	</tr>";
	$no++;
}
echo"</table>";
?>