<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">
    </head>
<?php
require_once('dbConnect.php');
$bil_flight = 0;

$offset = $bil_flight;
 $KatID = array();
 $PENama = array();
 $IC = array();
if (isset($_POST['Submit']))
{
	$kategori1 = $_POST['kategori'];
	$sql3 =mydb("SELECT a.Kat_ID as KatID, a.PE_Nama as PENama,a.PE_ID as IC FROM Pemain as a 
	INNER JOIN kategori AS b on b.Kat_ID = a.Kat_ID
	INNER JOIN Universiti AS c on c.Ipt_ID = a.Ipt_ID 
	where b.Kat_ID = '" .$kategori1. "'
	");
}
?>

<body class="oneColLiqCtrHdr">
<table width="950" height="401" align="center" id="Outer" style="border: 3px solid #888; text-align: left;">
  <tr>
    <td height="391">

   <form id="swap" name="swap" method="post" action="pemainflight.php">
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
            $result1 = mydb("select Kat_ID,Kat_Nama from Kategori order by Kat_Nama desc");
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
	
	$sql1 =mydb("select COUNT (a.PE_ID) As Bil_Pemain from Pemain as a, kategori as b where a.Kat_ID = b.Kat_ID and a.Kat_ID = '$kategori1'");
   $select1 = odbc_fetch_array($sql1);
   
   while($select1)
{
			
    echo $select1['Bil_Pemain'];
    $select1=odbc_fetch_array($sql1);
            }
            
      
}
   ?></td>
        </tr>
        
        <tr>
          <td height="20">Bilangan Flight</td>
          <td>:</td>
          <td colspan="3"><?php
	if  (!empty($kategori1)) {
	
   $sql2 =mydb("select COUNT (a.PE_ID) As Bil_Flight from Pemain as a, Kategori as b where a.Kat_ID = b.Kat_ID and a.Kat_ID = '" .$kategori1. "'");
   $select2 = odbc_fetch_array($sql2);
   $a= $select2['Bil_Flight'];
   while($select2)
{
	{
		
		$bil_flight = (ceil(($a)/4));
		
		echo $bil_flight;
		 
	}
	
			 //$bilHole = $select; 
			 $select2=odbc_fetch_array($sql2);		
              }
       
}

   ?></td></tr></table>
   
   <table border="1" style="float: left">

    <?php
    // table flight
    echo "<thead style='background-color: lightcoral'>
    <td>Flight</td>
    </thead>";
if  (!empty($kategori1)) {

	while( $row = odbc_fetch_array($sql3) ) { 
		$KatID[] =  $row['KatID'];
		$PENama[] = $row['PENama'];
		$IC[] = $row['IC'];
	} 
    $flight = 0;	 
    while (true) {

        $flight++;
        echo "<tr>";
        echo "<td>";
        echo "F" . $flight.$KatID[$flight]; 
        echo "</td>";
        echo " </tr>";
        if ($flight == $bil_flight) {

            break;
        }


}}
    ?>
</table>

<table border="1" style="float: left">
    <?php
    // pemain pemain 1
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 1</td>
     <td>IC</td>
    </thead>";
	if  (!empty($kategori1)) {
	while( $row = odbc_fetch_array($sql3) ) { 
		$KatID[] =  $row['KatID'];
		$PENama[] = $row['PENama'];
		$IC[] = $row['IC'];
	} 
   $k = 0;
    while ($k < sizeof($PENama)) {

        echo "<tr>";
        echo "<td>";
        echo $PENama[$k];
        echo "</td>";

        // letak ic kat sini
        echo "<td>";
        echo $IC[$k];
        echo "</td>";
        // --
        echo " </tr>";
        $k++;

        if ($k == $bil_flight) {
            $bil_flight++;
            break;
        }
		
    }}
    ?>
</table>

<table border="1" style="float: left">
    <?php
    // pemain pemain 2
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 2</td>
     <td>IC</td>
    </thead>";
	if  (!empty($kategori1)) {
	while( $row = odbc_fetch_array($sql3) ) { 
		$KatID[] =  $row['KatID'];
		$PENama[] = $row['PENama'];
		$IC[] = $row['IC'];
	} 
   
    while ($k < sizeof($PENama)){
	
        echo "<tr>";
        echo "<td>";
        echo $PENama[$k];
        echo "</td>";

        // letak ic kat sini
        echo "<td>";
        echo $IC[$k];
        echo "</td>";
        // --
        echo " </tr>";
  		$k++;
      if ($k == $bil_flight + 1 ) {
			echo ("masuk last?");
            $bil_flight++;
            break ;
        }
		
		}}
    ?>
</table>

<table border="1" style="float: left">
    <?php
    // pemain pemain 3
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 3</td>
     <td>IC</td>
    </thead>";
	if  (!empty($kategori1)) {
	while( $row = odbc_fetch_array($sql3) ) { 
		$KatID[] =  $row['KatID'];
		$PENama[] = $row['PENama'];
		$IC[] = $row['IC'];
	} 
   
    while ($k < sizeof($PENama)) {

        echo "<tr>";
        echo "<td>";
        echo $PENama[$k];
        echo "</td>";

        // letak ic kat sini
        echo "<td>";
        echo $IC[$k];
        echo "</td>";
        // --
        echo " </tr>";
   
		echo $bil_flight;
		$k++;
       if ($k == $bil_flight + 1 + 1) {
			echo ("masuk last?");
            $bil_flight++;
            break ;
        }
		
    }}
    ?>
</table>

<table border="1" style="float: left">
    <?php
    // pemain pemain 4
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 4</td>
     <td>IC</td>
    </thead>";
	if  (!empty($kategori1)) {
	while( $row = odbc_fetch_array($sql3) ) { 
		$KatID[] =  $row['KatID'];
		$PENama[] = $row['PENama'];
		$IC[] = $row['IC'];
	} 
  
    while ($k < sizeof($PENama)) {

        echo "<tr>";
        echo "<td>";
        echo $PENama[$k];
        echo "</td>";

        // letak ic kat sini
        echo "<td>";
        echo $IC[$k];
        echo "</td>";
        // --
        echo " </tr>";

		$k++;
      if ($k == $bil_flight +1 +1 +1) {
			echo ("masuk last?");
            $bil_flight++;
            break ;
        }
	
    }}
    ?>
</table>
</form>
</td></tr></table>
</body>
</html>