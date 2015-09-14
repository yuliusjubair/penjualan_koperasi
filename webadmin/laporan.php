<?php
    include "../config/koneksi.php";
	include"inc/fungsi_combobox.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="tool/dhtmlgoodies_calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="tool/dhtmlgoodies_calendar.js"></script>
</head>
<body>
<table width="100%" align="left" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			
			<td width="60%" height="35" class="barismenu"> <a href="?mod=laporan&lap=lap_barang_keluar" class="menuadmin" align="center">LAPORAN BARANG KELUAR</a> | <a href="?mod=anggota" class="menuadmin" align="center">LAPORAN ANGGOTA</a> | <a href="?mod=laporan&lap=lap_anggota_kredit" class="menuadmin" align="center">LAPORAN ANGGOTA YANG KREDIT</a> | <a href="?mod=laporan&lap=lap_lunas" class="menuadmin" align="center">LAPORAN YANG SUDAH LUNAS</a>| <a href="?mod=laporan&lap=cicilan" class="menuadmin" align="center">LAPORAN CICILAN</a> </td>
		  </tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr>
		  <td>
		  <div class="manage">
		  		<?php 
					$lap = $_GET['lap'];
					switch($lap){
						default:
							include "laporan_barang_keluar.php";
						break;
						case 'lap_barang_keluar':
							include "laporan_barang_keluar.php";
						break;
						case 'lap_anggota_kredit':
							include "laporan_anggota_kredit.php";
						break;
						case 'lap_lunas':
							include "laporan_lunas.php";
						break;
						case 'cicilan':
							include "laporan_cicilan.php";
						break;
					}
				?>
		  </div>
		  
		  </td>
		  </tr>
		</table>
<br />
</body>
</html>

