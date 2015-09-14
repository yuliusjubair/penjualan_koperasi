<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Event</title>
</head>

<?
include "../config/koneksi.php";
		$no=$_GET['no'];
mysql_query ("UPDATE t_cicilan SET cicilan=cicilan-1 where no_anggota='$no'") or die (mysql_error());
 	
?>
<script language="JavaScript">
     function loadPage(){
        window.location.href = "index.php?mod=cicilan";
       }
</script>
<body onload="loadPage();">
</body>
</html>

