<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Event</title>
</head>

<?
include "config/koneksi.php";

		$no_anggota=$_POST['no_anggota'];
		$bank=$_POST['bank'];
		$rekening=$_POST['rekening'];
		$nama=$_POST['nama'];
		
		$jumlah = $_POST['jmltransfer'];
		$no_order = $_POST['no_order'];
		$tgl = date('Y-m-d');
  //echo $no_anggota;exit;
  		mysql_query ("update mst_anggota set nama_bank='$bank', rekening='$rekening',atas_nama='$nama', jumlah_transfer='$jumlah',no_order='$no_order',tanggal_transfer='$tgl' where no_anggota='$no_anggota'") or die (mysql_error());
	

?>
<script language="JavaScript">
     function loadPage(){
        window.location.href = "Index.php?act=dataTransaksi&cek=1";
       }
</script>
<body onload="loadPage();">
</body>
</html>

