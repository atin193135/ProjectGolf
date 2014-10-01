<?php require_once('dbconnect.php'); 
session_start();
	if(!isset($_SESSION['IDPemain']))
	{
		header('Location: logingolf.php'); exit;
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile Pemain</title>
<?php

	$select="select PE_ID, PE_Nama, PE_Gelaran, PE_Jantina, PE_Email, PE_SaizBaju, PE_NoHp, Kat_ID from pemain
			where PE_ID='".$_SESSION['IDPemain']."'";
			
	//echo $select;
			
			
			
	$hot_select = sqlsrv_query($conn,$select) or die(sqlsrv_error());
	$row = sqlsrv_fetch_array($hot_select);
	
		$namaPE = $row['PE_Nama'];
		$gelaranPE = $row['PE_Gelaran'];
		$jantinaPE = $row['PE_Jantina'];
		$emailPE = $row['PE_Email'];
		$saizBajuPE = $row['PE_SaizBaju'];
		$noHpPE = $row['PE_NoHp'];
		$katId = $row['Kat_ID'];
		
?>

</head>

<body>
<br /><br /><br /><br />
<p>Selamat Datang <?php echo $namaPE; ?></a></p>
<table align="center">
<tr>
    <td>Nama</td>
    <td>:</td>
    <td colspan="5"><input name="txtNama" type="text" disabled="disabled" id="txtNama" tabindex="1" size="70" maxlength="100" readonly="readonly" value="<?php echo $gelaranPE." ".$namaPE;?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="3">No. Pengenalan</td>
    <td rowspan="3">:</td>
    <td>&nbsp;</td>
    <td rowspan="3">&nbsp;</td>
    <td>Jantina</td>
    <td>:</td>
    <td><input name="txtJantina" type="text" disabled="disabled" id="txtJantina" size="20" maxlength="14" readonly="readonly" value="<?php echo $jantinaPE;?>"/></td>
  </tr>
  <tr>
    <td><input name="txtKp" type="text" disabled="disabled" id="txtKp" value="<?php echo $_SESSION['IDPemain']; ?>" size="20" maxlength="14" readonly="readonly"/></td>
    <td>Saiz Baju</td>
    <td>:</td>
    <td><input name="txtSaiz" type="text" disabled="disabled" id="txtSaiz" size="20" maxlength="14" readonly="readonly" value="<?php echo $saizBajuPE;?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>No. Tel. Bimbit</td>
    <td>:</td>
    <td><input name="txtNotel" type="text" disabled="disabled" id="txtNotel" size="20" maxlength="14" readonly="readonly" value="<?php echo $noHpPE;?>"/></td>
  </tr>
  
  <tr>
    <td>Kategori</td>
    <td>:</td>
    <td colspan="5"><input name="txtKat" type="text" disabled="disabled" id="txtKat" size="50" maxlength="50" readonly="readonly" value="<?php echo $katId;?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td><input type="button" name="btnKembali" id="btnKembali" value="Kembali" /></td>
  </tr>
  
  
</table>
<p><center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><img src="/golf/image/footer.png" width="950" height="178" /></p>
</center></p>
</body>
</html>