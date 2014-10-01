<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar Negeri</title>
	<link href="golf750.css" rel="stylesheet" type="text/css" />
</head>
	<?php
		include 'dbConnect.php';


		if (isset($_POST['btnSimpan']) )
		{	
			$kodnegeri = $_POST['fKodNegeri'];
			$namanegeri = $_POST['fNamaNegeri'];
			$sql = mydb("INSERT INTO Negeri(Neg_ID, Neg_Nama) values('$kodnegeri','$namanegeri') ");
		
			if ($sql) 
 			{	
				echo "<script>alert('Data Berjaya Disimpan');</script>";			
			}
			else 
			{		
				echo "<script>alert('Data Gagal Disimpan');</script>";		
			}
		}


		if (isset($_POST['btnKemaskini']) )
		{
			$namanegeri = $_POST['fNamaNegeri'];
			$mm = $_POST['mm'];
	
			$sql = mydb("update Negeri set Neg_Nama='$namanegeri' where Neg_ID='$mm' ");
	
			if ($sql) 
 			{	
				echo "<script>alert('Data Berjaya Dikemaskini');</script>";			
			}
			else 
			{		
				echo "<script>alert('Data Gagal DiKemaskini');</script>";
			}
		}
  
   
  		if (isset($_POST['btnHapus']) )
		{
			$mm = $_POST['mm'];
			$sql = "delete from Negeri where Neg_ID='$mm' ";
	
			if ($sql) 
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
			cols[0]="KodNegeri";
			cols[1]="NamaNegeri";

			function getData(_row)
			{
  				for(var i=0;i<cols.length;i++)  
				{
    				var _temp=document.getElementById("s"+_row+cols[i]).innerHTML;
    				document.getElementById("f"+cols[i]).value=_temp;
					document.getElementById('btnSimpan').style.visibility='hidden'; // hide  
   					document.getElementById('btnKemaskini').style.visibility='visible'; // show  
    				document.getElementById('btnHapus').style.visibility='visible'; // show  
  				}
			}


			function formReset()
			{
 				document.getElementById('btnSimpan').style.visibility='visible'; // hide  
 				document.getElementById('btnKemaskini').style.visibility='hidden'; // show  
 				document.getElementById('btnHapus').style.visibility='hidden';; // show  
 				document.getElementById('fKodNegeri').disabled = false; // show  
 				document.getElementById('fKodNegeri').value="";
 				document.getElementById('fNamaNegeri').value="";
			}


			function formTambah()
			{
				if (document.frmDaftarNegeri.fKodNegeri.value == "")
					{
						alert ("sila masukkan kod negeri. ");
						document.frmDaftarNegeri.fKodNegeri.focus();
						return false;
					}	
				if (document.frmDaftarNegeri.fNamaNegeri.value == "")
					{
						alert ("sila masukkan negeri. ");
						document.frmDaftarNegeri.fNamaNegeri.focus();
						return false;
					}	

         		if (confirm('Pasti untuk TAMBAH rekod Negeri ' + document.getElementById('fKodNegeri').value + '?'))
       				{      
						return true;
        			}
				return false;
			}


			function formUpdate()
			{
				 if (confirm('Pasti untuk KEMASKINI rekod Negeri ' + document.getElementById('fKodNegeri').value + '?'))
        			{      
		    			document.frmDaftarNegeri.mm.value=document.getElementById('fKodNegeri').value;
						return true;
        			}
				return false;
			}


			function formDelete()
			{
        
				if (confirm('Pasti untuk PADAM rekod Negeri ' + document.getElementById('fKodNegeri').value + '?'))
					{
						document.frmDaftarNegeri.mm.value=document.getElementById('fKodNegeri').value;
						return true;	
					}
				return false;
			}


			window.onload=function()
			{
				formReset();
			}
		</script>

<body class="oneColLiqCtrHdr">
<div id="container">
	<img src="image/header.jpg" width="100%" height="165"/>
		<form action="util_Neg.php" method="post" id="frmDaftarNegeri" name="frmDaftarNegeri">
			<table align="center" width="759" border="0">
				<tr>
					<td colspan="3" >
					<strong><u>Daftar Negeri</u></strong>
					</td>
				</tr>
  				<tr>
    				<td width="95">Kod Negeri</td>
    				<td width="17">:</td>
   					<td width="633">
        				<input type="text" name="fKodNegeri" id="fKodNegeri" size="40" />
        				<input type="hidden" name="mm" id="mm"  value=" <?php echo $fKodNegeri; ?> "/>
    				</td>
  				</tr>
  				<tr>
    				<td>Nama Negeri</td>
    				<td>:</td>
   					<td>
        				<input type="text" name="fNamaNegeri" id="fNamaNegeri" size="40" />
    				</td>
  				</tr>
  				<tr>
    				<td colspan="3" height="100" align="right">
        				<input type="submit" class="button" name="btnSimpan" id="btnSimpan" value="Simpan" style="width:90px; text-align:center;" onclick ="return formTambah()"/>
        				<input type="submit" class="button" name="btnKosongkan" id="btnKosongkan" value="Kosongkan" style="width:90px; text-align:center;" onclick="formReset()"/>  
        				<input type="submit" class="button" name="btnKemaskini" id="btnKemaskini" value="Kemaskini" style="width:90px; text-align:center;" onclick="return formUpdate()"/>    
        				<input type="submit" class="button" name="btnHapus" id="btnHapus" value="Hapus" style="width:90px; text-align:center;" onclick="return formDelete()"/>
    				</td>
  				</tr>
				<tr>
					<td colspan="3">
						<div class=listbox style="height:200">
							<table width="100%" border="0" align="">
  								<tr class="theader">
  									<td width="6%"><div align="center"><strong>No.</strong></div></td>
    								<td width="24%" ><div align="center"><strong>Kod Negeri</strong></div></td>
    								<td width="70%" ><div align="center"><strong>Nama Negeri</strong></div></td>
  								</tr>
  									<?php
	 									$i=0;
										$result = mydb("select Neg_ID,Neg_Nama from Negeri");	
										$row = odbc_fetch_array($result);
										while($row) 
											{	
									?>                           
  												<tr class="listoff" id=r<?php echo $i;?> onclick="getData(<?php echo $i;?>)" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" >
        											<td  align="center" id=s<?php echo $i;?> ><?php echo $i+1;?></td>
          											<td align="center"  id=s<?php echo $i;?>KodNegeri><?php echo $row["Neg_ID"];?></td>
          											<td align="center"  id=s<?php echo $i;?>NamaNegeri><?php echo $row["Neg_Nama"];?></td>
        										</tr>
   											<?php
												$row = odbc_fetch_array($result);	
												$i++;
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