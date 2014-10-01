<?php  
	session_start();
	require_once('dbConnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">

</head>

<?php
// carry previous session

//echo "page3 <br>";
$rs = mydb("select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_SESSION['UID']."'");
	$objResult = odbc_fetch_array($rs);
	$_SESSION['UID']=odbc_result($rs,"Usr_ID");
	$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
	$noic = $_SESSION['UID'];
	$universiti = $_SESSION['UIpt'];


?>


<?php
	$buttonklik=false;
	$mykategori= "02";
	$mykategori1= "01";
	if (isset($_POST['submit']))
	{
		//$myjenis= $_POST['Jenis'];
		$mykategori= $_POST['kategori'];	
		$mykategori1= $_POST['kategori1'];
		$buttonklik=true;			
	}	
	
	if (isset($_POST['submit1']))
	{
		//$myjenis= $_POST['Jenis'];
		$mykategori1= $_POST['kategori1'];	
		$mykategori= $_POST['kategori'];
		$buttonklik=true;			
	}

?>

<body class="oneColLiqCtrHdr">
<div id="container">
	<img src="image/header.jpg" width="100%" height="165"/>
	<div>
<form name="form1" method="post" action="pemainTukarKat.php" >
<table width="60%" align="center">
<tr>
<td colspan="3"> <b><u>Pemain 1</u></b>
</td>
</tr>

<tr>
<td colspan="3" height="50"> <b>Kategori : </b>
  <select name="kategori" id="kategori" >
    <?php
			$result = mydb("SELECT Kat_ID, Kat_Nama FROM kategori");
			$row = odbc_fetch_array($result);
			while ($row){
				if($mykategori == $row['Kat_ID']) {
		?>
    <option value="<?php echo $row['Kat_ID'];?>" selected="selected" ><?php echo $row['Kat_Nama'];?></option>
    <?php }else{ ?>
    <option value="<?php echo $row['Kat_ID'];?>"  ><?php echo $row['Kat_Nama'];?></option>
    <?php
			}
		$row = odbc_fetch_array($result);
	}
		?>
  </select>
  <input type="submit" name="submit" id="submit" value="SEMAK" />
</td>
</tr>


<tr bgcolor="#66CCCC">
<td width="20%">No Kad Pengenalan </td>
<td width="70%">Nama</td>
<td width="10%">Pilih</td>
</tr>

<?php
if($buttonklik)
{
	myreport($mykategori);
}
?>

<?php
function myreport($mykategori)
{
	//echo "Universiti";
	//echo $myuni;

}
?>



<?php


	$select = mydb("select PE_ID, PE_Nama, Kat_ID from pemain where Kat_ID = '$mykategori'  AND Ipt_ID = '$universiti' ");
	$row = odbc_fetch_array($select);
	$no = 0;
	
	while($row)
	{

?>

<tr>
<td><?php echo $row['PE_ID']; ?></td>
<td><?php echo $row['PE_Nama']; ?></td>
<td><input type="radio" name="radio1" id="radio1" value="<?php echo $row['PE_ID']; ?>"  /></td>
</tr>

<?php

$row = odbc_fetch_array($select);
}

?>

</table>


<br /><br />
<table width="60%" align="center">
<tr>
<td colspan="3"> <b><u>Pemain 2</u></b>
</td>
</tr>

<tr>
<td colspan="3" height="50"> <b>Kategori : </b> 
<select name="kategori1" id="kategori1">
        <?php
			$result = mydb("SELECT Kat_ID, Kat_Nama FROM kategori where Kat_ID != '$mykategori' ");
			$row = odbc_fetch_array($result);
			while ($row){
				if($mykategori1 == $row['Kat_ID']) {
		?>
        
        <option value="<?php echo $row['Kat_ID'];?>" selected="selected" ><?php echo $row['Kat_Nama'];?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['Kat_ID'];?>"  ><?php echo $row['Kat_Nama'];?></option>
        <?php
			}
		$row = odbc_fetch_array($result);
	}
		?>
      </select>
      
      <input type="submit" name="submit1" id="submit1" value="SEMAK" />
</td>
</tr>


<tr bgcolor="#66CCCC">
<td width="20%">No Kad Pengenalan </td>
<td width="70%">Nama</td>
<td width="10%">Pilih</td>
</tr>


<?php


	$select = mydb("select PE_ID, PE_Nama, Kat_ID from pemain where Kat_ID = '$mykategori1'  AND Ipt_ID = '$universiti' ");
	$row = odbc_fetch_array($select);
	$no = 0;
	
	while($row)
	{

?>

<tr>
<td><?php echo $row['PE_ID']; ?></td>
<td><?php echo $row['PE_Nama']; ?></td>
<td><input type="radio" name="radio2" id="radio2" value="<?php echo $row['PE_ID']; ?>" /></td>
</tr>


<?php

$row = odbc_fetch_array($select);
}

?>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><input type="submit" name="tukar" value="TUKAR"  /></td>
</tr>
</table>

<br />
<br />
</form>

<br />

<?php

if(isset($_REQUEST['tukar']))
{
echo $pemain1 = $_REQUEST['radio1']; 
echo "<br>";
echo $kategori1 = $_REQUEST['kategori'];
echo "<br>";

echo $pemain2 = $_REQUEST['radio2'];
echo "<br>";
echo $kategori2 = $_REQUEST['kategori1'];
echo "<br>";

$update1 = mydb("update pemain set Kat_ID = '$kategori2' where PE_ID = '$pemain1' ");

$update2 = mydb("update pemain set Kat_ID = '$kategori1' where PE_ID = '$pemain2' ");

if($update1 && $update2)
{
	echo "<script>alert('Kategori pemain berjaya ditukar'); </script>";
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pemainTukarKat.php" ';
	
}
else
{
	echo "<script>alert('Kategori pemain tidak berjaya ditukar'); </script>";
}
}

?>
  </div>
	 <p><center></center></p>
</div>
</body>
</html>