<?php 
	require_once( 'dbConnect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">

</head>

<?php


	if (isset($_POST['Submit']))
	{
		$nama_pdg1 = $_POST['nama_pdg'];
		
	}
?>

<?php
 	
		if(isset($_POST['submit']))
		{
			echo $_POST['hdnLine'];
			for($i=1;$i<=$_POST['hdnLine'];$i++)
			{
				$idhole = $_POST['idhole'];
				$par = $_POST['par'];
				$maxFlight = $_POST['maxFlight'];
				$indek = $_POST['indek'];
				$distance = $_POST['distance'];
				$cat =  $_POST['cat'];
				$query1 = "INSERT INTO Hole (H_ID,H_Par,H_MaxFlight,H_Indeks,H_Distance,Kat_ID) 
							VALUES ('$idhole', '$par', '$maxFlight', '$indek', '$distance' , '$cat')";
				echo $query1;
			
				$result = mydb($query1);
					
			}
		
		
			if($result)
			{
				echo "<font color='#006633'><center>Berjaya masukan data!!!!</center></font>";
				echo "<BR>";
			}
			
			else
			{
				 echo "Something Wrong";
			}
		}
?>
<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
<tr>
    <td>
	<form name="frmDaftarHole" id="frmDaftarHole" action ="util_hole.php" method="post">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        <table width="100%" id="Main" align="center">
        <tr>
            <td>
                
			</td>
        </tr>
        <tr>
            <td>
              
                  <div align="right" style="vertical-align:central;color:#CCFF66;">
                    <p><a href="menusetup.php"><img src="image/back_icon.png" width="80" height="25"/></a></p>
                  </div>
                  <p><strong><u>Daftar Hole</u></strong></p>
              <center><table width="100%" id="TableA" border="0">
                <tr>
                    <td width="905"  align="left"><p>Nama Padang :
                        <label>
                          <select name="nama_pdg" id="nama_pdg">
                            <!--------------------FUNCTION UNTUK DROP DOWN LIST PADANG DARI DATABASE-------------------------------->
                            <?php
						  
						  
 
						  
				$result = mydb("select P_Nama, P_ID from Padang order by P_Nama asc");
				$row = odbc_fetch_array($result);
				while ($row) {
	
					if($nama_pdg1 == $row['P_ID']){	
			?>
                            <option value="<?php echo $row['P_ID']; ?>" selected="selected"><?php echo $row['P_Nama']; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $row['P_ID']; ?>" ><?php echo $row['P_Nama']; ?></option>
                            <?php
				}
				$row = odbc_fetch_array($result);
	
			}
			?>
                            <!--------------------FUNCTION UNTUK DROP DOWN LIST PADANG DARI DATABASE END--------------------------->
                          </select>
                        </label>
                      <label>
                        <input type="submit" name="Submit" id="button" value="Submit" />
                      </label>
                    </p></td>
                </tr>
                <tr>
                    <td>Jumlah Hole :
                  <?php 
	  	if(!empty($nama_pdg1)) 
		{

			$sql =mydb("SELECT P_MaxHole from Padang where P_ID = '$nama_pdg1'");
   			$select = odbc_fetch_array($sql);
   
   			while($select)
			{
				echo $select['P_MaxHole'];
				$bilHole = $select['P_MaxHole'];
    			$select=odbc_fetch_array($sql);
       		}
		 } 
	  ?></td>
                  </tr>
                <tr>
                    <td>
                       <p>
                         <?php
					   if  (!empty($nama_pdg1))
					   {?>
                       </p>
                      <table width="80%" height="56" border="1" align="center">
                        <tr class="theader">
                        <td width="20%" height="22" style="text-align: center">Hole ID</td>
                        <td width="10%" style="text-align: center">Par</td>
                        <td width="10%" style="text-align: center">Max Flight</td>
                        <td width="20%" style="text-align: center">Index</td>
                        <td width="20%" style="text-align: center">Distance</td>
                        <td width="20%" style="text-align: center">Kategori</td>
                      </tr>
					<?php  
		  	$sql = mydb("SELECT P_ID from Padang where P_ID = '$nama_pdg1'");
   			$select = odbc_fetch_array($sql);
   			$f=1;
		  $i = 1;
          while ($i <= ((int)$bilHole))
          {
			  
			?>
                      <tr>
                        <td width="20%" height="26"><input name="idhole<?=$i;?>" type="text" id="idhole<?=$i;?>" style="width:97%;" value="<?php echo $select ['P_ID'], $f ?>" maxlength="50" /></td>
                        <td width="10%"><input  style="width:94%;" maxlength="50" type="text" name="par<?=$i;?>" id="par<?=$i;?>" /></td>
                        <td width="10%"><input style="width:94%;" maxlength="50" type="text" name="maxFlight<?=$i;?>" id="maxFlight<?=$i;?>" /></td>
                        <td width="20%"><input style="width:97%;" maxlength="50" type="text" name="indek<?=$i;?>" id="indek<?=$i;?>" /></td>
                        <td width="20%"><input style="width:97%;" maxlength="50" type="text" name="distance<?=$i;?>" id="distance<?=$i;?>" /></td>
                        <td width="20%"><select name="cat<?=$i;?>" id="cat<?=$i;?>" >
                          <option value="NULL">Sila Pilih</option>
                          <option value="Nett">Nett</option>
                          <option value="Gross">Gross</option>
                          <option value="Jemputan Utem">Jemputan Utem</option>
                          <option value="Jemputan IPT">Jemputan IPT</option>
                        </select></td>
                      </tr>
                      <?php
			$i++;
			$f++;
		  }
					   }
		  ?>
                  </table></td>
                  </tr>
				</table></center>
              <table width="90%" id="TableB" border="0">
                <tr>
                    <td width="25%">&nbsp;</td>
                    <td width="67%"><input type="hidden" name="hdnLine" value="<?=$i;?>" /></td>
                    <td width="8%"><input type="submit" name="submit" id="submit" value="Simpan" /></td>
                </tr>
   			  </table>    
			</td>
		</tr>
		</table>
	</form>
	</td>
</tr>
</table>
</body>
</html>