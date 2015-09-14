<?php
session_start();
?>
<?php include "config/koneksi.php"; ?>
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];
$nomor = $_SESSION['no_anggota'];
$maxRows_transaksi = 10;
$pageNum_transaksi = 0;
if (isset($HTTP_GET_VARS['pageNum_transaksi'])) {
  $pageNum_transaksi = $HTTP_GET_VARS['pageNum_transaksi'];
}
$startRow_transaksi = $pageNum_transaksi * $maxRows_transaksi;

$query_transaksi = "SELECT * FROM pemesanan WHERE ORDER_NO_ANGGOTA = '$nomor' ORDER BY ORDER_TGL DESC";
$query_limit_transaksi = sprintf("%s LIMIT %d, %d", $query_transaksi, $startRow_transaksi, $maxRows_transaksi);
$transaksi = mysql_query($query_limit_transaksi) or die(mysql_error());
$row_transaksi = mysql_fetch_assoc($transaksi);
$no_anggota = $row_transaksi['ORDER_NO_ANGGOTA'];
if (isset($HTTP_GET_VARS['totalRows_transaksi'])) {
  $totalRows_transaksi = $HTTP_GET_VARS['totalRows_transaksi'];
} else {
  $all_transaksi = mysql_query($query_transaksi);
  $totalRows_transaksi = mysql_num_rows($all_transaksi);
}
$totalPages_transaksi = (int)($totalRows_transaksi/$maxRows_transaksi);

$queryString_transaksi = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_transaksi") == false &&
        stristr($param, "totalRows_transaksi") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_transaksi = "&" . implode("&", $newParams);
  }
}
$queryString_transaksi = sprintf("&totalRows_transaksi=%d%s", $totalRows_transaksi, $queryString_transaksi);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form Transaksi</title>
<link href="../styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<h3>bukti Transaksi anda</h3>
<table align="center" width="100%" border="1" cellpadding="0" cellspacing="0" style="border:double; border-color:#009900;">
    <!--DWLayoutTable-->
  <tr>
    <td height="12" colspan="8"><div align="right"><a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, 0, $queryString_transaksi); ?>"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>First</strong></font></a><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, max(0, $pageNum_transaksi - 1), $queryString_transaksi); ?>">Previous</a> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, min($totalPages_transaksi, $pageNum_transaksi + 1), $queryString_transaksi); ?>">Next</a> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, $totalPages_transaksi, $queryString_transaksi); ?>">Last</a></strong></font></div>	</td>
  </tr>
  <tr>
    <th width="50" height="19" valign="top"> No</th>
    <th width="2"></th>
    <th width="167"> No Order</th>
    <th width="185"> No Anggota</th>
    <th width="149">Tanggal</th>
 	<?php if($_SESSION['status_pegawai']==1){?>   
	
	<?php }else{?>
    <th width="239" valign="top"> <div align="center">Upload Transfer</div></th>
	<?php } ?>
  </tr>
  <?php
  $no=0;
  do {
  $no++;
   ?>
  <tr>
    <td height="48" colspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
      <?=$no?>
    </font></td>
    <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a target="_blank" href="daftar_belanja.php?kd_jual=<?php echo $row_transaksi['ORDER_KODE']?>"><?php echo $row_transaksi['ORDER_KODE']; ?></a></font></td>
    <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="#" class="style1"><?php echo $row_transaksi['ORDER_NO_ANGGOTA']; ?></a></font></td>
    <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_transaksi['ORDER_TGL']; ?></font></td>
	<?php if($_SESSION['status_pegawai']==1){?>   
	
	<?php }else{ ?>
		<form method="post" action="update_transfer.php" enctype="multipart/form-data">
    <td colspan="2" valign="top">
	<input type="hidden" name="order_kode" value="<?php echo $row_transaksi['ORDER_KODE']; ?>" />
	<input type="file" size="10" name="upload" /> 
	&nbsp; <input type="submit" name="submit" value="Kirim" />	
	</td>
		</form>
	<?php } ?>	
   
  </tr>
  <?php } while ($row_transaksi = mysql_fetch_assoc($transaksi)); ?>
  <tr>
    <td height="12" colspan="8"><div align="right"><font size="2" face="Verdana"><span class="delete"><font size="1"><strong><font color="#000000">Total
      Record : <?php echo $totalRows_transaksi ?> </font></strong></font></span><font color="#000000"><strong><font size="1">&nbsp; <span class="delete"> | Start Record :<?php echo ($startRow_transaksi + 1) ?></span></font></strong> </font><span class="viewer"></span></font></div>	</td>
  </tr>
 
</table>

 <p align="center">	
 <?php 
		if($_GET['cek']==1){
			echo "barang akan dikirim kurang lebih 2 minggu setelah melakukan pembayaran";
		}
	?>
  </p>
  <?php if($_SESSION['status_pegawai']==1){?>   
	
	<?php }else{ ?>
  <form action="update_rekening.php" method="post">
  <table width="297"  style="border:double; border-color:#009900;">
  	<tr>
		<td>Nama Bank</td>
		<td>:</td>
		<td><input type="text" name="bank" /></td>
	</tr>
	<tr>
		<td>Rekening</td>
		<td>:</td>
		<td><input type="text" name="rekening" /></td>
	</tr>
	<tr>
		<td>Atas Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" /></td>
	</tr>
	<tr>
		<!--<td>Jumlah Transfer</td>
		<td>:</td>
		<td><input type="text" name="jmltransfer" /></td> 
		!-->
	<td>Jumlah Transfer </td>
		<td>:</td>
		<td><input type="text" name="jmltransfer" /></td>
		<tr>
	
	<tr>
		<td>No Order </td>
		<td>:</td>
		<td><input type="text" name="no_order" /></td>
	<tr>
		<td colspan="3" align="center">
		<input type="hidden" value="<?php echo $nomor?>" name="no_anggota" />
		<input type="submit" name="submit" value="Kirim" /></td>
	</tr>
  </table>
  </form>
  <?php } ?>
</div>
</body>
</html>
<?php
mysql_free_result($transaksi);
?>

