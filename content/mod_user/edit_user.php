<?php
include"../config/koneksi.php";
$cek=mysql_query("select * from user where id_user='$_GET[id]'");
$hasil=mysql_fetch_array($cek);
if($hasil[level]=='user'){
	$A="selected";
}else{
	$B="selected";
}
echo"
<h3 align='center'>EDIT DATA USER</h3>
<form id='form1' method='post' action='update_user.php'>
<input type='hidden' name='key' value='$hasil[id_user]'>
<table border='1' align='center'>
	
	<tr>
		<td>user name</td>
		<td>:</td>
		<td><input type='text' name='nama' size='30' value='$hasil[user_name]' ></td>
	</tr>
	<tr>
	<tr>
		<td>password lama</td>
		<td>:</td>
		<td><input type='text' name='pass0' value='$hasil[pass]' size='30' disabled></td>
	</tr>
	<tr>
		<td>password baru</td>
		<td>:</td>
		<td><input type='text' name='pass1' size='30'></td>
	</tr>
	<tr>
		<td>confirm password baru</td>
		<td>:</td>
		<td><input type='tex' name='pass2' size='30'/></td>
	</tr>
	<tr>
		<td>level</td>
		<td>:</td>
		<td>
			<select name='level'>
			<option value='user' $A>user</option>
			<option value='admin' $B>admin</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><input type='submit' value='update' name='update' />
		<input type='button' name='batal' value='batal' onclick='self.history.back()' />		</td>
	</tr>
</table>
</form>";
?>
