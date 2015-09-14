<? 
$action = $_GET['action'];
if($action == "logout"){
session_start();
	session_destroy();
	header('location:index.php?pages=login');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: Koperasi Mitra Setia ::.</title>
<style type="text/css">
<!--
body {
	background-image: url(images/bgheader.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	/*background-color: #FAE7E3;
*/}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="theme1.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="">
  <tr>
    <td height="88" class="bgheader">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="40%">&nbsp;</td>
			<td width="60%" class="barismenu"> </td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../images/banner2.jpg" width="899" height="139" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#000000">
      		<tr>  		   
				<td width="100%" valign="top" colspan="2"><? include 'login.php'; ?></td>	
		  	</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
