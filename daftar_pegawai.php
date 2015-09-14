<?
   include "config/koneksi.php";
	include "config/fungsi.php";

	$url = "?act=pegawai";
	$aksi = $_GET[aksi];
	$no_anggota = $_GET[no_anggota];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table width="600" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td class="formdaftar">
	<?
    if (empty($no_anggota))
	{
	?>
	
	<form id="form1" name="form1" method="post" action="prosespegawai.php?cek=cari" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="39%" class="baris_header1">CARI NO ANGGOTA </td>
          <td width="61%" class="judulformlogin">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="barisheader2"><p>Masukan NO ANGGOTA Anda pada form di bawah ini :</p>
            
          </tr>
       
        
        <tr>
          <td class="label_form">NO ANGGOTA PEGAWAI </td>
          <td><label>
		  <input name="cek" type="hidden" id="cek" value="cari" />
          <input name="no_anggota" type="text" id="no_anggota" size="50" />
          </label></td>
        </tr>
        
        <tr>
          <td colspan="2" valign="top" class="label_form"><label>
            <input type="submit" name="Submit" value="Cari" />
          </label>
            <label>
            <input type="submit" name="Submit2" value="Batal" />
            </label></td>
          </tr>
      </table>
        </form>
	<? }elseif($aksi = "ubah"){ 
		 $q = mysql_query("select * from mst_anggota where no_anggota ='$no_anggota'");
	  	 $t = mysql_fetch_array($q);	 
		 
		 if($t['aktivasi']==1){
		 	echo "<h3>ANDA SUDAH TERDAFTAR SEBAGAI ANGGOTA KAMI</h3>";
		 }elseif(empty($t)){
		 	echo "<h3>ANDA BELUM TERDAFTAR</h3>";
		 }else{
	
	?>
	<form id="form1" name="form1" method="post" action="prosespegawai.php?cek=update" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					 <tr>
					  <td width="39%" class="baris_header1">CARI NO ANGGOTA </td>
					  <td width="61%" class="judulformlogin">&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="2" class="barisheader2"><p>Anda Telah Terdaftar Sebagai Pegawai,Masukan Password Baru:</p>
						
					</tr>
					<tr>
					 	<td colspan="2" style="">
							<center>
							<table  border="1" width="80%" style="background:#fff; padding:20px; margin-top:20px;">
								<tr>
									<td><b>NO ANGGOTA</b></td><td><? echo $t[no_anggota]; ?></td>
								</tr>
								<tr>
									<td><b>NAMA</b></td><td><? echo $t[nama_lengkap]; ?></td>
								</tr>
								<tr>
									<td><b>NO KTP</b></td><td><? echo $t[no_ktp]; ?></td>
								</tr>
								<tr>
									<td><b>ALAMAT</b></td><td><? echo $t[kota]; ?></td>
								</tr>
								<tr>
									<td><b>TELEPON</b></td><td><? echo $t[telepon]; ?></td>
								</tr>
								<tr>
									<td><b>EMAIL</b></td><td><? echo $t[alamat_email]; ?></td>
								</tr>
							</table>
							</center>
						</td>						
					</tr>
					<tr>
					  <td class="label_form">NO ANGGOTA</td>
					  <td><label>
					   <input name="cek" type="hidden" id="cek" value="update" />
						<input name="no_anggota" disabled="disabled" type="text" id="no_anggota" size="30" <? echo "value='$t[no_anggota]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="label_form">KATA KUNCI </td>
					  <td><label>
						<input name="kata_kunci" type="password" id="kata_kunci" <? echo "value='$t[kata_kunci]'"; ?> />
					  </label></td>
					</tr>
					<tr>
					 <td colspan="2" valign="top" class="label_form"><label>
					 <input type="hidden" name="no_anggota" value="<?php echo $t[no_anggota]?>" />
					<input type="submit" name="Submit" value="Update" />
				  	</label>
					<label>
					<input type="submit" name="Submit2" value="Batal" />
					</label></td>
				  </tr>
		</table>
		</form>
		<?php }
		} 
		?>
    </td>
  </tr>
</table>
</body>
</html>
