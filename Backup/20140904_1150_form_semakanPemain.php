<?php require_once('dbconnect.php'); 
//session_start();

//session.timeout=5;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kejohanan Golf Antara IPTA 2014:Semakan Pemain</title>
<?php
require_once('dbconnect.php');

	if(isset($_POST['btnCari']))
	{
		$txtnoIc =  $_POST['txtNoKp'];

		$select="select * from pemain where PE_ID='$txtnoIc'";
					
		$hot_select = sqlsrv_query($conn,$select) or die(sqlsrv_error());
		$row = sqlsrv_fetch_array($hot_select);
					
			if($row>0){
				
				session_start();
				$_SESSION['IDPemain']=$row['PE_ID'];
				
				echo "<script>alert('Berjaya.');</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=Paparan_maklumat_pemain.php">';
			}
			
			else{
				echo "<script>alert('Maaf maklumat pemain tidak wujud.');</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=form_semakanPemain.php">';
			}
	
}
?>
</head>

<body>
<form id="formSemakPemain" name="formSemakPemain" method="post" action="form_semakanPemain.php">
<p><br />
  <br /><br /><br /><br /><br /><br />
</p>
<p>&nbsp;</p>
<p><br />
</p>
<table width="200" height="72" border="1" align="center" bgcolor="#a7d708">
  <tr>
    <td height="32"><table width="301" border="0" align="center">
      <tr>
        <td>No. Kad Pengenalan</td>
        <td>:</td>
        <td><label>
          <input type="text" name="txtNoKp" id="txtNoKp" />
        </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="301" border="0" align="center">
      <tr>
        <td><label> </label>
          <div align="right">
            <input type="submit" name="btnCari" id="btnCari" value="Semak" /> </a>
            <input type="reset" name="btnReset2" id="btnReset2" value="Set Semula" />
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><center><img src="/golf/image/footer.png" width="950" height="178" /></center></p>
</center>
</form>
</body>
</html>