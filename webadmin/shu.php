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
<table width="70%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA SHU (Sisa Hasil Usaha) Koperasi per Tahun</h4></th>
</tr>
  </thead>
  <form action="" method="post">
  <tr>
  <td>Pilih Tahun</td><td>:</td><td>
  <select name="tahun">
  	<option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
  </select>
  <input type="submit" name="submit" value="Proses" />
  </td>
  </tr>
  </form>
<?
	if(isset($_POST[tahun])){
	$q = mysql_query("select sum(keuntungan) as laba from pemesanan where YEAR(ORDER_TGL)='$_POST[tahun]'");
	$t = mysql_fetch_array($q);
	$laba = $t['laba'];
?>
<tr>
<td width="38%">SHU Anggota (70%)</td>
<td width="2%">:</td>
<td width="60%" align="left" class="isitabel"><? echo "Rp. " . number_format($laba * (70 / 100)); ?></td>
</tr>
<tr>
<td width="38%">Gaji Pengurus(15%)</td>
<td width="2%">:</td>
<td width="60%" align="left" class="isitabel"><? echo "Rp. " . number_format($laba * (15 / 100)); ?></td>
</tr>
<tr>
<td width="38%">administrasi (10%)</td>
<td width="2%">:</td>
<td width="60%" align="left" class="isitabel"><? echo "Rp. " . number_format($laba * (10 / 100)); ?></td>
</tr>
<tr>
<td width="38%">Cadangan (5%)</td>
<td width="2%">:</td>
<td width="60%" align="left" class="isitabel"><? echo "Rp. " . number_format($laba * (5 / 100)); ?></td>
</tr>

<?php } ?>
</table>
<p>&nbsp;</p>

</div>
</body>
</html>
