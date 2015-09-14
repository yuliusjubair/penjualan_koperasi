<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="images/Outdoor.css" type="text/css" />

<script type="text/javascript">
$(document).ready(function() {
	$("#FormLogin").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<style type="text/css">
* { font: 11px/20px Verdana, sans-serif; }
h4 { font-size: 18px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-left: 10px; }
td { padding: 5px; }
</style>
<body>
<center>
<div id="box">
<form id="form1" name="form1" method="post" action="ceklogin.php" style="background:transparent;">
	<fieldset id="personal">
	
    				<legend>Login</legend>
      <table style="background:transparent;" border="0">
        <tr>
          <td width="100" height="35"><label><b>Username</b></label></td>
          <td width="10">:</td>
          <td width="287">
		  	
            <input name="username" type="text" id="nama" style="background:#ffffff" class="required" title="Nama harus diisi" />
           </td>
        </tr>
        <tr>
          <td height="54"><label><b>Password</b></label></td>
          <td>:</td>
          <td>
            <input name="password" type="password" id="pass" style="background:#ffffff" class="required" title="Password harus diisi"/>
                </td>
        </tr>
        <tr>
          <td colspan="3">
              
              <input type="submit" name="login" value="Login" id="button1"/>
              <input type="reset" name="Submit2" value="Reset" id="button2"/>
                </td>
          
        </tr>
      </table>
	  </fieldset>
      </form>
</div>
</center>
</body>
</html>
