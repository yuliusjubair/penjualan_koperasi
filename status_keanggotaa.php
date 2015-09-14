<?
	session_start();
   include "config/fungsi.php";
?>
<?php include "config/koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 
	$no = $_SESSION['no_anggota'];
	$sql = mysql_query("SELECT a.*,a.gaji as gj, b.*, b.gaji as terima FROM mst_anggota a INNER JOIN t_cicilan b ON a.no_anggota = b.no_anggota WHERE a.no_anggota='$no'")or die(mysql_error());
	$row = mysql_fetch_array($sql);
?>
<body>
<table width="600" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td class="formdaftar">
		<form id="form1" name="form1" method="post" action="prosespendaftaran.php" enctype="multipart/form-data">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="3" class="baris_header1">STATUS KEANGGOTAAN </td>
          
        </tr>
		<tr>
			<td width="39%">No. Anggota</td>
			<td width="7%">:</td>
			<td width="54%"><?php echo $row['no_anggota']?></td>
		</tr>
				<tr>
			<td>NIP</td>
			<td>:</td>
			<td><?php echo $row['nip']?></td>
		</tr>

		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><?php echo $row['nama_lengkap']?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $row['jabatan']?></td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>:</td>
			<td><?php echo $row['golongan']?></td>
		</tr>
		<tr>
			<td>Gaji</td>
			<td>:</td>
			<td><?php echo "Rp. " . $row['gj']?></td>
		</tr>
		<tr><td colspan="3"></td></tr>
		<tr><td colspan="3">
			<table>
				<tr>
					<td>Keranjang Belanja</td>
				</tr>
				<?php 
					$result = mysql_query("SELECT a.*, c.* FROM keranjang_belanja a 
	
												INNER JOIN pemesanan b ON a.kd_penjualan = b.ORDER_KODE 
												INNER JOIN mst_barang c ON a.produkID = c.kode_brg 
	
											WHERE b.ORDER_NO_ANGGOTA = '$no'
					")or die(mysql_error);
					
					$no=1;
					while($row = mysql_fetch_array($result)){
				?>
				
				<tr>
					<td>
						<?php echo $no++ . ". " . $row['nama_barang']. "( Rp. " . $row['harga'] . " / " . $row['lama_cicilan'] .  " bulan )"?>
					</td>
					<td> : </td>
					<td>
						<?php  
							$per = $row['harga'] / $row['lama_cicilan']; 
						echo "Rp. " . number_format($per,0,",",".") . " / bulan";
							$to = $to + $per;
						?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</td></tr>
		<tr><td colspan="3"></td></tr>
		<?php 
	$no = $_SESSION['no_anggota'];
	$sql = mysql_query("SELECT a.*,a.gaji as gj, b.*, b.gaji as terima FROM mst_anggota a INNER JOIN t_cicilan b ON a.no_anggota = b.no_anggota WHERE a.no_anggota='$no'")or die(mysql_error());
	$row = mysql_fetch_array($sql);
?>
		<tr>
			<td>Total</td>
			<td>:</td>
			<td><?php echo "Rp. " . number_format($to,0,",",".") ." / bulan"?></td>
		</tr>
		<tr>
			<td>Sisa Cicilan</td>
			<td>:</td>
			<td><?php echo $row['cicilan']. " bulan"?></td>
		</tr>
		<tr>
			<td>Gaji terima</td>
			<td>:</td>
			<td><?php 
				if($row['cicilan']<=0){
				echo "Rp. " . $row['gj'];
			}else{	
				echo "Rp. " . $row['terima'];
				}
				?></td>
		</tr>
		</table>
		</form>
		</td>
	</tr>
</table>
</body>
</html>
