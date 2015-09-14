<?php include "config/koneksi.php"; ?>
<?php
session_start();
$kd_jual = $_SESSION['kd_jual'];
$nomor = $_SESSION['no_anggota'];

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
       window.location.href = "Index.php?pages=about";
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
<link href="style.css" rel="stylesheet" type="text/css">
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
    <th width="15%"> PRODUK</th>
	<?php if($_SESSION['status_pegawai']==1):?>
	<th width="15%"> LAMA CICILAN</th>
	<th width="16%"> Besar Cicilan/bln</th>
	<?php endif;?>
	<th width="8%">Diskon</th>
    <th width="18%">Harga X Jumlah Pesan</th>
    <th width="14%">Sub Total </th>
    <th width="14%">Action</th>
  </tr>
 	</thead>
	
  <?php 
  $total_harga=0;
  do { 
  $prodID=$row_det_order['produkID']; 
 $ID=$row_det_order['id'];
 $jml_pesan=$row_det_order['jml_pesan']; 
$query_det = "SELECT a.kode_brg,a.nama_barang, a.harga, a.jumlah, a.diskon, a.lama_cicilan FROM mst_barang a WHERE a.kode_brg='$prodID'";
$det = mysql_query($query_det) or die(mysql_error());
$row = mysql_fetch_assoc($det);


  ?>
  <?php
  			
			$harga=$brs4['harga'];
			$kode = $row['kode_brg'];
			
  ?>
  <tbody>
   <tr> 
    <td align="left"><font color="#000000"><?php echo $row['nama_barang']; ?></font></td>
	<?php if($_SESSION['status_pegawai']==1):?>
	<td align="center"><font color="#000000"><?php echo $row['lama_cicilan']." bulan"; ?></font></td>
	<td align="center"><font color="#000000"><?php 
	 $d = $row['harga'] * ($row['diskon']/100); 
	$h = $row['harga'] - $d;
	$per = $h / $row['lama_cicilan'];
	echo "Rp. " . number_format($per,0,",",".")."/ bulan"; ?> </font></td>
	<?php endif;?>
	<td align="center" width="8%"><font color="#000000"><?php echo $row['diskon']. " %"; ?></font></td>
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
	   
	  $total_harga = $total_harga + ($diskon);
	  $grandtotal=$grandtotal + $subtotal;
		$total_cicilan = $total_cicilan + $per*$row['lama_cicilan'];
		//echo $total_harga;
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
    <td><font color="#000000">Rp. <?php  echo "".number_format($grandtotal,0,",","."); ?></font></td>
    <td><font color="#000000">&nbsp;</font></td>
  </tr>
  <tr bgcolor=""> 
    <td height="27"><font color="#000000">&nbsp;</font></td>
    <td colspan="2"> <div align="center"></div></td>
    <td><div align="center"><font color="#000000">&nbsp;</font> 
    </div></td>
  </tr>
 </tbody>
 </table>
 <form action="index.php?act=finish" method="post">
<table align="center">
  <tr> 
    <td width="819" class="isitabelmember"><strong><font color="#000000">Result Order</font></strong></td>
  </tr>
  <?php if($_SESSION['status_pegawai']==0){ ?>
  <tr>
    <td>Jumlah yang akan dibayar melalui Transfer Semua Tagihan<br>
    Pilih Rekening kami di Bank berikut ini. </td>
  </tr>
  	 <?php 
				$query_ask = mysql_query("SELECT * FROM t_bank");
				while ($row=mysql_fetch_array($query_ask))
				{ 
			?>

  <tr>
  	<td>
				<font color="#000000"><u>Nama Bank </u>:
			  
	<br>
			<img src="images/bni.jpg">
			<?php echo "<br>"; ?>
			<?php echo "Atas Nama : s" . $row['ATAS_NAMA']?>			
			<?php echo "<br>"; ?>
			<?php echo $row['REKENING']?>
			</font>
	</td>	
  </tr>
  <?php 
  } 
  		}
		
		
  ?>
  <tr>
  	<td>
	<table> 
	<?php 
	$sql_cicil = mysql_query("SELECT gaji FROM t_cicilan WHERE no_anggota='$nomor'")or die (mysql_error());
				$gaji_cicilan = mysql_fetch_array($sql_cicil);
				
				//print_r($gaji_cicilan['gaji']);
	if(!empty($gaji_cicilan)){
		if($gaji_cicilan['gaji']<=1000000){
		//echo "aaa";
		?>
		<tr>
			<td colspan="4" class="bergabung">Maaf, Gaji Anda tidak mencukupi untuk melakukan kredit.</td>
		</tr>
		<?php 				
		
	}	
		elseif(($_SESSION['gaji']<=1000000)&&($_SESSION['status_pegawai']==1)){?>
		<tr>
			<td colspan="4" class="bergabung">Maaf, Gaji Anda tidak mencukupi untuk melakukan kredit.</td>
		</tr>
	<?php }else{ ?>
		<tr>
			<td colspan="4" class="bergabung">PERINCIAN TOTAL BAYAR</td>
		</tr>
		<tr>
			<td width="223" class="bergabung"><span class="style2">Total Harga Barang</span></td>
			<td width="11" class="style2">:</td>
			<td width="177" class="bergabung"><? echo "Rp . " . $grandtotal?></td>
		</tr>
 		 <?php 
		 }
		} 
		 if($_SESSION['status_pegawai']==0){ ?>
		<tr>
			<td class="style2">Biaya Pengiriman</td>
			<td class="style2">:</td>
			<td class="style2">
			<? 
				$prov = mysql_query("SELECT t_provinsi.* FROM t_provinsi, mst_anggota WHERE t_provinsi.id = mst_anggota.provinsi")or die(mysql_error());
				$data = mysql_fetch_array($prov);
				echo "Provinsi Pengirim : " . $data['nama_provinsi'] . "(Rp. " . $data['ongkos_kirim'] . ")";  
			?>
			</td>
		  </tr>
		  <?php 
		  $q = "SELECT sum(jml_pesan) as jml FROM keranjang_belanja WHERE keranjang_belanja.kd_penjualan='$kd_jual'";
		  $d = mysql_query($q) or die(mysql_error());
		  $r= mysql_fetch_assoc($d);
		  $jml = $r['jml'];
		  ?>
		  <tr>
		  <td class="style2">Total Pengiriman (kali (<?php echo $jml?>) jumlah barang)</td>
			<td class="style2">:</td>
			<td class="style2">
			<? 
				$tot = $grandtotal * $jml;
				$total_kirim = $tot + $data['ongkos_kirim'];
				echo "Rp. " . $total_kirim;
			?>
			</td>
		  </tr>
			 <?php }else{ 
				$no_anggota = $_SESSION['no_anggota'];
				$sql = mysql_query("SELECT gaji FROM mst_anggota WHERE no_anggota='$no_anggota'")or die (mysql_error());
				$gaji = mysql_fetch_array($sql);

				$sql_cicil = mysql_query("SELECT gaji FROM t_cicilan WHERE no_anggota='$no_anggota'")or die (mysql_error());
				$gaji_cicilan = mysql_fetch_array($sql_cicil);
					
					$potong = $grandtotal / $row['lama_cicilan'];
				if(empty($gaji_cicilan)){
					$gaji_ = $gaji['gaji'] - $potong;
				}else{
					$gaji_ = $gaji_cicilan['gaji'] - $potong;
				}
					//mysql_query("UPDATE mst_anggota SET gaji='$gaji_' WHERE no_anggota='$no_anggota'")or die (mysql_error());
				?>
		 <tr>
         		<input type="hidden" name="laba" value="<?php echo $total_cicilan - $total_harga;?>">
			   <input type="hidden" name="gaji_" value="<?php echo $gaji_?>">
			   <input type="hidden" name="total" value="<?php echo $total_kirim?>">
			   <input type="hidden" name="lama_cicilan" value="<?php echo $row['lama_cicilan']?>">
			  <td colspan="3" class="bergabung"> Anda sudah melakukan transaksi pemesanan, maka gaji anda bulan depan akan dipotong sebesar <b>Rp. <?php echo number_format($potong,0,",",".")?> Selama <?php echo $row['lama_cicilan']?> bulan</b> <br>
			  Gaji Anda sebulan menjadi:  Rp. <?php echo number_format($gaji_,0,",",".") ?>
			  </td>
		</tr> 	
	  <?php  
	  }
	 
	  ?>
	
		<tr>
			<td class="style2"><hr></td>
			<td>&nbsp;</td>
			<td class="style2"><hr></td>
		</tr>
	  
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
	</table>	
</td>
</tr>  
<?php 
if(!empty($gaji_cicilan)){
if($gaji_cicilan['gaji']<=1000000){ 
mysql_query("delete from keranjang_belanja where kd_penjualan='$kd_jual'");
?>
<tr>
	<td align="left"><input name="Button" type="button" onClick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Kembali" class="button"> </td>
</tr>
<?php
}
elseif(($_SESSION['gaji']<=1000000)&&($_SESSION['status_pegawai']==1)){
mysql_query("delete from keranjang_belanja where kd_penjualan='$kd_jual'");
?>
<tr>
	<td align="left"><input name="Button" type="button" onClick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Kembali" class="button"> </td>
</tr>


<?php }else{ ?>

<?php } 
}?>

<?php if($_SESSION['status_pegawai']==0){ ?>
<tr>
	<td align="left"><input type="submit" class="button" name="submit" value="Next"></td>
</tr>
<?php }?>

<?php if($_SESSION['status_pegawai']==1){ ?>
<tr>
	<td align="left"><input type="submit" class="button" name="submit" value="Next"></td>
</tr>
<?php }?>

</table>
</form>
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