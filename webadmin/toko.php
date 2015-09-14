<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=toko";
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
 <h4><? echo "<a href='$url&act=tambah' class='useradd'>"; ?>Tambah Toko</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA TOKO</h4></th>
 </tr>
  <tr>
  	<th class="headertabel"><a>KODE</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NAMA TOKO</a></th>
    <th class="headertabel"><a>ALAMAT</a></th>
    <th class="headertabel"><a>KOTA</a></th>
	<th class="headertabel"><a>TELEPON</a></th>
    <th class="headertabel"><a>ACTION</a></th>
  </tr>
  </thead>
<?
	$q = mysql_query("select * from mst_toko order by kd_toko");
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
    <td class="isitabel" align="center"><? echo $t[kd_toko]; ?></td>
    <td class="isitabel "align="center"><? echo $t[nama_toko]; ?></td>
    <td class="isitabel" align="center"><? echo $t[alamat]; ?></td>
    <td class="isitabel" align="center"><? echo $t[kota]; ?></td>
    <td class="isitabel" align="center"><? echo $t[telp]; ?></td>
    <td align="center" class="isitabel" ><? echo "<a href='$url&act=ubah&id=$t[kd_toko]' class='useredit'>"; ?>Edit</a></td>
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

<h3 id="adduser">TAMBAH TOKO</h3>

	<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
			<form id="form1" name="form1" method="post" action="prosestoko.php?aksi=tambah" enctype="multipart/form-data">
			<fieldset id="personal">	
    				<legend>Data Toko</legend>
      <table  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td  class="label_form">KODE</td>
          <td><label>
            <input name="kd_toko" type="text" id="kd_toko" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NAMA TOKO</td>
          <td><label>
            <input name="nama_toko" type="text" id="nama_toko" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">ALAMAT </td>
          <td><label>
            <input name="alamat" type="text" id="alamat" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">KOTA </td>
          <td><label>
            <input name="kota" type="text" id="kota" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">KONTAK  </td>
          <td><label>
            <input name="kontak" type="text" id="kontak" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">TELEPON</td>
          <td><input name="telp" type="text" id="telp" /></td>
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
	   $q = mysql_query("select * from mst_toko where kd_toko ='$id'");
	   $t = mysql_fetch_array($q);
?>

<p>&nbsp;</p>
<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
		<form id="form1" name="form1" method="post" action="prosestoko.php?aksi=ubah" enctype="multipart/form-data">
		<fieldset id="personal">	
    				<legend>Data Toko</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="label_form">KODE</td>
          <td><label>
            <input name="kd_toko" type="text" id="kd_toko" <? echo "value='$t[kd_toko]'"; ?> />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NAMA TOKO</td>
          <td><label>
            <input name="nama_toko" type="text" id="nama_toko" size="50" <? echo "value='$t[nama_toko]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">ALAMAT </td>
          <td><label>
            <input name="alamat" type="text" id="alamat" size="50" <? echo "value='$t[alamat]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">KOTA </td>
          <td><label>
            <input name="kota" type="text" id="kota" <? echo "value='$t[kota]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">KONTAK  </td>
          <td><label>
            <input name="kontak" type="text" id="kontak" size="50" <? echo "value='$t[kontak]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">TELEPON</td>
          <td><input name="telp" type="text" id="telp" <? echo "value='$t[telp]'"; ?>/></td>
        </tr>
       
        <tr>
          <td colspan="2" align="right" class="label_form">
            <input type="submit" name="Submit" value="UBAH" id="button1" />
            <input type="submit" name="Submit" value="HAPUS" id="button2" />
            
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
