<?
	session_start();
	include "config/koneksi.php";
	$act = $_GET['act'];
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' harus angka\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' harus disi\n'; }
  } if (errors) alert('Warning..!!\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<body>
<? if(empty($act)){ ?>
<table width="619" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="kolomkanan"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="26" class="judulformlogin">Katalog Terbaru : </td>
          </tr>
          <tr>
            <td>
			<div class="code">
			<table width="100%" border="0" cellspacing="5" cellpadding="5"><tr>
<?
	$q = mysql_query("select * from mst_barang limit 7")or die(mysql_error());
   $kol = 0;
   while ($t = mysql_fetch_array($q))
   {
	 $harga = number_format($t[harga],0,',','.');
	 if ($kol == 3)
	 {
	   echo "</tr><tr>";
	   $kol = 0;
	 } else
	 {
     $kol++;

?>
                <td width="34%" align="center" valign="middle"><p><? echo "<img src='produk/$t[gambar]' width='150' height='150' /></p>
                <p><span class='namaproduk'><a href=\"index.php?act=view&id=$t[id]\">$t[nama_barang]</a><br /> Rp. $harga,-</span></p>"; ?></td>

<? } }
?>
              </tr>
				
            </table>
			</div>
			</td>
          </tr>
		  
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
         
            </table></td>
          </tr>
        </table></td>
  </tr>
</table>

<?php 
}elseif($act == "view"){ 
	$id = $_GET['id'];
	$q = mysql_query("select * from mst_barang  where mst_barang.id = '$id'")or die(mysql_error());
?>

<table width="619" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="kolomkanan"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="26" class="judulformlogin">Detail Produk : </td>
          </tr>
          <tr>
            <td>
			<div class="code">
            
			<table width="100%" border="0" cellspacing="5" cellpadding="5"><tr>
<?
   $kol = 0;
   $t = mysql_fetch_array($q);
   
	 $harga = number_format($t[harga],0,',','.');
	 if ($kol == 3)
	 {
	   echo "</tr><tr>";
	   $kol = 0;
	 } else
	 {
     $kol++;

?>

				
                <td width="34%" align="center" valign="middle">
					<p><? echo "<img src='produk/$t[gambar]' width='250' height='250' />" ?></p>
				</td>
				
				<td valign="top">
				
					<ul>
					<?php if($t['kode_kategori']==7){?>
					
						<li>Barang : <b><? echo $t[nama_barang]." (".$t[kode_brg].")"; ?></b></li>
						<li>Keterangan : <? echo $t[keterangan] ?></li>
					<?php }else{?>
						<li>Barang : <b><? echo $t[nama_barang]." (".$t[kode_brg].")"; ?></b></li>
						<li>Harga : Rp.<? echo $harga ?></li>
						<li>Diskon : <? echo $t[diskon] ?>%</li>
					<?php if($_SESSION['status_pegawai']==1){?>
						<li>Cicilan : <? echo $t[lama_cicilan]. " bulan" ?></li>
					<?php } ?>
						<li>Keterangan : <? echo $t[keterangan] ?></li>
					
					<?php }?>	
					</ul>
				
				<label class="barismenu">&nbsp; </label>
				
					<?php if(empty($_SESSION['no_anggota'])){?>
							<label class="barismenu">Anda harus Login dulu, jika ingin bertransaksi ! </label>
					<?php }elseif($t['kode_kategori']==7){?>
							<label class="barismenu">&nbsp; </label>
					<?php }else{?>
						<br />
                        <form action="order.php" method="post" onSubmit="MM_validateForm('jumlah','','RisNum');return document.MM_returnValue">
						Jumlah Beli : <input type="text" name="jumlah">
						<p align="center">
                        
						<input type="hidden" name="kd" value="<?=$t[kode_brg];?>" />
						<input type="hidden" name="id" value="<?=$t[id];?>" />
						<input type="submit" name="submit" value="beli" />		
                        </form>	
						</p>
					<?php } ?>
				</td>
				
<? } 

?>
 </tr>
            </table>
        
			</div>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="bergabung"><table width="100%" border="0" cellspacing="2" cellpadding="2">
              
            </table></td>
          </tr>
        </table></td>
  </tr>
</table>

<? } ?>
