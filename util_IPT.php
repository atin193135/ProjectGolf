<?php
include 'dbConnect.php'; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link href="golf750.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript">
	//declaration variable
		var cols=new Array();
		cols[0]="txtKodUni";
		cols[1]="txtNamaUni";
		cols[2]="txtAlamat1";
		cols[3]="txtAlamat2";
		cols[4]="txtPoskod";
		cols[5]="cmbNg";

		//getdata
		function getData(_row){
  			for(var i=0;i<cols.length;i++)  
  				{
   					var _temp=document.getElementById("s"+_row+cols[i]).innerHTML;
  					document.getElementById("f"+cols[i]).value=_temp;
					document.getElementById('Simpan').style.visibility='hidden'; // hide  
    				document.getElementById('Kemaskini').style.visibility='visible'; // show  
   				 	document.getElementById('Hapus').style.visibility='visible'; // show  
					document.getElementById('ftxtKodUni').disabled = true; // show  	
					//document.getElementById('Kemaskini').disabled= false;
					//document.getElementById('Hapus').disabled=false;

 				 }

		}
 

		function jsReset(){
			document.getElementById('Simpan').style.visibility='visible'; // hide  
			document.getElementById('Kemaskini').style.visibility='hidden'; // show  
			document.getElementById('Hapus').style.visibility='hidden';; // show  
			document.getElementById('ftxtKodUni').disabled = false; // show  
			document.getElementById('ftxtKodUni').value="";
			document.getElementById('ftxtNamaUni').value="";
			document.getElementById('ftxtAlamat1').value="";
			document.getElementById('ftxtAlamat2').value="";
			document.getElementById('ftxtPoskod').value="";
			document.getElementById('fcmbNg').value="";
	 
		}

		function jsSimpan(){
			if (document.fDaftarUniv.ftxtKodUni.value == "")
			{
				alert ("sila masukkan Kod Universiti. ");
				document.fDaftarUniv.ftxtKodUni.focus();
				return false;
			}	
			if (document.fDaftarUniv.ftxtNamaUni.value == "")
			{
				alert ("sila masukkan nama Universiti. ");
				document.fDaftarUniv.ftxtNamaUni.focus();
				return false;
			}	
			if (document.fDaftarUniv.ftxtAlamat1.value == "")
			{
				alert ("sila masukkan alamat Universiti. ");
				document.fDaftarUniv.ftxtAlamat1.focus();
				return false;
			}
			if (document.fDaftarUniv.ftxtPoskod.value == "")
			{
				alert ("sila masukkan no poskod. ");
				document.fDaftarUniv.ftxtPoskod.focus();
				return false;
			}
			if (document.fDaftarUniv.fcmbNg.value == "")
			{
				alert ("sila pilih negeri. ");
				document.fDaftarUniv.fcmbNg.focus();
				return false;
			}
	
			if(confirm('Pasti untuk TAMBAH rekod IPT ' + document.getElementById('ftxtKodUni').value + '?'))

    		{     		  
				//document.fDaftarUniv.ftxtNamaUni.value=document.getElementById('ftxtNamaUni').value;
				//document.fDaftarUniv.mbut.value='Simpan';
				//document.fDaftarUniv.submit();
				return true;
			
     		} else {
	
				return false ;
			}
		}

		function jsHapus(_row){
   			if (confirm('Pasti untuk PADAM rekod IPT ' + document.getElementById('ftxtKodUni').value + '?'))
   			 {            
       			document.fDaftarUniv.mm.value=document.getElementById('ftxtKodUni').value;
				return true;
			 }
		 
		 	return false;
		}

		function jsKemaskini(_row)
		{
   			if (confirm('Pasti untuk KEMASKINI rekod IPT ' + document.getElementById('ftxtKodUni').value +  '?'))
  			 {      
	    		document.fDaftarUniv.mm.value=document.getElementById('ftxtKodUni').value;
				document.fDaftarUniv.ftxtNamaUni.value=document.getElementById('ftxtNamaUni').value;
				document.fDaftarUniv.ftxtAlamat1.value=document.getElementById('ftxtAlamat1').value;
	    		document.fDaftarUniv.ftxtAlamat2.value=document.getElementById('ftxtAlamat2').value;
	    		document.fDaftarUniv.ftxtPoskod.value=document.getElementById('ftxtPoskod').value;
				document.fDaftarUniv.fcmbNg.value=document.getElementById('fcmbNg').value;
				document.fDaftarUniv.mbut.value='Kemaskini';
				document.fDaftarUniv.submit();
				return true;
        	}
			return false;
		}

		window.onload=function(_row){
			jsReset(_row);
		}

		function nonnumeric_only( e )
		{
			// deal with unicode character sets
			var unicode = e.charCode ? e.charCode : e.keyCode;

			// if the key is backspace, tab, or numeric
			if( unicode == 8 || unicode == 9 || ( unicode >= 48 && unicode <= 57 ) )
			{
				// we don't allow the key press
				return true;
			}
			else
			{
			// otherwise we allow
			return false;
			}
		}

		function myFunction()
		{
			var a=document.getElementById("ftxtKodUni");
			var b=document.getElementById("ftxtNamaUni");
			var c=document.getElementById("ftxtAlamat1");
			var d=document.getElementById("ftxtAlamat2");
			var e=document.getElementById("fcmbNegeri");
			//var f =document.getElementById("mm");
			//var g = document.getElementById("mbut");

			a.value=a.value.toUpperCase();
			b.value=b.value.toUpperCase();
			c.value=c.value.toUpperCase();
			d.value=d.value.toUpperCase();
			e.value=e.value.toUpperCase();
			//f.value=f.value.toUpperCase();
			//g.value=g.value.toUpperCase();

		}
	</script>



</head>
<body class="oneColLiqCtrHdr">
<div id="container">

<?php
	//include 'dbConnect.php'; 

	//insert process
	if (isset($_POST['Simpan']))
	{
		$kod = $_POST['ftxtKodUni'];
		$nama = $_POST['ftxtNamaUni'];
		$alamat1 = $_POST['ftxtAlamat1'];
		$alamat2 = $_POST['ftxtAlamat2'];
		$poskod = $_POST['ftxtPoskod'] ;
		$negeri = $_POST['fcmbNg'];
		
		$insert = mydb ("INSERT INTO Universiti(Ipt_ID,Ipt_Nama,Ipt_Alamat1,Ipt_Alamat2,Ipt_Poskod,Neg_ID) values('$kod','$nama', '$alamat1', '$alamat2', '$poskod', '$negeri') ");
	
		if($insert)
	 	{
				echo "<script>alert('Data Berjaya Disimpan');</script>";			
	  	}
	
		else
	 	{
				echo "<script>alert('Data Gagal Disimpan');</script>";		
	 	}
	
	}

	//delete process
	if(isset($_POST['Hapus']))
	{
	
		$ftxtKodUni = $_POST['mm'];
		$nama = $_POST['ftxtNamaUni'];

		
		$sql_hapus=mydb("DELETE FROM Universiti where Ipt_ID ='$ftxtKodUni'");

			if($sql_hapus){ 
			
						echo "<script>alert('Data Berjaya Dihapus');</script>";	
			}
			else{
						echo "<script>alert('Data Gagal Dihapus');</script>";
			}
	}

	//update process
	if(isset($_POST['Kemaskini']))
	{

		$ftxtKodUni = $_POST['mm'];
		$ftxtNamaUni = $_POST['ftxtNamaUni'];
		$ftxtAlamat1 = $_POST['ftxtAlamat1'];
		$ftxtAlamat2 = $_POST['ftxtAlamat2'];
		$ftxtPoskod = $_POST['ftxtPoskod'];
		$fcmbNg = $_POST['fcmbNg'];

		$sql_kemaskini=mydb("UPDATE universiti SET Ipt_Nama ='$ftxtNamaUni', Ipt_Alamat1 ='$ftxtAlamat1', Ipt_Alamat2 ='$ftxtAlamat2',Ipt_Poskod='$ftxtPoskod', Neg_ID='$fcmbNg' where Ipt_ID='$ftxtKodUni'");

		if($sql_kemaskini)
		{
			echo "<script>alert('Data Berjaya Dikemaskini');</script>";			

		}
		else 
		{
			echo "<script>alert('Data Gagal DiKemaskini');</script>";
		}
	}
?>



<img src="image/header.jpg" width="100%" height="165"/>
		<form name="fDaftarUniv" id="fDaftarUniv" method="post" action="util_IPT.php">

			<table width="759" border="0" align="center">
  				<tr>
    				<td colspan="6"><strong><u>Daftar Universiti</u></strong></td>
  				</tr>
 	 			<tr>
    				<td width="119">Kod Universiti</td>
    				<td width="6">:</td>
    				<td width="390"><label>
      					<input type="text" name="ftxtKodUni" id="ftxtKodUni" onchange="myFunction()"/><input type="hidden" name="mm" id="mm" value="" onchange="myFunction()" />
   						</label></td>
    				<td width="61">&nbsp;</td>
    				<td width="5">&nbsp;</td>
    				<td width="393">&nbsp;</td>
 				</tr>
  				<tr>
    				<td>Nama Universiti</td>
    				<td>:</td>
    				<td><input type="text"name="ftxtNamaUni" id="ftxtNamaUni" size="50" onchange="myFunction()"/></td>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
  				</tr>
  				<tr>
    				<td>Alamat </td>
    				<td>:</td>
    				<td><input name="ftxtAlamat1" type="text" id="ftxtAlamat1" size="50" onchange="myFunction()"/></td>
    				<td>Poskod</td>
    				<td>:</td>
    				<td><input type="text" name="ftxtPoskod" id="ftxtPoskod" maxlength="5" title="CONTOH : 17500"onkeypress="return nonnumeric_only(event);"/></td>
 			 	</tr>
  				<tr>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
    				<td><input name="ftxtAlamat2" type="text" id="ftxtAlamat2" size="50" onchange="myFunction()"/></td>
    				<td>Negeri</td>
    				<td>:</td>
    			<td>
    
    				<select name="fcmbNg" id="fcmbNg" onchange="myFunction()">
     				<?php
  	  					$jenis = 'fcmbNg';
	  					$result = mydb("select Neg_ID, Neg_Nama from Negeri order by Neg_Nama asc");
      					$row = odbc_fetch_array($result);
	  					while ($row) {	  
      						if($jenis == $row['Neg_ID']) {
					?>
           				<option value="selected"></option>
      					<option value= <?php echo $row['Neg_ID']; ?> selected >  <?php echo $row['Neg_Nama']; ?> </option>
            
           			<?php }else{ ?>
           
            			<option value= <?php echo $row['Neg_ID']; ?> >  <?php echo $row['Neg_Nama']; ?> </option>
            
	 			 	<?php
	 					 }
				 
	  					$row = odbc_fetch_array($result);
      				}
	  				?> 
    				</select>
				</td>
  			</tr>
    		<tr>
     			 <td colspan="6" align="right" height="100">
       				<label>
            			<input type="submit" class="button" name="Simpan" id="Simpan" value="Simpan" style="width:90px; text-align:center;" onClick="return jsSimpan()">
						<input type="submit" class="button" name="Kosong" id="Kosong" value="Kosongkan" style="width:90px; text-align:center;" onClick="return jsReset()">          
              			<input type="submit" class="button" name="Kemaskini" id="Kemaskini" value="Kemaskini" style="width:90px; text-align:center;" onClick="return jsKemaskini()"/>         
              			<input type="submit" class="button" name="Hapus" id="Hapus" value="Hapus" style="width:90px; text-align:center;" onClick="return jsHapus()">
        			</label>
			</tr>
				<td colspan="6">
					<div class=listbox style="height:200">
						<table width="800" border="0">
      						<tr class="theader">
        						<td width="19"><div align="center"><strong>Bil</strong></div></td>
        						<td width="110"><div align="center"><strong>Kod Universiti</strong></div></td>
        						<td width="345"><div align="center"><strong>Nama Universiti</strong></div></td>
        						<td width="63" style="display:none" ><div align="center"><strong>Alamat1</strong></div></td>
        						<td width="63" style="display:none" ><div align="center"><strong>Alamat2</strong></div></td>
        						<td width="57" style="display:none" ><div align="center"><strong>Poskod</strong></div></td>
       							<td width="50" style="display:none" ><div align="center"><strong>Negeri</strong></div></td>
      						</tr>
      
							<?php 
								$select = mydb("select Ipt_ID, Ipt_Nama, Ipt_Alamat1,Ipt_Alamat2, Ipt_Poskod,Neg_ID from Universiti order by Ipt_Nama");
								$_select = odbc_fetch_array ($select);

								$i = 0;
								$bill = 1; //looping process
								while($_select){
									$i++;
							?>

     						<tr id=s<?php echo $i;?> onClick="getData(<?php echo $i;?>)"  onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';">
     							<td ><?php echo $bill; ?></td>
      							<td id=s<?php echo $i;?>txtKodUni><?php echo $_select['Ipt_ID'];?></td>
      							<td id=s<?php echo $i;?>txtNamaUni><?php echo $_select['Ipt_Nama'];?></td>
      							<td style="display:none" id=s<?php echo $i;?>txtAlamat1><?php echo $_select['Ipt_Alamat1'];?></td>
      							<td style="display:none" id=s<?php echo $i;?>txtAlamat2><?php echo $_select['Ipt_Alamat2'];?></td>
      							<td style="display:none" id=s<?php echo $i;?>txtPoskod><?php echo $_select['Ipt_Poskod'];?></td>
      							<td style="display:none" id=s<?php echo $i;?>cmbNg><?php echo $_select['Neg_ID'];?></td>
    						</tr>
    
 							<?php
								$bill++;
								$_select = odbc_fetch_array($select); //next record = recordset
								}
							?>

						</table>
					</div>
				</td>
			</tr>
		</table>
</form>
</div>
</body>
</html>
