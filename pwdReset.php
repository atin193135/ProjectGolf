<?php 
	include 'dbConnect.php';
	session_start();
	if(!isset($_SESSION['UID']))
	{
		header('Location: logMasuk.php'); exit;
		
	}
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
			if (document.formresetPass.txtNewPass.value == "123456")
			{
				alert("Sila tukarkan katalaluan anda dengan katalaluan baru");
				document.formresetPass.txtNewPass.focus();
				return false;
			}

			if (document.formresetPass.txtNewPass.value == "")
			{
				alert("Sila pastikan ruangan 'Katalaluan Baru' tidak dibiarkan kosong");
				document.formresetPass.txtNewPass.focus();
				return false;
			}

			if (document.formresetPass.txtNewPassX.value == "")
			{
				alert("Sila pastikan ruangan 'Pengesahan Katalaluan' tidak dibiarkan kosong");
				document.formresetPass.txtNewPassX.focus();
				return false;
			}
			
			if (document.formresetPass.txtNewPass.value != document.formresetPass.txtNewPassX.value)
			{
				alert("'Katalaluan Baru' tidak sama dengan 'Pengesahan Katalaluan' \n Sila isi semula.");
				document.formresetPass.txtNewPass.focus();
				return false;
			}
		}
	</script>
</head>
<?php
	$msginfo="";
	
	if(isset($_POST['btnLogin']))
	{		
		$noIc =  $_SESSION['UID'];
			
		$newPass = $_POST['txtNewPass'];
		$newPassX = $_POST['txtNewPassX'];
						
		$rs = mydb ("UPDATE pengguna SET Usr_Pwd='".$newPass."' WHERE Usr_ID='".$noIc."'");
		$msginfo = "Katalaluan berjaya ditukar";

		if ($_SESSION['UJenis'] == "ADMIN")
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=menuAdmin.php">';
		else
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=menuKapten.php">';
		
	}
	
	//buat SESSION Nama IPT & ID Pengguna
	$rs = mydb("select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_SESSION['UID']."'");
	$objResult = odbc_fetch_array($rs);
	$_SESSION['UID']=odbc_result($rs,"Usr_ID");
	$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
	
	//echo $_SESSION['UID'];
	//echo $_SESSION['UIpt'];
?>
<body class="oneColLiqCtrHdr">
    <table width="750" height="500" id="Main" align="center" style="border: 3px solid #888; background-image:url(image/bgSistem.jpg); margin:auto;">
    <tr>
        <td>
        <form id="formresetPass" name="formresetPass" method="post" action="pwdReset.php">
            <table width="50%" border="0" align="center" style="border: 3px solid #888; background-color:#a7d708;">
            <tr>
                <td>
                    <table width="90%" border="0" align="center">
                    <tr>
                        <td colspan="3" align="center">
                            <h3>Sila set semula katalaluan anda.</h3>
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" valign="top">No. Pengenalan<br /></td>
                        <td width="5%" valign="top">:</td>
                        <td width="45%">
                            <input name="txtIDPeng" type="text" disabled="disabled" id="txtIDPeng" value="<?php echo $_SESSION['UID']; ?>" readonly="readonly" style="width:130px;"/><br />
                            <span style="font-size:11px">(MyKad/ No. Tentera/ Passport)</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Katalaluan Baru</td>
                        <td>:</td>
                        <td>
                            <input name="txtNewPass" type="password" id="txtNewPass" maxlength="15" style="width:130px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengesahan Katalaluan</td>
                        <td>:</td>
                        <td>
                            <input name="txtNewPassX" type="password" id="txtNewPassX" maxlength="15" style="width:130px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" class="button" name="btnLogin" id="btnLogin" value="Simpan" style="width:80px; text-align:center;" onclick="return chkLogin();"/>
                            <input type="reset" class="button" name="Reset" id="Reset" value="Set Semula" style="width:80px; text-align:center;" />
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
            </table>
        </form>
		</td>
	</tr>
</table>
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