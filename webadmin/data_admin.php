<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=datauser";
	$act = $_GET[act];
	$id = $_GET[id];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
<div id="box">
<?
    if (empty($act))
	{
?>
 <h4><? echo "<a href='$url&act=tambah' class='useradd'>"; ?>Tambah ADMIN</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA ADMIN</h4></th>
 </tr>
  <tr>
  	<th class="headertabel"><a>NIK</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NAMA LENGKAP</a></th>
    <th class="headertabel"><a>USERNAME</a></th>
    <th class="headertabel"><a>ALAMAT</a></th>
	<th class="headertabel"><a>TELEPON</a></th>
	<th class="headertabel"><a>EMAIL</a></th>
    <th class="headertabel"><a>ACTION</a></th>
  </tr>
  </thead>
<?
	$q = mysql_query("select * from t_user order by nik");
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
  <td class="isitabel" align="center"><? echo $t[nik]; ?></td>
    <td class="isitabel" align="center"><? echo $t[nama_pegawai]; ?></td>
    <td class="isitabel "align="center"><? echo $t[username]; ?></td>
    <td class="isitabel" align="center"><? echo $t[alamat_pegawai]; ?></td>
    <td class="isitabel" align="center"><? echo $t[telepon]; ?></td>
    <td class="isitabel" align="center"><? echo $t[email]; ?></td>
    <td align="center" class="isitabel" ><? echo "<a href='$url&act=ubah&id=$t[nik]' class='useredit'>"; ?>Edit</a> | <? echo "<a href='prosesadmin.php?aksi=hapus&id=$t[nik]' class='useredit'>"; ?>Hapus</a></td>
  </tr>
<? } ?>
</table>
<p>&nbsp;</p>
<?
} else
    if ($act=='tambah')
	{
?>
<p>&nbsp;</p>

<h3 id="adduser">TAMBAH ADMIN</h3>

	<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
			<form id="form1" name="form1" method="post" action="prosesadmin.php?aksi=tambah" enctype="multipart/form-data">
			<fieldset id="personal">	
    				<legend>Data Admin</legend>
      <table  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td  class="label_form">NIK</td>
          <td><label>
            <input name="nik" type="text" id="nik" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NAMA LENGKAP</td>
          <td><label>
            <input name="nama" type="text" id="nama" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">USERNAME</td>
          <td><label>
            <input name="username" type="text" id="username" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">PASSWORD</td>
          <td><label>
            <input name="password" type="password" id="password" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">ALAMAT</td>
          <td><label>
            <input name="alamat" type="text" id="alamat" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">TELEPON</td>
          <td><input name="telepon" type="text" id="telepon" /></td>
        </tr>
       <tr>
          <td class="label_form">EMAIL</td>
          <td><input name="email" type="text" id="email" /></td>
        </tr>
       
        <tr>
          <td colspan="2" align="right" class="label_form">
            <input type="submit" name="Submit" value="Simpan" id="button1" />
          
            <input type="button" name="button" value="Batal" onclick="location.href='<? echo $url; ?>'" id="button2" />
           			</td>
          </tr>
      </table>
	  </fieldset>
        </form>
		
		</td>
  </tr>
</table>
<p>&nbsp;</p>
<?
} else
    if ($act=='ubah')
	{
	   $q = mysql_query("select * from t_user where nik ='$id'");
	   $t = mysql_fetch_array($q);
?>

<p>&nbsp;</p>
<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
		<form id="form1" name="form1" method="post" action="prosesadmin.php?aksi=ubah" enctype="multipart/form-data">
		<fieldset id="personal">	
    				<legend>Data Admin</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td class="label_form">NAMA LENGKAP</td>
          <td><label>
            <input name="nama" type="text" id="nama" size="50" <? echo "value='$t[nama_pegawai]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">USERNAME</td>
          <td><label>
            <input name="username" type="text" id="username" size="50" <? echo "value='$t[username]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">PASSWORD</td>
          <td><label>
            <input name="password" type="password" id="password" <? echo "value='$t[password]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">ALAMAT</td>
          <td><label>
            <input name="alamat" type="text" id="alamat" size="50" <? echo "value='$t[alamat_pegawai]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">TELEPON</td>
          <td><input name="telepon" type="text" id="telepon" <? echo "value='$t[telepon]'"; ?>/></td>
        </tr>
        <tr>
          <td class="label_form">EMAIL</td>
          <td><input name="email" type="text" id="email" <? echo "value='$t[email]'"; ?>/></td>
        </tr>
       
        <tr>
          <td colspan="2" align="right" class="label_form">
		  <input type="hidden" name="nik" value="<?php echo $t['nik']?>" />
            <input type="submit" name="Submit" value="ubah" id="button1" />
            <input type="submit" name="Submit" value="hapus" id="button2" />
            
            </label></td>
          </tr>
      </table>
	  </fieldset>
	  <h3><a href="<? echo $url; ?>" />Kembali</a></h3>
        </form>    </td>
  </tr>
</table>
<? } ?>
</div>
</body>
</html>
