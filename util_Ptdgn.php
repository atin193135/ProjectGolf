<?php require_once('dbConnect.php'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="golf750.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="calendar/epoch_styles.css" />
	<script type="text/javascript" src="calendar/epoch_classes.js"></script>
	<script type="text/javascript">
		var bas_cal,dp_cal,ms_cal;      
		window.onload = function () 
		{
			dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container'));
			dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container1'));
		};
	</script>

	<title>Daftar Pertandingan</title>
</head>

<?php

	$select = mydb("select * from Pertandingan");
	$row = odbc_fetch_array($select);

	//--------------Proses ADD Pertandingan

	if(isset($_REQUEST['Simpan']))
	{
		$tajuk = $_REQUEST['tajuk'];
		$penganjur = $_REQUEST['penganjur'];
		$tarikhmula  = $_REQUEST['tarikhmula'];
		$tarikhtamat  = $_REQUEST['tarikhtamat'];

		$insert = mydb("INSERT INTO pertandingan(PT_ID, PT_Nama, PT_TarikhMula, PT_TarikhTamat, PT_Penganjur) 
						values ('','$tajuk','$tarikhmula','$tarikhtamat','$penganjur') ");

		if($insert)
		{
			echo "<script>alert('Data Berjaya Disimpan..'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan..'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';
		}

	}
	
	
	//--------------Proses UPDATE Pertandingan
	if(isset($_REQUEST['Kemaskini']))
	{
		$id = $_REQUEST['id'];
		$tajuk = $_REQUEST['tajuk'];
		$penganjur = $_REQUEST['penganjur'];
		$tarikhmula  = $_REQUEST['tarikhmula'];
		$tarikhtamat  = $_REQUEST['tarikhtamat'];

		$update = mydb("Update pertandingan set PT_Nama = '$tajuk', PT_TarikhMula = '$tarikhmula', PT_TarikhTamat = '$tarikhtamat',
 						PT_Penganjur = '$penganjur' where PT_ID = '$id' ");

		if($update)
		{
			echo "<script>alert('Data Berjaya dikemaskini'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';
	
		}
		else
		{
			echo "<script>alert('Data Gagal Dikemaskini'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';

		}

	}


	//--------------Proses DELETE Pertandingan
	if(isset($_REQUEST['Padam']))
	{
        $id = $_REQUEST['id'];
		$delete = mydb("delete * from pertandingan where PT_ID = '$id' ");
		if($delete)
		{
			echo "<script>alert('Data Berjaya dihapuskan'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';
		}	
		else
		{
			echo "<script>alert('Data Gagal dihapuskan'); </script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.01; URL=util_Ptdgn.php">';
		}	
	}

?>

	<script>
	function hapus()
	{
		if(confirm("Pasti untuk Padam Rekod ini ? ")
			   {
				   document.getElementById('id').disabled = false;
				   return true;
			   }
			   return false;
			   
	}
	</script>

<body class="oneColLiqCtrHdr">
<div id="container">
	<img src="image/header.jpg" width="100%" height="165"/>
		<form id="form1" name="form1" method="post" action="util_ptdgn.php">

			<table width="759" align="center">
				<tr>
					<td colspan="7"><strong><u>Daftar Pertandingan</u></strong>
  					</td>
				</tr>

				<?php if($select == null) { ?>
				<tr>
					<td width="86">Tajuk</td>
    				<td width="6"> :</td>
    				<td width="204">
    					<input type="text" name="tajuk" id="tajuk" /> 
        			</td>
    				<td width="34"></td>
    				<td width="88">Penganjur</td>
   					<td width="16">:</td>
    				<td width="293">
      					<input type="text" name="penganjur" id="penganjur" />
    				</td>
				<tr>
					<td>Tarikh Mula</td>
					<td>:</td>
					<td><input type="text" name="tarikhmula" id="popup_container" /> 
					</td>
   					<td></td>
    				<td>Tarikh Tamat</td>
    				<td>:</td>
    				<td><input type="text" name="tarikhtamat" id="popup_container1" /> 
    				</td>
				</tr>

				<?php } else {	?>
	
				<tr>
					<td width="86">Tajuk</td>
    				<td width="6"> :</td>
    				<td width="204">
						<input type="text" name="tajuk" id="tajuk" value="<?php echo $row['PT_Nama'];   ?>" />
    					<input type="hidden" name="id" id="id" value="<?php echo $row['PT_ID'];   ?>" />
        			</td>
    				<td width="34"></td>
    				<td width="88">Penganjur</td>
    				<td width="16">:</td>
    				<td width="293">
      					<input type="text" name="penganjur" id="penganjur" value="<?php echo $row['PT_Penganjur'];   ?>" />
    				</td>
				<tr>
					<td>Tarikh Mula</td>
					<td>:</td>
					<td><input type="text" name="tarikhmula" id="popup_container" value="<?php echo date('Y-m-d',strtotime($row['PT_TarikhMula']));   ?>" /> 
					</td>
    				<td></td>
    				<td>Tarikh Tamat</td>
    				<td>:</td>
    				<td><input type="text" name="tarikhtamat" id="popup_container1" value="<?php echo date('Y-m-d',strtotime($row['PT_TarikhTamat']));   ?>" /> 
    				</td>
				</tr>

 				<?php } ?>

				<tr>
					<td colspan="7" height="100">
					<center>
  					<label> 
  						<?php if($select == null) { ?>
  							<input type="submit" class="button" name="Simpan" id="Simpan" value="Simpan" style="width:90px; text-align:center;" /></label>
 							<label> <input type="submit" class="button" name="button2" id="button2" value="Kosongkan" style="width:90px; text-align:center;" /></label>
  
    			<?php } ?>
    
  					<label> <input type="submit" class="button" name="Kemaskini" id="Kemaskini" value="Kemaskini" style="width:90px; text-align:center;" /></label>
  					<label> <input type="submit" class="button" name="Padam" id="Padam" value="Hapus" onclick="return Hapus();" style="width:90px; text-align:center;" /></label>
 					</center>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>