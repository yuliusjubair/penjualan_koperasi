<?
  function alamaturl()
  {
   $alamat = $_SERVER['REQUEST_URI'];
   $posisi = strpos($alamat,'?');
   $jumlah = strlen($alamat)-$posisi;
   return substr($alamat,$posisi,$jumlah);
  }
  
  function tgl_indonesia($tanggal)
  {  
  	 $tgl = substr($tanggal,8,2);
	 $bln = get_bulan(substr($tanggal,5,2));
	 $thn = substr($tanggal,0,4);
	 return $tgl." ".$bln." ".$thn;
  }
  function tgl_indo($tanggal){
  	 $tgl = substr($tanggal,8,2);
	 $bln = substr($tanggal,5,2);
	 $thn = substr($tanggal,0,4);
	 return $tgl."-".$bln."-".$thn;
  }

  function ambil_hari($hari)
  {
	 $hr = explode("/","Minggu/Senin/Selasa/Rabu/Kamis/Jumat/Sabtu");
	 return $hr[$hari];  
  }
  
  function ambil_tanggal($tanggal)
  {
  	 $tgl = substr($tanggal,8,2);
	 return $tgl;  
  }

  function ambil_bulan($tanggal)
  {
  	 $tgl = substr($tanggal,5,2);
	 return $tgl;  
  }

  function ambil_tahun($tanggal)
  {
  	 $tgl = substr($tanggal,0,4);
	 return $tgl;  
  }
  
  function get_bulan($bln)
  {
  	switch($bln)
	{
  	 case 1:
	 	return "Januari";
	 break;
	 case 2:
	 	return "Februari";
	 break;
	 case 3:
	 	return "Maret";
	 break;
	 case 4:
	 	return "April";
	 break;
	 case 5:
	 	return "Mei";
	 break;
	 case 6:
	 	return "Juni";
	 break;
	 case 7:
	 	return "Juli";
	 break;
	 case 8:
	 	return "Agustus";
	 break;
	 case 9:
	 	return "September";
	 break;
	 case 10:
	 	return "Oktober";
	 break;
	 case 11:
	 	return "November";
	 break;
	 case 12:
	 	return "Desember";
	 break;
	 }
  }
  
?>