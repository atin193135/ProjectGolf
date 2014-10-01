<?php 
	include 'include2.php';
//require_once('dbconnect.php'); 
//session_start();

//session.timeout=5;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link href="/golf/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="/golf/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
	<script src="/golf/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		function chkLogin()
		{
			if (document.formlogin.txtusername.value == "")
			{
				alert("Please enter your IC No./ Passport No.");
				document.formlogin.txtusername.focus();
				return false;
			}
			
			if (document.formlogin.txtpass.value == "")
			{
				alert("Please enter your Password.");
				document.formlogin.txtpass.focus();
				return false;
			}
		}
	</script>

</head>

<?php

//require_once('dbconnect.php');
//$kategori="select PENG_NoIc,PENG_Nama,PENG_Password, PENG_JenisPengguna from pengguna";

session_start();
if(isset($_REQUEST['btnlogin']))
{
	
	/*
	$select="select Usr_ID,Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_REQUEST['txtusername']."'and Usr_Pwd='".$_REQUEST['txtpass']."'";
			
	$hot_select = sqlsrv_query($conn,$select) or die(sqlsrv_error());
	$row = sqlsrv_fetch_array($hot_select);
	
	$_SESSION['username']=$row['Usr_ID'];
	$_SESSION['user_nama']=$row['Usr_Nama'];
	$_SESSION['user_password']=$row['Usr_Pwd'];
	$_SESSION['user_jenis']=$row['Usr_Jenis'];
	$_SESSION['user_namaIbu']=$row['Usr_Ibu'];
	$_SESSION['user_universiti']=$row['Ipt_ID'];
	
	*/
	$rs = mydb ("select Usr_ID,Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_REQUEST['txtusername']."'");
	$objResult = odbc_fetch_array($rs);  
	if($objResult)  
	{  
		if (odbc_result($rs,"Usr_Pwd") == $_REQUEST['txtpass'])
		{		
			if(odbc_result($rs,"Usr_Pwd") == "123456")
			{
				$_SESSION['UID']=odbc_result($rs,"Usr_ID");
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=ResetKataLaluan.php">';
			}
			else
			{
				$_SESSION['UID']=odbc_result($rs,"Usr_ID");
				echo "<script>alert('Sistem Maklumat Kejohanan Golf');</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=mainpage2.php">';
			}				
		}
		else
		{		
			$msginfo = "Unauthorised access/wrong password";
		}
	}  
	else  
	{  
		$msginfo = "User ID not found. Please do the registration or contact administrator for futher information";
	}
	
	/*
	if($row>0)
	{
		if($row['Usr_Pwd'] == "123456")
		{
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=ResetKataLaluan.php">';
		}
		else
		{
			echo "<script>alert('Sistem Maklumat Kejohanan Golf');</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=mainpage2.php">';
		}	
	}
	else
	{
		echo "<script>alert('User ID dan Password tidak diterima.');</script>";
	
	}
	*/
}
?>

<body>
<form id="formlogin" name="formlogin" method="post" action="logingolf.php"><br /><br /><br />
  <table width="422" height="256" border="1" align="center" bgcolor="#a7d708" >
  <tr>
    <td><table width="356" height="188" border="0" align="center">
      <tr>
        <td width="206">&nbsp;</td>
        <td width="17">&nbsp;</td>
        <td width="201">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>No. Pengenalan</td>
        <td>:</td>
        <td>
			<input name="txtusername" type="text" id="txtusername" size="25" maxlength="12" /><br />
			<span style="font-size:11px">(MyKad/ No. Tentera/ Passport)</span>
		</td>
      </tr>
      <tr>
</tr>
      <tr>
        <td>Katalaluan</td>
        <td>:</td>
        <td>
			<input name="txtpass" type="password" id="txtpass" size="25" maxlength="15" />
		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><a href="form_lupaPswd.php">Lupa katalaluan?</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
          <input type="submit" name="btnlogin" id="btnlogin" value="Masuk" onClick="return chkLogin();" />
          <input type="reset" name="btnReset" id="btnReset" value="Set Semula" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
 <p><center><img src="image/footer.png" width="950" height="178" /></center></p>
</center></p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytxtuser");
</script>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytxtpass");
</script>

<?php if ($msginfo != "")
	{ 
?>
		<script>
			alert('<?php echo $msginfo?>')
		</script>
<?php 
	} 
?>

</body>
</html>