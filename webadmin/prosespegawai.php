<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$submit = $_POST[Submit];
	
  	$nip = $_POST[nip];
  	$nama = $_POST[nama];
  	$no_ktp = $_POST[no_ktp];
  	
  	$golongan = $_POST[golongan];
  	$jabatan = $_POST[jabatan];
    
	$url = "index.php?mod=pegawai";

	switch ($aksi)
	{
	    case "tambah"	:  mysql_query("INSERT INTO `mst_pegawai` (`nip`, `nama`, `no_ktp`, `golongan`, `jabatan`) 
										VALUES  ('$nip', '$nama', '$no_ktp', '$golongan', 
										'$jabatan')");
						  header("location:$url");
						  break;
		case "update_simpanan" : mysql_query("UPDATE mst_anggota SET simpanan=simpanan + '$_POST[simpanan]' WHERE nip='$nip'");
							header("location:index.php?mod=simpanan");
							break;
		case "ubah"		:
						if ($submit == "UBAH")
						{
						mysql_query("UPDATE mst_pegawai 
									set nip='$nip',
									nama='$nama',
									no_ktp='$no_ktp',
									golongan='$golongan',
									jabatan='$jabatan'
									where nip = '$nip'");
						 header("location:$url");
						} else
						if ($submit == "HAPUS")
						{
								mysql_query("delete from mst_anggota where nip = '$nip'");
								header("location:$url");
						}
						break;
						
						case 'hapus':
						$id = $_GET['id'];
						mysql_query("delete from mst_anggota where no_anggota = '$id'");
								header("location:$url");
								break;
	}

?>