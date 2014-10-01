<?php 
	include 'dbConnect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kejohanan Golf Antara IPTA 2014</title>
<link rel="stylesheet" href="golf750.css" type="text/css">
<?php

if (isset($_POST['Submit']))
{
	$Npadang1 = $_POST['Npadang'];
	
	
	$buttonklik= false;
	
 
	$buttonklik= true;
}
	?>
<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888; text-align: left;">
<tr>
    <td>
	  <form name="frmDaftar_N_G" id="frmDaftar_N_G" action ="set_pemainhole.php" method="post">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        
        <div align="right" style="vertical-align:central;color:#CCFF66;">
          <p><a href="menusetup.php"><img src="image/back_icon.png" width="80" height="25"/></a></p>
        </div>
        <p><u><strong>Penentuan Flight Pada Hole</strong></u></p>
        <table width="91%" id="Main" align="center">
            <tr> 
              <td width="111">Nama Padang</td>
              <td width="8">:</td>
              <td width="727"><select name="Npadang" id="Npadang">
                <option value="PILIH" selected="selected">PILIH</option>
                
                <?php
            $result1 = mydb("select P_ID,P_Nama from Padang order by P_Nama desc");
            $pdg= odbc_fetch_array($result1);
		   
	
			while($pdg){
           
            	if ($Npadang1 == $pdg['P_ID']){
			?>
                
                <option value=<?php echo $pdg['P_ID']; ?> selected><?php echo $pdg['P_Nama']; ?></option>
                <?php   }else{ ?>
                <option value=<?php echo $pdg['P_ID']; ?> ><?php echo $pdg['P_Nama']; ?></option>
                <?php  
            
			     }
                 $pdg=odbc_fetch_array($result1);
            }
            
            ?>
                
                </select>
              <input type="submit" name="Submit" id="button3" value="Submit" /></td>
          </tr>
        
   		<tr>
     	<td>ID Padang</td>            
     	<td>:</td>
     	<td colspan="2">
    	<?php
			if  (!empty($Npadang1)) {
		
			$sql =mydb("select P_ID AS nama from Padang where P_ID = '$Npadang1'");
   			$_select = odbc_fetch_array($sql);
   
  				 while($_select)
					{
			
   		echo $_select['nama'];
		
                 $_select=odbc_fetch_array($sql);
            		}
            
      
					}
   		?>
   		</td>
    	</tr>
        
   		<tr>
     	<td height="20">Jumlah Hole</td>
     	<td>:</td>
     	<td colspan="2">
    	<?php
			if  (!empty($Npadang1)) {
		
			$sql =mydb("select P_MaxHole AS hole from Padang where P_ID = '$Npadang1'");
   			$_select = odbc_fetch_array($sql);
   
   				while($_select)
					{
		 echo $_select['hole'];
			 $bilHole = $_select['hole'];
             $_select=odbc_fetch_array($sql);
            	}
            
      
				}
   		?>
 
     	</td>
   		</tr>
        
       
      	<tr>
        <td colspan="3"></br><center>
        
      
             
              
        <?php
			  
			if  (!empty($Npadang1)) {
				?>
	  <table width="837" height="52" border="1">
        <tr class="theader">
        <td width="309" height="22" rowspan="1" align="center" >ID Padang</td>
        <td width="143" rowspan="1" align="center">Hole ID</td>
        <td width="363" rowspan="1" align="center">Flight ID</td>
        </tr>
		
		<?php
  			$sql =mydb("select a.H_ID as hole, b.P_ID as id from Hole a
						inner join Padang b on b.P_ID = a.P_ID where b.P_ID = '$Npadang1'");
   
   
   			$_select = odbc_fetch_array($sql);

		  	$i = 1;
          	while ($i <= ((int)$bilHole)) 
		  	{  
		?>
    
		<tr>
  		
    	<td height="22"><?php echo $_select['id']?></td>
        <td><?php echo $_select['hole'] ?></td>
       	<td></td>

        <?php
			
			$i++;
			$_select=odbc_fetch_array($sql);
		  	} 
	
			}
		  
   		?>
 		</tr> 
        </table>
        
        </center></td>
      	</tr>
      <tr>
        <td colspan="4">&nbsp;</td></tr>
      	<tr>
        <td colspan="4" align="right"><input type="button" name="Simpan" value="Simpan" />
          <a href="urussetia.php">
          <input type="button" name="button" id="button"  value="menu urusetia" />
          </a></td>
     
        
		</tr>
		</table>
        </form>
		</td>
		</tr>
		</table>
        </td>
		</tr>
		</table>
   
</body>
		</html>