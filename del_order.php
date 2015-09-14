<?php include "config/koneksi.php"; ?>
<?php
  session_start();
  $kdjual = $_GET['kdjual'];
  $produkID = $_GET['produkID'];
  
  $updateSQL = "DELETE FROM keranjang_belanja WHERE kd_penjualan='$kdjual' AND produkID='$produkID'";
  mysql_query($updateSQL) or die(mysql_error());
  header("location:index.php?act=keranjang");
?>


