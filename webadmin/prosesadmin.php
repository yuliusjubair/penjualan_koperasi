<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$submit = $_POST[Submit];
	
  	$nik = $_POST[nik];
  	$nama = $_POST[nama];
  	$alamat = $_POST[alamat];
  	$username = $_POST[username];
  	$password = $_POST[password];
  	$telp = $_POST[telepon];
	$email = $_POST[email];
    
	$url = "index.php?mod=datauser";

	switch ($aksi)
	{
	    case "tambah"	: 
						  mysql_query("INSERT INTO t_user
										values ('$nik','$nama','$username','$password','$alamat','$telp','$email')");
						  header("location:$url");
						  break;
		case "ubah"		:
						if ($submit == "ubah")						
						{
							mysql_query("UPDATE t_user set 
											nama_pegawai='$nama',username='$username',password='$password',alamat_pegawai='$alamat',telepon='$telp',
											email='$email' where nik = '$nik'")or die (mysql_error());
						 	header("location:$url");
						} else
						if ($submit == "hapus")
						{
								mysql_query("delete from t_user where nik = '$nik'");
								header("location:$url");
						}
						break;
						case 'hapus':
						$id = $_GET['id'];
						mysql_query("delete from t_user where nik = '$id'");
								header("location:$url");
								break;
	}

?>