<?php
echo"
<h3 align='center'>INPUT DATA USER</h3>
<form id='form1' method='post' action='simpan_user.php'>
<table border='1' align='center'>
	
	<tr>
		<td>user name</td>
		<td>:</td>
		<td><input type='text' name='nama' size='30' ></td>
	</tr>
	<tr>
	<tr>
		<td>password</td>
		<td>:</td>
		<td><input type='password' name='pass1' size='30'></td>
	</tr>
	<tr>
		<td>confirm password </td>
		<td>:</td>
		<td><input type='password' name='pass2' size='30'/></td>
	</tr>
	<tr>
		<td>level </td>
		<td>:</td>
		<td><select name='level'>
			<option value='0'>level</option>
			<option value='user'>user</option>
			<option value='admin'>admin</option>
			</select>
			</td>
	</tr>
	<tr>
		<td><input type='submit' value='simpan' name='submit' />
		<input type='button' name='batal' value='batal' onclick='self.history.back()' />		</td>
	</tr>
</table>
</form>";
?>
