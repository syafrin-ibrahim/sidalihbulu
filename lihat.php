<?php
include"config/koneksi.php";

$k=$_GET['k'];

$query=mysqli_query($konek, "select * from pemilih where ID_DESA=2 and SARING=0 and NAMA like '%$k%'");
while($f=mysqli_fetch_array($query)){
		echo"<li>DP ID => ".$f['DP_ID']." +++ ".$f['NAMA']." ---- nik => ".$f['NIK']." ---- TGL LAHIR => ".$f['TTL']."</li>";

}
?>