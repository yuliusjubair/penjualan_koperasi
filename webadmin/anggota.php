<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=anggota";
	$act = $_GET[act];
	$id = $_GET[id];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_validateForm() { //v4.0
	  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
	  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
		if (val) { nm=val.name; if ((val=val.value)!="") {
		  if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
			if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
		  } else if (test!='R') { num = parseFloat(val);
			if (isNaN(val)) errors+='- '+nm+' harus diisi dengan Angka.\n';
			if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
			  min=test.substring(8,p); max=test.substring(p+1);
			  if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
		} } } else if (test.charAt(0) == 'R') errors += '- '+nm+' harus diisi.\n'; }
	  } if (errors) alert('Warning..!\n'+errors);
	  document.MM_returnValue = (errors == '');
	}
//-->
</script>
</head>

<body>
<?
    if (empty($act))
	{
?>
 <div id="box">
<h4><? echo "<a href='cetak_anggota_pdf.php' class='useradd' target='_blank'>"; ?>Cetak Pdf</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="8"><h4>DATA ANGGOTA WEB</h4></th>
 </tr>
 <tr>
 	<td colspan="8" style="">
		<form action="?mod=anggota" name="form_cari" method="post">
			<label style="font-weight:bold;">Cari Anggota </label><input type="text" name="cari_nama" /> <input type="submit" name="Submit" id="button1" value="Cari Anggota" />
            
		</form>
	
	</td>
 </tr>
  <tr>
  	<th class="headertabel"><a>NO</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NO.ANGGOTA</a></th>
    <th class="headertabel"><a>NAMA</a></th>
    <th class="headertabel"><a>NO KTP </a></th>
	<th class="headertabel"><a>ALAMAT </a></th>
	<th class="headertabel"><a>KOTA </a></th>
	<th class="headertabel"><a>AKTIV </a></th>
    <th class="headertabel">Action</th>
  </tr>
  </thead>
  <tbody>
<?
	$cari = $_POST[cari_nama];
	if(!empty($cari)){
		$condition = " and nama_lengkap  like '%$cari%' ";
	}
	$q = mysql_query("select * from mst_anggota where status_pegawai = 0 ".$condition." order by id");
	$no = 1;
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
  	<td class="isitabel"><? echo $no; ?></td>	
    <td class="isitabel"><? echo $t[no_anggota]; ?></td>
    <td class="isitabel"><? echo $t[nama_lengkap]; ?></td>
    <td class="isitabel"><? echo $t[no_ktp]; ?></td>
    <td class="isitabel"><? echo $t[alamat]; ?></td>
    <td class="isitabel"><? echo $t[kota]; ?></td>
	<td class="isitabel"><?  if($t[aktivasi]==0){
								echo "Belum Aktif";
							}else{
								echo "Sudah Aktif";
							} ?>
	</td>
    <td align="center" class="isitabel"><? echo "<a href='prosesanggota.php?aksi=hapus&id=$t[no_anggota]' class='useredit'>"; ?>Hapus</a> | 
	</td>
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
				<form id="form1" name="form1" method="post" action="prosesanggota.php?aksi=tambah" enctype="multipart/form-data" onSubmit="MM_validateForm('nip','','RisNum','nama_lengkap','','R','no_ktp','','RisNum','alamat_email','','RisEmail','kota','','R','tempat_lahir','','R');return document.MM_returnValue">
				<fieldset id="personal">
	
    				<legend>Data Pribadi</legend>
				  <table>
					
					<tr>
					  <td class="label_form">NIP</td>
					  <td><label>
						<input name="nip" type="text" id="nip" size="50" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">NAMA</td>
					  <td><label>
						<input name="nama_lengkap" type="text" id="nama_lengkap" size="50" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">NOMOR KTP </td>
					  <td><label>
						<input name="no_ktp" type="text" id="no_ktp" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form" valign="top">ALAMAT </td>
					  <td><label>
						<textarea name="alamat"  id="alamat" cols="30" rows="5" /></textarea>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">PROVINSI</td>
					  <td><input name="provinsi" type="text" id="provinsi" /></td>
					</tr>
					<tr>
					  <td class="label_form">KOTA </td>
					  <td><label>
						<input name="kota" type="text" id="kota" />
					  </label></td>
					</tr>
					
					<tr>
					  <td width="40%" class="label_form">EMAIL</td>
					  <td><label>
						<input name="alamat_email" type="text" id="alamat_email" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">UPLOAD FOTO  </td>
					  <td><label>
						<input name="photo" type="file" id="photo" size="40" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form" valign="top">KETERANGAN </td>
					  <td><label>
						<textarea name="keterangan"  id="keterangan" /></textarea>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">TELEPON</td>
					  <td><label>
						<input name="telepon" type="text" id="telepon" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">PASSWORD</td>
					  <td><label>
						<input name="kata_kunci" type="text" id="kata_kunci" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">TEMPAT LAHIR </td>
					  <td><input name="tempat_lahir" type="text" id="tempat_lahir" size="50" /></td>
       				 </tr>
					<tr>
					  <td class="label_form">TANGGAL LAHIR </td>
					  <td>
						<select name="tanggal">
						<?
						   for ($tgl=1;$tgl<=31;$tgl++)
						   {
							 echo "<option value='$tgl'>$tgl</option>";
						   }
						?>
						</select>&nbsp;
						<select name="bulan">
						<?
						   for ($bln=1;$bln<=12;$bln++)
						   {
							 $bulan = get_bulan($bln);
							 echo "<option value='$bln'>$bulan</option>";
						   }
						?>
						</select>
							&nbsp;
						<select name="tahun">
				<?php 
					$skrg = date('Y');
					for($a=1950;$a<=$skrg;$a++){
						echo "<option value='$a'>$a</option>";
					}
				?>
			</select>
							</td>
					</tr>
					<tr>
					  <td class="label_form">STATUS KAWIN </td>
					  <td><select name="status" size="1" id="status">
						<option value="Kawin" selected="selected">Kawin</option>
						<option value="Belum Kawin">Belum Kawin</option>
						<option value="Lain-lain">Lain-lain</option>
													</select></td>
					</tr>
					
					 <tr>
					  <td class="label_form">JENIS KELAMIN </td>
					  <td><label>
						<select name="jenis_kelamin" size="1" id="jenis_kelamin">
						  <option value="Laki-laki" selected="selected">Laki-laki</option>
						  <option value="Perempuan">Perempuan</option>
						</select>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">GOLONGAN</td>
					  <td><input name="golongan" type="text" id="golongan" size="50" <? echo "value='$t[golongan]'"; ?> /></td>
					</tr>
					<tr>
					  <td class="label_form">JABATAN</td>
					  <td><input name="jabatan" type="text" id="jabatan" size="50" <? echo "value='$t[jabatan]'"; ?> /></td>
					</tr>
					<tr>
					  <td class="label_form">ASAL SEKOLAH</td>
					  <td><input name="asal" type="text" id="asal" size="50" /></td>
					</tr>
					<tr>
					  <td class="label_form">GAJI POKOK</td>
					  <td><input name="gaji" type="text" id="gaji" size="50" <? echo "value='$t[jabatan]'"; ?> /></td>
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
	   $tanggal = explode("-", $t['tanggal_lahir']);
?>

<p>&nbsp;</p>
<div id="box">
<h3 id="adduser">EDIT ANGGOTA</h3>

			<table width="900" border="0" cellspacing="0" cellpadding="0">
			 
			  <tr>
				<td class="">
				<form id="form1" name="form1" method="post" action="prosesanggota.php?aksi=ubah" enctype="multipart/form-data">
				<fieldset id="personal">
	
    				<legend>Data Pribadi</legend>
				  <table>
					
					<!--<tr>
					  <td class="label_form">NO ANGGOTA</td>
					  <td><label>-->
					  <input name="id" type="hidden" id="id" size="50"<? echo "value='$t[id]'"; ?> />
						<input name="no_anggota" type="hidden" id="no_anggota" size="50"<? echo "value='$t[no_anggota]'"; ?> />
					  <!--</label></td>
					</tr>-->
					<tr>
					  <td class="label_form">NAMA</td>
					  <td><label>
						<input name="nama_lengkap" type="text" id="nama_lengkap" size="50" <? echo "value='$t[nama_lengkap]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">NOMOR KTP </td>
					  <td><label>
						<input name="no_ktp" type="text" id="no_ktp" <? echo "value='$t[no_ktp]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">ALAMAT </td>
					  <td><label>
						<textarea name="alamat"  id="alamat" /><? echo $t[alamat]; ?></textarea>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">PROVINSI </td>
					  <td><label>
						<input name="provinsi" type="text" id="provinsi" <? echo "value='$t[provinsi]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">KOTA </td>
					  <td><label>
						<input name="kota" type="text" id="kota" <? echo "value='$t[kota]'"; ?> />
					  </label></td>
					</tr>
					
					<tr>
					  <td width="40%" class="label_form">EMAIL</td>
					  <td><label>
						<input name="alamat_email" type="text" id="alamat_email" <? echo "value='$t[alamat_email]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">UPLOAD GAMBAR  </td>
					  <td><label>
						<input name="photo" type="file" id="photo" size="40" />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">KETERANGAN </td>
					  <td><label>
						<textarea name="keterangan"  id="keterangan"  /><? echo $t[keterangan]; ?></textarea>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">TELEPON</td>
					  <td><label>
						<input name="telepon" type="text" id="telepon" <? echo "value='$t[telepon]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">PASSWORD</td>
					  <td><label>
						<input name="kata_kunci" type="text" id="kata_kunci" <? echo "value='$t[kata_kunci]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">TEMPAT LAHIR </td>
					  <td><input name="tempat_lahir" type="text" id="tempat_lahir" size="50" <? echo "value='$t[tempat_lahir]'"; ?> /></td>
       				 </tr>
					<tr>
					  <td class="label_form">TANGGAL LAHIR </td>
					  <td><label>
						<select name="tanggal">
						<?
						   for ($tgl=1;$tgl<=31;$tgl++)
						   {
							 echo "<option value='$tgl'>$tgl</option>";
						   }
						?>
						</select>
					  </label>
						<label>
						<select name="bulan">
						<?
						   for ($bln=1;$bln<=12;$bln++)
						   {
							 $bulan = get_bulan($bln);
							 echo "<option value='$bln'>$bulan</option>";
						   }
						?>
						</select>
						</label>
						<label>
						<input name="tahun" value="<?php echo $tanggal[0]?>" type="text" id="tahun" size="7" maxlength="4" />
						</label></td>
					</tr>
					<tr>
					  <td class="label_form">STATUS KAWIN </td>
					  <td><select name="status" size="1" id="status">
						<option value="Kawin" selected="selected">Kawin</option>
						<option value="Belum Kawin">Belum Kawin</option>
						<option value="Lain-lain">Lain-lain</option>
													</select></td>
					</tr>
					<tr>
					  <td class="label_form">PEKERJAAN</td>
					  <td><input name="pekerjaan" type="text" id="pekerjaan" size="50" <? echo "value='$t[pekerjaan]'"; ?> /></td>
					</tr>
					 <tr>
					  <td class="label_form">JENIS KELAMIN </td>
					  <td><label>
						<select name="jenis_kelamin" size="1" id="jenis_kelamin">
						  <option value="Laki-laki" selected="selected">Laki-laki</option>
						  <option value="Perempuan">Perempuan</option>
						</select>
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">GOLONGAN</td>
					  <td><input name="golongan" type="text" id="golongan" size="50" <? echo "value='$t[golongan]'"; ?> /></td>
					</tr>
					<tr>
					  <td class="label_form">JABATAN</td>
					  <td><input name="jabatan" type="text" id="jabatan" size="50" <? echo "value='$t[jabatan]'"; ?> /></td>
					</tr>
					<tr>
					  <td class="label_form">ASAL SEKOLAH</td>
					  <td><input name="asal" type="text" id="asal" size="50" <? echo "value='$t[asal_sekolah]'"; ?>/></td>
					</tr>
					<tr>
					  <td class="label_form">GAJI POKOK</td>
					  <td><input name="gaji" type="text" id="gaji" size="50" <? echo "value='$t[gaji]'"; ?> /></td>
					</tr>
					<tr>
					  <td colspan="2" align="right" class="label_form">
						<input type="submit" name="Submit" id="button1" value="UBAH" />
					 
						<input type="button" name="button" id="button2" value="Batal" onclick="location.href='<? echo $url; ?>'" />
					   
						</td>
					  </tr>
				  </table>
				  </fieldset>
					</form>    
				</td>
			  </tr>
			</table>

<h3> <a href='<? echo $url; ?>'" />Kembali</a></h3>
</div>
<? } ?>

</body>
</html>
