<?php 
	include 'dbConnect.php';
	session_start();
	if(!isset($_SESSION['IDPemain']))
	{
		header('Location: index.php'); exit;
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile Pemain</title>


</head>

<?php

	$rs = mydb ("select PE_ID, PE_Nama, PE_Gelaran, PE_Jantina, PE_Email, PE_SaizBaju, PE_NoHp, Kat_ID, Ipt_ID FROM pemain WHERE PE_ID='".$_SESSION['IDPemain']."'");
	$objResult = odbc_fetch_array($rs); 

	odbc_result($rs,'PE_ID');
	$namaPE = odbc_result($rs,'PE_Nama');
	$gelaranPE = odbc_result($rs,'PE_Gelaran');
	$jantinaPE = odbc_result($rs,'PE_Jantina');
	$jantina = "";
	$emailPE = odbc_result($rs,'PE_Email');
	$saizBajuPE = odbc_result($rs,'PE_SaizBaju');
	$noHpPE = odbc_result($rs,'PE_NoHp');
	$katId = odbc_result($rs,'Kat_ID');
	$kategoriNama = "";
	$iptaID = odbc_result($rs,'Ipt_ID');
	
	if ($katId == "01")
	{
		$kategoriNama = "GROSS";
	}
		
	else if ($katId == "02")
	{
		$kategoriNama = "NETT";
	}
	
	else if ($katId == "03")
	{
		$kategoriNama = "JEMPUTAN " . $iptaID;
	}
	
	else if ($katId == "04")
	{
		$kategoriNama = "VIP";
	}
	
	else if ($katId == "05")
	{
		$kategoriNama = "JEMPUTAN UTEM";
	}
	
	if ($jantinaPE == "L")
	{
		$jantina = "LELAKI";
	}
	
	if ($jantinaPE == "P")
	{
		$jantina = "PEREMPUAN";
	}

?>

<body>
<div id="container">
<p><center><img src="image/header.jpg" width="950" height="165" /></center></p>
  	<div style="height:300px">
<p><center>
  <p>&nbsp;</p>
  <p>Selamat Datang <a href=""><?php echo $namaPE; ?></a></p>
  <table width="45%" border="1" align="center" bgcolor="#a7d708">
    <tr>
      <td><table align="center">
        <tr>
          <td width="103">Nama</td>
          <td width="18">:</td>
          <td colspan="5"><input name="txtNama" type="text" disabled="disabled" id="txtNama" tabindex="1" size="68" maxlength="100" readonly="readonly" value="<?php echo $gelaranPE." ".$namaPE;?>"/></td>
        </tr>
        <tr>
          <td>No. Pengenalan</td>
          <td>:</td>
          <td><input name="txtKp" type="text" disabled="disabled" id="txtKp" value="<?php echo $_SESSION['IDPemain']; ?>" maxlength="14" readonly="readonly"/></td>
          <td>&nbsp;</td>
          <td>No. Tel. Bimbit</td>
          <td>:</td>
          <td><input name="txtNotel" type="text" disabled="disabled" id="txtNotel" maxlength="14" readonly="readonly" value="<?php echo $noHpPE;?>"/></td>
        </tr>
        <tr>
          <td>Jantina</td>
          <td>:</td>
          <td width="147"><input name="txtJantina" type="text" disabled="disabled" id="txtJantina" maxlength="14" readonly="readonly" value="<?php echo $jantina;?>"/></td>
          <td width="5">&nbsp;</td>
          <td width="113">Saiz Baju</td>
          <td width="3">:</td>
          <td width="169"><input name="txtSaiz" type="text" disabled="disabled" id="txtSaiz" maxlength="14" readonly="readonly" value="<?php echo $saizBajuPE;?>"/></td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:</td>
          <td><input name="txtKat" type="text" disabled="disabled" id="txtKat" maxlength="50" readonly="readonly" value="<?php echo $kategoriNama;?>"/></td>
          <td width="5">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
          <td><a href="pemainSemak.php">Kembali</a></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center></p>
<center>
<p><center><img src="image/footer.png" width="950" height="165" /></center></p>
</div>
</body>
</html>