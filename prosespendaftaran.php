<?
  include "config/koneksi.php";
  $no_ktp = $_POST[no_ktp];
  $nama_lengkap = $_POST[nama_lengkap];
  $alamat = $_POST[alamat];
  $provinsi = $_POST[provinsi];
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
  $nama_bank = $_POST[nama_bank];
  $rekening = $_POST[rekening];
  
  $M_id = mysql_query("SELECT max(id) as maxId FROM mst_anggota where status_pegawai=0");
  $data = mysql_fetch_array($M_id);
  $M = "SELECT no_anggota FROM mst_anggota where id='$data[maxId]'";
		$qM = mysql_query($M);
		$tM = mysql_fetch_array($qM);
		
		$nilai = $tM['no_anggota'];	
		
		$noUrut = (int) substr($nilai, 4, 7);
		$noUrut++;
		
 
		$newKode = date('dm') . sprintf("%03s", $noUrut);

 // echo $newKode;exit;
if (!empty($lokasi))
{
  move_uploaded_file($lokasi,"images/$photo");
  mysql_query("insert into mst_anggota(no_anggota,no_ktp,nama_lengkap,alamat,provinsi,kota,alamat_email,photo,keterangan,telepon,kata_kunci,
  tempat_lahir,tanggal_lahir,pekerjaan,status,jenis_kelamin,aktivasi,status_pegawai,nama_bank,rekening) 
  values('$newKode','$no_ktp','$nama_lengkap','$alamat','$provinsi','$kota','$alamat_email','$photo','$keterangan','$telepon','$kata_kunci',
  '$tempat_lahir','$tanggal_lahir','$pekerjaan','$status','$jenis_kelamin','$aktivasi',0,'$nama_bank','$rekening')");
} else
{
  mysql_query("insert into mst_anggota(no_anggota,no_ktp,nama_lengkap,alamat,provinsi,kota,alamat_email,keterangan,telepon,kata_kunci,tempat_lahir,
  tanggal_lahir,pekerjaan,status,jenis_kelamin,aktivasi,status_pegawai,nama_bank,rekening) 
  values('$newKode','$no_ktp','$nama_lengkap','$alamat','$provinsi','$kota','$alamat_email','$keterangan','$telepon','$kata_kunci','$tempat_lahir',
  '$tanggal_lahir','$pekerjaan','$status','$jenis_kelamin','$aktivasi',0,'$nama_bank','$rekening')");
}
header("location:index.php?act=sudahdaftar&no_anggota=$newKode");
?>