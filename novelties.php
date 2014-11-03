<?php 
	include 'dbConnect.php';
	/*session_start();
	 $_SESSION['UJenis'];
	 $_SESSION['UIpt'];
	
	if(!isset($_SESSION['UID']))
	{
		header('Location: logMasuk.php'); exit;	
	}
	
	if(!isset($_SESSION['UJenis']))
	{
		header('Location: logMasuk.php'); exit;	
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">

	<script type="text/javascript">
	//prevent usage of back button in browser
		history.pushState(null, null, 'novelties.php');
		window.addEventListener('popstate', function(event) {
		history.pushState(null, null, 'novelties.php');
		});

		    function SimpanRekod()
    {	
        if ((document.frmnovelties.cmbPadang.value == "") || (document.frmnovelties.cmbPadang.value == "-"))
        {
            alert("Sila pastikan ruangan 'Kod Negeri' tidak dibiarkan kosong.");
            document.frmnovelties.cmbPadang.focus();
            return false;
        }
    
        if ((document.frmnovelties.cmbDay.value == "") || (document.frmnovelties.cmbDay.value == "-"))
        {
            alert("Sila pastikan ruangan 'Nama Negeri' tidak dibiarkan kosong.");
            document.frmnovelties.cmbDay.focus();
            return false;
        }
    
        if (document.frmnovelties.hidSave.value == "" )
        {			
            document.frmnovelties.hidSave.value = "save";
            document.frmnovelties.submit();
            return true;
        }
        else
        {
            document.frmnovelties.hidSave.value = "update";
            document.frmnovelties.submit();
            return true;
        }
        return true;		

    }
	</script>
</head>
<?php
	$day="";
	$rs="";
	$filter="";
	$padang ="";
	$StaSave="";	
	$msginfo="";
	$idpadang="";
	$NULL="";
	
	if(isset($_POST['hidSave'])){ $StaSave = $_POST['hidSave']; };
	if(isset($_POST['cmbPadang'])){ $idpadang = $_POST['cmbPadang']; };
	if(isset($_POST['cmbDay'])){ $day = $_POST['cmbDay']; };
	
	
	Simpan();
	Clearfield();
	
	function Clearfield()
	{
		$kodnegeri = "";
		$namanegeri = "";
	}

	function Simpan()
	{
		global $StaSave, $msginfo, $hidIc , $idpadang, $day; 

		if ($day == "D1")
		{

			if ($StaSave =="save")
			{
				if (isset ($_POST["LD_nama"]) && isset ($_POST["LD_jarak"]) && isset ($_POST["LD_unit"])  && isset ($_POST["LD_fid"]))
				{
					$LD_nama = $_POST['LD_nama'];
					$LD_jarak = $_POST['LD_jarak'];
					$LD_unit = $_POST['LD_unit'];
					$LD_fid = $_POST['LD_fid'];
					
					$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'LD', '" .$LD_nama. "', ".$LD_jarak.", '" .$LD_unit. "', '" .$LD_fid. "' ) ");
					$msginfo="Rekod telah disimpan ke dalam pangkalan data";
				}
				
				if (isset ($_POST["NTP_nama"]) && isset ($_POST["NTP_jarak"]) && isset ($_POST["NTP_unit"])  && isset ($_POST["NTP_fid"]))
				{
					$NTP_nama = $_POST['NTP_nama'];
					$NTP_jarak = $_POST['NTP_jarak'];
					$NTP_unit = $_POST['NTP_unit'];
					$NTP_fid = $_POST['NTP_fid'];
					
					$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'LD', '" .$NTP_nama. "', ".$NTP_jarak.", '" .$NTP_unit. "', '" .$NTP_fid. "' ) ");
					$msginfo="Rekod telah disimpan ke dalam pangkalan data";
				}
				
					if (isset ($_POST["NTL_nama"]) && isset ($_POST["NTL_jarak"]) && isset ($_POST["NTL_unit"])  && isset ($_POST["NTL_fid"]))
				{
					$NTL_nama = $_POST['NTL_nama'];
					$NTL_jarak = $_POST['NTL_jarak'];
					$NTL_unit = $_POST['NTL_unit'];
					$NTL_fid = $_POST['NTL_fid'];
					
					$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'LD', '" .$NTL_nama. "', ".$NTL_jarak.", '" .$NTL_unit. "', '" .$NTL_fid. "' ) ");
					$msginfo="Rekod telah disimpan ke dalam pangkalan data";
				}

			
					
			}
			elseif ($StaSave =="update")
			{			
				//$rs = mydb ("SELECT Neg_ID FROM Negeri WHERE Neg_ID='$hidIc'");
//				$objResult = odbc_fetch_array($rs);  
//				if($objResult)
//				{  		
//					$rs2 = mydb("update Negeri set Neg_ID='$kodnegeri',Neg_Nama='$namanegeri' where Neg_ID='$hidIc'");
//					$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
//				}
			}
		}
		elseif ($day == "D2")
		{
			if ($StaSave =="save")
			{
			}
			elseif ($StaSave =="update")
			{	
			}
		 
		}
	}
	
?>

<body class="oneColLiqCtrHdr">
<table width="1014" id="Outer" align="center" style="border: 3px solid #888; background-color:#FFF">
<tr>
    <td width="1002">
    <form name="frmnovelties" id="frmnovelties" action ="novelties.php" method="post">
        <table width="100%" id="TableHeader" border="0"> 
        <tr>
            <td><img src="image/header.jpg" width="100%"/></td>
        </tr>
    
		</table>
        <table width="100%" id="Main" align="center">
            <tr>
                <td width="90%" align="left" style="font-size:17px"><strong>Markah Novelties</strong></td>
              	<td width="10%" align="left" style="font-size:17px"><a href="menuUtiliti.php"><img src="image/Settings-icon.png" alt="" width="100" height="25" /></a></td>
            </tr>
            <tr>
              	<td colspan="2" >&nbsp;</td>
            </tr>
            <tr>

                <td colspan="2" align="center">
                  <table width="100%" id="TableA" border="0">
					<tr>
                        <td width="20%">Tempat Pertandingan</td>
						<td width="2%">:</td>
						<td width="36">
							<select name="cmbPadang" id="cmbPadang" style="width:280px" >
          					<option value="PILIH" selected="selected" >PILIH</option>
							<?php  
                                $result = mydb("select P_Nama, P_ID from Padang order by P_Nama");
                                $row = odbc_fetch_array($result);
                                while ($row) 
                                {  
                                    if($idpadang == $row['P_ID'])
                                    {	
                            ?>
                            <option value="<?php echo $row['P_ID']; ?>" selected="selected" ><?php echo $row['P_Nama']; ?></option>
                            <?php 
                                    }
                                    else
                                    { 
                            ?>
                            <option value="<?php echo $row['P_ID']; ?>"><?php echo $row['P_Nama']; ?></option>
                            <?php
                                    }
                                $row = odbc_fetch_array($result);
                                }
                            ?>
                            </select>							
						</td>
						<td width="10%">Hari</td>
						<td width="2%">:</td>
						<td width="30%">
                            <select name="cmbDay" id="cmbDay"style="width:80px" >
                                <option value="" >Sila pilih</option>
                                <option value="D1" <?php if ($day=="D1") {?> selected="selected" <?php } else ?> " ">Hari 1</option>
                                <option value="D2" <?php if ($day=="D2") {?> selected="selected" <?php } else ?> " ">Hari 2</option>
                            </select>												
						</td>
					</tr>					
                    <tr>
                        <td colspan="6" align="right">
							<?php 
								if ($filter=="padang" && $day!="" && $idpadang!="") 
								{										
								}
							?>
							<input name="hidpadang" type="hidden" id="hidpadang" value="" />
							<input name="hidpadang2" type="hidden" id="hidpadang2" value="" />
							<input type="submit" class="button" name="btnsave" id="btnsave" value="Simpan" style="width:90px; text-align:center;" onClick="return Simpan();"/>
                            <input type="hidden" name="hidSave" value="<?php echo $Stasimpan; ?>"> 
						</td>
					</tr>
					</table>
                    <table width="884" border="1">
                      <tr>
                        <td colspan="4"><center>L.D</center></td>
                        <td colspan="4"><center>N.T.P</center></td>
                        <td colspan="4"><center>N.T.L</center></td>
                      </tr>
                      <tr>
                        <td width="161">Nama</td>
                        <td width="36">Jarak</td>
                        <td width="40">Unit</td>
                        <td width="43">Flight ID</td>
                        <td width="167">Nama</td>
                        <td width="36">Jarak</td>
                        <td width="36">Unit</td>
                        <td width="43">Flight ID</td>
                        <td width="143">Nama</td>
                        <td width="36">Jarak</td>
                        <td width="28">Unit</td>
                        <td width="39">Flight ID</td>
                      </tr>
                      <tr>
                        <td><input type="text" name="LD_nama" id="LD_nama" size="20"/></td>
                        <td><input type="text" name="LD_jarak" id="LD_jarak" size="2"/></td>
                        <td><input type="text" name="LD_unit" id="LD_unit" size="1"/></td>
                        <td><input type="text" name="LD_fid" id="LD_fid" size="2"/></td>
                        <td><input type="text" name="NTP_nama" id="NTP_nama" size="20"/></td>
                        <td><input type="text" name="NTP_jarak" id="NTP_jarak" size="2"/></td>
                        <td><input type="text" name="NTP_unit" id="NTP_unit" size="1"/></td>
                        <td><input type="text" name="NTP_fid" id="NTP_fid" size="2"/></td>
                        <td><input type="text" name="NTL_nama" id="NTL_nama" size="20"/></td>
                        <td><input type="text" name="NTL_jarak" id="NTL_jarak" size="2"/></td>
                        <td><input type="text" name="NTL_unit" id="NTL_unit" size="1"/></td>
                        <td><input type="text" name="NTL_fid" id="NTL_fid" size="2"/></td>
                      </tr>
                    </table>
                    <p><br />
                  </p>
                  <table width="100%" id="TableE" border="0" cellspacing="0" cellpadding="1">
					<tr class="theader">             
                    </tr>
				</table></td>
			</tr>
		</table>
	</form>
	</td>
</tr>
</table>
</body>
</html>
