<?
    include "../config/koneksi.php";
	include "../config/fungsi.php";

	$url = "?mod=barang";
	$act = $_GET[act];
	$id = $_GET[id];
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
 <div id="box">
<?
    if (empty($act))
	{
?>

<h4><? echo "<a href='$url&act=tambah' class='useradd'>"; ?>Tambah Barang</a></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;" class="table1">
 <thead>
 <tr>
 	<th colspan="7"><h4>DATA BARANG</h4></th>
 </tr>
 <tr>
 	<td colspan="7">
		<form action="?mod=barang" name="form_cari" method="post">
			<label style="font-weight:bold;">Cari Barang </label><input type="text" name="cari_barang" /> <input type="submit" name="Submit" id="button1" value="Cari Barang" />
            
		</form>
	
	</td>
 </tr>
  <tr>
  	<th class="headertabel"><a>KODE</a></th>
    <th class="headertabel" style="padding-top:5px; padding-bottom:5px;"><a>NAMA BARANG</a></th>
    <th class="headertabel"><a>HARGA</a></th>
    <th class="headertabel"><a>JUMLAH</a></th>
    <th class="headertabel"><a>ACTION</a></th>
  </tr>
  </thead>
  </tbody>
<?

	$cari = $_POST[cari_barang];
	if(!empty($cari)){
		$condition = " where nama_barang  like '%$cari%' ";
	}
	$q = mysql_query("select * from mst_barang".$condition." order by kode_brg");
	
	while ($t = mysql_fetch_array($q))
	{
?>
  <tr>
    <td class="isitabel" align="center"><? echo $t[kode_brg]; ?></td>
    <td class="isitabel" align="center"><? echo $t[nama_barang]; ?></td>
    <td class="isitabel" align="center"><? echo "Rp  ".number_format($t[harga],0,",","."); ?></td>
    <td class="isitabel" align="center"><? echo $t[jumlah]; ?></td>
    <td align="center" class="isitabel"><? echo "<a href='$url&act=ubah&id=$t[kode_brg]' class='useredit'>"; ?>Edit</a> | <? echo "<a href=prosesbarang.php?aksi=hapus&id=$t[kode_brg] class='useredit'>"; ?>Hapus</a> </td>
  </tr>
<? } ?>
</tbody>
</table>
<p>&nbsp;</p>
<?
} else
    if ($act=='tambah')
	{
?>
<p>&nbsp;</p>

<h3 id="adduser">TAMBAH BARANG</h3>

 <script language="JavaScript" type="text/JavaScript"> 
 function showKode()
 {

 <?php
 include "../config/koneksi.php";
 
 $sql = mysql_query("SELECT * FROM mst_kategori")or die (mysql_error());
 while($data = mysql_fetch_array($sql)){
 
  		
 		if($data['nama_kategori']=="LEMARI ES"){
			$newKode = "LE";
		}elseif($data['nama_kategori']=="MESIN CUCI"){
			$newKode = "MC";
		}elseif($data['nama_kategori']=="TELEVISI"){
			$newKode = "TV";
		}elseif($data['nama_kategori']=="MICROWAVE"){
			$newKode = "MW";
		}
 
    echo "if (document.form1.kode_kategori.value == \"".$data['kode_kategori']."\")";
   echo "{";
   
   $content = "document.getElementById('kode').innerHTML = \"";
   if($newKode){
		$content .= "<input type='text' size=5 name='kode' value='$newKode'>";
	}
   $content .= "\"";
   echo $content;
   echo " }\n";
   }
 ?> 
 }
</script>

	<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
 			<form id="form1" name="form1" method="post" action="prosesbarang.php?aksi=tambah" enctype="multipart/form-data">
			<fieldset id="personal">	
    				<legend>Data Barang</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="label_form">KATEGORI BARANG </td>
          <td><label>
            <select name="kode_kategori" onchange="showKode()">
			<option value="">- Pilih Kategori -</option>
			<?
			    $q = mysql_query("select * from mst_kategori order by nama_kategori");
				while ($t = mysql_fetch_array($q))
				{
				    echo "<option value='$t[kode_kategori]'>$t[nama_kategori]</option>";
				}
			?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td width="39%" class="label_form">KODE</td>
          <td width="61%">
           <div align="left" style="padding:inherit" id="kode"></div> <input name="kode_brg" type="text" id="kode_brg" />
          </td>
        </tr>
        <tr>
          <td class="label_form">NAMA BARANG </td>
          <td><label>
            <input name="nama_barang" type="text" id="nama_barang" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">HARGA </td>
          <td><label>
            <input name="harga" type="text" id="harga" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">JUMLAH </td>
          <td><label>
            <input name="jumlah" type="text" id="jumlah" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">LAMA CICILAN  </td>
          <td><label>
            <input name="lama_cicilan" type="text" id="lama_cicilan" size="50" />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">DISKON</td>
          <td><input name="diskon" type="text" id="diskon" /></td>
        </tr>
  <tr>
          <td class="label_form">UPLOAD GAMBAR  </td>
          <td><label>
            <input name="gambar" type="file" id="gambar" size="40" />
          </label></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">KETERANGAN PRODUK</td>
          <td><label>
		     <textarea name="keterangan" cols="40" rows="5" id="keterangan"></textarea>
          </label></td>
        </tr>

        <tr>
          <td colspan="2" align="right" class="label_form">
            <input type="submit" name="Submit" id="button1" value="Simpan" />
            <input type="button" name="button" id="button2" value="Batal" onclick="location.href='<? echo $url; ?>'" />	</td>
          </tr>
      </table>
	  </fieldset>
        </form>    </td>
  </tr>
</table>

<p>&nbsp;</p>
<?
} else
    if ($act=='ubah')
	{
	   $q = mysql_query("select * from mst_barang where kode_brg ='$id'");
	   $t = mysql_fetch_array($q);
?>

<p>&nbsp;</p>
<h3 id="adduser">UBAH DATA BARANG</h3>

	<table width="900" border="0" cellspacing="0" cellpadding="0">			 
		<tr>
		<td class="">
		
		<form id="form1" name="form1" method="post" action="prosesbarang.php?aksi=ubah" enctype="multipart/form-data">
		<fieldset id="personal">	
    				<legend>Data Barang</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="label_form">KATEGORI BARANG </td>
          <td><label>
            <select name="kode_kategori">
			<?
			    $qkat = mysql_query("select * from mst_kategori order by nama_kategori");
				while ($tkat = mysql_fetch_array($qkat))
				{
				    if ($tkat[kode_kategori] == $t[kode_kategori])
					{
				    echo "<option value='$tkat[kode_kategori]' selected>$tkat[nama_kategori]</option>";
					} else
					{
					echo "<option value='$tkat[kode_kategori]'>$tkat[nama_kategori]</option>";
					}
				}
			?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">NAMA BARANG </td>
          <td><label>
            <input name="nama_barang" type="text" id="nama_barang" size="50"  <? echo "value='$t[nama_barang]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">HARGA </td>
          <td><label>
            <input name="harga" type="text" id="harga" <? $harga = number_format($t[harga],0,'',''); echo "value='$t[harga]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">JUMLAH </td>
          <td><label>
            <input name="jumlah" type="text" id="jumlah" <? echo "value='$t[jumlah]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="label_form">LAMA CICILAN  </td>
          <td><label>
            <input name="lama_cicilan" type="text" id="lama_cicilan" size="50" <? echo "value='$t[lama_cicilan]'"; ?> />
          </label></td>
        </tr>
        <tr>
          <td class="label_form">DISKON</td>
          <td><input name="diskon" type="text" id="diskon" <? echo "value='$t[diskon]'"; ?>/></td>
        </tr>
        <tr>
          <td class="label_form">UPLOAD GAMBAR  </td>
          <td>
		    <? echo "<img src='../produk/$t[gambar]' width='100' height='100' align='top'>"; ?>
			<label>
            <input name="gambar" type="file" id="gambar" size="40" />
          </label></td>
        </tr>
        <tr>
          <td valign="top" class="label_form">KETERAGAN PRODUK</td>
          <td><label>
		     <textarea name="keterangan" cols="40" rows="5" id="keterangan"><? echo $t[keterangan]; ?></textarea>
          </label></td>
        </tr>
		
        <tr>
          <td colspan="2" align="right" class="label_form">
		  <input name="kode_brg" type="hidden" id="kode_brg" <? echo "value='$t[kode_brg]'"; ?> />
            <input type="submit" name="Submit" value="UBAH" id="button1" />
            <input type="submit" name="Submit" value="HAPUS" id="button2" />
           
          </td>
          </tr>
      </table>
	  </fieldset>
        </form>    </td>
  </tr>
</table>
 <h3><a href="<? echo $url; ?>" />Kembali</a></h3>
<? } ?>
</div>
</body>
</html>
