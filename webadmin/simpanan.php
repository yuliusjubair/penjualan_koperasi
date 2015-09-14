<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=simpanan";
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
<?
    if (empty($act))
	{
?>
 <div id="box">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="9"><h4>DATA SIMPANAN SUKARELA ANGGOTA</h4></th>
 </tr>
 <tr>
 	<td colspan="9">
		<form action="?mod=simpanan" name="form_cari" method="post">
			<label style="font-weight:bold;">Cari Pegawai </label><input type="text" name="cari_nama" /> <input type="submit" name="Submit" id="button1" value="Cari Pegawai" />
            
		</form>
	
	</td>
 </tr>
 <tr>
  	<th class="headertabel"><a>NO</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NIP</a></th>
	<th class="headertabel"><a>NO ANGGOTA</a></th>
    <th class="headertabel"><a>NAMA</a></th>
    <th class="headertabel"><a>NO KTP </a></th>
    <th class="headertabel"><a>JABATAN</a></th>
    <th class="headertabel"><a>GOLONGAN</a></th>
	<th class="headertabel"><a>SIMPANAN</a></th>
    <th class="headertabel">Action</th>
  </tr>
  </thead>
  <tbody>
<?
	$cari = $_POST[cari_nama];
	if(!empty($cari)){
		$condition = " and nama_lengkap  like '%$cari%' ";
	}
	$q = mysql_query("select * from mst_anggota where status_pegawai = 1 ".$condition." order by id");
	$no = 1;
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
  	<td class="isitabel"><? echo $no; ?></td>	
	<td class="isitabel"><? echo $t[nip]; ?></td>
    <td class="isitabel"><? echo $t[no_anggota]; ?></td>
    <td class="isitabel"><? echo $t[nama_lengkap]; ?></td>
    <td class="isitabel"><? echo $t[no_ktp]; ?></td>
    <td class="isitabel"><? echo $t[jabatan]; ?></td>
    <td class="isitabel"><? echo $t[golongan]; ?></td>
	<td class="isitabel"><? echo "Rp. " . number_format($t[simpanan]); ?></td>
    <td align="center" class="isitabel"><? echo "<a href='index.php?mod=simpanan&act=ubah&id=$t[no_anggota]' class='useredit'>"; ?>Update Simpanan</a> </td>
  </tr>
<? $no++; } ?>
</tbody>
</table>
</div>
<p>&nbsp;</p>
<?
} else
    if ($act=='ubah')
	{
	   $q = mysql_query("select * from mst_anggota where no_anggota ='$id'");
	   $t = mysql_fetch_array($q);
?>

<p>&nbsp;</p>
<div id="box">
<form id="form1" name="form1" method="post" action="prosespegawai.php?aksi=update_simpanan">
<table width="900" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td class="">
	
	<fieldset id="personal">
		<legend>Data Pribadi</legend>
      <table>
        <tr>
          <td width="67%" class="label_form">NIP</td>
          <td><label>
            <input name="nip" type="text" id="nip"  <? echo "value='$t[nip]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NAMA</td>
          <td><label>
            <input name="nama" type="text" id="nama" size="50" <? echo "value='$t[nama_lengkap]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">Tambah Jumlah Simpanan</td>
          <td><label>
            <input name="simpanan" type="text" id="simpanan"/>
          </label></td>
        </tr>
        </table>
	</fieldset>
        
        <tr>
         <td colspan="2" class="label_form">
		
            <input type="submit" name="Submit" value="UBAH" id="button1" />
         
            <input type="submit" name="Submit" value="Batal" id="button1" onclick="self.history.back();" />
          
           
           </td>
          </tr>
      </table>
      </form>
	  </td>
  </tr>
</table>
<h3> <a href='<? echo $url; ?>'" />Kembali</a></h3>
</div>
<? } ?>

</body>
</html>
