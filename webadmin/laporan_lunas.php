<?php
session_start();
?>
<?php include "../config/koneksi.php"; ?>
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_transaksi = 10;
$pageNum_transaksi = 0;
if (isset($HTTP_GET_VARS['pageNum_transaksi'])) {
  $pageNum_transaksi = $HTTP_GET_VARS['pageNum_transaksi'];
}
$startRow_transaksi = $pageNum_transaksi * $maxRows_transaksi;

$query_transaksi = "SELECT * FROM pemesanan where ORDER_STATUS = '1' ORDER BY ORDER_TGL DESC";
$query_limit_transaksi = sprintf("%s LIMIT %d, %d", $query_transaksi, $startRow_transaksi, $maxRows_transaksi);
$transaksi = mysql_query($query_limit_transaksi) or die(mysql_error());
$row_transaksi = mysql_fetch_assoc($transaksi);

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
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="tool/dhtmlgoodies_calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="tool/dhtmlgoodies_calendar.js"></script>
</head>
<body>
<h4><? echo "<a href='cetak_lap_lunas_pdf.php' class='useradd' target='_blank'>"; ?>Cetak Pdf</a></h4>
<div align="center">
<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="border:double; border-color:#009900;">
    <!--DWLayoutTable-->
  <tr>
    <td height="12" colspan="8"><div align="right"><a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, 0, $queryString_transaksi); ?>"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>First</strong></font></a><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, max(0, $pageNum_transaksi - 1), $queryString_transaksi); ?>">Previous</a> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, min($totalPages_transaksi, $pageNum_transaksi + 1), $queryString_transaksi); ?>">Next</a> <font color="#FFFFFF">|</font> <a href="<?php printf("%s?pageNum_transaksi=%d%s", $currentPage, $totalPages_transaksi, $queryString_transaksi); ?>">Last</a></strong></font></div>	</td>
  </tr>
  <tr>
    <th width="44" height="38">No</th>
    <th width="152"> No Order</th>
    <th width="163"> No Anggota</th>
    <th width="149">Tanggal</th>
	<th width="138" valign="top"> Bukti Transfer</th>
    <th width="129" valign="top"> Status Bayar</th>
    <th width="111" valign="top">Status Kirim </th>
    <th width="191" valign="top"> <div align="center">Action</div></th>
    </tr>
  <?php
  $no=0;
  do {
  $no++;
   ?>
  <tr>
    <td height="114" align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
      <?=$no?>
    </font></td>
    <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="daftar_belanja.php?kd_jual=<?php echo $row_transaksi['ORDER_KODE']; ?>" target="_blank" title="Lihat Daftar Item Barang"><?php echo $row_transaksi['ORDER_KODE']; ?></a></font></td>
    <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="index.php?mod=user&no=<?php echo $row_transaksi['ORDER_NO_ANGGOTA']; ?>" class="style1" title="Lihat Data Customer"><?php echo $row_transaksi['ORDER_NO_ANGGOTA']; ?></a></font></td>
    <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_transaksi['ORDER_TGL']; ?></font></td>
	<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a target="_blank" href="<?php echo '../images/'.$row_transaksi['bukti_transfer']?>"><img src="<?php echo '../images/'.$row_transaksi['bukti_transfer']?>" width="30" height="30"/></a></font></td>
    <td align="center" style="text-align:center;"><?php if ($row_transaksi['ORDER_STATUS']==0){?>
	    <?php if(empty($row_transaksi)){
		echo "";
		}else{
	?>
	
        <a href="update_byr.php?kode=<?=$row_transaksi['ORDER_KODE']?>">Belum bayar</a>
		<?php } ?>
        <?
		}else{
		?>
		
        Sudah Bayar
		
        <?
		}
		?>    </td>
    <td align="center" style="text-align:center;"><?php if (($row_transaksi['ORDER_KIRIM']==0)&&($row_transaksi['ORDER_STATUS']==0)) {?>
	    <?php if(empty($row_transaksi)){
				echo "";
			  }else{
		?>
       Belum dikirim
	   <?php } ?>
        <?

		}elseif (($row_transaksi['ORDER_KIRIM']==0)&&($row_transaksi['ORDER_STATUS']==1)) {?>
        <a href="update_kirim.php?kode=<?=$row_transaksi['ORDER_KODE']?>&amp;petugas=<?=$petugas;?>" >Sudah dikirim </a>
        <?
	  }else{
	  ?>
	 
        Sudah dikirim
		
        <?
	  };
	  ?>    </td>
    <td align="center">
	 <?php if(empty($row_transaksi) || ($row_transaksi['ORDER_STATUS']==1) && ($row_transaksi['ORDER_KIRIM']==1)){
				echo "";
			  }else{
		?>
	 <a href="del_order.php?kode=<?= $row_transaksi['ORDER_KODE']?>">batalkan</a>&nbsp;
	 <?php } ?>
	 <?php
		if (($row_transaksi['ORDER_KIRIM']==0)||($row_transaksi['ORDER_STATUS']==0)) {
	?>

	 <?php }else{ ?>
	 <a target="_blank" href="cetak.php?kode=<?=$row_transaksi['ORDER_KODE']?>">Cetak	</a>
	 <?php } ?>	</td>
    </tr>
  <?php } while ($row_transaksi = mysql_fetch_assoc($transaksi)); ?>
  <tr>
    <td height="12" colspan="8"><div align="right"><font size="2" face="Verdana"><span class="delete"><font size="1"><strong><font color="#000000">Total
      Record : <?php echo $totalRows_transaksi ?> </font></strong></font></span><font color="#000000"><strong><font size="1">&nbsp; <span class="delete"> | Start Record :<?php echo ($startRow_transaksi + 1) ?></span></font></strong> </font><span class="viewer"></span></font></div>	</td>
  </tr>
</table>
</div>
</body>
</html>

