<?php require_once('dbconnect.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kejohanan Golf Antara IPTA 2014:Lupa Katalaluan</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<?php

	if(isset($_POST['btnHantar']))
	{
		$noIc = $_POST['txtusername'];
		
		
		$select="select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis,Usr_Ibu from pengguna where Usr_ID='$noIc'";
					
		$hot_select = sqlsrv_query($conn,$select) or die(sqlsrv_error());
		$row = sqlsrv_fetch_array($hot_select);
		session_start();

		$_SESSION['username']=$row['Usr_ID'];
		$_SESSION['user_nama']=$row['Usr_Nama'];
		$_SESSION['user_password']=$row['Usr_Pwd'];
		$_SESSION['user_jenis']=$row['Usr_Jenis'];
		$_SESSION['user_namaIbu']=$row['Usr_Ibu'];
		
		
		
		$pwdUsr = $row['Usr_Pwd'];
					
		if(strcasecmp($_POST['txtNamaIbu'], $_SESSION['user_namaIbu']) == 0) 
		{
		
			//$update ="UPDATE pengguna SET PENG_Password='123456' WHERE PENG_NoIc='$noIc'";
			//$result = mysql_query($update);
	
			echo sprintf("<script>alert('Katalaluan anda adalah: %s');</script>",$pwdUsr);
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=logingolf.php">';

			
	
		}	
			
		else
		{
 			//die('Katalaluan tidak dapat ditukar: ' . mysql_error());
			echo "<script>alert('Nama ibu tidak sepadan dengan data di pangkalan data.');</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=form_lupaPswd.php">';
		}	
		
	}
		
?>
</head>
<body>
<form id="formLPass" name="formLPass" method="post" action="form_lupaPswd.php">
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="555" border="1" align="center" bgcolor="#a7d708">
  <tr>
    <td width="642"><table width="532" align="center">
      <tr>
        <td colspan="3" align="center"><strong>Lupa Katalaluan</strong></td>
        </tr>
      <tr>
        <td width="139">No. Pengenalan<br />
          <span style="font-size:11px">(MyKad/ Tentera/ Passport)</span></td>
        <td width="14">:</td>
        <td><span id="sprytextfield2">
          <label for="txtusername"></label>
          <input name="txtusername" type="text" id="txtusername" size="25" maxlength="12" />
          <em style="font-size:11px">(cth: 851112015661; T291891; A064467)</em><br />
          <span class="textfieldRequiredMsg" style="font-size:10px">Masukkan No. KP/No. KP Tentera/No. Passport</span></span></td>
        </tr>
      <tr>
        <td>Nama Ibu</td>
        <td>:</td>
        <td><span id="sprytxtNamaIbu">
          <label for="txtNamaIbu"></label>
          <input name="txtNamaIbu" type="text" id="txtNamaIbu" size="50" maxlength="100" />
          <br />
          <span class="textfieldRequiredMsg" style="font-size:10px"> Masukkan nama ibu </span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="btnHantar" id="btnHantar" value="Hantar" />
          </label><input type="reset" name="btnReset" id="btnReset" value="Reset" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
<p><img src="/golf/image/footer.png" width="1082" height="203" /></p>
</center>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytxtNamaIbu");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>