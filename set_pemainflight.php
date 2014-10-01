<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">
    </head>
    <?php
require_once('dbConnect.php');
?>
<?php

if (isset($_POST['Submit']))
{
	$kategori1 = $_POST['kategori'];
}
	?>
    <?php
if (isset($_POST['submit']))
{

	$F_ID=$_POST["F_ID"];
	$P1=$_POST["P1"];
	
	$tsql="INSERT INTO Day_1(F_ID, P1) VALUES('$F_ID','$P1')";
			
			$sql_result=mydb($tsql) or die ("Error in inserting data due to".sqlsrv_error());
if($sql_result)
					echo "Succesfully register";		
			else
					echo "Error in registeration process";
}
?>
<body class="oneColLiqCtrHdr">
<table width="950" height="401" align="center" id="Outer" style="border: 3px solid #888; text-align: left;">
  <tr>
    <td height="391">

   <form id="swap" name="swap" method="post" action="set_pemainflight.php">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        <table height="284" align="center" id="Main">
        <tr>
          <td height="54" colspan="6"><div align="right" style="vertical-align:central;color:#CCFF66;">
            <p><a href="menusetup.php"><img src="image/back_icon.png" width="80" height="25"/></a></p>
          </div>
            <p><strong><u>Penentuan Pemain Kepada Flight</u></strong></p>
            <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td width="116" height="26">Kategori</td>
          <td width="6">:</td>
          <td width="802" colspan="3"><select name="kategori" id="kategori" value=>
            <option value="PILIH" selected="selected">PILIH</option>
            <?php
            $result1 = mydb("select Kat_ID,Kat_Nama from kategori order by Kat_Nama desc");
            $kat= odbc_fetch_array($result1);
		   
	
			while($kat){
           
            	if ($kategori1 == $kat['Kat_ID']){
			?>
            <option value=<?php echo $kat['Kat_ID']; ?> selected><?php echo $kat['Kat_Nama']; ?></option>
            <?php   }else{ ?>
            <option value=<?php echo $kat['Kat_ID']; ?> ><?php echo $kat['Kat_Nama']; ?></option>
            <?php  
            
			     }
                 $kat=odbc_fetch_array($result1);
            }
            
            ?>
          </select>
            <input type="submit" name="Submit" id="button3" value="Submit" /></td>
        </tr>
        <tr>
          <td height="38">Bilangan Pemain</td>
          <td>:</td>
          <td colspan="3"><?php
	if  (!empty($kategori1)) {
	?>
            <?php
	$sql =mydb("select COUNT (a.PE_ID) As Bil_Pemain from Pemain as a, kategori as b where a.Kat_ID = b.Kat_ID and a.Kat_ID = '$kategori1'");
   $select = odbc_fetch_array($sql);
   
   while($select)
{
			
   ?>
            <?php echo $select['Bil_Pemain'];?>
            <?php
                 $select=odbc_fetch_array($sql);
            }
            
           ?>
            <?php
}
   ?></td>
        </tr>
        <tr>
          <td height="20">Bilangan Flight</td>
          <td>:</td>
          <td colspan="3"><?php
	if  (!empty($kategori1)) {
	?>
            <?php
	$sql =mydb("select COUNT (a.PE_ID) As Bil_Flight from Pemain as a, kategori as b where a.Kat_ID = b.Kat_ID and a.Kat_ID = '$kategori1'");
   $select = odbc_fetch_array($sql);
   $a= $select['Bil_Flight'];
   while($select)
{
	{
		
		$noRow =(round($a/4));
		echo $noRow;
		 
	}
	
			 //$bilHole = $select; 
			 $select=odbc_fetch_array($sql);		
              }
           ?>
            <?php
}

   ?></td>
        </tr>
     
        <tr>
          <td height="132" colspan="5"><?php
		
	if  (!empty($kategori1)) {
	?>
            <table id="TableB" border="1">
              <tr class="theader">
                <td rowspan="2" style="text-align: center">Flight Id</td>
                <td colspan="2" style="text-align: center">Pemain 1</td>
                <td colspan="2" style="text-align: center">Pemain 2</td>
                <td colspan="2" style="text-align: center">Pemain 3</td>
                <td colspan="2" style="text-align: center">Pemain 4</td>
              </tr>
              <tr class="theader">
                <td width="225" style="text-align: center">Nama</td>
                <td width="112" style="text-align: center">IC</td>
                <td width="215" style="text-align: center">Nama</td>
                <td width="112" style="text-align: center">IC</td>
                <td width="215" style="text-align: center">Nama</td>
                <td width="112" style="text-align: center">IC</td>
                <td width="215" style="text-align: center">Nama</td>
                <td width="112" style="text-align: center">IC</td>
              </tr>
              <?php
   $sql =mydb("SELECT a.Kat_ID as F_ID, a.PE_Nama as n_pemain,a.PE_ID as P1 FROM Pemain as a 
INNER JOIN kategori AS b on b.Kat_ID = a.Kat_ID
INNER JOIN Universiti AS c on c.Ipt_ID = a.Ipt_ID AND a.Kat_ID = b.Kat_ID
where b.Kat_ID = '$kategori1'
order by a.Ipt_ID desc");
   $_select = odbc_fetch_array($sql);
   $f=1;
		  $i = 1;
          while ($i <= ((int)$noRow)) 
          {
			  
			?>
              <tr>
                <td name="id_pemain"><?php echo 'F',$f,$_select ['F_ID']  ?></td>
                <td ></td>
                <td ></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <?php
			$f++;
			$i++;
			$_select=odbc_fetch_array($sql);
		
		  } 
		  ?>
              <?php
}
   ?>
            </table>
            <table width="932">
              <tr>
                <td width="786" height="26">&nbsp;</td>
                <td width="80"><input type="submit" id="button"  name="submit" value="Penentuan Pemain" /></td>
                <td width="50">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
       
        </table>
   </form>
</table>
</body>
</html>