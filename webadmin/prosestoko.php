<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$submit = $_POST[Submit];
	
  	$kd_toko = $_POST[kd_toko];
  	$nama_toko = $_POST[nama_toko];
  	$alamat = $_POST[alamat];
  	$kota = $_POST[kota];
  	$kontak = $_POST[kontak];
  	$telp = $_POST[telp];
    
	$url = "index.php?mod=toko";

	switch ($aksi)
	{
	    case "tambah"	: 
						  mysql_query("INSERT INTO mst_toko(kd_toko,nama_toko,alamat,kota,kontak,telp)
										values ('$kd_toko','$nama_toko','$alamat','$kota','$kontak','$telp')");
						  header("location:$url");
						  break;
		case "ubah"		:
						if ($submit == "UBAH")						
						{
							mysql_query("UPDATE mst_toko set 
											kd_toko = '$kd_toko',nama_toko='$nama_toko',alamat='$alamat',kota='$kota',
											kontak='$kontak',telp='$telp' where kd_toko = '$kd_toko'");
						 	header("location:$url");
						} else
						if ($submit == "HAPUS")
						{
								mysql_query("delete from mst_toko where kd_toko = '$kd_toko'");
								header("location:$url");
						}
						break;
	}

?>