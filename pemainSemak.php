<?php 
	require_once('dbConnect.php');
	session_start(); 

//session.timeout=5;
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
			if (document.formSemakPemain.txtNoKp.value == "")
			{
				alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
				document.formSemakPemain.txtNoKp.focus();
				return false;
			}
			
		}
	</script>

</head>


<?php
require_once('dbconnect.php');

	if(isset($_POST['btnCari']))
	{
		$rs = mydb ("select PE_ID, PE_Nama, PE_Gelaran, PE_Jantina, PE_SaizBaju, PE_NoHp, Kat_ID from pemain where PE_ID='".$_POST['txtNoKp']."'");
		$objResult = odbc_fetch_array($rs); 
		
		if($objResult) //semak kewujudan ID pemain
		{		
			echo "<script>alert('Selamat datang.');</script>";
			$_SESSION['IDPemain']=odbc_result($rs,'PE_ID');
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pemainMaklumat.php">';
		}
			
		else
		{
			echo "<script>alert('Maaf maklumat pemain tidak wujud.');</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pemainSemak.php">';
		}
	
	}
?>

<body>
<div id="container">
  <p><center><img src="image/header.jpg" width="950" height="165" /></center></p>
  	<div style="height:300px">
<form id="formSemakPemain" name="formSemakPemain" method="post" action="pemainSemak.php">
<p><br />
  <br />
  <br />
</p>
<p><br />
</p>
<table width="369" height="72" border="1" align="center" bgcolor="#a7d708">
  <tr>
    <td><table width="328" border="0" align="center">
      <tr>
        <td>No Pengenalan</td>
        <td>:</td>
        <td><label>
          <input type="text" name="txtNoKp" id="txtNoKp" />
          <br />
          <span style="font-size:11px">(MyKad/ No. Tentera/ Passport)</span></label></td>
      </tr>
    </table>
      <table width="301" border="0" align="center">
        <tr>
          <td><label> </label>
            <div align="right">
              <input type="submit" class="button" name="btnCari" id="btnCari" value="Semak" style="width:80px; text-align:center;" onclick="return chkLogin();" />
              <input type="reset" class="button" name="btnReset" id="btnReset" value="Set Semula" style="width:80px; text-align:center;"/>
            </div></td>
        </tr>
      </table></td>
  </tr>
  </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</center>
</form>
<p><center><img src="image/footer.png" width="950" height="165" /></center></p>
</div>
</body>
</html>