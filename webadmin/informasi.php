<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=informasi";
	$act = $_GET[act];
	$id = $_GET[id];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

</head>

<body>
<div id="box">
<?
    if (empty($act))
	{
?>
<? echo "<a href='$url&act=tambah' class='useradd'>"; ?>TAMBAH BARU</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">

	<thead>
  <tr>
    <th colspan="5" class="">INFORMASI / NEWS</th>
  </tr>
  <tr>
    <th class="headertabel">TANGGAL</th>
    <th class="headertabel">JUDUL</th>
    <th class="headertabel">ISI</th>
    <th width="144" class="headertabel">Action</th>
  </tr>
  </thead>
  <tbody>
<?
	$q = mysql_query("select * from t_informasi order by waktu desc");
	while ($t = mysql_fetch_array($q))
	{
	   $tanggal = tgl_indonesia($t[waktu]);
?>
  <tr>
    <td class="isitabel"><? echo $tanggal; ?></td>
    <td class="isitabel"><? echo $t[judul]; ?></td>
    <td class="isitabel"><? echo $t[isi]; ?></td>
    
    <td align="left" class="isitabel"><? echo "<a href='$url&act=ubah&id=$t[id]' class='useredit'>"; ?>UBAH</a> | 
	<? echo "<a href='prosesinformasi.php?aksi=hapus&id=$t[id]' class='userdelete'>"; ?>HAPUS</a>
	</td>
  </tr>
<? } ?>
</tbody>
</table>
<p>&nbsp;</p>
<?
} else
    if ($act=='tambah')
	{
?>
<p>&nbsp;</p>

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="baris_header1">INFORMASI / NEWS </td>
  </tr>
  <tr>
    <td class="bgform"><form id="form1" name="form1" method="post" action="prosesinformasi.php?aksi=tambah" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="39%" class="label_form">JUDUL</td>
          <td width="61%"><label>
            <input name="judul" type="text" id="judul" size="50" />
          </label></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">ISI</td>
          <td><label>
            <textarea name="isi" cols="50" rows="10"></textarea>
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><HR></td>
          </tr>
        <tr>
          <td colspan="2" align="right" class="label_form"><label>
            <input type="submit" name="Submit" value="Simpan" />
          </label>
            <label>
            <input type="button" name="button" value="Batal" onclick="location.href='<? echo $url; ?>'" />
            </label>			</td>
          </tr>
      </table>
        </form>    </td>
  </tr>
</table>
<p>&nbsp;</p>
<?
} else
    if ($act=='ubah')
	{
	   $q = mysql_query("select * from t_informasi where id ='$id'");
	   $t = mysql_fetch_array($q);
?>

<p>&nbsp;</p>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="baris_header1">UBAH INFORMASI / NEWS </td>
  </tr>
  <tr>
    <td class="bgform"><form id="form1" name="form1" method="post" action="prosesinformasi.php?aksi=ubah" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="39%" class="label_form">JUDUL</td>
          <td width="61%">
		  <input name="id" type="hidden" id="id" <? echo "value='$t[id]'"; ?> />
		  <label>
            <input name="judul" type="text" id="judul" size="50" <? echo "value='$t[judul]'"; ?> />
          </label></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">ISI</td>
          <td><label>
            <textarea name="isi" cols="50" rows="10"><? echo $t[isi]; ?></textarea>
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><HR></td>
          </tr>
        <tr>
          <td colspan="2" align="right" class="label_form">
		 <label>
            <input type="submit" name="Submit" value="UBAH" />
          </label>		  
		  <label>
            <input type="submit" name="Submit" value="HAPUS" />
          </label>
            <label>
            <input type="button" name="button" value="Batal" onclick="location.href='<? echo $url; ?>'" />
            </label></td>
          </tr>
      </table>
        </form>    </td>
  </tr>
</table>
<? } ?>
</div>
</body>
</html>
