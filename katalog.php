<?
   include "config/koneksi.php";
   $qkat = mysql_query("select distinct a.kode_kategori,b.nama_kategori from mst_barang a,mst_kategori b where a.kode_kategori = b.kode_kategori order by waktu");
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
		<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#fff;">
  <tr>
    <td class="baris_header1">KATALOG</td>
  </tr>

  <tr>
    <td height="31" class="judulformlogin"><? echo $tkat[nama_kategori]; ?></td>
  </tr>
 
  <tr>
    <td class="">
		<div class="code">
		 <ul><!--<img src="images/box_48.png" />--><span style="font-weight:bold"> KATEGORI PRODUK</span>
		 <? 
      //$q = mysql_query("select * from mst_kategori ");
	  //$jml_baris=mysql_num_rows($q);
	  //while ($t = mysql_fetch_array($q))
	  //{
	  ?>
	  <?
$batas=6;
$halaman=$_GET['halaman'];
if (empty($halaman)) {
$posisi=0;
$halaman=1;
}
else {
$posisi = ($halaman-1) * $batas;
}

$query = "select * from mst_kategori where kode_kategori <> 7 LIMIT $posisi,$batas";
$hasil = mysql_query($query) or die (mysql_error());
$jml_baris=mysql_num_rows($hasil);

$kolom=6;
$no=$posisi+1;

echo "
<table border=1 width=90% align=center class='baris_header1'>";
for($i=0; $i<$jml_baris; $i++)
{
$data=mysql_fetch_array($hasil);
if($i % $kolom==0) {
echo "<tr valign=top>";
}
echo "<td> <a href=index.php?pages=view&pagedetail=$data[kd_brg_detail]> </a> </td>";
echo "<td width=50% align='center'>
	<font size=1> <b><a href=index.php?act=katalog&aksi=view_kategori&id_kategori=$data[kode_kategori]> $data[nama_kategori]</a> </b> </font> <br>


</td>";
if(($i % $kolom) == ($kolom-1) or ($i+1) == $jml_baris) {

}
$no++;
}
echo "</table>
</center>
";
?>	  
	 </ul>
	 </div>
	</td>
  </tr>
  <?php 
$aksi = $_GET[aksi];
$id = $_GET['id_kategori'];
if(!empty($_GET['aksi'])){ 
?>
 
</table>

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#fff;">
  <tr>
    <td class="baris_header1">DETAIL BARANG</td>
  </tr>
  <? 
  	  $batas=2;
	  $halaman=$_GET['halaman'];
	  
	  if (empty($halaman)) {
		$posisi=0;
		$halaman=1;
		}
	else {
		$posisi = ($halaman-1) * $batas;
		}
	  
  	  $q = mysql_query("select * from mst_barang where kode_kategori = '$id' order by waktu desc LIMIT $posisi,$batas")or die (mysql_error());

	  while ($t = mysql_fetch_array($q))
	  {
	  	 //print_r($t);
		 if($id==7){
		 }else{
	     	$harga = number_format($t[harga],0,',','.');
		 	$cicilan = $t[harga]/$t[lama_cicilan];
		 	$cicilan = number_format($cicilan,0,',','.');
		 }
  ?>
  
  <tr>
    <td>
	<div class="code">
	<table width="100%" border="0" cellspacing="5" cellpadding="0">
	  <tr>
        <td height="21" colspan="3" class="namabarang"><a href="<? echo "index.php?act=view&id=$t[id]" ?>"><? echo $t[nama_barang]; ?></a></td>
        </tr>
      <tr>
        <td width="21%" rowspan="3"><? echo "<img src='produk/$t[gambar]' width='100' height='100' />"; ?></td>
        <td width="27%" height="30" class="label_form"><? echo "Rp. $harga"; ?> </td>
        <td width="52%" rowspan="3" class="isitabelmember"><? echo $t[keterangan]; ?></td>
      </tr>
      <tr>
        <td height="33" class="label_form"><? echo "Discount : $t[diskon] %"; ?></td>
        </tr>
      <tr>
        <td class="label_form"><? echo "Cicilan : $cicilan x $t[lama_cicilan] bln"; ?></td>
        </tr>
    </table>
	</div>
	</td>
  </tr>
 
  <? }?>
  <?php
  $qn = mysql_query("select * from mst_barang where kode_kategori = '$id'")or die (mysql_error());
  $batas=2;
  $jmldata = mysql_num_rows($qn);
$jmlhalaman = ceil($jmldata/$batas);
echo "&nbsp;&nbsp;<br><font size=1> Page : ";
for($i=1;$i<=$jmlhalaman;$i++)
{
if($i !=$halaman) {
echo"<a href=$_SERVER[PHP_SELF]?act=$_GET[act]&aksi=view_kategori&id_kategori=$id&halaman=$i> $i </a> | ";
}
else {
echo"<b>$i</b> | </font>";
}
}
?>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<? } ?>
</body>
</html>
