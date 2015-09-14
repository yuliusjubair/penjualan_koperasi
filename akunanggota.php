<?
   session_start();
   $no_anggota = $_SESSION[no_anggota];
   $qanggota = mysql_query("select * from mst_anggota where no_anggota = '$_SESSION[no_anggota]'");
   $tang = mysql_fetch_array($qanggota);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table width="600" align="center">
<tr><td class="kolomkanan">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>
    <td class="baris_header1">Akun Anggota </td>
  </tr>
  <tr>
    <td>
	<div class="code">
	<table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td width="23%" rowspan="4" align="center" valign="top">
		<? echo "<img src='images/$tang[photo]' width='100' height='108' />"; ?></td>
        <td width="26%" class="label_form">Nomor Anggota : </td>
        <td width="51%" class="isitabelmember"><? echo $tang[no_anggota]; ?></td>
      </tr>
      <tr>
        <td class="label_form">Nama : </td>
		<td class="isitabelmember"><? echo $tang[nama_lengkap]; ?></td>
      </tr>
      <tr>
        <td class="label_form">Alamat : </td>
        <td class="isitabelmember"><? echo $tang[alamat]; ?></td>
      </tr>
      <tr>
        <td class="label_form">No. KTP : </td>
        <td class="isitabelmember"><? echo $tang[no_ktp]; ?></td>
      </tr>
    </table>
	</div>
	</td>
  </tr>
  <tr>
    <td class="baris_header1">Simpanan Anggota </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="baris_header1">Kredit Anggota </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</td></tr></table>
</body>
</html>
