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
        <table width="50%" border="0" align="center">
        <tr><td colspan="4" align="center"><strong>Utiliti Sistem</strong></td></tr>
        <tr>
            <td width="5%" align="center" valign="middle">
                <a href="util_Usr.php"><img src="image/button01.png"/></a>
            </td>
            <td width="20%">Daftar Pengguna</td>
            <td width="5%" align="center" valign="middle">
                <a href="util_Ptdgn.php"><img src="image/button01.png"/></a>
            </td>
            <td width="20%">Daftar Pertandingan</td>
		</tr>
		<tr>
            <td align="center" valign="middle">
                <a href="util_IPT.php"><img src="image/button01.png"/></a>
            </td>
            <td>Daftar Universiti</td>
            <td align="center" valign="middle">
                <a href="util_Neg.php"><img src="image/button01.png"/></a>
            </td>
            <td>Daftar Negeri</td>
        </tr>
        </table>
		</td>
	</tr>
	</table>
</body>
</html>