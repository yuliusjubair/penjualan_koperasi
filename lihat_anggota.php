<?
    include "config/koneksi.php";
	include "config/fungsi.php";

	$url = "?mod=pegawai";
	$act = $_GET[act];
	$id = $_GET[id];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div id="box">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff; padding:20px; margin-top:20px;">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA ANGGOTA KOPERASI</h4></th>
 </tr>
  <tr>
  	<th class="baris_header1"><a>NO</a></th>
    <th class="baris_header1"><a>NAMA</a></th>
    <th class="baris_header1"><a>ALAMAT </a></th>
    <th class="baris_header1"><a>TELEPON</a></th>
    <th class="baris_header1"><a>PEKERJAAN</a></th>
  </tr>
  </thead>
  <tbody>
<?
	$q = mysql_query("select * from mst_anggota where aktivasi = 1 order by id");
	$no = 1;
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
  	<td class="isitabelmember"><? echo $no; ?></td>	
    <td class="isitabelmember"><? echo $t[nama_lengkap]; ?></td>
    <td class="isitabelmember"><? echo $t[alamat]; ?></td>
    <td class="isitabelmember"><? echo $t[telepon]; ?></td>
    <td class="isitabelmember"><? echo $t[pekerjaan]; ?></td>
  </tr>
<? $no++; } ?>
</tbody>
</table>
</div>
<p>&nbsp;</p>

</body>
</html>
