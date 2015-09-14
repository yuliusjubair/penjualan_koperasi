<?
	session_start();
  include "config/koneksi.php";
  $no_ktp = $_POST[no_ktp];
  $nama_lengkap = $_POST[nama_lengkap];
  $alamat = $_POST[alamat];
  $kota = $_POST[kota];
  $alamat_email = $_POST[alamat_email];
  $lokasi = $_FILES[photo][tmp_name];
  $photo = $_FILES[photo][name];
  $keterangan = $_POST[keterangan];
  $telepon = $_POST[telepon];
  $kata_kunci = $_POST[kata_kunci];
  $tempat_lahir = $_POST[tempat_lahir];
  $tanggal_lahir = date('Y-m-d',mktime(0,0,0,$_POST[bulan],$_POST[tanggal],$_POST[tahun]));
  $pekerjaan = $_POST[pekerjaan];
  $status = $_POST[status];
  $jenis_kelamin = $_POST[jenis_kelamin];
  $aktivasi = true;
  $no_anggota = date('ymdHis');
  $nomor = $_SESSION['no_anggota'];
  
if (!empty($lokasi))
{
  //move_uploaded_file($lokasi,"images/$photo");
  mysql_query("update mst_anggota set no_ktp='$no_ktp',nama_lengkap='$nama_lengkap',alamat='$alamat',kota='$kota',alamat_email='$alamat_email',photo='$photo',keterangan='$keterangan',telepon='$telepon',kata_kunci='$kata_kunci',
tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',pekerjaan='$pekerjaan',status='$status',jenis_kelamin='$jenis_kelamin' WHERE no_anggota='$nomor'")or die (mysql_error());
copy($HTTP_POST_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name']);
} else {
  mysql_query("update mst_anggota set no_ktp='$no_ktp',nama_lengkap='$nama_lengkap',alamat='$alamat',kota='$kota',alamat_email='$alamat_email',keterangan='$keterangan',telepon='$telepon',kata_kunci='$kata_kunci',
tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',pekerjaan='$pekerjaan',status='$status',jenis_kelamin='$jenis_kelamin' WHERE no_anggota='$nomor'")or die(mysql_error());
}
header("location:index.php");
?>