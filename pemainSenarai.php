<?php require_once('dbConnect.php'); 
	session_start();
	if(!isset($_SESSION['UID']))
		{
			header('Location: logMasuk.php'); exit;
			
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="golf750.css" rel="stylesheet" type="text/css" />

<title>Senarai Pemain</title>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>
<?php
	$rs = mydb("select Usr_ID, Usr_Nama, Usr_Pwd, Usr_Jenis, Usr_Ibu, Ipt_ID from pengguna
			where Usr_ID='".$_SESSION['UID']."'");
	$objResult = odbc_fetch_array($rs);
	$_SESSION['UID']=odbc_result($rs,"Usr_ID");
	$_SESSION['UIpt']=odbc_result($rs,"Ipt_ID");
	
	//echo $_SESSION['UID'];
	//echo $_SESSION['UIpt'];
?>
<body class="oneColLiqCtrHdr">
<div id="container">
<center>


<?php
	$buttonklik=false;
	$myuni= $_SESSION['UIpt'];
	if (isset($_POST['submit']))
	{
		//$myjenis= $_POST['Jenis'];
		$myuni= $_POST['Universiti'];	
		$buttonklik=true;			
	}	

?>
  
<br />
<img src="image/header.jpg" width="100%" height="165"/>
<form name="formSenaraiPemain" method="post" >
Universiti : 
<select name="Universiti" id="universiti" onchange="showUser(this.value)">
        <?php
			$result = mydb("SELECT Ipt_ID, Ipt_Nama FROM universiti order by Ipt_Nama asc");
			$row = odbc_fetch_array($result);
			while ($row){
				if($myuni == $row['Ipt_ID']) {
		?>
        
        <option value="<?php echo $row['Ipt_ID'];?>" selected="selected" ><?php echo $row['Ipt_Nama'];?></option>
        <?php }else{ ?>
        <option value="<?php echo $row['Ipt_ID'];?>"  ><?php echo $row['Ipt_Nama'];?></option>
        <?php
			}
		$row = odbc_fetch_array($result);
	}
		?>
      </select>

<input type="submit" value="Semak" name="submit" id="submit"  />

</form>

<br />
<?php
if($buttonklik)
{
	myreport($myuni);
}
?>

<?php
function myreport($myuni)
{
	//echo "Universiti";
	//echo $myuni;

}
?>

<table width="75%" align="center">
<tr valign="top">
<td>


<table >
  <tr>
  <td height="50"  colspan="3"><b>Kategori :  <u>Nett</u></b></td>

 
  </tr>
  

  <tr>
  <td width="39" bgcolor="#999999">No.</td>
  <td width="148" bgcolor="#999999">No.Kad Pengenalan</td>
  <td width="272" bgcolor="#999999">Nama</td>
  
  </tr>
  
  <?php

$kod = "02";
$select = mydb("select b.Kat_Nama, a.Ipt_ID, a.PE_ID, a.PE_Nama, a.PE_Jawatan from pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID where a.Kat_ID = '$kod' AND a.Ipt_ID = '$myuni'  ");
$hot_select = odbc_fetch_array($select);

$no=1;
while ($hot_select)
{
?>
  <tr>
  <td><?php echo $no;?></td>
  <td><?php echo $hot_select['PE_ID']; ?></td>
  <td><?php echo $hot_select['PE_Nama']; ?></td>
  </tr>
  
    <?php

	  $no++;
	  $hot_select = odbc_fetch_array($select);
      }
	 
     ?>

  
</table>

</td>

<td>
<table>
  <tr>
  <td height="50"  colspan="3"><b>Kategori :  <u>Gross</u></b></td>

 
  </tr>
  

  <tr>
  <td width="39" bgcolor="#999999">No.</td>
  <td width="148" bgcolor="#999999">No.Kad Pengenalan</td>
  <td width="272" bgcolor="#999999">Nama</td>
  </tr>
  
  <?php
$kod = "01";
$select = mydb("select b.Kat_Nama, a.Ipt_ID, a.PE_ID, a.PE_Nama, a.PE_Jawatan from pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID where a.Kat_ID = '$kod' AND a.Ipt_ID = '$myuni' ");
$hot_select = odbc_fetch_array($select);

$no=1;
while ($hot_select)
{

?>
  <tr>
  <td><?php echo $no; ?> </td>
  <td><?php echo $hot_select['PE_ID']; ?></td>
  <td><?php echo $hot_select['PE_Nama']; ?></td>
  </tr>
  
     <?php

	  $no++;
	  $hot_select = odbc_fetch_array($select);
      }
	 
     ?>
  
</table>

</td>

</tr>

<tr valign="top">
<td>
<br />
<table>
  <tr>
  <td height="50"  colspan="3"><b>Kategori :  <u>Jemputan VIP IPTA</u></b></td>

 
  </tr>
  

  <tr>
  <td width="39" bgcolor="#999999">No.</td>
  <td width="148" bgcolor="#999999">No.Kad Pengenalan</td>
  <td width="272" bgcolor="#999999">Nama</td>
  </tr>
  
  <?php
$kod = "04";
$select = mydb("select b.Kat_Nama, a.Ipt_ID, a.PE_ID, a.PE_Nama, a.PE_Jawatan from pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID where a.Kat_ID = '$kod' AND a.Ipt_ID = '$myuni'  ");
$hot_select = odbc_fetch_array($select);

$no=1;
while ($hot_select)
{
?>
  <tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $hot_select['PE_ID']; ?></td>
  <td><?php echo $hot_select['PE_Nama']; ?></td>
  </tr>
  
     <?php

	  $no++;
	  $hot_select = odbc_fetch_array($select);
      }
	 
     ?>  
</table>

</td>

<td>
<br />
<table>
  <tr>
  <td height="50"  colspan="3"><b>Kategori :  <u>Jemputan IPTA</u></b></td>

 
  </tr>
  

  <tr>
  <td width="39" bgcolor="#999999">No.</td>
  <td width="148" bgcolor="#999999">No.Kad Pengenalan</td>
  <td width="272" bgcolor="#999999">Nama</td>
  </tr>
  
  <?php
$kod = "03";
$select = mydb("select b.Kat_Nama, a.Ipt_ID, a.PE_ID, a.PE_Nama, a.PE_Jawatan from pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID where a.Kat_ID = '$kod' AND a.Ipt_ID = '$myuni'  ");
$hot_select = odbc_fetch_array($select);

$no=1;
while ($hot_select)
{
?>
  <tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $hot_select['PE_ID']; ?></td>
  <td><?php echo $hot_select['PE_Nama']; ?></td>
  </tr>
  
     <?php

	  $no++;
	  $hot_select = odbc_fetch_array($select);
      }
	 
     ?> </table>

</td>

<tr valign="top">
<td>
<br />

<?php 

if($myuni == "UTEM")
{
?>
<table>
  <tr>
  <td height="50"  colspan="3"><b>Kategori :  <u>Jemputan UTeM</u></b></td>

 
  </tr>
  

  <tr>
  <td width="39" bgcolor="#999999">No.</td>
  <td width="148" bgcolor="#999999">No.Kad Pengenalan</td>
  <td width="272" bgcolor="#999999">Nama</td>
  </tr>
  
  <?php
$kod = "05";
$select = mydb("select b.Kat_Nama, a.Ipt_ID, a.PE_ID, a.PE_Nama, a.PE_Jawatan from pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID where a.Kat_ID = '$kod' AND a.Ipt_ID = '$myuni'  ");
$hot_select = odbc_fetch_array($select);

$no=1;
while ($hot_select)
{
?>
  <tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $hot_select['PE_ID']; ?></td>
  <td><?php echo $hot_select['PE_Nama']; ?></td>
  </tr>
  
     <?php

	  $no++;
	  $hot_select = odbc_fetch_array($select);
      }
	 
     ?> </table>

<?php
}

?>
</td>
</tr>
</table>
</center>
</div>
</body>
</html>