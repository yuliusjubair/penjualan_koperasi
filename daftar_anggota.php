<?
   include "config/fungsi.php";
?>
<?php include "config/koneksi.php"; ?>
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
    <td class="formdaftar"><form id="form1" name="form1" method="post" action="prosespendaftaran.php" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="39%" class="baris_header1">DATA ANGGOTA </td>
          <td width="61%" class="judulformlogin">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="barisheader2"><p>Isilah semua data yang ada seakurat mungkin. Data ini akan digunakan untuk :</p>
            <ul>
              <li>Proses Pemesanan Online dan keperluan data otomatis lainnya</li>
              <li>Verifikasi data penerima barang.</li>
              </ul>
            <p>KMS berhak menghapus keanggotaan tanpa pemberitahuan jika data yang ada tidak benar. </p> </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td class="label_form">Nomor KTP </td>
          <td><label>
          <input name="no_ktp" type="text" id="no_ktp" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">Nama Lengkap </td>
          <td><input name="nama_lengkap" type="text" id="nama_lengkap" size="50" /></td>
        </tr>
        <tr>
          <td class="label_form">Kata Kunci </td>
          <td><input name="kata_kunci" type="password" id="kata_kunci" /></td>
        </tr>
        <tr>
          <td class="label_form">Email</td>
          <td><input name="alamat_email" type="text" id="alamat_email" size="50" /></td>
        </tr>
        <tr>
          <td class="baris_header1">DATA PRIBADI </td>
          <td class="judulformlogin">&nbsp;</td>
        </tr>
        <tr>
          <td class="label_form">Jenis Kelamin </td>
          <td><label>
            <select name="jenis_kelamin" size="1" id="jenis_kelamin">
              <option value="Laki-laki" selected="selected">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">Tempat Lahir </td>
          <td><input name="tempat_lahir" type="text" id="tempat_lahir" size="50" /></td>
        </tr>
        <tr>
          <td class="label_form">Tanggal Lahir </td>
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
            
			<select name="tahun">
				<?php 
					$skrg = date('Y');
					for($a=1950;$a<=$skrg;$a++){
						echo "<option value='$a'>$a</option>";
					}
				?>
			</select>
			
            </label></td>
        </tr>
        <tr>
          <td class="label_form">Status Perkawinan </td>
          <td><select name="status" size="1" id="status">
            <option value="Kawin" selected="selected">Kawin</option>
            <option value="Belum Kawin">Belum Kawin</option>
            <option value="Lain-lain">Lain-lain</option>
                                        </select></td>
        </tr>
        <tr>
          <td class="label_form">Pekerjaan</td>
          <td><input name="pekerjaan" type="text" id="pekerjaan" size="50" /></td>
        </tr>
        <tr>
          <td class="baris_header1">DATA ALAMAT </td>
          <td class="judulformlogin">&nbsp;</td>
        </tr>
        <tr>
          <td class="label_form">Alamat Rumah </td>
          <td><input name="alamat" type="text" id="alamat" size="50" /></td>
        </tr>
		<tr>
          <td class="label_form">Provinsi</td>
          <td>
		  	<select name="provinsi">
				<?php 
					$prov = mysql_query("SELECT * FROM t_provinsi ORDER BY nama_provinsi")or die(mysql_error());
					while($data = mysql_fetch_array($prov)){
						echo "<option value='$data[id]'>$data[nama_provinsi]</option>";
					}
					
				?>
			</select>
		  </td>
        </tr>
        
        <tr>
          <td class="label_form">Kota</td>
          <td><input name="kota" type="text" id="kota" size="50" /></td>
        </tr>
        <tr>
          <td class="label_form">Telepon</td>
          <td><input name="telepon" type="text" id="telepon" /></td>
        </tr>
        <tr>
          <td class="baris_header1">LAIN-LAIN</td>
          <td class="judulformlogin">&nbsp;</td>
        </tr>
		 <tr>
          <td class="label_form">Nama Bank</td>
          <td><input name="nama_bank" type="text" id="nama_bank" /></td>
        </tr>
		 <tr>
          <td class="label_form">No Rekening</td>
          <td><input name="rekening" type="text" id="rekening" /></td>
        </tr>
        <tr>
          <td class="label_form">Photo </td>
          <td><input name="photo" type="file" id="photo" size="40" /></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">Catatan</td>
          <td><label>
            <textarea name="keterangan" cols="40" rows="5" id="keterangan"></textarea>
          </label></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" valign="top" class="label_form"><label>
            <input type="submit" name="Submit" value="Ya, Saya Daftar Jadi Anggota" />
          </label>
            <label>
            <input type="reset" name="Submit2" value="Batal" />
            </label></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
