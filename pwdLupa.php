<?php 
	require_once('dbConnect.php'); 
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

		if (document.formlupaPass.txtusername.value == "")
		{
			alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
			document.formlupaPass.txtusername.focus();
			return false;
		}

		if (document.formlupaPass.txtNamaIbu.value == "")
		{
			alert("Sila pastikan ruangan 'Pengesahan Katalaluan' tidak dibiarkan kosong.");
			document.formlupaPass.txtNamaIbu.focus();
			return false;
		}
	}
</script>
</head>

<?php
	$msginfo="";
	if(isset($_POST['btnLogin']))
	{
		$noIc = $_POST['txtusername'];
		
		$rs = mydb("SELECT Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis,Usr_Ibu FROM pengguna WHERE Usr_ID='".$noIc."'");
					
		$row = odbc_fetch_array($rs);
		
		$pwdUsr = $row['Usr_Pwd'];
		$namaIbu = $row['Usr_Ibu'];
					
		if(strcasecmp($_POST['txtNamaIbu'], $row['Usr_Ibu']) == 0) 
		{
			/*echo sprintf("<script>alert('Katalaluan anda adalah: %s');</script>",$pwdUsr);*/
			$msginfo = "Katalaluan anda adalah:" . $pwdUsr;
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=logMasuk.php">';
		}		
		else
		{
			$msginfo = "Nama ibu tidak sepadan dengan data di pangkalan data.";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pwdLupa.php">';
		}	
	}		
?>

<body>
<div id="container">
	<p><center><img src="image/header.jpg" width="950" height="165" /></center></p>
  <div style="height:270px">
    <br /><br /><br />
    <form id="formlupaPass" name="formlupaPass" method="post" action="pwdLupa.php">
        <table width="555" border="1" align="center" bgcolor="#a7d708">
          <tr>
            <td width="642"><table width="532" align="center">
              <tr>
                <td colspan="3" align="center"><strong>Lupa Katalaluan</strong></td>
                </tr>
              <tr>
                <td width="139">No. Pengenalan<br /></td>
                <td width="14">:</td>
                <td>
                  <label for="txtusername"></label>
                  <input name="txtusername" type="text" id="txtusername" size="25" maxlength="12" />
<span style="font-size:11px">(MyKad/ Tentera/ Passport)</span> <br />
                  </td>
                </tr>
              <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td>
                  <label for="txtNamaIbu"></label>
                  <input name="txtNamaIbu" type="text" id="txtNamaIbu" size="50" maxlength="100" />
                  <br />
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" align="center">
                    <input type="submit" class="button" name="btnLogin" id="btnLogin" value="Hantar" style="width:80px; text-align:center;" onClick="return chkLogin();"/>
                    <input type="reset" class="button" name="Reset" id="Reset" value="Set Semula" style="width:80px; text-align:center;" />
                </td>
                </tr>
            </table></td>
        </table>
    </form>
	</div>
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