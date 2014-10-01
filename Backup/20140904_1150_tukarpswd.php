<?php require_once('dbconnect.php'); 
session_start();
	if(!isset($_SESSION['username']))
	{
		header('Location: logingolf.php'); exit;
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tukar Katalaluan</title>
<script src="/golf/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="/golf/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<?php


if(isset($_POST['btnLogin']))
	{		
			$noIc =  $_SESSION['username'];
			
			$select="select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu from pengguna
			where Usr_ID='".$_SESSION['username']."'";
			
			$hot_select = sqlsrv_query($conn,$select) or die(sqlsrv_error());
			$row = sqlsrv_fetch_assoc($hot_select);
			
			$passDB = $row['Usr_Pwd'];
			
			//echo $noIc;
			$pass = $_POST['txtPass'];
			$newPass = $_POST['txtNewPass'];
			$newPassX = $_POST['txtNewPassX'];
			//echo $newPass; echo $newPassX;
			
			if ($pass == $passDB)
			{
						if($newPass == "123456")
						{
								$update ="UPDATE pengguna SET Usr_Pwd='$passDB' WHERE Usr_ID='$noIc'";
								$result = sqlsrv_query($conn,$update);
								//echo $update;
								echo "<script>alert('Sila masukkan katalaluan selain 123456');</script>";
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=tukarpswd.php">';
						}
						else if($newPass !== "123456")
						{
								$update ="UPDATE pengguna SET Usr_Pwd='$newPass' WHERE Usr_ID='$noIc'";
								$result = sqlsrv_query($conn,$update);
								//echo $update;
								echo "<script>alert('Katalaluan anda telah berjaya ditukar');</script>";
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=mainpage.php">';
								
						}
			}
			else
			{
				//$update ="UPDATE pengguna SET PENG_Password='$passDB' WHERE PENG_NoIc='$noIc'";
//				$result = mysql_query($update);
//				//echo $update;
				echo "<script>alert('Katalaluan anda tidak sepadan seperti dalam pangkalan data');</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=tukarpswd.php">';	
			}
		
		if(! $result )
		{
 			
			//die('Katalaluan tidak dapat ditukar: ' . mysql_error());
		}
			
	}else{
		$noIc =  $_SESSION['username'];
	}
?>
<link href="/golf/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="/golf/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body><br />
<form id="formtukarPass" name="formtukarPass" method="post" action="tukarpswd.php">
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
        <td>No. KP/ No. KP Tentera/ No. Passport</td>
        <td>:</td>
        <td><label for="txtIDPeng"></label>
          <input name="txtIDPeng" type="text" disabled="disabled" id="txtIDPeng" value="<?php echo $_SESSION['username']; ?>" size="25" maxlength="15" readonly="readonly"/></td>
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
        <td width="201"><span id="sprytxtNewPass">
          <label for="txtNewPass"></label>
          <input name="txtNewPass" type="password" id="txtNewPass" size="25" maxlength="15" />
          <span class="textfieldRequiredMsg" style="font-size:11px">Masukkan katalaluan baru</span><span class="textfieldMinCharsMsg" style="font-size:11px">Katalaluan mestilah 8-15 aksara</span></span></td>
</tr>
      <tr>
        <td>&nbsp;</td>
        <td>Pengesahan Kata Laluan</td>
        <td>:</td>
        <td><span id="spryconfirm1">
          <label for="txtNewPassX"></label>
          <input name="txtNewPassX" type="password" id="txtNewPassX" size="25" maxlength="15" />
          <span class="confirmRequiredMsg" style="font-size:11px">Masukkan semula katalaluan baru</span><span class="confirmInvalidMsg" style="font-size:11px">Katalaluan tidak sepadan</span></span></td>
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
        <td><input type="submit" name="btnLogin" id="btnLogin" value="Hantar" /><label>
          <input type="reset" name="Reset" id="Reset" value="Reset" />
        </label></td>
      </tr>
      <tr> </tr>
      <tr> </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><center><img src="/golf/image/footer.png" width="950" height="178" /></center></p>
</center>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytxtNewPass", "none", {minChars:6});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "txtNewPass");
</script>
</body>
</html>