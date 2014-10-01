<?php 
	include 'dbConnect.php';
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">
	<script type="text/javascript">
		function chkLogin() 
		{
			if (document.formtukarPass.txtIDPeng.value == "")
			{
				alert("Sila pastikan ruangan 'No. Pengguna' tidak dibiarkan kosong");
				document.formtukarPass.txtIDPeng.focus();
				return false;
			}
			
			if (document.formtukarPass.txtNewPass.value == "123456")
			{
				alert("Sila tukarkan katalaluan anda dengan katalaluan baru");
				document.formtukarPass.txtNewPass.focus();
				return false;
			}
			
			if (document.formtukarPass.txtPass.value == "")
			{
				alert("Sila pastikan ruangan 'Katalaluan' tidak dibiarkan kosong");
				document.formtukarPass.txtPass.focus();
				return false;
			}

			if (document.formtukarPass.txtNewPass.value == "")
			{
				alert("Sila pastikan ruangan 'Katalaluan Baru' tidak dibiarkan kosong");
				document.formtukarPass.txtNewPass.focus();
				return false;
			}

			if (document.formtukarPass.txtNewPassX.value == "")
			{
				alert("Sila pastikan ruangan 'Pengesahan Katalaluan' tidak dibiarkan kosong");
				document.formtukarPass.txtNewPassX.focus();
				return false;
			}
			
			if (document.formtukarPass.txtNewPass.value != document.formtukarPass.txtNewPassX.value)
			{
				alert("'Katalaluan Baru' tidak sama dengan 'Pengesahan Katalaluan' \n Sila isi semula.");
				document.formtukarPass.txtNewPass.focus();
				return false;
			}
			
			if (document.formtukarPass.txtNewPass.value == document.formtukarPass.txtPass.value)
			{
				alert("'Katalaluan' masih sama dengan 'Katalaluan Baru' \n Sila isi semula.");
				document.formtukarPass.txtNewPass.focus();
				return false;
			}
			
		}
	</script>
</head>

<?php
$msginfo="";

if(isset($_POST['btnlogin']))
	{		
			$rs = mydb ("select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu from pengguna where Usr_ID='".$_POST['txtIDPeng']."'");
			$objResult = odbc_fetch_array($rs);
			
			$passDB = odbc_result($rs,'Usr_Pwd');
			$noIc = odbc_result($rs,'Usr_ID');
			$pass = $_POST['txtPass'];
			
			$newPass = $_POST['txtNewPass'];
			$newPassX = $_POST['txtNewPassX'];
						
			if ($pass == $passDB)
			{
						if($newPass == "123456")
						{
								$rs = mydb("UPDATE pengguna SET Usr_Pwd='$passDB' WHERE Usr_ID='$noIc'");
								$msginfo = "Sila masukkan katalaluan selain 123456";
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pwdTukar.php">';
						}
						else if($newPass !== "123456")
						{
								$rs = mydb("UPDATE pengguna SET Usr_Pwd='$newPass' WHERE Usr_ID='$noIc'");
								$msginfo = "Katalaluan anda telah berjaya ditukar";
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=menuKapten.php">';
								
						}
			}
			else
			{
				//$update ="UPDATE pengguna SET PENG_Password='$passDB' WHERE PENG_NoIc='$noIc'";
				//$result = mysql_query($update);
				//echo $update;
				$msginfo = "Katalaluan anda tidak sepadan seperti dalam pangkalan data";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pwdTukar.php">';	
			}
			
	}
	else{
		//$noIc =  $_SESSION['UID'];
	}
?>

<body>
<div id="container">
  <p><center><img src="image/header.jpg" width="950" height="165" /></center></p>
  	<div style="height:300px">
<form id="formtukarPass" name="formtukarPass" method="post" action="pwdTukar.php">
  <center><table width="460" border="0" align="center" bgcolor="#a7d708">
  </table>
    <p>&nbsp;</p>
    <table width="200" border="1">
  <tr>
    <td><table width="435" height="203" border="0" align="center" bgcolor="#a7d708">
      <tr>
        <td height="50" colspan="4" align="center"><h3><strong>
          <p>Tukar katalaluan</p>
        </strong></h3></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>No. Pengenalan</td>
        <td>:</td>
        <td><label for="txtIDPeng"></label>
          <input name="txtIDPeng" type="text" id="txtIDPeng" size="25" maxlength="15"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Katalaluan</td>
        <td>:</td>
        <td><label for="txtPass"></label>
          <input name="txtPass" type="password" id="txtPass" size="25" maxlength="15" /></td>
      </tr>
      <tr>
        <td width="31">&nbsp;</td>
        <td width="165">Katalaluan Baru</td>
        <td width="20">:</td>
        <td width="201">
          <input name="txtNewPass" type="password" id="txtNewPass" size="25" maxlength="15" />
        </td>
</tr>
      <tr>
        <td>&nbsp;</td>
        <td>Pengesahan Kata Laluan</td>
        <td>:</td>
        <td>
          <input name="txtNewPassX" type="password" id="txtNewPassX" size="25" maxlength="15" />
        </td>
</tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" class="button" name="btnlogin" id="btnlogin" value="Submit"  onclick="return chkLogin();" style="width:80px; text-align:center;"/>
          <input type="reset" class="button" name="btnReset" id="btnReset" value="Set Semula" style="width:80px; text-align:center;"/></td>
      </tr>
      <tr> </tr>
      <tr> </tr>
    </table></td>
  </tr>
</table>
    <p><center></center></p>
</center>
</form>
    <?php if ($msginfo != "")
        { 
    ?>
            <script>
                alert('<?php echo $msginfo?>')
            </script>
    <?php 
        } 
    ?>
<p><center><img src="image/footer.png" width="950" height="165" /></center></p>
</div>
</body>
</html>