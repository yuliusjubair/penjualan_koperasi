<?php
session_start();
if(!session_is_registered("1")){
header("location:login_admin.php");
//echo("Illegal Access !!! maaf anda tidak diijinkan mengakses halaman ini...Login Dulu Atuh! ");
exit;
}
?>
<?
	include "../config/koneksi.php";
	$mod = $_GET[mod];
	
	switch ($mod)
	{
		default 			: $nf = "pegawai.php"; break;
		case "pegawai"		: $nf = "pegawai.php"; break;
		case "anggota"		: $nf = "anggota.php"; break;
		case "barang"		: $nf = "barang.php"; break;
		case "toko"			: $nf = "toko.php"; break;
		case "informasi"	: $nf = "informasi.php"; break;
		case "pesanan"		: $nf = "pesanan.php"; break;
		case "datauser"		: $nf = "data_admin.php"; break;
		case "user"		: $nf = "user_page.php"; break;
		case "laporan"		: $nf = "laporan.php"; break;
		case "lihat_rekening" : $nf= "lihat_rekening.php";break;
		case 'cicilan': $nf = "laporan_cicilan.php";break;
		case 'simpanan': $nf = "simpanan.php";break;
		case 'shu': $nf = "shu.php";break;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: KopKarintex ::.</title>
<style type="text/css">
<!--
body {
	background-image: url(images/bgheader.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	/*background-color: #FAE7E3;
*/}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="theme1.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="">
  <tr>
    <td height="88" class="bgheader">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="25%">&nbsp;</td>
			<td width="60%" class="barismenu"> <a href="?mod=shu" class="menuadmin" align="center">SHU</a> | <a href="?mod=simpanan" class="menuadmin" align="center">SIMPANAN </a> | <a href="?mod=pegawai" class="menuadmin" align="center">PEGAWAI </a> | <a href="?mod=anggota" class="menuadmin" align="center">ANGGOTA</a> | <a href="?mod=barang" class="menuadmin" align="center">BARANG</a> <!--| <a href="?mod=informasi" class="menuadmin" align="center">INFORMASI</a>--> | <a href="?mod=cicilan" class="menuadmin" align="center">LAPORAN</a> | <a href="?mod=pesanan">PEMESANAN</a> | <a href="login_admin.php?action=logout">LOGOUT</a></td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../images/banner2.jpg" width="999" height="139" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" bordercolor="#000000">
      		<tr>  		   
				<td width="100%" valign="top" colspan="2"><? include $nf; ?></td>	
		  	</tr>
		</table>
	</td>
  </tr>
  </td>
  </tr>
</table>
</body>
</html>
