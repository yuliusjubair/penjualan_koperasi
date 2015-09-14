<?php include "../config/koneksi.php"; ?> 
<?php
$maxRows_transaksi = 10;
$pageNum_transaksi = 0;
if (isset($HTTP_GET_VARS['pageNum_transaksi'])) {
  $pageNum_transaksi = $HTTP_GET_VARS['pageNum_transaksi'];
}
$startRow_transaksi = $pageNum_transaksi * $maxRows_transaksi;
$tgl1=$_POST['tgl1'];
$tgl2=$_POST['tgl2'];
$maxRows_transaksi = 50;
$pageNum_transaksi = 0;
if (isset($HTTP_GET_VARS['pageNum_transaksi'])) {
  $pageNum_transaksi = $HTTP_GET_VARS['pageNum_transaksi'];
}
$startRow_transaksi = $pageNum_transaksi * $maxRows_transaksi;

$tahun=sprintf("%02d",$_POST[thn_mulai]);
$bulan=sprintf("%02d",$_POST[bln_mulai]);
$hari=sprintf("%02d",$_POST[tgl_mulai]);
$tahun_selesai=sprintf("%02d",$_POST[thn_selesai]);
$bulan_selesai=sprintf("%02d",$_POST[bln_selesai]);
$hari_selesai=sprintf("%02d",$_POST[tgl_selesai]);

$tgl1 = $tahun."-".$bulan."-".$hari;
$tgl2 = $tahun_selesai."-".$bulan_selesai."-".$hari_selesai;

$query_transaksi = "SELECT pemesanan.*, mst_anggota.status_pegawai FROM pemesanan INNER JOIN mst_anggota ON pemesanan.ORDER_NO_ANGGOTA = mst_anggota.no_anggota WHERE ORDER_TGL BETWEEN '$tgl1' AND '$tgl2' and ORDER_KIRIM=1";
$query_limit_transaksi = sprintf("%s LIMIT %d, %d", $query_transaksi, $startRow_transaksi, $maxRows_transaksi);
$transaksi = mysql_query($query_limit_transaksi) or die(mysql_error());
$row_transaksi = mysql_fetch_assoc($transaksi);

if (isset($HTTP_GET_VARS['totalRows_transaksi'])) {
  $totalRows_transaksi = $HTTP_GET_VARS['totalRows_transaksi'];
} else {
  $all_transaksi = mysql_query($query_transaksi);
  $totalRows_transaksi = mysql_num_rows($all_transaksi);
}
$totalPages_transaksi = (int)($totalRows_transaksi/$maxRows_transaksi);



?>



<title>Laporan Penjualan</title>
<link href="styleadmin.css" rel="stylesheet" type="text/css">
<table style="border:double" align="center" width="65%" border="0" cellpadding="0" cellspacing="0" bordercolor="#009900">
	<tr>
		<td colspan="15" align="center">
		<div  style="font-size:24px; font-weight:bold; text-align:center;">
		<img src=""><br>
	    <span class="style2"><u>Jl. Cihaur NO. 3 Cibeber Cianjur Tlp. 022-9494949</u></span><br><br>
		<br />
		LAPORAN PENJUALAN<br /> 
		KOPERASI MITRA SETIA </div>
		<p>
		<b>Dari tanggal <? echo $tgl1;?> sampai tanggal <? echo $tgl2;?></b>		</td>
	</tr>
  <tr bgcolor="#0066FF"> 
    <td width="17"> 
<div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">No</font></strong></div></td>
    <td width="162"> 
      <div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">Kode 
    Penjualan</font></strong></div></td>
    <td width="243"> 
    <div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">No Anggota</font></strong></div></td>
    <td colspan="3"> 
      <div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">Tanggal 
    Transaksi</font></strong></div></td>
		 <td colspan="3"> 
    <div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">Total Pembayaran</font></strong></div></td>
	   <td colspan="3"> 
    <div align="center" class="admlog"><strong><font color="#FFFFFF" size="2" face="Tahoma, Verdana, Arial">STATUS</font></strong></div></td>
	  
  </tr>
  <?php do { ?>
  
  <?
  
  $petugas=$_POST['petugas'];
  	if($row_transaksi['ORDER_STATUS']=="0"){
		$STATUS = "Belum Terkirim";
	}else{
		$STATUS = "Sukses";
	}
  ?>
  <tr> 
    <td rowspan="2" valign="top"> 
      <div align="center"><font size="2" face="tahoma, arial, sansSerif"><span class="style2">
        <?php $a++; echo $a;
$a1=0; ?>
      </span></font></div></td>
    <td align="center"><span class="style2"><font size="2" face="tahoma, arial, sansSerif"><font size="2" face="tahoma, arial, sansSerif"><?php echo $row_transaksi['ORDER_KODE'];?></font></font></span></td>
    <td align="center"><span class="style2"><font size="2" face="tahoma, arial, sansSerif"><?php echo $row_transaksi['ORDER_NO_ANGGOTA']; ?></font></span></td>
    <td colspan="3" align="center"><span class="style2"><font size="2" face="tahoma, arial, sansSerif"><?php echo $row_transaksi['ORDER_TGL']; ?></font></span></td>
	   <td colspan="3" align="center"><span class="style2"><font size="2" face="tahoma, arial, sansSerif"><?php 
	  
	  			$sql = mysql_query("SELECT a.*, c.nama_provinsi as name , c.ongkos_kirim FROM mst_anggota a, t_provinsi c WHERE a.PROVINSI = c.id and a.no_anggota='$row_transaksi[ORDER_NO_ANGGOTA]'")or die (mysql_query());
				$data = mysql_fetch_array($sql);
					
				$cek_jumlah = mysql_query("SELECT SUM(jml_pesan) as total_jumlah FROM keranjang_belanja WHERE kd_penjualan='$row_transaksi[ORDER_KODE]'")or die(mysql_error());	
				$row = mysql_fetch_array($cek_jumlah);
			if($row['total_jumlah']<=5){
				$total_jumlah = $data['ongkos_kirim']; 
			
			}elseif($row['total_jumlah']>5 && $row['total_jumlah']<=10){
				$total_jumlah = $data['ongkos_kirim'] * 2; 
			}elseif($row['total_jumlah']>10 && $row['total_jumlah']<=15){
				$total_jumlah = $data['ongkos_kirim'] * 3; 
				
			}elseif($row['total_jumlah']>10 && $row['total_jumlah']<=15){
				$total_jumlah = $data['ongkos_kirim'] * 4; 
				
			}elseif($row['total_jumlah']>15 && $row['total_jumlah']<=20){
				$total_jumlah = $data['ongkos_kirim'] * 5; 
				
			}elseif($row['total_jumlah']>20 && $row['total_jumlah']<=25){
				$total_jumlah = $data['ongkos_kirim'] * 6; 
				
			}elseif($row['total_jumlah']>25 && $row['total_jumlah']<=100){
				$total_jumlah = $data['ongkos_kirim'] * 7; 
				
			}
			
			
	  $t = $row_transaksi['ORDER_TOTAL'] - $total_jumlah;
	  $penjualan = $penjualan + $t;
	  echo "Rp. ". $t; ?></font></span></td>
	    <td colspan="3" align="center"><span class="style2"><font size="2" face="tahoma, arial, sansSerif"><?php 
	  	if($row_transaksi['status_pegawai']==1){
	 	 	echo "Kredit"; 
		}else{
			echo "Tunai";
		}
	  
	  ?></font></span></td>
	   
  </tr>
 
  
  <tr> 
    <td colspan="13" valign="top">
</td>
  </tr>
  <tr> 
    <td colspan="13" valign="top">
  <?php 
  
  	
  } while ($row_transaksi = mysql_fetch_assoc($transaksi)); ?>
  </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
</table>
<table width="523" height="32" align="center">
		<tr>
			<td width="251" height="26" align="center" valign="top">
				Mengetahui			</td>
			<td align="center" width="260" valign="top">
				Cianjur, <?php echo date('Y-m-d')?></td>
		</tr>
		<tr>
			<td width="251" height="26" align="center" valign="top">&nbsp;</td>
		</tr>
		
		<tr>
			<td width="251" height="26" align="center" valign="top">
				<u>Bag. Penjualan</u></td>
			<td align="center" width="260" valign="top">
				<u>Ketua Kredit</u></td>
		</tr>
		
	</table>
</p>
<p class="admlog2">
<div align="center"><A href="javascript:window.print()"><IMG 
                  height=32 
                  src="../images/ico_alpha_Print_16x16.png" 
                  width=50 border=0></A></div>
</p>
<div align="right"></div>
