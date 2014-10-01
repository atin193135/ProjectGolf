<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pendaftaran Pemain Baru(Gross/Nett)</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.a {
	color: #F00;
}
-->
</style>
</head>
<?php 
include ("dbconnect.php");

if (isset($_POST['btnsimpan']) )
{
	$txtNama=$_POST['ftxtNama'];
	$txtGelaran =$_POST['ftxtGelaran'];
	$txtIC =$_POST['ftxtIC'];
	$txtemel =$_POST['ftxtEmel'];
	$txtNotel =$_POST['ftxtNotel'];
	$jantina =$_POST['fjantina'];	
	$cmbSaiz =$_POST['fcmbSaiz'];
	$txtJawatan =$_POST['ftxtJawatan'];
	$txtNoStaff =$_POST['ftxtNoStaff'];
	$statusjawatan =$_POST['fstatusjawatan'];
	$txtMulaKhidmat =$_POST['ftxtMulaKhidmat'];
	$txtNoTelPej =$_POST['ftxtNoTelPej'];
	$txtNoFaks =$_POST['ftxtNoFaks'];
	$txtNamaKelab =$_POST['ftxtNamaKelab'];
	$txtNoNHS =$_POST['ftxtNoNHS'];
	$cmbHandicap =$_POST['fcmbHandicap'];
	
	
	$result ="INSERT INTO pemain
			 (PE_Nama,PE_Gelaran,PE_ID,PE_Email,PE_NoHp,PE_Jantina,PE_SaizBaju,PE_Jawatan,PE_NoStaf,
			  PE_StatusJwt,PE_TkhMulaKhidmat,PE_NoPej,PE_NoFax,PE_NHSClub,PE_NoNHS,PE_Handicap)
	       	  VALUES('$txtNama','$txtGelaran','$txtIC','$txtemel','$txtNotel','$jantina','$cmbSaiz','$txtJawatan',
		  '$txtNoStaff','$statusjawatan','$txtMulaKhidmat','$txtNoTelPej','$txtNoFaks','$txtNamaKelab','$txtNoNHS','$cmbHandicap')";
	$array = mysql_query($result);
	if($array)
		{
			echo("<br>Input data is succeed");
			echo "<br>";		
		}
		
	else
		{
			echo("<br>Input data is fail");
		}
}

if (isset($_POST['btnkemaskini']) )
{
	
	$txtNama=$_POST['ftxtNama'];
	$txtGelaran =$_POST['ftxtGelaran'];
	//$txtIC =$_POST['ftxtIC'];
	$txtemel =$_POST['ftxtEmel'];
	$txtNotel =$_POST['ftxtNotel'];
	$jantina =$_POST['fjantina'];	
	$cmbSaiz =$_POST['fcmbSaiz'];
	$txtJawatan =$_POST['ftxtJawatan'];
	$txtNoStaff =$_POST['ftxtNoStaff'];
	$StatusJawatan =$_POST['StatusJawatan'];
	$txtMulaKhidmat =$_POST['ftxtMulaKhidmat'];
	$txtNoTelPej =$_POST['ftxtNoTelPej'];
	$txtNoFaks =$_POST['ftxtNoFaks'];
	$txtNamaKelab =$_POST['ftxtNamaKelab'];
	$txtNoNHS =$_POST['ftxtNoNHS'];
	$cmbHandicap =$_POST['fcmbHandicap'];
	$mm = $_POST['mm'];
	
	$sql = "update pemain set PE_Nama='$txtNama', PE_Gelaran='$txtGelaran',PE_Email='$txtemel',
			PE_NoHp='$txtNotel',PE_SaizBaju='$cmbSaiz',PE_NoStaf='$txtNoStaff',PE_Jawatan='$txtJawatan',
			PE_StatusJwt='$StatusJawatan',PE_TkhMulaKhidmat='$txtMulaKhidmat',PE_NoPej='$txtNoTelPej',
			PE_NoFax='$txtNoFaks',PE_NHSClub='$txtNamaKelab',PE_NoNHS='$txtNoNHS',PE_Handicap='$cmbHandicap' where PE_ID='$mm' ";
	
	$row = mysql_query($sql);
	if ($row) 
 		{	
			echo "<script>alert('Data Berjaya Dikemaskini');</script>";			
		}
	
	else 
		{		
			echo "<script>alert('Data Gagal DiKemaskini');</script>";
		}
}

 
if (isset($_POST['btnhapus']) )
{
	
	//$username = $_POST['fA'];
	//$password = $_POST['fB'];
	//$nama = $_POST['fC'];
	$mm = $_POST['mm'];
	
	$sql = "delete from pemain where PE_ID='$mm' ";
	$row = mysql_query($sql);
	if ($row) 
 		{	
			echo "<script>alert('Data Berjaya Dihapus');</script>";		
		}
	
	else 
		{		
			echo "<script>alert('Data Gagal Dihapus');</script>";		
		}
}
?>

<script>
var cols=new Array();
cols[0]="txtIC";
cols[1]="txtNama";
cols[2]="txtNotel";
cols[3]="txtEmel";
cols[4]="cmbSaiz";
cols[5]="txtGelaran";
cols[6]="jantina";
cols[7]="txtJawatan";
cols[8]="txtNoStaff";
cols[9]="StatusJawatan";
cols[10]="txtMulaKhidmat";
cols[11]="txtNoTelPej";
cols[12]="txtNoFaks";
cols[13]="txtNamaKelab";
cols[14]="txtNoNHS";
cols[15]="cmbHandicap";

function getData(_row)
{
  for(var i=0;i<cols.length;i++)  
  {
    var _temp=document.getElementById("s"+_row+cols[i]).innerHTML;
    document.getElementById("f"+cols[i]).value=_temp;
  }
	document.getElementById('btnsimpan').style.visibility='hidden'; // hide  
    document.getElementById('btnkemaskini').style.visibility='visible'; // show  
    document.getElementById('btnhapus').style.visibility='visible'; // show  
	document.getElementById('ftxtIC').disabled = true; // show  

	var strJan;
	strJan=document.getElementById("s"+_row+cols[6]).innerHTML;
	if (strJan == 'L')
	{
		document.frmDaftar_N_G.fjantina[0].checked = true;
		document.frmDaftar_N_G.fjantina[0].value=strJan;
	}
	else if(strJan == 'P')
	{
		document.frmDaftar_N_G.fjantina[1].checked = true;
		document.frmDaftar_N_G.fjantina[1].value= strJan;
	}
	
	var strStatusJwt;
	strStatusJwt= document.getElementById("s"+_row+cols[9]).innerHTML;
	if (strStatusJwt == 'TETAP')
	{
		document.frmDaftar_N_G.StatusJawatan[0].checked = true;
		document.frmDaftar_N_G.StatusJawatan[0].value= strStatusJwt;
	}
	
	else if(strStatusJwt == 'KONTRAK')
	{
		document.frmDaftar_N_G.StatusJawatan[1].checked = true;
		document.frmDaftar_N_G.StatusJawatan[1].value= strStatusJwt;
	}
  
}

function over(_row)
{
  document.getElementById("r"+_row).style.backgroundColor="#99FF33";

}
 
function out(_row)
{
  document.getElementById("r"+_row).style.backgroundColor="white";
}

function formReset()
{
 document.getElementById('btnsimpan').style.visibility='visible'; // hide  
 document.getElementById('btnkemaskini').style.visibility='hidden'; // show  
 document.getElementById('btnhapus').style.visibility='hidden';; // show  
 document.getElementById('ftxtIC').disabled = false; // show  
 document.getElementById('ftxtIC').value="";
 document.getElementById('ftxtNama').value="";
 document.getElementById('ftxtNoTel').value="";
 document.getElementById('ftxtEmel').value="";
 document.getElementById('fcmbSaiz').value="";
 document.getElementById('ftxtGelaran').value="";
 document.getElementById('fjantina').value="";
 document.getElementById('ftxtJawatan').value="";
 document.getElementById('ftxtNoStaff').value="";
 //document.getElementById('StatusJawatan').value="";
 document.getElementById('ftxtMulaKhidmat').value="";
 document.getElementById('ftxtNoTelPej').value="";
 document.getElementById('ftxtNoFaks').value="";
 document.getElementById('ftxtNamaKelab').value="";
 document.getElementById('ftxtNoNHS').value="";
 document.getElementById('fcmbHandicap').value="";
}
//Add Form
function formTambah()
{
	if(document.frmDaftar_N_G.ftxtIC.value=="")
	{
		alert("Sila masukan No Kad Pengenalan anda.")
		document.frmDaftar_N_G.ftxtIC.focus();
		return false;
	}
	
	if(document.frmDaftar_N_G.ftxtNama.value=="")
	{
		alert("Sila masukan nama.")
		document.frmDaftar_N_G.ftxtNama.focus();
		return false;
	}
	
	if(document.frmDaftar_N_G.ftxtEmel.value=="")
	{
		alert("Sila masukan Emel anda.")
		document.frmDaftar_N_G.ftxtEmel.focus();
		return false;
	}
	
	
	if(document.frmDaftar_N_G.fjantina.value=="")
	{
		alert("Sila pilih Jantina anda.")
		var radios = document.getElementsByName('fjantina');

		for (var i = 0, length = radios.length; i < length; i++) 
		{
   		if (radios[i].checked) {
        // do whatever you want with the checked radio
        //alert(radios[i].value);

        // only one radio can be logically checked, don't check the rest
        break;
    	}
	}
		return false;
	
	
	if(document.frmDaftar_N_G.fcmbSaiz.value=="")
	{
		alert("Sila masukan Saiz Baju anda.")
		document.frmDaftar_N_G.fcmbSaiz.focus();
		return false;
	}
	
	if(document.frmDaftar_N_G.ftxtNotel.value=="")
	{
		alert("Sila masukan no tel anda.")
		document.frmDaftar_N_G.ftxtNotel.focus();
		return false;
	}
	
		
	//	if(document.frmDaftar_N_G.StatusJawatan.value=="")
//	{
//		alert("Sila pilih Status Jawatan anda.")
//		var radios = document.getElementsByName('StatusJawatan');
//
//		for (var i = 0, length = radios.length; i < length; i++) {
//   		if (radios[i].checked) {
//        // do whatever you want with the checked radio
//        //alert(radios[i].value);
//
//        // only one radio can be logically checked, don't check the rest
//        break;
//    	}
//		}
//		return false;
//		
//		
//	}

    	   if (confirm('Pasti untuk TAMBAH rekod pemain ' + document.getElementById('ftxtIC').value + '?'))
        {      
		  /*  if(document.form1.cmbkategori.value=="nett")
			{
				alert("Sila masukan nama kelab NHS anda.")
				document.form1.ftxtNamaKelab.focus();
				return false;
			}
			 else if(document.form1.cmbkategori.value=="nett")
			{
				alert("Sila masukan no NHS anda.")
				document.form1.ftxtNoNHS.focus();
				return false;
			}
			 else if(document.form1.cmbkategori.value=="nett")
			{
				alert("Sila pilih handicap anda.")
				document.form1.fcmbHandicap.focus();
				return false;
			}*/	
			return true;
        }
		return false;
}
//Update form
function formUpdate(){
	
		 if (confirm('Pasti untuk KEMASKINI rekod pemain ' + document.getElementById('ftxtIC').value + '?'))
        {      
		    document.frmDaftar_N_G.mm.value=document.getElementById('ftxtIC').value;
			/*document.form1.fB.value=document.getElementById('fB').value;
			document.form1.fC.value=document.getElementById('fC').value;
			document.form1.mbut.value='kemaskini';
			document.form1.submit();*/
			return true;
        }
		return false;
}

//Delete Form
function formDelete(){
        
		if (confirm('Pasti untuk PADAM rekod pemain ' + document.getElementById('ftxtIC').value + '?'))
		{
			document.frmDaftar_N_G.mm.value=document.getElementById('ftxtIC').value;
			return true;			
		}
		return false;
}

window.onload=function(){
formReset();
}

function numeric_only( e )
{
// deal with unicode character sets
var unicode = e.charCode ? e.charCode : e.keyCode;

// if the key is backspace, tab, or numeric
if( unicode == 8 || unicode == 9 || ( unicode >= 48 && unicode <= 57 ) )
{
// we allow the key press
return true;
}
else
{
// otherwise we don't allow
return false;
}
} 

</script>
<body class="body">
<form name="frmDaftar_N_G" id="frmDaftar_N_G" action ="DaftarPemainBaru_G_N.php" method="post">
<center>
  <table width="1161" height="483" border="0">
  <tr>
    <td colspan="7"  align="left"><strong><u>Maklumat Peribadi</u></strong></td>
  </tr>
  <tr>
    <td width="270">Nama <span class="a">*</span></td>
    <td width="4">:</td>
    <td><input tabindex="1" name="ftxtNama" type="text" id="ftxtNama" size="50" /></td>
    
    
    <td>Jantina <span class="a">*</span></td>
    <td>:</td>
    <td colspan="5">
    <input type="radio" name="fjantina" id="fjantina" value="L"/>
      LELAKI
      <input type="radio" name="fjantina" id="fjantina" value="P" />
       PEREMPUAN</td>
    
  </tr>
  
  <tr>
    <td>Gelaran </td>
    <td>:</td>
    <td width="406"><input tabindex="1" name="ftxtGelaran" type="text" id="ftxtGelaran" size="50" /></td>
    
    <td width="178">Saiz Baju <span class="a">*</span></td>
    <td width="4">:</td>
    <td width="197"><select name="fcmbSaiz" id="fcmbSaiz" maxlength="14">
     <option value="" >Sila pilih</option>
      <option value="S" >S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
      <option value="XXL">XXL</option>
      <option value="XXXL">XXXL</option>
      <option value="XXXXL">XXXXL</option>
    </select></td>
  
  
  </tr>
  <tr>
    <td>No. KP / No. KP Tentera / No. Passport <span class="a">*</span></td>
    <td>:</td>
    <td><input name="ftxtIC" type="text" id="ftxtIC" size="20" maxlength="14" onkeypress="return numeric_only(event);"/>
        <input type="hidden" name="mm" id="mm"  value=""/>
    </td>
    <td>No. Tel. Bimbit <span class="a">*</span></td>
    <td>:</td>
    <td><input name="ftxtNotel" type="text" id="ftxtNotel" size="20" maxlength="14" onkeypress="return numeric_only(event);"/></td>
  </tr>
  <tr>
    <td>Emel<span class="a">*</span></td>
    <td>:</td>
    <td>
      <input name="ftxtEmel" type="text" id="ftxtEmel" size="50" maxlength="50" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"  align="left"><strong><u>Maklumat Perjawatan </u></strong></td>
  </tr>
  <tr>
    <td>Jawatan</td>
    <td>:</td>
    <td><input name="ftxtJawatan" type="text" id="ftxtJawatan" size="50" maxlength="100" /></td>
    <td>Tarikh Mula Khidmat</td>
    <td>:</td>
    <td><input name="ftxtMulaKhidmat" type="text" id="ftxtMulaKhidmat" size="20" maxlength="14" /> <img src="images/img.gif" alt="" width="33" height="16" /></td>
    <td width="72"></td>
  </tr>
  <tr>
    <td>No. Staff</td>
    <td>:</td>
    <td><input name="ftxtNoStaff" type="text" id="ftxtNoStaff" size="20" maxlength="14" /></td>
    <td>No. Tel. Pejabat</td>
    <td>:</td>
    <td>
      <input name="ftxtNoTelPej" type="text" id="ftxtNoTelPej" size="20" maxlength="14" onkeypress="return numeric_only(event);"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Status Jawatan</td>
    <td>:</td>
    <td><input name="StatusJawatan" type="radio" id="StatusJawatan" value="TETAP" />TETAP
        <input name="StatusJawatan" type="radio" id="StatusJawatan" value="KONTRAK" />KONTRAK
   
    </td>
    <td>No. Faks.</td>
    <td>:</td>
    <td><input name="ftxtNoFaks" type="text" id="ftxtNoFaks" size="20" maxlength="14" onkeypress="return numeric_only(event);"/></td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"  align="left"><strong><u>Maklumat Golf <em>(untuk kategori Nett sahaja)</em></u></em></strong><em></em></td>
  </tr>
  <tr>
    <td>Nama Kelab NHS</td>
    <td>:</td>
    <td><input name="ftxtNamaKelab" type="text" id="ftxtNamaKelab" size="50" maxlength="14" /></td>
    <td>Handicap Semasa</td>
     <td>:</td>
     <td>
       <select name="fcmbHandicap" id="fcmbHandicap" maxlength="2">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         <option value="14">14</option>
         <option value="15">15</option>
         <option value="16">16</option>
         <option value="17">17</option>
         <option value="18">18</option>
         <option value="19">19</option>
         <option value="20">20</option>
         <option value="21">21</option>
         <option value="22">22</option>
         <option value="23">23</option>
         <option value="24">24</option>
       </select></td>
     <td>&nbsp;</td>
     
   
  </tr>
  <tr>
    <td>No. NHS</td>
    <td>:</td>
    <td><input name="ftxtNoNHS" type="text" id="ftxtNoNHS" size="50" maxlength="14" /></td>
    <td>Kategori</td>
    <td>:</td>
    <td><label>
      <select name="cmbkategori" id="cmbkategori">
        <option value="nett">nett</option>
        <option value="gross">gross</option>
      </select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="right" height="41">
      <input type="submit" name="btnsimpan" id="btnsimpan" value="SIMPAN"  onClick="return formTambah()"/>
        <input type="submit" name="btnkosong" id="btnkosong" value="KOSONGKAN" onclick="formReset()"/>
      <input type="submit" name="btnkemaskini" id="btnkemaskini" value="KEMASKINI" onclick="return formUpdate()"/>
      <input type="submit" name="btnhapus" id="btnhapus" value="HAPUS" onclick="return formDelete()"/>
      </td>
  </tr>
  
</table> 
<table width="543" border="1">
  <tr>
   <td width="88">Bil</td>
    <td width="118">Nama</td>
    <td width="150">No Kad Pengenalan</td>
    <td width="159">Kategori</td>
  </tr>
    <?php
	$pemain=mysql_query("select * from pemain") or die(mysql_error());
	$row = mysql_fetch_array($pemain);
	$i=0;
	while($row)
	{
		
	
  ?>
  	<tr id=r<?php echo $i;?> onclick="getData(<?php echo $i;?>)" onMouseOver="over(<?php echo $i;?>)" onMouseOut="out(<?php echo $i;?> )">
  	<td id=s<?php echo $i;?>><?php echo $i+1;?></td>
    <td id=s<?php echo $i;?>txtNama><?php echo $row["PE_Nama"];?></td>
    <td id=s<?php echo $i;?>txtIC><?php echo $row["PE_ID"];?></td>
    <td id=s<?php echo $i;?>txtNotel><?php echo $row["PE_NoHp"];?></td>
	<td style="display:none" id=s<?php echo $i;?>txtEmel><?php echo $row["PE_Email"];?></td>
    <td style="display:none" id=s<?php echo $i;?>cmbSaiz><?php echo $row["PE_SaizBaju"];?></td>
	<td style="display:none" id=s<?php echo $i;?>txtGelaran><?php echo $row["PE_Gelaran"];?></td>
    <td style="display:none" id=s<?php echo $i;?>jantina><?php echo $row["PE_Jantina"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtJawatan><?php echo $row["PE_Jawatan"];?></td>
	<td style="display:none" id=s<?php echo $i;?>txtNoStaff><?php echo $row["PE_NoStaf"];?></td>
 	<td style="display:none" id=s<?php echo $i;?>StatusJawatan><?php echo $row["PE_StatusJwt"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtMulaKhidmat><?php echo $row["PE_TkhMulaKhidmat"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtNoTelPej><?php echo $row["PE_NoPej"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtNoFaks><?php echo $row["PE_NoFax"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtNamaKelab><?php echo $row["PE_NHSClub"];?></td>
    <td style="display:none" id=s<?php echo $i;?>txtNoNHS><?php echo $row["PE_NoNHS"];?></td>
    <td style="display:none" id=s<?php echo $i;?>cmbHandicap><?php echo $row["PE_Handicap"];?></td>
    </tr>
    <?php
	$row = mysql_fetch_array($pemain);
	$i++;
	}
  ?> 
 
</table>

</center>
</form>
</body>
</html>