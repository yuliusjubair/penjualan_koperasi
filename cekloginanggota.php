<?
	session_start();
   include "config/koneksi.php";
   $no_anggota = $_POST[no_anggota];
   $kata_kunci = $_POST[kata_kunci];
   $q = mysql_query("select * from mst_anggota where no_anggota = '$no_anggota' and kata_kunci = '$kata_kunci'")or die (mysql_error());
   $ada = mysql_num_rows($q);
   $t = mysql_fetch_array($q);
   //print_r($t);exit;
   if ($ada > 0)
   {
     
	 $_SESSION['nama_lengkap'] = $t[nama_lengkap];
	 $_SESSION['no_anggota'] = $t[no_anggota];
	 $_SESSION['kata_kunci'] = $t[kata_kunci];
	 $_SESSION['photo'] = $t[photo];
	 $_SESSION['status_pegawai'] = $t[status_pegawai];
	 $_SESSION['gaji'] = $t[gaji];
	 header("location:index.php");
   }elseif($kata_kunci != $t['kata_kunci']){
   		
	header("location:index.php?error='Password anda salah'");
   }
   
?>