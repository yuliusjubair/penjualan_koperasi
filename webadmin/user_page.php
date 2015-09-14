<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<link href="../css/styles.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .style1{
            font-size: 12px;
            color: black;
            font-weight: bold;
        }
        .head{
            font-size: 12px;
            color: blue;
            font-weight: bold;
        }
    </style>
<body>
    <?php
        $email = $_GET['no'];
        include "../config/koneksi.php";
              
              $sql = mysql_query("SELECT * FROM mst_anggota WHERE
                                  no_anggota = '$email'
                                ")or die(mysql_error());
              $costumer = mysql_fetch_array($sql);
    ?>
<form action="../index.php?pages=edit_costumer" method="post">
	<table align="center">
		<tr>
            <td colspan="2" align="center" valign="top">
                <img src="<?php echo '../images/'.$costumer['photo']?>" width="100" height="100">
			</td>
            <td>
                <table>
                    <tr>
                        <td class="head">Email</td>
                        <td>:</td>
                        <td class="style1"><?php echo $costumer['alamat_email']?></td>
                    </tr>
                    <tr>
                        <td class="head">Name</td>
                        <td>:</td>
                        <td class="style1"><?php echo $costumer['nama_lengkap']?></td>
                    </tr>
                    <tr>
                        <td class="head" valign="top">Alamat</td>
                        <td valign="top">:</td>
                        <td class="style1"><?php echo $costumer['alamat']?></td>
                    </tr>
                    <tr>
                        <td class="head">Kota</td>
                        <td>:</td>
                        <td class="style1"><?php echo $costumer['kota']?></td>
                    </tr>
                    <tr>
                        <td class="head">Telepon</td>
                        <td>:</td>
                        <td class="style1"><?php echo $costumer['telepon']?></td>
                    </tr>
                   
                  </table>
            </td>
		</tr>
</table>
</form>
</body>
</html>
