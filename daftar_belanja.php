<?php
session_start();
?>
 <?php include "config/koneksi.php"; ?>
<?php
$kd_jual=$_GET['kd_jual'];
$query_det_order = "SELECT * FROM keranjang_belanja WHERE kd_penjualan = '$kd_jual'";
$det_order = mysql_query($query_det_order) or die(mysql_error());
$row_det_order = mysql_fetch_assoc($det_order);
$totalRows_det_order = mysql_num_rows($det_order);
?>
<html>
<head>
<title>Daftar Transaksi</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<style type="text/css" media="screen">


#tabel1{
	background:url();
	color:#000000;
	left:0px;
	width:100%;
	
	background:#FFFFFF;
	margin-top:10px;
	margin-bottom:10px;
	margin-right:10px;
	padding:5px;
	border:#33FF33 5px double;
	-moz-border-radius:10px;
	
}
#tabel1 th{
	background:url(images/scissorsapparel2.gif);
	color:#000000;
	padding-left:10px;
	text-align:center;
}
#tabel1 td{
	font-size:12px;
	padding:5px;
	vertical-align:top;
	text-align:justify;
	
}
#tabel1 td a{
	color:#990000;
}

#tabel1 td a:hover{
	color:#FFCC00;
}

a:hover{
	color:#990000;
}			
</style>
</head>
<link rel="stylesheet" href="../css/pesan.css" type="text/css" />
<body bgcolor="#FFFFFF">
<table align="center" id="table" width="70%">
  <tr> 
    <td style="text-align:center;color:#990000;font-weight:bold; font-size:18px;">Daftar Item<br>
        No Transaksi : <? echo "$kd_jual"; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table align="center" style="text-align:center;color:#000000;font-weight:bold; font-size:12px;" width="70%" border="2" cellpadding="0" cellspacing="0">
  <tr> 
  	<th width="12%" bgcolor="#CCCCCC"> <div align="center">KODE PRODUK</div></th>
    <th width="14%" bgcolor="#CCCCCC"> <div align="center">PRODUK</div></th>
	<th width="14%" bgcolor="#CCCCCC"> <div align="center">Harga</div></th>
	<th width="11%" bgcolor="#CCCCCC"> <div align="center">Diskon</div></th>
    <th width="16%" bgcolor="#CCCCCC"> <div align="center">Jumlah Pesan</div></th>
    <th width="22%" bgcolor="#CCCCCC"> <div align="center">Jumlah</div></th>
  </tr>
  <?php do {
  //$ongkir=5000; 
  $jumlah_pesan=$row_det_order['jml_pesan']; 
  $produkID = $row_det_order['produkID'];
$query_det_prod = "SELECT * FROM mst_barang WHERE kode_brg = '$produkID'";
$det_prod = mysql_query($query_det_prod) or die(mysql_error());
$row_det_prod = mysql_fetch_assoc($det_prod);
$totalRows_det_prod = mysql_num_rows($det_prod);

$prov = mysql_query("SELECT t_provinsi.* FROM t_provinsi, mst_anggota WHERE t_provinsi.id = mst_anggota.provinsi")or die(mysql_error());
				$data = mysql_fetch_array($prov);
  ?>
  <tr> 
  	<td><?php echo $row_det_prod['kode_brg']; ?></td>
    <td><?php echo $row_det_prod['nama_barang']; ?></td>
	    <td><?php echo $row_det_prod['harga']; ?></td>
		    <td><?php echo $row_det_prod['diskon']; ?></td>
			    
	 <td><span class="normal"> 
      <?php 
	  	 $diskon= $row_det_prod['harga'] * ($row_det_prod['diskon']/100);
		 $harga = $row_det_prod['harga'];
		 $sub = $harga - $diskon; 
	  ?> 
	  
	  <?php echo $jumlah_pesan; ?></span></td>
    <td>
      Rp. 
      <?php $subtotal = $sub * $jumlah_pesan; echo $subtotal; ?>
     
	  <?php
	  $grandtotal=$grandtotal  + $subtotal;
	  ?>	  </td>
  </tr>
  <?php } while ($row_det_order = mysql_fetch_assoc($det_order)); ?>
  <tr> 
    <td> <div align="right"></div></td>
	 <td> <div align="right"></div></td>
    <td colspan="3">&nbsp;TOTAL (sudah ongkos kirim) :</td>
    <td>Rp. <?php $grandtotal=$grandtotal+$data['ongkos_kirim'];  echo"$grandtotal" ; ?></td>
  </tr>
   	
	
</table>
<p align="center"> <a href="javascript:window.print()">
						<img src="images/ico_alpha_Print_16x16.png" alt="pos" width="30" height="32" border="0">
					  </a>	
</p>

</body>
</html>
<?php
mysql_free_result($det_order);

//mysql_free_result($det_prod);
?>


