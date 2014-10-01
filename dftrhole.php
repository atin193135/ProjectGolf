<?php 
	include 'dbConnect.php';

	if(!empty($_POST['padang'])){ 
		$idpadang = $_POST['padang']; 
		$i=0;
		$f=1;
		$rs =mydb("SELECT H_ID, P_ID, H_Par, H_MaxFlight, H_Indeks, H_Distance, Kat_ID FROM Hole WHERE P_ID = '" . $idpadang ."'");
		$objResult = odbc_fetch_array($rs); 
		$count = odbc_num_rows($rs);
		}		   
		
	if(isset($_POST['btnsimpan']))
	{	
		$count2 = $_POST['padang2'];
		
		for($i=0; $i<$count2; $i++){
			
			$idhole = $_POST['idhole'];
			$par = $_POST['par'];
			$indeks = $_POST['indeks'];
			$distance = $_POST['distance'];
			$maxFlight = $_POST['maxFlight'];
			$kat = $_POST['kat'];
			
			$update=mydb("update Hole set H_Par=" .$par[$i]. ", H_Indeks = " .$indeks[$i]. ", H_Distance = " .$distance[$i]. ", H_MaxFlight = " .$maxFlight[$i]. ", Kat_ID = '" .$kat[$i]. "' where H_ID='" .$idhole[$i]. "'");	
		//echo $par[$i]."--".$indeks[$i]."--".$idhole[$i]."<br/>";
			if($update)
			{
				echo "1 data updated";
			
			}
			else
			{
				echo "Update data failed";
			}
		}
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="golf750.css" type="text/css">

<script language="javascript">
function upd()
{
	if(confirm('Pasti untuk UPDATE record ' + document.getElementById('idhole').value + '?'))
	{
		document.getElementById('idhole').disabled = false;
		return true;
		}
		return false;
}

</script>
</head>
<body>

	<form name="frmTest" id="frmTest" action ="dftrhole.php" method="post">
		<table width="62%" border="0" id="TableB">
		<tr>
			<td width="161">Tempat Pertandingan</td>
			<td width="124">
                <select name="padang" id="padang"style="width:120px">
                    <option value="" >Sila pilih</option>
                    <option value="AK">AKCC</option>
                    <option value="OR">ORNA</option>
                    <option value="TR">TIARA</option>
                    <option value="FA">FAMOSA</option>
                </select>					
			</td>
			<td width="742">
				<input type="submit" name="proses" id="proses" value="Proses" style="width:90px; text-align:center;"/>
                <input type="hidden" name="padang2" value="<?=$count?>" />
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
            <td width="10%" align="center">Distance</td>
            <td width="10%" align="center">Max Flight</td>	
    <td width="10%" align="center">Kategori</td>
        </tr>
        <tr>
            <td colspan="8">
                <div class=listbox style="height:400">
                    <table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
                    <?php
					if (!empty ($idpadang)){  
                        while($objResult)
                        {
                    ?>
                      <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" >
                        <td width="3%"><?php echo $i+1;?></td>
                            <td width="10%"><input name="idhole[<?=$i?>]" type="text" id="idhole" value="<?php echo $objResult["H_ID"];?>"  /></td>
                            <td width="10%"><input name="phole[<?=$i?>]" type="text" id="phole" value="<?php echo $objResult["P_ID"];?>" /></td>
                		    <td width="10%"><input name="par[<?=$i?>]" type="text" id="par" value="<?php echo $objResult["H_Par"];?>" /></td>
                            <td width="10%"><input name="indeks[<?=$i?>]" type="text" id="indeks" value="<?php echo $objResult["H_Indeks"];?>" /></td>
                            <td width="10%"><input name="distance[<?=$i?>]" type="text" id="distance" value="<?php echo $objResult["H_Distance"];?>" /></td>
                            <td width="10%"><input name="maxFlight[<?=$i?>]" type="text" id="maxFlight" value="<?php echo $objResult["H_MaxFlight"];?>" /></td>
                            <td width="10%"><select name="kat[<?=$i?>]" id="kat"  >
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
                        }}
											
                 ?>
                    </table>
                </div>
            </td>
        </tr>
        <tr>

        	<td colspan="8" align="right">
            
            <input type="submit" name="btnsimpan" id="btnsimpan" value="Kemaskini" style="width:90px; text-align:center;" onClick="return upd();"/>
           
          </td>
        </tr>
		</table>
	</form>	
   
</body>
</html>
