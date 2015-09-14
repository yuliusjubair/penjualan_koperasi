<?php include "config/koneksi.php"; ?>
<?php
session_start();
//include("member.php");
$today = date("Y/m/d");										
$h = date('H') - 1;
$kdjual = date("dmYHis");
$status = 0;
$idprod = $_REQUEST['kd'];
$jml = $_REQUEST['jumlah'];
$size = $_POST['size'];
$kode_brg2 = $_POST['kd'];
$id = $_POST['id'];

$kd_jual = $_SESSION['kd_jual'];
$sql=mysql_query("select * from mst_barang where kode_brg='$idprod'")or die ("salah");
$r=mysql_fetch_array($sql);
$ha=$r['jumlah']-$jml;
if(empty($r['jumlah'])){
?>
<script language="JavaScript">alert('Maaf, Stok Barang Kosong');
document.location='index.php?act=view&id=<?php echo $id?>'</script><?
}elseif($ha < 0){
?>
	<script language="JavaScript">alert('Maaf, Jumlah Pemesanan Anda Melebihi Stock Yang Ada');
document.location='index.php?act=view&id=<?php echo $id?>'</script>
<?	
}
else
{




if($kd_jual != "")
{
	$kode = $_SESSION["kd_jual"];
$queryInsertDetail = "INSERT INTO keranjang_belanja (kd_penjualan, produkID, jml_pesan) VALUES ('$kode', '$idprod', '$jml')";
$InsertDetail = mysql_query($queryInsertDetail) or die(mysql_error());
header("location:index.php?act=keranjang");

}

if(empty($kd_jual)){
	$_SESSION["kd_jual"]=$kdjual;
	$kd_jual=$_SESSION["kd_jual"];
$queryInsertDetail = "INSERT INTO keranjang_belanja (kd_penjualan, produkID, jml_pesan) VALUES ('$kd_jual', '$idprod', '$jml')";
$InsertDetail = mysql_query($queryInsertDetail) or die(mysql_error());
header("location:index.php?act=keranjang");
}
}
?>