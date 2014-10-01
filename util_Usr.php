<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Pengguna</title>
	<link href="golf750.css" rel="stylesheet" type="text/css" />
</head>

<?php
	include 'dbConnect.php';


	if (isset($_POST['Simpan']) )
	{
		$noic = $_POST['fnoic'];
		$nama = $_POST['fnama'];
		$jenis = $_POST['fjenis'];
		$namaibu = $_POST['fnamaibu'];
		$password = $_POST['fpassword'];
		$universiti = $_POST['funiversiti'];
		$notel = $_POST['fnotel'];
		$emel = $_POST['femel'];

		$sql = mydb("INSERT INTO Pengguna(Usr_Nama, Usr_ID, Usr_Jenis, Usr_Ibu, Usr_Pwd, Ipt_ID, Usr_NoTel, Usr_Email) 
				values ('$nama','$noic','$jenis','$namaibu','$password','$universiti','$notel','$emel') ");
		
		if ($sql) 
 		{	
			echo "<script>alert('Data Berjaya Disimpan');</script>";
			
			//send password to email
			$to = $emel;
			$subject = "Katalaluan untuk login ke sistem";
			$header = "from: your name <your email>";
			
			//message in email
			$message = "Katalaluan untuk sistem pertandingan golf ipta ialah : $password";
			
			//send email
			$sentemail = mail($to,$subject,$message,$header);
				
			if($sentemail){
				echo "<script>alert('katalaluan berjaya dihantar ke emel anda ');</script>";
			}
			else {
			echo "<script>alert('katalaluan tidak berjaya dihantar');</script>";
			}
		}
	
		else 
		{		
			echo "<script>alert('Data Gagal Disimpan');</script>";		
		}
	}


	if (isset($_POST['btnKemaskini']) )
	{
		$nama = $_POST['fnama'];
		$jenis = $_POST['fjenis'];
		$namaibu = $_POST['fnamaibu'];
		$password = $_POST['fpassword'];
		$universiti = $_POST['funiversiti'];
		$notel = $_POST['fnotel'];
		$emel = $_POST['femel'];
		$mm = $_POST['mm'];
	
		$sql = mydb("update Pengguna set Usr_Nama='$nama', Usr_Jenis='$jenis', Usr_Ibu='$namaibu',
			Usr_Pwd='$password',Ipt_ID='$universiti',Usr_NoTel='$notel',Usr_Email='$emel' where Usr_ID='$mm' ");
	
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
	
		$sql = mydb("delete from Pengguna where Usr_ID='$mm' ");

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
		cols[0]="noic";
		cols[1]="nama";
		cols[2]="jenis";
		cols[3]="namaibu";
		cols[4]="password";
		cols[5]="universiti";
		cols[6]="notel";
		cols[7]="emel";

		function getData(_row)
		{
  			for(var i=0;i<cols.length;i++) 
			 {
    			var _temp=document.getElementById("s"+_row+cols[i]).innerHTML;
    			document.getElementById("f"+cols[i]).value=_temp;
				document.getElementById('Simpan').style.visibility='hidden'; // hide  
    			document.getElementById('btnKemaskini').style.visibility='visible'; // show  
    			document.getElementById('btnHapus').style.visibility='visible'; // show  
				document.getElementById('fnoic').disabled = true; // show
				document.getElementById('fpassword').disabled = false; // show 
  			}

		}


		function formReset()
		{
 				document.getElementById('Simpan').style.visibility='visible'; // hide  
 				document.getElementById('btnKemaskini').style.visibility='hidden'; // show  
 				document.getElementById('btnHapus').style.visibility='hidden';; // show  
 				document.getElementById('fnoic').disabled = false; // show  
			 	document.getElementById('fnoic').value="";
 				document.getElementById('fnama').value="";
 				document.getElementById('fjenis').value="";
 				document.getElementById('fnamaibu').value="";
 				document.getElementById('fnotel').value="";
 				//document.getElementById('fpassword').value="";
 				document.getElementById('fpassword').disabled = true; // show 
 				document.getElementById('femel').value="";
 				document.getElementById('funiversiti').value="";
		}



		function formTambah()
		{
			if (document.frmDaftarPengguna.fnoic.value == "")
			{
				alert ("sila masukkan No KP. ");
				document.frmDaftarPengguna.fnoic.focus();
				return false;
			}	

			if (document.frmDaftarPengguna.fnama.value == "")
			{
				alert ("sila masukkan nama. ");
				document.frmDaftarPengguna.fnama.focus();
				return false;
			}	

			if (document.frmDaftarPengguna.fjenis.value == "")
			{
				alert ("sila pilih jenis pengguna. ");
				document.frmDaftarPengguna.fjenis.focus();
				return false;
			}

			if (document.frmDaftarPengguna.fnamaibu.value == "")
			{
				alert ("sila masukkan nama ibu. ");
				document.frmDaftarPengguna.fnamaibu.focus();
				return false;
			}

			if (document.frmDaftarPengguna.fnotel.value == "")
			{
				alert ("sila masukkan no tel. ");
				document.frmDaftarPengguna.fnotel.focus();
				return false;
			}

			if (document.frmDaftarPengguna.fpassword.value == "")
			{
				alert ("sila masukkan kata laluan. ");
				document.frmDaftarPengguna.fpassword.focus();
				return false;
			}

			if (document.frmDaftarPengguna.femel.value == "")
			{
				alert ("sila masukkan emel. ");
				document.frmDaftarPengguna.femel.focus();
				return false;
			}

			if (document.frmDaftarPengguna.funiversiti.value == "")
			{
				alert ("sila pilih universiti. ");
				document.frmDaftarPengguna.funiversiti.focus();
				return false;
			}

         	if (confirm('Pasti untuk TAMBAH rekod pengguna ' + document.getElementById('fnoic').value + '?'))
       		 {    
				document.getElementById('fpassword').disabled = false;
				return true;
			 }
			return false;
		}


		function formUpdate()
		{
			 if (confirm('Pasti untuk KEMASKINI rekod pengguna ' + document.getElementById('fnoic').value + '?'))
        	{      
		    	document.frmDaftarPengguna.mm.value=document.getElementById('fnoic').value;
				return true;
			}
			return false;
		}


		function formDelete()
		{  
			if (confirm('Pasti untuk PADAM rekod pengguna ' + document.getElementById('fnoic').value + '?'))
			{
				document.frmDaftarPengguna.mm.value=document.getElementById('fnoic').value;
				return true;
			}
			return false;
		}


		window.onload=function()
		{
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

<body class="oneColLiqCtrHdr">
<div id="container">
	<img src="image/header.jpg" width="100%" height="165"/>
		<form action="util_Usr.php" method="post" id="frmDaftarPengguna" name="frmDaftarPengguna">
			<table width="759" border="0" align="center">
  				<tr>
				<td colspan="6"><td>
				</tr>
				<tr>
    				<td colspan="6"><strong><u>Daftar Pengguna</u></strong>
  					</td>
  				</tr>
  				<tr>
    				<td>Jenis Pengguna</td>
    				<td>:</td>
    				<td><select name="fjenis" id="fjenis">
    					<option value="">--Sila Pilih--</option>
      					 <?php
  	  						$jenis = 'fjenis';
	  						$result = mydb("select Distinct(Usr_Jenis) from Pengguna order by Usr_Jenis asc");
      						$row = odbc_fetch_array($result);
	  						while ($row) 
							{	  
      							if($jenis == $row['Usr_Jenis']) 
								{
						?>
      								<option value= <?php echo $row['Usr_Jenis']; ?> selected >  <?php echo $row['Usr_Jenis']; ?> </option>           
           				<?php 	}
								else
								{ 
						?>
           							<option value= <?php echo $row['Usr_Jenis']; ?> >  <?php echo $row['Usr_Jenis']; ?> </option>
	  					<?php
	 			 				}
				 			$row = odbc_fetch_array($result);
      						}
	  					?> 
    					</select>
					</td>
   					<td>&nbsp;</td>
    				<td>&nbsp;</td>
    				<td>&nbsp;</td>
  				</tr>
  				<tr>
    				<td width="133">Nama</td>
    				<td width="17">:</td>
    				<td width="244">
						<label>
      						<input name="fnama" type="text" id="fnama" size="40"  />
    					</label>
					</td>
   					<td width="85">&nbsp;</td>
    				<td width="14">&nbsp;</td>
    				<td width="240">&nbsp;</td>
  				</tr>
  				<tr>
    				<td>No. Kad Pengenalan</td>
   					<td>:</td>
    				<td>
						<label>
    						<input name="fnoic" type="text" id="fnoic" size="40" maxlength="12" onkeypress="return numeric_only(event);"/>
    						<input type="hidden" name="mm" id="mm"  value=" <?php echo $fnoic; ?> "/>
    					</label>
					</td>
    				<td>Nama Ibu</td>
    				<td>:</td>
    				<td><input name="fnamaibu" type="text" id="fnamaibu" size="40"/></td>
  				</tr>
  				<tr>
    				<td>No. Telefon</td>
    				<td>:</td>
    				<td><input name="fnotel" type="text" id="fnotel" maxlength="10" onkeypress="return numeric_only(event);"/></td>
    				<td>Katalaluan</td>
    				<td>:</td>
    				<td><input name="fpassword" type="text" id="fpassword" value="123456" maxlength="15" /></td>
  				</tr>
  				<tr>
    				<td>Emel</td>
    				<td>:</td>
    				<td>
						<label>
     						 <input name="femel" type="text" id="femel" size="40" />
    					</label>
					</td>
    				<td>Universiti</td>
    				<td>&nbsp;</td>
    				<td>
						<select name="funiversiti" id="funiversiti" >
      						<option value="">--Sila Pilih--</option>
       						<?php
  	  							$jenis = 'fjenis';
	  							$result = mydb("select Ipt_ID from Universiti order by Ipt_ID asc");
      							$row = odbc_fetch_array($result);
	  							while ($row) 
								{	  
      								if($jenis == $row['Ipt_ID']) 
									{
							?>
      								<option value= <?php echo $row['Ipt_ID']; ?> selected >  <?php echo $row['Ipt_ID']; ?> </option>  
           					<?php 
									}
									else
									{ 
							?>
            						<option value= <?php echo $row['Ipt_ID']; ?> >  <?php echo $row['Ipt_ID']; ?> </option>
            				 <?php
	 			 					}			 
	  								$row = odbc_fetch_array($result);
      							}
	  						?> 
   						</select>
				</td>
 			</tr>
  			<tr>
    			<td colspan="6">&nbsp;</td>
  			</tr>
  			<tr>
    			<td colspan="6" align="right">
					<label>
        				<input type="submit" class="button" name="Simpan" id="Simpan" value="Simpan" style="width:90px; text-align:center;" onclick ="return formTambah()"/>
        				<input type="submit" class="button" name="btnKosong" id="btnKosong" value="Kosongkan" style="width:90px; text-align:center;" onclick="formReset()"/>
        				<input type="submit" class="button" name="btnKemaskini" id="btnKemaskini" value="Kemaskini" style="width:90px; text-align:center;" onclick="return formUpdate()"/>
        				<input type="submit" class="button" name="btnHapus" id="btnHapus" value="Hapus" style="width:90px; text-align:center;" onclick="return formDelete()"/>
    				</label>
				</td>
  			</tr>
 			<tr>
    			<td colspan="6">&nbsp;</td>
  			</tr>
  			<tr>
    			<td colspan="6">
    				<div class=listbox style="height:200">
    					<table width="759" border="0" align="center">
      						<tr class="theader">
      							<td width="49"><div align="center"><strong>No.</strong></div></td>
        						<td width="149"><div align="center"><strong>Nama</strong></div></td>
        						<td width="131"><div align="center"><strong>No Kad Pengenalan</strong></div></td>
       							<td width="143"><div align="center"><strong>Jenis Pengguna</strong></div></td>
        						<td style="display:none"><div align="center"><strong>Nama Ibu</strong></div></td>
        						<td style="display:none"><div align="center"><strong>Kata Laluan</strong></div></td>
        						<td style="display:none"><div align="center"><strong>Nama Universiti</strong></div></td>
        						<td style="display:none"><div align="center"><strong>No Tel</strong></div></td>
        						<td style="display:none"><div align="center"><strong>Emel</strong></div></td>
      						</tr>
     							<?php
	 								$i=0;
	  								$result = mydb("select Usr_Nama,Usr_ID,Usr_Jenis,Usr_Ibu,Usr_Pwd,Ipt_ID,Usr_NoTel,Usr_Email from pengguna");	
									$row = odbc_fetch_array($result);
									while($row) 
									{	
								?>                                         
  										<tr class="listoff" id=r<?php echo $i;?> onclick="getData(<?php echo $i;?>)" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" >
        									<td  align="center" id=s<?php echo $i;?>D ><?php echo $i+1;?></td>
          									<td align="center"  id=s<?php echo $i;?>nama><?php echo $row["Usr_Nama"];?></td>
          									<td align="center"  id=s<?php echo $i;?>noic><?php echo $row["Usr_ID"];?></td>
          									<td align="center"  id=s<?php echo $i;?>jenis><?php echo $row["Usr_Jenis"];?></td>
          									<td style="display:none" align="center"  id=s<?php echo $i;?>namaibu><?php echo $row["Usr_Ibu"];?></td>
          									<td style="display:none" align="center"  id=s<?php echo $i;?>password><?php echo $row["Usr_Pwd"];?></td>
          									<td style="display:none" align="center"  id=s<?php echo $i;?>universiti><?php echo $row["Ipt_ID"];?></td>
          									<td style="display:none" align="center"  id=s<?php echo $i;?>notel><?php echo $row["Usr_NoTel"];?></td>
          									<td style="display:none" align="center"  id=s<?php echo $i;?>emel><?php echo $row["Usr_Email"];?></td>
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
