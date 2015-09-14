
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

		  		<table width="700" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td class="judulform">Pilih Tanggal Laporan Penjualan </td>
  </tr>
  
  <tr>
    <td class="kotakform">
	<form method="post" action="laporan_penjualan.php" target="_blank">
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
   <tr> <td width="28%"> Tanggal Mulai </td>
   <td>
   <? 
	   $thn_sekarang = date('Y');
   	   combotgl(1,31,'tgl_mulai',Tgl);
	   combobln(1,12,'bln_mulai',Bulan);
	   combotgl($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',Tahun);
	?>
</td>
</tr>
    <tr><td width="28%"> Tanggal Selesai </td>
    <td>
	<? 
    	combotgl(1,31,'tgl_selesai',Tgl);
		combobln(1,12,'bln_selesai',Bulan);
		combotgl($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',Tahun);
	?>
</td>
</tr> 
<tr> 
	<td>
		<input type="submit" value="cetak Laporan" />
	</td>
</tr>
</table>
</form>
</table>

		 
<br />
</body>
</html>

