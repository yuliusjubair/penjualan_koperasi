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
 ?>
 <script language="javascript">
 	function loadpage(){
		window.location.href = "index.php?mod=home";
	}
 </script>

 
<div align="center">
	 	<p class="bgform">Terima Kasih</p>
		<p class="baris_header1">Terima Kasih Anda Sudah Mengupload Bukti Transfer <br />
  kredit barang dengan no transaksi <?php echo $_GET['no']?>  </p>
		<p class="baris_header1">Barang Akan Kami Kirim Kurang Lebih 1 Minggu Setelah Kami Menerima Bukati Pembayaran Anda </p>
		<p class="baris_header1"><br />
		  <input class="button" type="submit" name="kembali" value="Finish" onclick="loadpage();" />
        </p>
</div
 
></body>
</html>
