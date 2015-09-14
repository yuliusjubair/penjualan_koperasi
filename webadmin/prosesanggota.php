<?
	include "../config/koneksi.php";
	$aksi= $_GET[aksi];
	$id_get = $_GET[id];
	$submit = $_POST[Submit];
	$id = $_POST[id];
  	$no_anggota = $_POST[no_anggota];
	$no_ktp = $_POST[no_ktp];
  	$nama_lengkap = $_POST[nama_lengkap];
  	$alamat = $_POST[alamat];
  	$kota = $_POST[kota];
  	$alamat_email = $_POST[alamat_email];
  	$keterangan = $_POST[keterangan];
  	$telepon = $_POST[telepon];
  	$kata_kunci  = $_POST[kata_kunci];
  	$tempat_lahir = $_POST[tempat_lahir];
	$tanggal_lahir = $_POST[tahun]."-". $_POST[bulan]."-". $_POST[tanggal];
	$pekerjaan = $_POST[pekerjaan];
	$status = $_POST[status];
	$golongan = $_POST[golongan];
	$jabatan = $_POST[jabatan];
	$status_pegawai = 1;
	$jenis_kelamin = $_POST[jenis_kelamin];
  	$gambar = $_FILES[photo][name];
	$lokasi = $_FILES[photo][tmp_name];
    $nomor = $_POST['nomor'];
	$url = "index.php?mod=anggota";
	$gaji = $_POST['gaji'];
	$nip = $_POST['nip'];
	$asal_sekolah = $_POST['asal'];
	$provinsi = $_POST['provinsi'];
	
	 $M = "SELECT max(no_anggota) as maxId FROM mst_anggota where status_pegawai=1";
		$qM = mysql_query($M);
		$tM = mysql_fetch_array($qM);
		
		$nilai = $tM['maxId'];	
		
		$noUrut = (int) substr($nilai, 0, 3);
		$noUrut++;
		
 
		$newKode = sprintf("%03s", $noUrut);
//echo $newKode;exit;
	
	switch ($aksi)
	{
	    case "tambah"	: 
						
						  if (!empty($lokasi))
						  {
						  move_uploaded_file($lokasi,"../images/$gambar");
						  $sql = "INSERT INTO mst_anggota(nip,no_anggota,no_ktp,nama_lengkap,alamat,provinsi,kota,alamat_email,photo,
										keterangan,telepon,kata_kunci,tempat_lahir,tanggal_lahir,pekerjaan,status,jenis_kelamin,golongan,jabatan, status_pegawai, asal_sekolah, gaji)
										values ('$nip','$newKode','$no_ktp','$nama_lengkap','$alamat','$provinsi','$kota','$alamat_email','$gambar',
										'$keterangan','$telepon','$kata_kunci','$tempat_lahir','$tanggal_lahir','$pekerjaan','$status','$jenis_kelamin','$golongan','$jabatan','$status_pegawai','$asal_sekolah','$gaji')";
						  mysql_query($sql);
						 // echo $sql;
						  } else
						  {
						   $sql = "INSERT INTO mst_anggota(nip,no_anggota,no_ktp,nama_lengkap,alamat,provinsi,kota,alamat_email,
										keterangan,telepon,kata_kunci,tempat_lahir,tanggal_lahir,pekerjaan,status,jenis_kelamin,golongan,jabatan, status_pegawai, asal_sekolah, gaji)
										values ('$nip','$newKode','$no_ktp','$nama_lengkap','$alamat','$provinsi','$kota','$alamat_email',
										'$keterangan','$telepon','$kata_kunci','$tempat_lahir','$tanggal_lahir','$pekerjaan','$status','$jenis_kelamin','$golongan','$jabatan','$status_pegawai','$asal_sekolah','$gaji')";
						  mysql_query($sql);
						  //echo sql;
						  }
						  header("location:index.php?mod=pegawai");
						  break;
		case "aktif" 	:
							$sql = "UPDATE mst_anggota set aktivasi = '1' where id = '$id_get'";
							mysql_query($sql);
							//echo $sql;
							 header("location:index.php?mod=pegawai");
							 
							break;
		case "ubah"		:
						if ($submit == "UBAH")						
						{
							if (!empty($lokasi))
							{
								move_uploaded_file($lokasi,"../images/$gambar");
								$sql = "UPDATE mst_anggota set
										no_ktp ='$no_ktp',
										nama_lengkap = '$nama_lengkap',
										alamat_email = '$alamat_email',
										alamat = '$alamat',
										provinsi = '$provinsi',
										kota = '$kota',
										photo = '$gambar',
										keterangan = '$keterangan',
										telepon = '$telepon',
										kata_kunci = '$kata_kunci',
										tempat_lahir = '$tempat_lahir',
										tanggal_lahir = '$tanggal_lahir',
										pekerjaan = '$pekerjaan',
										status = '$status',
										jenis_kelamin = '$jenis_kelamin',
										golongan = '$golongan',
										jabatan = '$jabatan',
										asal_sekolah = '$asal_sekolah',
										gaji = '$gaji'
										where no_anggota = '$no_anggota'";
								mysql_query($sql);
								//echo $sql;
						 	} else	{
								$sql = "UPDATE mst_anggota set
										no_ktp ='$no_ktp',
										nama_lengkap = '$nama_lengkap',
										alamat_email = '$alamat_email',
										alamat = '$alamat',
										provinsi = '$provinsi',
										kota = '$kota',
										photo = '$gambar',
										keterangan = '$keterangan',
										telepon = '$telepon',
										kata_kunci = '$kata_kunci',
										tempat_lahir = '$tempat_lahir',
										tanggal_lahir = '$tanggal_lahir',
										pekerjaan = '$pekerjaan',
										status = '$status',
										jenis_kelamin = '$jenis_kelamin',
										golongan = '$golongan',
										jabatan = '$jabatan',
										asal_sekolah = '$asal_sekolah',
										gaji = '$gaji'
										where no_anggota = '$no_anggota'";
								mysql_query($sql);
								//echo $sql;
						 	}
						 header("location:index.php?mod=pegawai");
						} elseif ($submit == "HAPUS"){
								mysql_query("delete from mst_anggota where no_anggota = '$nomor'");
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