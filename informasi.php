<?
	include "config/koneksi.php";
	$act = $_GET['act'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document
</title><link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
	
  <tr>
    <td class="baris_header1">INFORMASI / PENGUMUMAN </td>
  </tr>
  <?
	$q = mysql_query("select * from t_informasi order by waktu");
   $kol = 0;
   while ($t = mysql_fetch_array($q))
   {
  ?>
  <tr>
    <td height="30" class="judulformlogin"><? echo $t['judul']; ?></td>
  </tr>
  <tr>
    <td class="isitabelmember">
	<div class="code">
	<p><strong><? echo $t['waktu']; ?></strong></p> 
	<p><? echo $t['isi']; ?></p>
	</div>
    </td>
  </tr>
  <? } ?>
  
 
    </table>
    </td>
  </tr>
</table>
</body>
</html>
