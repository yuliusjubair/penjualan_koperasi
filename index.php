<?
	session_start();
    include "config/koneksi.php";
	$act = $_GET[act];
	switch($act)
	{
		default				: $nf = "utama.php"; break;
		case "anggota"		: $nf = "daftar_anggota.php"; break;
		case "view"			: $nf = "utama.php"; break;
		case "sudahdaftar"	: $nf = "selesaidaftar.php"; break;
		case "informasi"	: $nf = "informasi.php"; break;
		case "katalog"		: $nf = "katalog.php"; break;
		case "akunanggota"	: $nf = "akunanggota.php"; break;
		case "pemesanan"	: $nf = "pemesanan.php"; break;
		case "pegawai"		: $nf = "daftar_pegawai.php"; break;
		case "tentang"		: $nf = "tentang.php"; break;
		case "keranjang"    : $nf = "keranjang_belanja.php"; break;
		case "verifikasi"    : $nf = "verifikasi_status.php"; break;
		case "lihat_anggota"    : $nf = "lihat_anggota.php"; break;
		case "dataTransaksi"    : $nf = "dataTransaksi.php"; break;
		case "edit_profile"    : $nf = "edit_profile.php"; break;
		case "finish" : $nf = "finish.php"; break;
		case "status_keanggotaan" : $nf = "status_keanggotaa.php";break;
		case "finish_transfer" : $nf = "finish_transfer.php"; break;
	}
	
	$qanggota = mysql_query("select * from mst_anggota order by waktu desc limit 5")or die(mysql_error());
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: KopKarintex ::.</title>
<style type="text/css">
<!--
body {
	background-image: url(images/bgheader.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FAE7E3;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="88" class="bgheader"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%">&nbsp;</td>
        <td width="65%" class="barismenu"><a href="?" class="linikmenu">BERANDA</a><!-- | <a href="?act=informasi" class="linikmenu">BERITA</a>--> | <a href="?act=katalog&aksi=view_kategori&id_kategori=1" class="linikmenu">KATALOG</a> | <a href="?act=pemesanan" class="linikmenu">PEMESANAN</a> | <a href="?act=tentang"  class="linikmenu">TENTANG KAMI</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/banner2.jpg" width="899" height="139" /></td>
  </tr>
  <tr>
    <td>
	<div align="right" style="margin:10px; padding:5px; font-weight:bold; color:#000000; position:inherit; border:#666666 solid 3px; -moz-border-radius:10px; width:150px; left: 333px; top: 2px;"> 
<script>
var tod=new Date();
var weekday=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
var monthname=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

var y = tod.getFullYear();
var m = tod.getMonth();
var d = tod.getDate();
var dow = tod.getDay();

var dispTime = " " + weekday[dow] + ", " + d + " " + monthname[m] + " " + y + " ";
if (dow==0) dispTime= "<b><font color=red>" + dispTime + "</font></b>";
else if (dow==5) dispTime= "<b><font color=#000000>" + dispTime + "</font></b>";
else dispTime= "<b><font color=#000000>" + dispTime + "</font></b>";
					
document.write(dispTime);

</script>
<div id="jam" > 
   <script language="javascript">  
   function jam(){  
   var waktu = new Date();  
   var jam = waktu.getHours();  
   var menit = waktu.getMinutes();  
   var detik = waktu.getSeconds();  
     
   if (jam < 10){  
   jam = "0" + jam;  
   }  
  if (menit < 10){  
  menit = "0" + menit;  
  }  
  if (detik < 10){  
  detik = "0" + detik;  
  }  
  var jam_div = document.getElementById('jam');  
  jam_div.innerHTML = jam + ":" + menit + ":" + detik;  
  setTimeout("jam()", 1000);  
  }  
  jam();  
  </script>
  </div>
	</div>
	<?php if(!empty($_SESSION['no_anggota'])){?>
	<div align="center" style="margin:10px; padding:5px; font-weight:bold; color:#000000; position:absolute; border:#666666 solid 3px; -moz-border-radius:10px; width:150px; left: 1014px; top: 264px;"> 
	<a href="index.php?act=dataTransaksi">Data Transaksi</a></div>
	<?php } ?>
	
	<?php if(!empty($_SESSION['no_anggota'])){?>
	<div align="center" style="margin:10px; padding:5px; font-weight:bold; color:#000000; position:absolute; border:#666666 solid 3px; -moz-border-radius:10px; width:150px; left: 839px; top: 264px;"> 
	<a href="index.php?act=edit_profile">Edit Profile </a></div>
	<?php } ?>
	
	<?php if($_SESSION['status_pegawai']==1){?>
	<div align="center" style="margin:10px; padding:5px; font-weight:bold; color:#000000; position:absolute; border:#666666 solid 3px; -moz-border-radius:10px; width:150px; left: 662px; top: 264px;"> 
	<a href="index.php?act=status_keanggotaan">Status Keanggotaan</a></div>
	<?php } ?>
	</td>
  </tr>
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" valign="top">
		<table width="100%">
		<tr><td class="kotakkiri" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="bgform">
			<? if(empty($_SESSION[no_anggota]) && empty($_SESSION[kata_kunci])){ ?>
            <form id="form1" name="form1" method="post" action="cekloginanggota.php">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28" class="judulformlogin">Anggota</td>
                </tr>
                <tr>
                  <td align="center">Nomor Anggota </td>
                </tr>
                <tr>
                  <td align="center"><label>
                    <input type="text" name="no_anggota" />
                  </label></td>
                </tr>
                <tr>
                  <td align="center">Kata Kunci </td>
                </tr>
                <tr>
                  <td align="center"><label>
                    <input type="password" name="kata_kunci" />
                  </label></td>
                </tr>
				<tr>
					<td align="center">
					<label>
						<?php echo $_GET['error']?>
					</label>
					</td>
				</tr>
                <tr>
                  <td align="center"><label>
                    <input type="submit" name="Submit" value="Login" />
                  </label></td>
                </tr>
              </table>
            </form>      
			<? }else{?>
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28" class="judulformlogin"><? echo $_SESSION[nama_lengkap]; ?></td>
                </tr>
				<?php 
				$sql = mysql_query("SELECT * FROM t_cicilan WHERE no_anggota='$_SESSION[no_anggota]'")or die(mysql_error());
				$cicilan = mysql_fetch_array($sql);
				
	$date = date('Y-m-d h:i:s');
	$tgl_nyicil = $cicilan['tanggal'];
	$a = mysql_query("SELECT DATE_ADD('$tgl_nyicil',INTERVAL 10 MONTH) as tambah")or die(mysql_error());
	$s = mysql_fetch_array($a);
	$hari = $s['tambah'];
	//echo $hari;
	$tempo = strtotime(str_replace("-","/",$hari)) - strtotime(str_replace("-","/",$date));
	//$h = round($tempo/86400,0); 
	
	
	$s = mysql_query("SELECT datediff('$date', '$tgl_nyicil') AS SELISIH")or die(mysql_error());
	$s2 = mysql_fetch_array($s);
	$h = $s2['SELISIH'];
	
	//echo $s2['SELISIH'];
	
	$da = mysql_query("SELECT DATE_ADD('$tgl_nyicil',INTERVAL 1 DAY) as satu")or die(mysql_error());
	$da2 = mysql_fetch_array($da);
	$plus_satu = $da2['satu'];
	//echo $plus_satu;
	//echo $h;
				/*if($h==31){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=32;
				}elseif($h==61){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=62;
				}elseif($h==91){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=92;
				}elseif($h==121){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=122;
				}elseif($h==151){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=152;
				}elseif($h==181){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA=$_SESSION[no_anggota]");
					$h=182;
				}elseif($h==211){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA='$_SESSION[no_anggota]'");
					$h=212;
				}elseif($h==241){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA='$_SESSION[no_anggota]'");
					$h=242;
				}elseif($h==271){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA='$_SESSION[no_anggota]'");
					$h=272;
				}elseif($h==301){
					mysql_query("UPDATE t_cicilan SET cicilan=cicilan-1, tanggal = '$plus_satu' WHERE NO_ANGGOTA='$_SESSION[no_anggota]'");
					$h=302;
				}*/
				?>
                <tr>
                  <td align="center" style="padding-top:5px; padding-bottom:5px;"><? echo "<img src='images/$_SESSION[photo]' width='68' height='76' hspace='5' vspace='0' 
			align='center' />" ?> <?php if($_SESSION['status_pegawai']==1){?><br /><br /> <u>Cicilan Anda : <?php echo $cicilan['cicilan']?> Bulan lagi</u><?php }?></td>
                </tr>
                <tr>
                  <td align="center">
				  <a href="index.php?act=keranjang">Keranjang Belanja anda</a><p>
				  <a href="logout.php">Logout</a>
				  </td>
                </tr>
               </table> 
			      
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="23" class="judulformlogin">5 Anggota Terbaru : </td>
          </tr>
<?
  while ($tang = mysql_fetch_array($qanggota))
  {
?>
          <tr>
            <td align="left" class="isitabelmember"><? echo "<img src='images/$tang[photo]' width='34' height='38' hspace='5' vspace='0' 
			align='left' /><b>$tang[nama_lengkap]</b><br />$tang[alamat]"; ?></td>
          </tr>
		  <tr><td><hr /></td></tr>
		  
		  
<? } ?>
<tr><td align="center"><a href="index.php?act=lihat_anggota">Lihat Semua Anggota </a></td></tr>
		  
		  <tr><td><hr /></td></tr>
 <? } ?> 
          <tr>
            <td>&nbsp;</td>
          </tr>
		  <tr>
		  <td>
		  
			<? if(empty($_SESSION[no_anggota]) && empty($_SESSION[kata_kunci])){ ?>
            <form id="form1" name="form1" method="post" action="pilih_daftar.php">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28" class="judulformlogin">Daftar Anggota</td>
                </tr>
                <tr>
                  <td align="center">Silahkan Klik Tombol Daftar dibawah untuk melakukan pendaftaran.</td>
                </tr>
                <!--<tr>
                  <td align="left"><label>
                    <input type="radio" name="daftar" value="Anggota_Web" /> UMUM
                  </label></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><label>
                    <input type="radio" name="daftar" value="Anggota_Pegawai" /> ANGGOTA
                  </label></td>
                </tr>-->
				<tr>
            <td>&nbsp;</td>
          </tr>
                <tr>
                  <td align="center"><label>
                    <input type="submit" name="Submit" value="Daftar" />
                  </label></td>
                </tr>
              </table>
            </form><?php }?>
		  </td>
		  </tr>
          <tr>
            <td height="24" class="judulformlogin">Kontak : </td>
          </tr>
          <tr>
            <td height="71" align="center">Koperasi Karyawan Industri Tekstil<br /> Jln. Cihaur No.3 Cibeber Cianjur<br />  (022) 123454567 </td>
          </tr>
        </table></td>
		</tr></table>
        <td width="2%">&nbsp;</td>
		<td width="70%" valign="top"><? include $nf; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" class="formdaftar">created by &copy;2011 ::. Devianti Purnama Putri .:: Universitas Nasional Pasim.</td>
  </tr>
</table>
</body>
</html>
