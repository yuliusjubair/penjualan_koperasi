
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
<h4><? echo "<a href='cetak_lap_kredit_pdf.php' class='useradd' target='_blank'>"; ?>Cetak Pdf</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="9"><h4>DATA ANGGOTA YANG KREDIT</h4></th>
 </tr>
 <tr>
 	<td colspan="9">
		<form action="" name="form_cari" method="post">
			<label style="font-weight:bold;">Cari Pegawai </label><input type="text" name="cari_nama" /> <input type="submit" name="Submit" id="button1" value="Cari Pegawai" />
            
		</form>
	
	</td>
 </tr>
 <tr>
  	<th class="headertabel"><a>NO</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NIP</a></th>
	<th class="headertabel"><a>NO ANGGOTA</a></th>
    <th class="headertabel"><a>NAMA</a></th>
    <th class="headertabel"><a>NO KTP </a></th>
    <th class="headertabel"><a>JABATAN</a></th>
    <th class="headertabel"><a>GOLONGAN</a></th>
	<th class="headertabel"><a>FOTO</a></th>
    
  </tr>
  </thead>
  <tbody>
<?
	$cari = $_POST[cari_nama];
	if(!empty($cari)){
		$condition = " and nama_lengkap  like '%$cari%' ";
	}
	$q = mysql_query("select * from mst_anggota where no_anggota in (select ORDER_NO_ANGGOTA FROM pemesanan) and status_pegawai = 1 ".$condition." order by id");
	$no = 1;
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
  	<td class="isitabel" align="center"><? echo $no; ?></td>	
	<td class="isitabel" align="center"><? echo $t[nip]; ?></td>
    <td class="isitabel" align="center"><? echo $t[no_anggota]; ?></td>
    <td class="isitabel" align="center"><? echo $t[nama_lengkap]; ?></td>
    <td class="isitabel" align="center"><? echo $t[no_ktp]; ?></td>
    <td class="isitabel" align="center"><? echo $t[jabatan]; ?></td>
    <td class="isitabel" align="center"><? echo $t[golongan]; ?></td>
	<td class="isitabel" align="center"><img src="<?php echo '../images/'.$t[photo]?>" width="100" height="100" /></td>
  </tr>
<? $no++; } ?>
</tbody>
</table>
		 
<br />
</body>
</html>

