<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Event</title>
</head>

<?
include "../config/koneksi.php";
		$id=$_GET['kode'];
$delete = mysql_query ("DELETE FROM pemesanan where ORDER_KODE='$id'") or die (mysql_error());

if($delete){
	$sql = mysql_query("SELECT * FROM keranjang_belanja WHERE kd_penjualan='$id'")or die(mysql_error());
	while($data = mysql_fetch_array($sql)){
		$jumlah = $data['jml_pesan'];
		$produk = $data['produkID'];
		
	$brg = mysql_query("SELECT * FROM mst_barang WHERE kode_brg='$produk'");
	$databrg = mysql_fetch_array($brg);
	$stok = $databrg['jumlah'];
	
	$kembali_stok = $jumlah + $stok;
	$stok_update = "stok".$size;
			mysql_query("UPDATE mst_barang SET jumlah = '$kembali_stok' WHERE kode_brg='$produk'");
	}
}


 	
?>
<script language="JavaScript">
     function loadPage(){
        window.location.href = "index.php?mod=pesanan";
       }
</script>
<body onload="loadPage();">
</body>
</html>

