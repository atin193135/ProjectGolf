<?php 
	include 'dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">
	<script type="text/javascript">

		function PaparInfo(InfoInd, id, kategori) 
		{

			if (kategori === 'LD')
			{
		 		document.frmnovelties.LD_kategori.value = document.getElementById(id).rows[InfoInd].cells[0].innerHTML;		
				document.frmnovelties.LD_nama.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;			
				document.frmnovelties.LD_jarak.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
				document.frmnovelties.LD_unit.value = document.getElementById(id).rows[InfoInd].cells[3].innerHTML;					
				document.frmnovelties.LD_fid.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;	
				document.frmnovelties.hidSave.value="update";
								
				document.frmnovelties.NTP_kategori.value = "";
				document.frmnovelties.NTP_nama.value = "";			
				document.frmnovelties.NTP_jarak.value = "";
				document.frmnovelties.NTP_unit.value = "";					
				document.frmnovelties.NTP_fid.value = "";	
								
				document.frmnovelties.NTL_kategori.value = "";
				document.frmnovelties.NTL_nama.value = "";			
				document.frmnovelties.NTL_jarak.value = "";
				document.frmnovelties.NTL_unit.value = "";					
				document.frmnovelties.NTL_fid.value = "";	
			}
			
			else if(kategori === 'NTP')
			{
				document.frmnovelties.NTP_kategori.value = document.getElementById(id).rows[InfoInd].cells[0].innerHTML;
				document.frmnovelties.NTP_nama.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;			
				document.frmnovelties.NTP_jarak.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
				document.frmnovelties.NTP_unit.value = document.getElementById(id).rows[InfoInd].cells[3].innerHTML;					
				document.frmnovelties.NTP_fid.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;	
				document.frmnovelties.hidSave.value="update";
				
				document.frmnovelties.LD_kategori.value = "";		
				document.frmnovelties.LD_nama.value = "";			
				document.frmnovelties.LD_jarak.value = "";
				document.frmnovelties.LD_unit.value = "";					
				document.frmnovelties.LD_fid.value = "";	
				
				document.frmnovelties.NTL_kategori.value = "";
				document.frmnovelties.NTL_nama.value = "";			
				document.frmnovelties.NTL_jarak.value = "";
				document.frmnovelties.NTL_unit.value = "";					
				document.frmnovelties.NTL_fid.value = "";	
			}
			
			else
			{	
				document.frmnovelties.NTL_kategori.value = document.getElementById(id).rows[InfoInd].cells[0].innerHTML;
				document.frmnovelties.NTL_nama.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;			
				document.frmnovelties.NTL_jarak.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
				document.frmnovelties.NTL_unit.value = document.getElementById(id).rows[InfoInd].cells[3].innerHTML;					
				document.frmnovelties.NTL_fid.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;	
				document.frmnovelties.hidSave.value="update";
				
				document.frmnovelties.LD_kategori.value = "";		
				document.frmnovelties.LD_nama.value = "";			
				document.frmnovelties.LD_jarak.value = "";
				document.frmnovelties.LD_unit.value = "";					
				document.frmnovelties.LD_fid.value = "";
				
				document.frmnovelties.NTP_kategori.value = "";
				document.frmnovelties.NTP_nama.value = "";			
				document.frmnovelties.NTP_jarak.value = "";
				document.frmnovelties.NTP_unit.value = "";					
				document.frmnovelties.NTP_fid.value = "";	
			}
		}	

		function SimpanRekod()
    	{	
        if (document.frmnovelties.cmbPadang.value == "PILIH")
        {
            alert("Sila pastikan ruangan 'Tempat Pertandingan' tidak dibiarkan kosong.");
            document.frmnovelties.cmbPadang.focus();
            return false;
        }
    
        if (document.frmnovelties.cmbDay.value == "Sila Pilih")
        {
            alert("Sila pastikan ruangan 'Hari' tidak dibiarkan kosong.");
            document.frmnovelties.cmbDay.focus();
            return false;
        }
//kat sini yg pggil hidSave tu    
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
	
	//prevent usage of back button in browser
		history.pushState(null, null, 'novelties.php');
		window.addEventListener('popstate', function(event) {
		history.pushState(null, null, 'novelties.php');
		});
		
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
	
	if(isset($_POST['hidSave'])){ $StaSave = $_POST['hidSave']; };
	if(isset($_POST['cmbPadang'])){ $idpadang = $_POST['cmbPadang']; };
	if(isset($_POST['cmbDay'])){ $day = $_POST['cmbDay']; };
	
	
	Simpan();
	
	function Simpan()
	{
		global $StaSave, $msginfo, $idpadang, $day; 

		if ($day == "D1")
		{

			if ($StaSave =="save")
			{echo $StaSave;
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
					
					$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'NTP', '" .$NTP_nama. "', ".$NTP_jarak.", '" .$NTP_unit. "', '" .$NTP_fid. "' ) ");
					$msginfo="Rekod telah disimpan ke dalam pangkalan data";
				}
				
					if (isset ($_POST["NTL_nama"]) && isset ($_POST["NTL_jarak"]) && isset ($_POST["NTL_unit"])  && isset ($_POST["NTL_fid"]))
				{
					$NTL_nama = $_POST['NTL_nama'];
					$NTL_jarak = $_POST['NTL_jarak'];
					$NTL_unit = $_POST['NTL_unit'];
					$NTL_fid = $_POST['NTL_fid'];
					
					$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'NTL', '" .$NTL_nama. "', ".$NTL_jarak.", '" .$NTL_unit. "', '" .$NTL_fid. "' ) ");
					$msginfo="Rekod telah disimpan ke dalam pangkalan data";
				}

			
					
			}
			elseif ($StaSave =="update")
			{echo $StaSave;
			
				if (isset ($_POST["LD_nama"]) && isset ($_POST["LD_jarak"]) && isset ($_POST["LD_unit"])  && isset ($_POST["LD_fid"]))
				{
					$LD_nama = $_POST['LD_nama'];
					$LD_jarak = $_POST['LD_jarak'];
					$LD_unit = $_POST['LD_unit'];
					$LD_fid = $_POST['LD_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='LD' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$LD_nama. "',N_Jarak=" .$LD_jarak. ", N_Unit='" .$LD_unit. "', N_Fid='" .$LD_fid. "' where N_Kategori='LD' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
				
				if (isset ($_POST["NTP_nama"]) && isset ($_POST["NTP_jarak"]) && isset ($_POST["NTP_unit"])  && isset ($_POST["NTP_fid"]))
				{
					$NTP_nama = $_POST['NTP_nama'];
					$NTP_jarak = $_POST['NTP_jarak'];
					$NTP_unit = $_POST['NTP_unit'];
					$NTP_fid = $_POST['NTP_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='NTP' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$NTP_nama. "',N_Jarak=" .$NTP_jarak. ", N_Unit='" .$NTP_unit. "', N_Fid='" .$NTP_fid. "' where N_Kategori='NTP' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
				
				if (isset ($_POST["NTL_nama"]) && isset ($_POST["NTL_jarak"]) && isset ($_POST["NTL_unit"])  && isset ($_POST["NTL_fid"]))
				{
					$NTL_nama = $_POST['NTL_nama'];
					$NTL_jarak = $_POST['NTL_jarak'];
					$NTL_unit = $_POST['NTL_unit'];
					$NTL_fid = $_POST['NTL_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='NTL' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$NTL_nama. "',N_Jarak=" .$NTL_jarak. ", N_Unit='" .$NTL_unit. "', N_Fid='" .$NTL_fid. "' where N_Kategori='NTL' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
			}
		}
		elseif ($day == "D2")
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
						
						$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'NTP', '" .$NTP_nama. "', ".$NTP_jarak.", '" .$NTP_unit. "', '" .$NTP_fid. "' ) ");
						$msginfo="Rekod telah disimpan ke dalam pangkalan data";
					}
					
						if (isset ($_POST["NTL_nama"]) && isset ($_POST["NTL_jarak"]) && isset ($_POST["NTL_unit"])  && isset ($_POST["NTL_fid"]))
					{
						$NTL_nama = $_POST['NTL_nama'];
						$NTL_jarak = $_POST['NTL_jarak'];
						$NTL_unit = $_POST['NTL_unit'];
						$NTL_fid = $_POST['NTL_fid'];
						
						$rs1 = mydb("insert into Novelty (N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID) values ('" .$day. "', '" .$idpadang. "' ,'NTL', '" .$NTL_nama. "', ".$NTL_jarak.", '" .$NTL_unit. "', '" .$NTL_fid. "' ) ");
						$msginfo="Rekod telah disimpan ke dalam pangkalan data";
					}
	
				
			
			}
			elseif ($StaSave =="update")
			{
				if (isset ($_POST["LD_nama"]) && isset ($_POST["LD_jarak"]) && isset ($_POST["LD_unit"])  && isset ($_POST["LD_fid"]))
				{
					$LD_nama = $_POST['LD_nama'];
					$LD_jarak = $_POST['LD_jarak'];
					$LD_unit = $_POST['LD_unit'];
					$LD_fid = $_POST['LD_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='LD' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$LD_nama. "',N_Jarak=" .$LD_jarak. ", N_Unit='" .$LD_unit. "', N_Fid='" .$LD_fid. "' where N_Kategori='LD' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
				
				if (isset ($_POST["NTP_nama"]) && isset ($_POST["NTP_jarak"]) && isset ($_POST["NTP_unit"])  && isset ($_POST["NTP_fid"]))
				{
					$NTP_nama = $_POST['NTP_nama'];
					$NTP_jarak = $_POST['NTP_jarak'];
					$NTP_unit = $_POST['NTP_unit'];
					$NTP_fid = $_POST['NTP_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='NTP' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$NTP_nama. "',N_Jarak=" .$NTP_jarak. ", N_Unit='" .$NTP_unit. "', N_Fid='" .$NTP_fid. "' where N_Kategori='NTP' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
				
				if (isset ($_POST["NTL_nama"]) && isset ($_POST["NTL_jarak"]) && isset ($_POST["NTL_unit"])  && isset ($_POST["NTL_fid"]))
				{
					$NTL_nama = $_POST['NTL_nama'];
					$NTL_jarak = $_POST['NTL_jarak'];
					$NTL_unit = $_POST['NTL_unit'];
					$NTL_fid = $_POST['NTL_fid'];
				
					$rs = mydb ("SELECT N_Kategori FROM Novelty WHERE N_Kategori='NTL' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
					$objResult = odbc_fetch_array($rs);  
					if($objResult)
					{  		
						$rs2 = mydb("update Novelty set N_Nama='" .$NTL_nama. "',N_Jarak=" .$NTL_jarak. ", N_Unit='" .$NTL_unit. "', N_Fid='" .$NTL_fid. "' where N_Kategori='NTL' and N_Pdg = '" .$idpadang. "' and N_Hari = '" .$day. "'");
						$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
					}
				}
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
                       
                       
                         <?php /*?>  kat sini dah set value=""<?php */?>
                            <input type="text" name="hidSave" value=""/>
					  
                      </td>
					</tr>
				  </table>
                    <table width="884"  border="1">
                      <tr class="theader">
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
                        <td><input type="text" name="LD_nama" id="LD_nama" size="20"/>
                        <input type="hidden" name="LD_kategori" id="LD_kategori" value=""/></td>
                        <td><input type="text" name="LD_jarak" id="LD_jarak" size="2"/></td>
                        <td><input type="text" name="LD_unit" id="LD_unit" size="1"/></td>
                        <td><input type="text" name="LD_fid" id="LD_fid" size="2"/></td>
                        <td><input type="text" name="NTP_nama" id="NTP_nama" size="20"/>
                         <input type="hidden" name="NTP_kategori" id="NTP_kategori" value=""/></td>
                        <td><input type="text" name="NTP_jarak" id="NTP_jarak" size="2"/></td>
                        <td><input type="text" name="NTP_unit" id="NTP_unit" size="1"/></td>
                        <td><input type="text" name="NTP_fid" id="NTP_fid" size="2"/>
                         <input type="hidden" name="NTL_kategori" id="NTL_kategori" value=""/></td>
                        <td><input type="text" name="NTL_nama" id="NTL_nama" size="20"/></td>
                        <td><input type="text" name="NTL_jarak" id="NTL_jarak" size="2"/></td>
                        <td><input type="text" name="NTL_unit" id="NTL_unit" size="1"/></td>
                        <td><input type="text" name="NTL_fid" id="NTL_fid" size="2"/></td>
                      </tr>
                    </table>
                    <p>&nbsp;</p>
                    <table width="100%" align="center">
                      <tr valign="top">
                        <td><table id="TableB" border="0" width="100%">
                            <tr class="theader">
                              <td width="20%">Kategori Permainan</td>
                              <td width="49%">Nama</td>
                              <td width="12%">Jarak</td>
                              <td width="6%">Unit</td>
                              <td width="11%">Flight ID</td>
                              <td width="2%"></td>
                            </tr>
                            <tr>
						<td colspan="4">
							<div class=listbox style="height:300px">
								<table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
                            <?php
							   $i=0;
                               $rs = mydb ("Select N_Hari, N_Pdg, N_Kategori, N_Nama, N_Jarak, N_Unit, N_FID from Novelty ");
							   $objResult = odbc_fetch_array($rs);  
							   while($objResult)
							   {
							?>
                              <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" ondblclick="PaparInfo(<?php echo $i;?>,'TableC', '<?php echo $objResult["N_Kategori"];?>')">
                              <td width="28%"><?php echo $objResult["N_Kategori"];?></td>
                              <td width="70%"><?php echo $objResult["N_Nama"];?></td>
                              <td width="6%"><?php echo $objResult["N_Jarak"];?></td>
                              <td width="6%"><?php echo $objResult["N_Unit"];?></td>
                              <td width="11%"><?php echo $objResult["N_FID"];?></td>
                              
                            </tr>
                             <?php
								$objResult = odbc_fetch_array($rs);
								$i++;
								}
							?>
                          </table>
                          </div>
                          </td>
                      </tr>
                    </table>
                    <p>&nbsp;</p>
                  <p><br />
                  </p>
                  </td>
			</tr>
		</table>
	</form>
	</td>
</tr>
</table>
</body>
</html>
