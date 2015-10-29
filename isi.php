<?php
include"config/koneksi.php";
include"config/library.php";
//include"../config/paging.php";



		if ($_GET['syafrin']=='home'){
		  include"content/modul/mod_home/home.php";
			//echo"this is home";
		  
		}elseif ($_GET['syafrin']=='profil'){
		 // include"modul/mod_home/home.php";
		  echo"disini profil";
		}if ($_GET['syafrin']=='P_ilomata'){
		  include"content/mod_pemutakhiran/ilomata.php";
		  
		}if ($_GET['syafrin']=='P_mongiilo'){
		  include"content/mod_pemutakhiran/mongiilo.php";
		  
		}if ($_GET['syafrin']=='P_mongiiloutara'){
		  include"content/mod_pemutakhiran/mongiiloutara.php";
		  
		}if ($_GET['syafrin']=='P_owata'){
		  include"content/mod_pemutakhiran/owata.php";
		  
		}if ($_GET['syafrin']=='P_pilolaheya'){
		  include"content/mod_pemutakhiran/pilolaheya.php";
		  
		}else if($_GET['syafrin']=='P_sukamakmur'){
			include"content/mod_pemutakhiran/sukamakmur.php";
		}else if($_GET['syafrin']=='import'){
			include"content/mod_import/import.php";
		}else if($_GET['syafrin'] == 'P_owata1'){
			include"content/mod_pemutakhiran/owata1.php";
		}else if($_GET['syafrin'] == 'P_owata2'){
			include"content/mod_pemutakhiran/owata2.php";
		}else if($_GET['syafrin'] == 'P_owata12'){
			include"content/mod_pemutakhiran/owata12.php";
		}else if($_GET['syafrin'] == 'P_bulu'){
			include"content/mod_pemutakhiran/kecamatan.php";
		}

/*}
syafrin=P_owata2
else if($_GET['syafrin']=='inbox'){
  include 'content/mod_inbox/inbox.php';
}
else if($_GET['syafrin']=='outbox'){
  include 'content/mod_outbox/outbox.php';
}else if($_GET['syafrin'] == 'sentitem'){
	include"content/mod_sentitem/sentitem.php";
}else if($_GET['syafrin']=='kirimsms'){
	include"content/mod_smssingle/kontaksms.php";
}else if($_GET['syafrin']== 'outbox'){
	include"content/mod_outbox/outbox.php";
}else if($_GET['syafrin'] == 'sentitem'){
	include"content/mod_sentitem/sentitem.php";
}else if($_GET['syafrin']== 'kontak'){
	include"content/mod_kontak/kontak.php";
}else if($_GET['syafrin']=='gammu'){
	include"content/mod_gammu/service.php";
}else if($_GET['syafrin'] == 'cekpulsa'){
	include"content/mod_gammu/cekpulsa.php";
}else if($_GET['syafrin']=='group'){
	include"content/mod_group/group.php";
}else if($_GET['syafrin']=='smsgroup'){
	include"content/mod_smsgroup/smsgroup.php";
}else if($_GET['syafrin']=='calon'){
	include"content/mod_calon/calon.php";
}else if($_GET['syafrin']=='tps'){
	include"content/mod_tps/tps.php";
}else if($_GET['syafrin']=='autoreplay'){
	include"content/mod_auto/autoreply.php";
}else if($_GET['syafrin']=='quickcount'){
	include"content/mod_auto/hasilquickcount.php";
}else{
		echo"belum ada modul atau content <br/>sementara dalam perancangan dan pengkodeann hehehehehhe";
}*/

?>
