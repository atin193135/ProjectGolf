<?php 
	require_once('dbConnect.php'); 
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
			if (document.formlogin.txtusername.value == "")
			{
				alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
				document.formlogin.txtusername.focus();
				return false;
			}
			
			if (document.formlogin.txtpass.value == "")
			{
				alert("Sila pastikan ruangan 'Katalaluan' tidak dibiarkan kosong.");
				document.formlogin.txtpass.focus();
				return false;
			}
		}
	</script>

</head>

<?php

session_start();
	$msginfo="";
	
	if(isset($_REQUEST['btnlogin']))
	{
		$rs = mydb ("select Usr_ID, Usr_Nama, Usr_Jenis, Ipt_ID, Usr_Pwd from pengguna
					where Usr_ID='".$_REQUEST['txtusername']."'");
		$objResult = odbc_fetch_array($rs);  
		if($objResult) //semak kewujudan ID dan katalaluan 
		{  
			if (odbc_result($rs,"Usr_Pwd") == $_REQUEST['txtpass'])
			{		
				if(odbc_result($rs,"Usr_Pwd") == "123456") //proses mewajibkan katalaluan yg default ditukar
				{
					$_SESSION['UID']=odbc_result($rs,"Usr_ID");
					$_SESSION['UNama']=odbc_result($rs,"Usr_Nama");
					$_SESSION['UJenis']=odbc_result($rs,"Usr_Jenis");
					$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pwdReset.php">';
				}
				else
				{
					$_SESSION['UID']=odbc_result($rs,"Usr_ID");  //jika ID dan katalaluan sah
					$_SESSION['UNama']=odbc_result($rs,"Usr_Nama");
					$_SESSION['UJenis']=odbc_result($rs,"Usr_Jenis");
					$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
					if ($_SESSION['UJenis'] == "ADMIN")			//jika jenis USER adalah Admin
						echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=menuAdmin.php">';
					else										//jika jenis USER adalah Kapten
						echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=menuKapten.php">';
				}				
			}
			else
			{		
				$msginfo = "Katalaluan anda tidak sah."; //ID wujud tetapi katalaluan tidak sah
			}
		}  
		else  
		{  	//ID tidak didaftarkan
			$msginfo = "No. Pengenalan belum didaftarkan. Sila hubungi urusetia untuk membuat pendaftaran.";
			
		}
	}
?>

<body class="oneColLiqCtrHdr">
    <table width="750" height="500" id="Main" align="center" style="border: 3px solid #888; background-image:url(image/bgSistem.jpg); margin:auto;">
    <tr>
        <td>
            <form id="formlogin" name="formlogin" method="post" action="logMasuk.php">
                <table width="50%" border="0" align="center" style="border: 3px solid #888; background-color:#a7d708">
                <tr>
                    <td>
                        <table width="90%" border="0" align="center">
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">No. Pengenalan</td>
                            <td width="5%" valign="top">:</td>
                            <td width="55%">
                                <input name="txtusername" type="text" id="txtusername" maxlength="12" style="width:130px;" /><br />
                                <span style="font-size:11px">(MyKad/ No. Tentera/ Passport)</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Katalaluan</td>
                            <td>:</td>
                            <td>
                                <input name="txtpass" type="password" id="txtpass" style="width:130px;" maxlength="15"/>
                            </td>
                        </tr>
						<tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td colspan="3" align="center">
                              <input type="submit" class="button" name="btnlogin" id="btnlogin" value="Masuk" style="width:80px; text-align:center;" onClick="return chkLogin();" />
                              <input type="reset" class="button" name="btnReset" id="btnReset" value="Set Semula" style="width:80px; text-align:center;"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="pwdLupa.php">Lupa katalaluan?</a></td>
                            <td>
                            	<a href="pwdTukar.php">Tukar Katalaluan?</a></td>
                        </tr>
                        </table>
                    </td>
                </tr>
                </table>
                <br />
        
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