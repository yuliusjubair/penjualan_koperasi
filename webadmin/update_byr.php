<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Event</title>
</head>

<?
include "../config/koneksi.php";
		$id=$_GET['kode'];
		$stat = "1";
mysql_query ("update pemesanan set ORDER_STATUS='$stat' where ORDER_KODE='$id'") or die (mysql_error());

 	
?>
<script language="JavaScript">
     function loadPage(){
        window.location.href = "Index.php?mod=pesanan";
       }
</script>
<body onload="loadPage();">
</body>
</html>

