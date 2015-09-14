<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$submit = $_POST[Submit];
	
  	$id = $_POST[id];
  	$judul = $_POST[judul];
  	$isi = $_POST[isi];
    
	$url = "index.php?mod=informasi";

	switch ($aksi)
	{
	    case "tambah"	: 
						  mysql_query("INSERT INTO t_informasi(judul,isi)
										values ('$judul','$isi')");
						  header("location:$url");
						  break;
		case "ubah"		:
						if ($submit == "UBAH")						
						{
							mysql_query("UPDATE t_informasi set 
											judul = '$judul',isi='$isi' where id = '$id'");
						 	header("location:$url");
						} else
						if ($submit == "HAPUS")
						{
								mysql_query("delete from t_informasi where id = '$id'");
								header("location:$url");
						}
						break;
						
				case 'hapus':
				$id = $_GET['id'];
				mysql_query("delete from t_informasi where id = '$id'");
								header("location:$url");
								break;
	}

?>