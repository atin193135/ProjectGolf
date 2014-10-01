
<?php
include 'dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Util_Pdg</title>
	<link href="golf750.css" rel="stylesheet" type="text/css" />
<script>   //disable number lorh
function nonnumeric_only( e )
{
// deal with unicode character sets
var unicode = e.charCode ? e.charCode : e.keyCode;

// if the key is backspace, tab, or numeric
if ( unicode >= 48 && unicode <= 57 )
{
// we don't allow the key press
return false;
}
else
{
// otherwise we allow
return true;
}
}
</script>

<script>
function nonchar(evt) //disable huruf lerhh
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>
<script>
 
function space(e) //close space and .
{
        var key;
        if(window.event)
                key = window.event.keyCode;     //IE
    else
                key = e.which;                  //Firefox
     if ((key>47 && key<58) || (key>64 && key<91) || (key>96 && key<123) || key == 8 || key ==0)
     {
                return true;
     }
     else
     {
                return false;
     }
}
</script>
</head>


<?php


	

	
	
	if(isset($_POST['hidact']) && $_POST['hidact'] == "Save" )	
	{
		

		// dive value into inbox :P
	$P_Nama=$_POST['P_Nama'];
	$P_ID=$_POST['P_ID'];
	$P_MaxHole=$_POST['P_MaxHole'];
		
		// Insert data into mysql
		$sql= mydb ("INSERT INTO Padang(P_Nama, P_ID, P_MaxHole) VALUES ('$P_Nama', '$P_ID', '$P_MaxHole')");
		
		
		// if successfully insert data into database, displays message "Successful".
		if($sql){
		//echo "Successful";	
	
		}		
		else {
		echo "ERROR";
		}
	
	}
	
	
	if (isset($_POST['hidact']) && $_POST['hidact'] == "Back")
	{
	
		header('Location: util_Pdg.php'); exit;
	}

?>



<script>
function jsSave()
	{
		if(document.form1.P_Nama.value == "")
		{
			alert ("Sila masukkan nama padang");
			document.form1.P_Nama.focus();
			return false;
		}
		
		if(document.form1.P_ID.value == "")
		{
			alert ("Sila masukkan id padang");
			document.form1.P_ID.focus();
			return false;
		}
		
		if(document.form1.P_MaxHole.value == "")
		{
			alert ("Sila masukkan jumhole");
			document.form1.P_MaxHole.focus();
			return false;
		}
		
		document.form1.hidact.value = "Save";
		document.form1.submit();
		return true;
		
	}
	

function jsBack()
{
	document.form1.hidact.value="Back";
	document.form1.submit();
	return true;
}


</script>

<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888; text-align: center;">
  <tr>
    <td>

<form id="form1" name="form1" method="post" action="Util_Pdg.php">
  <table width="100%" id="TableHeader" border="0">
        <tr>
            <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
  <div align="right" style="vertical-align:central;color:#CCFF66;">
    <p><a href="menusetup.php"><img src="image/back_icon.png" width="80" height="25"/></a></p>
  </div>
  <p><span style="text-align: left"><b><strong><u>Daftar Padang</u></strong></b>
    </p>
    </span></span>
  </p>
  <table width="759" border="0" align="center">
    <tr>
      <td width="119">Nama Padang</td>
      <td width="6">:</td>
      <td colspan="2">        <span style="text-align: left">
        <input type="text" name="P_Nama" id="P_Nama" onkeypress="return nonnumeric_only(event);" />
        </span></td>
      </tr>
    <tr>
      <td>ID Padang</td>
      <td>:</td>
      <td colspan="2">        <span style="text-align: left">
        <input type="text" name="P_ID" id="P_ID" onkeypress="return space(event);"/>
        </span></td>
      </tr>
    <tr>
      <td>Jumlah Hole</td>
      <td>:</td>
      <td colspan="2">        <span style="text-align: left">
        <input type="text" name="P_MaxHole" id="P_MaxHole" onkeypress="return nonchar(event);"/>
        </span></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="410">&nbsp;</td>
      <td width="206">
        <input type="button" name="simpan" id="simpan" value="Simpan" class="button"style="width:90px; text-align:center;" onclick="jsSave();" /></td>
      </tr>
    
    <tr>
      <td height="100" colspan="4"><table width="594" border="0" align="center">
        <tr class="theader">
          <td width="41"><div align="center"><strong>No</strong></div></td>
          <td width="317"><div align="center"><strong>Nama Padang</strong></div></td>
          <td width="93"><div align="center"><strong>ID Padang</strong></div></td>
          <td width="125"><div align="center"><strong>Jumlah Hole</strong></div></td>
          
          </tr>
        
        
        <?php
	//error_reporting(E_PARSE | E_ERROR);
 	$result = mydb("select P_Nama,P_ID,P_MaxHole from dbo.Padang order by P_nama asc ");
	$row = odbc_fetch_array($result);
	
	   
			$bil= 1;
	    	while($row){
	?>     
        
        <tr>
          <td style="text-align: left"><?php echo $bil;?></td>
          <td style="text-align: left"><?php echo $row['P_Nama']; ?></td>
          <td style="text-align: left"><?php echo $row['P_ID']; ?></td>
          <td style="text-align: left"><?php echo $row['P_MaxHole']; ?></td>
          
          </tr>
        
        <?php
	
	$row = odbc_fetch_array($result );
	//$row = sqlsrv_fetch_array($stm);
	//$row = sqlsrv_free_stmt($result);
   //$row = sqlsrv_query( $conn, $result );
   //$row = sqlsrv_free_result($result);
			$bil=$bil+1;
	   }
	?>
        </table>
      </td></tr></table>
  <p>
    <span style="text-align: left">
    <input type="hidden" name="hidact" id="hidact" value="">
    </span></p>
  </label>
</center>
</form>
</td>
</tr>
</table> </center>                      
</body>
</html>
