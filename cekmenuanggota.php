<?
	session_start();
	if (empty($_SESSION[no_anggota]))
	{
		header("location:index.php?act=anggota");
	} else
	{
		header("location:index.php?act=akunanggota");
	}
?>