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
</head>

<?php
	//buat SESSION Nama IPT & ID Pengguna
	$rs = mydb("select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_SESSION['UID']."'");
	$objResult = odbc_fetch_array($rs);
	$_SESSION['UID']=odbc_result($rs,"Usr_ID");
	$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
?>
<body class="oneColLiqCtrHdr">
    <table width="750" height="500" id="Main" align="center" style="border: 3px solid #888; background-image:url(image/bgSistem.jpg); margin:auto;">
    <tr>
        <td>
        <table width="80%" border="0" align="center" >
        <tr>
            <td>
                <table width="90%" border="0" align="center">
                <tr><td colspan="4" align="center"><strong>Menu Utama</strong></td></tr>
                <tr>
                    <td width="10%" align="center" valign="middle">
                        <a href="dftrPemain_GN.php"><img src="image/button01.png"/></a>
					</td>
					<td width="40%">Pendaftaran Pemain Nett & Gross</td>
                    <td width="10%" align="center" valign="middle">
                        <a href="pemainSenarai.php"><img src="image/button01.png"/></a>
					</td>
					<td width="30%">Senarai Pemain</td>
				</tr>
                <tr>
                    <td align="center" valign="middle">
                        <a href="dftrPemain_VIP.php"><img src="image/button01.png"/></a>
					</td>
					<td>Pendaftaran Pemain VIP IPTA</td>
                    <td align="center" valign="middle">
                        <a href="pemainTukarKat.php"><img src="image/button01.png"/></a>
					</td>
					<td>Tukar Kategori Pemain</td>
				</tr>
                <tr>
                    <td align="center" valign="middle">
                        <a href="dftrPemain_JemIPT.php"><img src="image/button01.png"/></a>
					</td>
					<td>Pendaftaran Pemain Jemputan IPTA</td>
                    <td align="center" valign="middle">
                        <a href="menuUtiliti.php"><img src="image/button01.png"/></a>
					</td>
					<td>Utiliti</td>
				</tr>
                <tr>
                    <td align="center" valign="middle">
                        <a href="dftrPemain_JemUTEM.php"><img src="image/button01.png"/></a>
					</td>
					<td>Pendaftaran Pemain Jemputan UTeM</td>
                    <td align="center" valign="middle">
                        <a href="logKeluar.php"><img src="image/button01.png"/></a>
					</td>
					<td>Keluar</td>
				</tr>
                </table>
            </td>
        </tr>
        </table>
		</td>
	</tr>
	</table>
</body>
</html>