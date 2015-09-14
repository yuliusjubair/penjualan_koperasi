<?php include "config/koneksi.php"; ?>
<?php
session_start();
$kd_jual = $_SESSION['kd_jual'];
/*if(empty($_SESSION['kd_jual'])){
		echo "<meta http-equiv='refresh' content='0;url=index.php?pages=login$action=belum'>";
	}*/
//mysql_select_db($database_conn, $conn);

$query_det_order = "SELECT * FROM keranjang_belanja WHERE keranjang_belanja.kd_penjualan='$kd_jual'";
$det_order = mysql_query($query_det_order) or die(mysql_error());
$row_det_order = mysql_fetch_assoc($det_order);
$totalRows_det_order = mysql_num_rows($det_order);

?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}



//-->
</script>
<script language="JavaScript">
    function loadPage(){
	 	var pesan
       window.location.href = "Index.php?act=katalog";
       }
</script>
<link href="../commerce/Style.css" rel="stylesheet" type="text/css">
<link href="default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="webadmin/theme1.css" />
<link rel="stylesheet" type="text/css" href="webadmin/style.css" />
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>
<style type="text/css" media="screen">


#tabel1{
	background:url();
	color:#FFFFFF;
	left:0px;
	width:100%;
	
	background:#FFFFFF;
	margin-top:10px;
	margin-bottom:10px;
	margin-right:10px;
	padding:5px;
	border:#00CC00 5px double;
	-moz-border-radius:10px;
	
}
#tabel1 th{
	background:url(images/scissorsapparel2.gif);
	color:#FFFFFF;
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
.div{
border:#FF0000;
border:1px;
}			
</style>
<body>
<font color="#000000"><?php echo $row['kode_brg']; ?></font>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
<tr>
	<td>
<div class="code">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
  <tr> 
    <td><strong><font color="#000000"><img src="images/icons/cart_add.png"> Keranjang Belanja Anda </font></strong></td>
  </tr>
  <tr>
    <td>
	<font color="#000000">
	<?php
			if (empty($totalRows_det_order)){
				echo "Anda belum belanja !";
			}
		?>
	</font>
	</td>
  </tr>
</table>
<?php
	session_start();
	if(($totalRows_det_order != 0 )AND(!empty($kd_jual))) {
?>

<table width="100%" border="1" cellpadding="1" cellspacing="1"  class="table1">
	<thead>
  <tr bgcolor=""> 
    <th width="26%"> PRODUK</th>
	<?php if($_SESSION['status_pegawai']==1):?>
	<th width="26%"> LAMA CICILAN</th>
	<th width="26%"> Besar Cicilan/bln</th>
	<?php endif;?>
	<th width="15%">Diskon</th>
    <th width="31%">Harga X Jumlah Pesan</th>
    <th width="23%">Sub Total </th>
    <th width="20%">Action</th>
  </tr>
 	</thead>
	<tbody>
  <?php do { 
  $prodID=$row_det_order['produkID']; 
 $ID=$row_det_order['id'];
 $jml_pesan=$row_det_order['jml_pesan']; 
$query_det = "SELECT a.* FROM mst_barang a WHERE a.kode_brg='$prodID'";
$det = mysql_query($query_det) or die(mysql_error());
$row = mysql_fetch_assoc($det);


  ?>
  <?php
  			
			$harga=$brs4['harga'];
			$kode = $row['kode_brg'];
			
  ?>
  <tr> 
    <td align="left"><font color="#000000"><?php echo $row['nama_barang']; ?></font></td>
	<?php if($_SESSION['status_pegawai']==1):?>
	<td align="center"><font color="#000000"><?php echo $row['lama_cicilan']." bulan"; ?></font></td>
	<td align="center"><font color="#000000"><?php 
	 $d = $row['harga'] * ($row['diskon']/100); 
	$h = $row['harga'] - $d;
	$per = $h / $row['lama_cicilan'];
	echo "Rp. " . number_format($per,0,",",".")."/ bulan"; ?></font></td>
	<?php endif;?>
	<td align="center" width="5%"><font color="#000000"><?php echo $row['diskon']. " %"; ?></font></td>
    <td><font color="#000000"><span class="normal"> 
     <?php
	 $d = $row['harga'] * ($row['diskon']/100); 
	$h = $row['harga'] - $d;
	
	  echo "Rp. " . $h ." x ". $jml_pesan;
	   ?></span></font></td>
    <td><font color="#000000"> 
	<? if($_SESSION['status_pegawai']==1){ 
		 //$subtotal=($row['harga'] - ($row['harga'] * ($row['diskon']/100))) *  $jml_pesan; echo Rp."$subtotal";
		 $diskon= $row['harga'] * ($row['diskon']/100); 
		 $harga = $row['harga'];
		 $sub = $diskon * $jml_pesan;
		 $subtotal = $harga - $sub;
		 echo "Rp. " . $subtotal;
		 
		}else{
	 	 $subtotal=$h * $jml_pesan; echo "Rp. " .$subtotal;
	 	 } 
		 
		 
		 
	 ?>
		
      </font>
	  <?php
	   
	  
	  $grandtotal=$grandtotal + $subtotal;
	
	  ?>	 
	  
	  </td>
    <td> 
      <div align="center" class="div" ><font color="#000000"><a href="del_order.php?kdjual=<?=$kd_jual;?>&produkID=<?=$row['kode_brg'];?>" onClick="return confirm('Apakah anda yakin untuk Menghapus Keranjang Belanja ini ?');">Hapus</a></font></div></td>
  </tr>
  <?php }while ($row_det_order = mysql_fetch_assoc($det_order)); ?>
  <tr bgcolor=""> 
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td><font color="#000000">&nbsp;</font> <font color="#000000">TOTAL :</font></td>
    <td><font color="#000000"><b>Rp. <?php  echo $grandtotal; ?></b></font></td>
    <td><font color="#000000">&nbsp;</font></td>
  </tr>
  <tr bgcolor=""> 
    <td height="27"><font color="#000000">&nbsp;</font></td>
    <td colspan="3"> <div align="center"></div></td>
    <td><div align="center"><font color="#000000">&nbsp;</font> 
    </div></td>
  </tr>
  <tr>
  	<td align="center" colspan="6"><div align="center" class="bgform">Dengan Melakukan Pemesanan kami anggap anda sudah membaca dan mengerti detail informasi barang dan menyetujui perjanjian Transaksi</div></td>
    </tr>
    <tr>
  	<td colspan="6" align="center"> <div align="center"><input type="button" name="belanja lagi" value="belanja lagi" onClick="loadPage();">&nbsp;
	<input name="Button" type="button" onClick="MM_goToURL('parent','index.php?act=verifikasi');return document.MM_returnValue" value="Next" class="button"> 
			</div>
			</td>
  </tr>
  </tbody>
</table>
<?php
	}else{echo"<font color=\"#FFFFFF\"><center>Maaf keranjang belanja anda masih kosong.. </center></font>";}
?>
</div>
</td>
</tr>
</table>
</body>
</html>
<?php
//}
mysql_free_result($det_order);

//mysql_free_result($det_prod);
?>