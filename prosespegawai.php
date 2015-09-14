<?
	include "config/koneksi.php";
	$proses= $_POST[cek];
	$no_anggota = $_POST[no_anggota];
	$kata_kunci  = $_POST[kata_kunci];
  	
    //$echo 
	$url = "index.php?act=pegawai";

	switch ($proses)
	{
	    case "cari"	:
						
						  header("location:$url&no_anggota=$no_anggota");
						  break;
		case "update" 	:
							$sql = "UPDATE mst_anggota set 
										kata_kunci = '$kata_kunci',
										aktivasi = 1
										where no_anggota = '$no_anggota'";
							mysql_query($sql)or die (mysql_error());
							//echo $sql;
							 header("location:$url");
							 
							break;
				
	}

?>