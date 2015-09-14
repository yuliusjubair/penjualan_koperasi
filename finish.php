<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head><link href="style.css" rel="stylesheet" type="text/css">
 <body>
 <?php
 $kdjual = $_SESSION['kd_jual'];
 $no_anggota = $_SESSION['no_anggota'];
 
$query_det_order = "SELECT * FROM keranjang_belanja WHERE keranjang_belanja.kd_penjualan = '$kdjual'";
$det_order = mysql_query($query_det_order) or die(mysql_error());
$totalRows_det_order = mysql_num_rows($det_order);
 ?>
 <script language="javascript">
 	function loadpage(){
		window.location.href = "index.php?mod=home";
	}
 </script>
 <?php 
 
 if(($totalRows_det_order != 0 )AND(!empty($kdjual))) {
	$tgl = date('Y-m-d H:i:s');
	$status = "0";
	$kirim = "0";
	$total = $_POST['total'];
	$laba = $_POST['laba'];
	
	
	$SimpanTransaksi = "INSERT INTO pemesanan(ORDER_KODE,ORDER_NO_ANGGOTA,ORDER_TGL,ORDER_TOTAL,ORDER_STATUS,ORDER_KIRIM, keuntungan)VALUES('$kdjual','$no_anggota','$tgl','$total','$status','$kirim','$laba')";
	$qSimpanTransaksi = mysql_query($SimpanTransaksi)or die(mysql_error());
			while($row_det_order = mysql_fetch_assoc($det_order)){
			$jml_pesan=$row_det_order['jml_pesan']; 
 			$produk = $row_det_order['produkID'];

			$query      = "select * from `mst_barang` where `kode_brg`='$produk'";
		    $runquery   = mysql_query($query)or die (mysql_error());
		    $result     = mysql_fetch_array($runquery);
			echo "<br>";
			$updatestok = $result['jumlah'] - $row_det_order['jml_pesan'];

				$UpdateStok_brg = "UPDATE mst_barang SET jumlah ='$updatestok' WHERE `kode_brg`='$produk'";
				mysql_query($UpdateStok_brg)or die(mysql_error());
				
				$gaji_ = $_POST['gaji_'];
				$lama_cicilan = $_POST['lama_cicilan'];
			if($_SESSION['status_pegawai']==1){
				$c = mysql_query("Select * From t_cicilan Where no_anggota='$no_anggota'")or die(mysql_error());
				$cicilan = mysql_fetch_array($c);
				if(empty($cicilan)){
					mysql_query("INSERT INTO t_cicilan VALUES('$no_anggota','$lama_cicilan','$gaji_','$tgl')");
				}else{
					mysql_query("UPDATE t_cicilan SET cicilan = cicilan + '$cicilan[cicilan]', gaji='$gaji_' WHERE no_anggota='$no_anggota'");
				}
			}				
		}
	}
 ?>
 
<div align="center">
<?php if($_SESSION['status_pegawai']=="0"){?>
 		<p class="bgform">Terima Kasih</p>
		<p class="baris_header1">Anda telah Melakukan Pemesanan <br />
  Kami Akan mengecek Pembayaran Anda, Jika Sudah Masuk maka kami akan mengirim Barang yang anda pesan.
 <?php } else { ?>
	 	<p class="bgform">Terima Kasih</p>
		<p class="baris_header1">Anda telah Melakukan Pemesanan <br />
  kredit barang dengan no transaksi <?php echo $_SESSION['kd_jual']?> tolong cek kembali data transaksi anda untuk mendapatkan bukti no transaksi anda.
 <?php } ?>
		  <?php 
		$_SESSION['kd_jual']=="";
		session_destroy();
		?>
		  <br />
	      <input class="button" type="submit" name="kembali" value="Finish" onclick="loadpage();" />
  </p>
 </div
 
></body>
</html>
