<?php
session_start();
if(!session_is_registered("1")){
header("location:login.php");

exit;
}
?>
<?php include "../config/koneksi.php"; ?> 
<?php
$id=$_GET['kode'];
$petugas=$_GET['petugas'];
$krm_kode=$_POST['kd_jual'];
$krm_ptgs=$_POST['kd_petugas'];
$krm_tgl=$_POST['tgl_kirim'];


$query_faktur = "SELECT a.ORDER_KODE, a.ORDER_TGL, a.ORDER_TOTAL, b.*, c.kode_brg, c.nama_barang , c.harga, c.diskon, d.jml_pesan FROM pemesanan a,mst_anggota b, mst_barang c, keranjang_belanja d WHERE a.ORDER_NO_ANGGOTA = b. no_anggota AND d.produkID = c.kode_brg AND a.ORDER_KODE = d.kd_penjualan AND a.ORDER_KODE='$id'";

$faktur = mysql_query($query_faktur) or die(mysql_error());
$row_faktur = mysql_fetch_assoc($faktur);
$totalRows_faktur = mysql_num_rows($faktur);

?>
<html>
<head>
<title>Faktur Pembayaran</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="59%" align="center" style="border:double">
  <tr> 
    <td align="center"><table width="100%" align="center">
        <tr>
		 
          <td colspan="6"><div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><img src="../images/logo.jpg"><br>
	    <span class="style2"><u>Jl. Cihaur NO. 3 Cibeber Cianjur Tlp. 022-9494949</u></span><br><br>
	<strong>FAKTUR PENJUALAN KOPERASI KARYAWAN INDUSTRI TEKSTIL PT. MEDAN JAYA<br>
          </strong></font><br>
          </div>		</td>
        <tr> 
          <td colspan="6"><div align="center"> 
              <hr>
              <strong></strong></div></td>
        </tr>
        <tr> 
          <td colspan="6">DATA ANGGOTA</td>
        </tr>
        <tr> 
          <td width="12%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">No 
            Order</font></td>
          <td width="2%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td width="45%"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['ORDER_KODE']; ?></font></td>
          <td width="18%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td width="2%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td width="21%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Tanggal</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['ORDER_TGL']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Kepada</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['nama_lengkap']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font>          </td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Alamat</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['alamat']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Email</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['alamat_email']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Telp</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['telepon']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
		 <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nama Bank</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['nama_bank']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
		 <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">No Rekening</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['rekening']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
		 <tr> 
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Atas Nama</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_faktur['atas_nama']; ?></font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#993333">
        <tr> 
          <td width="3%" height="15" bgcolor="#0099CC"> <div align="center"><strong><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">No</font></font></strong></div></td>
		  <td width="13%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Kode Barang</font></strong></div></td>
          <td width="15%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nama Barang</font></strong></div></td>
          <td width="11%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Harga</font></strong></div></td>
		  <td width="21%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Diskon</font></strong></div></td>
		  <td width="15%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Jumlah Pesan</font></strong></div></td>
          <td width="22%" bgcolor="#0099CC"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Jumlah</font></strong></div></td>
        </tr>
        <?php
		$grand_total=0;
		$sub_total=0;
$prov = mysql_query("SELECT t_provinsi.* FROM t_provinsi, mst_anggota WHERE t_provinsi.id = mst_anggota.provinsi")or die(mysql_error());
				$data = mysql_fetch_array($prov);
				
		
		 do { ?>
        <tr> 
          <td><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
            <?php $no++; echo"$no"; ?>
            </font></strong></td>
			<td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $row_faktur['kode_brg']; ?> </font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $row_faktur['nama_barang']; ?> </font></td>
		  <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $row_faktur['harga']; ?> </font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?php echo $row_faktur['diskon']; ?> </font></td>
		  			    
	 <td><span class="normal"> 
      <?php 
	  	 $diskon= $row_faktur['harga'] * ($row_faktur['diskon']/100);
		 $harga = $row_faktur['harga'];
		 $sub = $harga - $diskon; 
	  ?> 
	  
	  <?php echo $row_faktur['jml_pesan']; ?></span></td>

		  
         
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;Rp 
            <?php $subtotal = $sub * $row_faktur['jml_pesan']; echo $subtotal; 
				   $grand_total=$grand_total + $subtotal;		
			?>
            </font></td>
        </tr>
        <?php } while ($row_faktur = mysql_fetch_assoc($faktur)); ?>
        <tr> 
          <td colspan="6" bgcolor="#0099CC"> <div align="right"></div>
            <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Total (sudah ongkos kirim) : 
              </font></div></td>
          <td bgcolor="#0099CC"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;Rp 
            <?php $grand_total=$grand_total + $data['ongkos_kirim']; echo "$grand_total"; ?> </font></td>
        </tr>
        <tr> 
          <td colspan="3"><font size="1">&nbsp;</font></td>
          <td><font size="1">&nbsp;</font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="21"><div align="right"></div></td>
  </tr>
  <tr> 
    <td height="21"><div align="right"></div></td>
  </tr>
  <tr> 
    <td height="21" align="center"s>
	<table width="523" height="32" align="center">
		<tr>
			<td width="251" height="26" align="center" valign="top">
				Mengetahui			</td>
			<td align="center" width="260" valign="top">
				Bandung, <?php echo date('Y-m-d')?></td>
		</tr>
		<tr>
			<td width="251" height="26" align="center" valign="top">&nbsp;</td>
		</tr>
		
		<tr>
			<td width="251" height="26" align="center" valign="top">
				<u>Bag. Penjualan</u></td>
			<td align="center" width="260" valign="top">
				<u>Direktur</u></td>
		</tr>
		
	</table>
	</td>
  </tr>
  <tr>
    <td height="21"><div align="right"><A href="javascript:window.print()"><img src="../images/ico_alpha_Print_16x16.png" width="30" height="27"></A></div></td>
  </tr>
</table>
</body>
</html>
<?php
/*$sts_kirim=1;
$update_trans="update order_chart set ORDER_KIRIM='$sts_kirim' where ORDER_KODE= '$id' " ;
$query_update=mysql_query($update_trans) or die ("Error".mysql_error());
*/mysql_free_result($faktur);
?>

