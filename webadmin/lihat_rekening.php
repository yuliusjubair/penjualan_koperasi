<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";
	$url = "?mod=toko";
	$act = $_GET[act];
	$id = $_GET[id];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
<div id="box">
<h4><? echo "<a href='index.php?mod=pesanan' class='useradd'>"; ?>Kembali</a></h4>
<table width="70%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA REKENING TRANSFER</h4></th>
</tr>
  </thead>
<?
	$q = mysql_query("select * from mst_anggota where no_anggota='$_GET[no_anggota]'");
	$t = mysql_fetch_array($q);
?>
<tr>
<td width="38%">Nama Bank</td>
<td width="2%">:</td>
<td width="60%" align="left" class="isitabel"><? echo $t[nama_bank]; ?></td>
</tr>
<tr>
<td>No Rekening</td><td>:</td><td class="isitabel "align="left"><? echo $t[rekening]; ?></td>
</tr>
<tr>
<td>Atas Nama </td><td>:</td> <td class="isitabel" align="left"><? echo $t[atas_nama]; ?></td>
</tr>
<tr>
   <td>Jumlah Transfer</td><td>:</td> <td class="isitabel" align="left"><? echo $t[jumlah_transfer]; ?></td>
</tr>	
<tr>
   <td>No Transaksi</td><td>:</td> <td class="isitabel" align="left"><? echo $t[no_order]; ?></td>
</tr>
<tr>
   <td>Tanggal Transfer</td><td>:</td> <td align="left" class="isitabel" ><? echo $t[tanggal_transfer]; ?></td>
  </tr>
</table>
<p>&nbsp;</p>

</div>
</body>
</html>
