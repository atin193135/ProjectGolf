<?php 
	include 'dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="golf750.css" type="text/css">

<script language="javascript">
	function Proses()
	{
		if ((document.frmTest.padang.value == "") || (document.frmTest.padang.value == "-"))
		{
			alert("Sila pilih tempat pertandingan");
			document.frmTest.padang.focus();
			return false;
		}

		document.frmTest.hidPro.value = "proses";
		document.frmTest.submit();
		return true;	
	}

</script>
</head>
<?php

	$hidpro="";
	$idpadang="";

	if(isset($_POST['hidPro'])){ $hidpro = $_POST['hidPro']; };
	if(isset($_POST['padang'])){ $idpadang = $_POST['padang']; };
	if(isset($_POST['par'])){ $par = $_POST['par']; };
	
	if ($hidpro != "")
	{
		$rs = mydb ("SELECT P_ID, P_Nama, P_MaxHole FROM Padang WHERE P_ID='$idpadang'");
		$objResult = odbc_fetch_array($rs);  
		if($objResult)//Rekod Wujud  
		{
			$msginfo="Rekod telah wujud di dalam pangkalan data";
			//DELETE ALL DATA FROM HOLE
			$rs1 = mydb ("DELETE FROM Hole WHERE P_ID='$idpadang'");
			
			//SAVE DATA TO HOLE
			$max=odbc_result($rs,"P_MaxHole");			
			for ($x=1; $x<=odbc_result($rs,"P_MaxHole"); $x++) 
			{
			  	$holeid=odbc_result($rs,"P_ID").str_pad($x, 2, '0', STR_PAD_LEFT);
			$rs2 = mydb ("INSERT INTO Hole (H_ID, P_ID) VALUES ('$holeid', '$idpadang')");
		
		} 
		}
	}	
	
	function Simpan()
	{
		$rs3 = mydb ("SELECT H_ID FROM Hole WHERE H_ID='$holeid'");
		$objResult = odbc_fetch_array($rs3);  
		if($objResult)
		{  		
			$rs4 = mydb ("UPDATE Hole SET H_Par = '$par' WHERE P_ID='$idpadang'");
				$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
			}
	}
?>

<body>


	<form name="frmTest" id="frmTest" action ="dftr_Hole.php" method="post">
		<table width="62%" border="0" id="TableB">
		<tr>
			<td width="161">Tempat Pertandingan</td>
			<td width="124">
                <select name="padang" id="padang"style="width:120px">
                    <option value="" >Sila pilih</option>
                    <option value="AK" >AKCC</option>
                    <option value="OR">ORNA</option>
                    <option value="TR">TIARA</option>
                    <option value="FA">FAMOSA</option>
                </select>					
			</td>
			<td width="742">
				<input type="button" class="button" name="proses" id="proses" value="Proses" style="width:90px; text-align:center;" onclick="Proses();"/>
                <input type="hidden" name="hidPro" value="">
			</td>
		</tr>
		</table>
        <table width="50%" id="TableB" border="0">
  <tr>
            <td width="1%">Bil</td>
            <td width="10%" align="center">Hole ID</td>
            <td width="10%" align="center">Padang ID</td>
<td width="10%" align="center">PAR</td>
            <td width="10%" align="center">Indeks</td>
            <td width="10%" align="center">Distanse</td>
            <td width="10%" align="center">Max Flight</td>	
    <td width="10%" align="center">Kategori</td>
        </tr>
        <tr>
            <td colspan="8">
                <div class=listbox style="height:400">
                    <table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
                    <?php
                        $i=0;
						$f=1;
                        $rs = mydb ("SELECT H_ID, P_ID, H_Par, H_MaxFlight, H_Indeks, H_Distance, Kat_ID FROM HOLE WHERE P_ID = '$idpadang'");
                        $objResult = odbc_fetch_array($rs);  
                        while($objResult)
                        {
                    ?>
                        <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" onClick="PaparInfo(<?php echo $i;?>,'TableC')">
                            <td width="3%"><?php echo $i+1;?></td>
                            <td width="10%"><input name="idhole" type="text" id="idhole" value="<?php echo $objResult["H_ID"];?>" readonly="readonly" /></td>
                            <td width="10%"><input name="phole" type="text" id="phole" value="<?php echo $objResult["P_ID"];?>" readonly="readonly" /></td>
                            <td width="10%"><input name="par" type="text" id="par" value="<?php echo $objResult["H_Par"];?>" /></td>
                            <td width="10%"><input name="indeks" type="text" id="indeks" value="<?php echo $objResult["H_Indeks"];?>" /></td>
                            <td width="10%"><input name="distance" type="text" id="distance" value="<?php echo $objResult["H_Distance"];?>" /></td>
                            <td width="10%"><input name="maxFlight" type="text" id="maxFlight" value="<?php echo $objResult["H_MaxFlight"];?>" /></td>
                            <td width="10%"><select name="cat" id="cat"  ?>" >
                        					<option value="0">Sila Pilih</option>
                       						<option value="01">Nett</option>
                        					<option value="02">Gross</option>
                        					<option value="03">Jemputan Utem</option>
                        					<option value="04">Jemputan IPT</option>
                                            <option value="05">Jemputan VIP</option>
                      						</select></td>
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
        <tr>
        	<td colspan="8" align="right"><input type="submit" class="button" name="btnsimpan" id="btnsimpan" value="Kemaskini" style="width:90px; text-align:center;" onClick="return SimpanRekod()"/></td>
        </tr>
		</table>
	</form>	
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
