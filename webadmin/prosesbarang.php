<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$submit = $_POST[Submit];
	
  	$kode_brg = $_POST[kode]."".$_POST[kode_brg];
  	$nama_barang = $_POST[nama_barang];
  	$harga = $_POST[harga];
  	$jumlah = $_POST[jumlah];
  	$keterangan = $_POST[keterangan];
  	$lama_cicilan = $_POST[lama_cicilan];
  	$diskon  = $_POST[diskon];
  	$kode_kategori = $_POST[kode_kategori];
  	$gambar = $_FILES[gambar][name];
	$lokasi = $_FILES[gambar][tmp_name];
    
	//echo $gambar;exit;
	
	$url = "index.php?mod=barang";

	switch ($aksi)
	{
	    case "tambah"	: 
						
						  if (!empty($gambar))
						  {
						  //move_uploaded_file($lokasi,"../produk/$gambar");
						  $sql = "INSERT INTO mst_barang(kode_brg,nama_barang,harga,jumlah,keterangan,lama_cicilan,
										diskon,kode_kategori,gambar)
										values ('$kode_brg','$nama_barang','$harga','$jumlah','$keterangan','$lama_cicilan',
										'$diskon','$kode_kategori','$gambar')";
										
						  mysql_query($sql)or die(mysql_query());
						  copy($HTTP_POST_FILES['gambar']['tmp_name'], "../produk/".$_FILES['gambar']['name']);
						  } else
						  {
						  $sql = "INSERT INTO mst_barang(kode_brg,nama_barang,harga,jumlah,keterangan,lama_cicilan,
										diskon,kode_kategori)
										values ('$kode_brg','$nama_barang',$harga,$jumlah,'$keterangan',$lama_cicilan,
										$diskon,$kode_kategori)";
						  mysql_query($sql)or die(mysql_error());
						  //echo sql;
						  }
						  header("location:$url");
						  break;
		case "ubah"		:
						if ($submit == "UBAH")						
						{
							if (!empty($lokasi))
							{
								move_uploaded_file($lokasi,"../produk/$gambar");
								mysql_query("UPDATE mst_barang set 
										
										nama_barang = '$nama_barang',
										harga = '$harga',
										jumlah = '$jumlah',
										keterangan = '$keterangan',
										lama_cicilan = '$lama_cicilan',
										diskon = '$diskon',
										kode_kategori = '$kode_kategori',
										gambar = '$gambar'
										where kode_brg = '$kode_brg'")or die (mysql_error());
						 	} else
						 	{
								mysql_query("UPDATE mst_barang set 
										
										nama_barang = '$nama_barang',
										harga = $harga,
										jumlah = $jumlah,
										keterangan = '$keterangan',
										lama_cicilan = $lama_cicilan,
										diskon = $diskon,
										kode_kategori = $kode_kategori
										where kode_brg = '$kode_brg'")or die (mysql_error());
										
						 	}
						 header("location:$url");
						} else
						if ($submit == "HAPUS")
						{
								mysql_query("delete from mst_barang where kode_brg = '$kode_brg'");
								header("location:$url");
						}
						break;
						
						case 'hapus':
						$id = $_GET['id'];
				mysql_query("delete from mst_barang where kode_brg = '$id'");
								header("location:$url");
								break;
						
	}

?>