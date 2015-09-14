<?
include "../config/koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];

$perintah="select * from t_user where username='$username' AND password='$password'";
$hasil=mysql_query($perintah);
$cek = mysql_num_rows($hasil);
if($cek!=0){
session_start();
session_register("1");
	header("Location:index.php");
}else{
	header("Location:login_admin.php");
}
?>
