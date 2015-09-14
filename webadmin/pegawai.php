<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=pegawai";
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
<h4><? echo "<a href='?mod=anggota&act=tambah' class='useradd'>"; ?>Tambah Pegawai</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="9"><h4>DATA PEGAWAI</h4></th>
 </tr>
 <tr>
 	<td colspan="9">
		<form action="?mod=pegawai" name="form_cari" method="post">
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
	<th class="headertabel"><a>FOTO</a></th>
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
	<td class="isitabel"><img src="<?php echo '../images/'.$t[photo]?>" width="100" height="100" /></td>
    <td align="center" class="isitabel"><? echo "<a href='index.php?mod=anggota&act=ubah&id=$t[no_anggota]' class='useredit'>"; ?>Edit</a> | <? echo "<a href=prosespegawai.php?aksi=hapus&id=$t[no_anggota] class='useredit'>"; ?>Hapus</a></td>
  </tr>
<? $no++; } ?>
</tbody>
</table>
</div>
<p>&nbsp;</p>
<?
} else
    if ($act=='tambah')
	{
?>
<p>&nbsp;</p>
<div id="box">
<h3 id="adduser">TAMBAH PEGAWAI</h3>

			<table width="900" border="0" cellspacing="0" cellpadding="0">
			 
			  <tr>
				<td class="">
				<form id="form1" name="form1" method="post" action="prosespegawai.php?aksi=tambah">
				<fieldset id="personal">
	
    				<legend>Data Pribadi</legend>
				  <table>
					<tr>
					  <td width="68%" class="label_form">NIP</td>
					  <td><label>
						<input name="nip" type="text" id="nip" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">NAMA</td>
					  <td><label>
						<input name="nama" type="text" id="nama" size="50" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">NOMOR KTP </td>
					  <td><label>
						<input name="no_ktp" type="text" id="no_ktp" />
					  </label></td>
					</tr>
					
				</table>
			</fieldset>			
			<fieldset id="personal">
		
			<legend>Data Pekerjaan</legend>
				<table>
					<tr>
					  <td width="40%" class="label_form">GOLONGAN</td>
					  <td><label>
						<input name="golongan" type="text" id="golongan" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">JABATAN</td>
					  <td><label>
						<input name="jabatan" type="text" id="jabatan" />
					  </label></td>
					</tr>
					
					<tr>
					  <td colspan="2" align="right" class="label_form">
						<input type="submit" name="Submit" id="button1" value="Simpan" />
					 
						<input type="button" name="button" id="button2" value="Batal" onclick="location.href='<? echo $url; ?>'" />
					   
						</td>
					  </tr>
				  </table>
				  </fieldset>
					</form>    
				</td>
			  </tr>
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
<table width="900" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td class="">
	<form id="form1" name="form1" method="post" action="prosespegawai.php?aksi=ubah">
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
            <input name="nama" type="text" id="nama" size="50" <? echo "value='$t[nama]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NOMOR KTP </td>
          <td><label>
            <input name="no_ktp" type="text" id="no_ktp" <? echo "value='$t[no_ktp]'"; ?>/>
          </label></td>
        </tr>
        </table>
	</fieldset>
	<fieldset id="personal">	
    	<legend>Data Pekerjaan</legend>
		<table>
        <tr>
          <td class="label_form">GOLONGAN</td>
          <td><label>
            <input name="golongan" type="text" id="golongan" <? echo "value='$t[golongan]'"; ?> />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">JABATAN</td>
          <td><label>
            <input name="jabatan" type="text" id="jabatan" <? echo "value='$t[jabatan]'"; ?>/>
          </label></td>
        </tr>
        
        <tr>
         <td colspan="2" class="label_form">
		
            <input type="submit" name="Submit" value="UBAH" id="button1" />
         
            <input type="submit" name="Submit" value="HAPUS" id="button1"/>
          
           
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
