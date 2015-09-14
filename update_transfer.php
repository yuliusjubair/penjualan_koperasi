<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Event</title>
</head>

<?
include "config/koneksi.php";

		$kode=$_POST['order_kode'];
		
        $photo= $_FILES['upload']['name'];
		$lokasi = "images/";
		

   if(!empty($photo)){
   
  		//move_uploaded_file($lokasi,"images/$photo");
		mysql_query ("update pemesanan set bukti_transfer='$photo' where ORDER_KODE='$kode'") or die (mysql_error());
		copy($HTTP_POST_FILES['upload']['tmp_name'], "images/".$_FILES['upload']['name']);
		
	}else{
	
	}

?>
<script language="JavaScript">
     function loadPage(){
        window.location.href = "Index.php?act=finish_transfer&no=<?php echo $kode?>";
       }
</script>
<body onload="loadPage();">
</body>
</html>

