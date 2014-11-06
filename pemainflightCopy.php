<?php
session_start();
include 'dbConnect.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kejohanan Golf Antara IPTA 2014</title>
<link href="golf750.css" rel="stylesheet" type="text/css" />    
<script src="/Golf2014100914/js/jquery-2.1.1.js"></script>
	<script>
		
        function PaparInfo(InfoInd, id) 
		{
			document.tunjukfrm.txtnama1.value = document.getElementById(id).rows[InfoInd].cells[0].innerHTML;			
			document.tunjukfrm.ipt1.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;
			document.tunjukfrm.kategori1.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
			document.tunjukfrm.txtnama2.value = document.getElementById(id).rows[InfoInd].cells[3].innerHTML;			
			document.tunjukfrm.ipt2.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;
			document.tunjukfrm.kategori2.value = document.getElementById(id).rows[InfoInd].cells[5].innerHTML;
			document.tunjukfrm.teebox1.value = document.getElementById(id).rows[InfoInd].cells[6].innerHTML;
			document.tunjukfrm.teebox2.value = document.getElementById(id).rows[InfoInd].cells[7].innerHTML;
			document.tunjukfrm.fid1.value = document.getElementById(id).rows[InfoInd].cells[8].innerHTML;	
			document.tunjukfrm.fid2.value = document.getElementById(id).rows[InfoInd].cells[9].innerHTML;	
			document.tunjukfrm.hole1.value = document.getElementById(id).rows[InfoInd].cells[10].innerHTML;	
			document.tunjukfrm.hole2.value = document.getElementById(id).rows[InfoInd].cells[11].innerHTML;
		}	
                
		function jscari()
		{		
		if(document.tunjukfrm.hari.value == "")
		{
		  alert ("Sila pilih hari");
		  document.tunjukfrm.P_Nama.focus();
		  return false;
		}
		
		if(document.tunjukfrm.pilihan.value == "")
		{
		  alert ("Sila buat pilihan");
		  document.tunjukfrm.P_ID.focus();
		  return false;
		}
		
		if(document.tunjukfrm.input.value == "")
		{
		  alert ("Sila masukkan pilihan");
		  document.tunjukfrm.P_MaxHole.focus();
		  return false;
		}
		
		document.tunjukfrm.hidact.value = "Save";
		document.tunjukfrm.submit();
		return true;
		}


		function cetak(divName) {
		 var printContents = document.getElementById(divName).innerHTML;
		 var originalContents = document.body.innerHTML;
	
		 document.body.innerHTML = printContents;
	
		 window.print();
	
		 document.body.innerHTML = originalContents;
		}
        
function myFunction() {
    var row = document.getElementById("myRow");
    alert(row.cells[0].innerHTML);
}
		//prevent usage of back button in browser
		history.pushState(null, null, 'pemainFlight.php');
		window.addEventListener('popstate', function(event) {
		history.pushState(null, null, 'pemainFlight.php');
		});
	</script>
</head>
<?php 
	if (isset($_POST["cari"])) 
	{
		$pilihan = $_POST['pilihan'];
		$input = $_POST['input'];
		
		if ( $pilihan == "pilihan" || empty($input)) {
			echo '<script>alert("Sila buat pilih dan carian ");</script>';
		
		}
	}	
?>	

  <body class="oneColLiqCtrHdr" style="background-image: url(image/bg2.jpg);">
	<form name="tunjukfrm" id="tunjukfrm" action ="pemainflightCopy.php" method="post">
  <table width="950" id="Outer" align="center" style="border: 3px solid #888; background-color:#FFF">
    <tr>
      <td width="938">
		<table width="100%" id="TableHeader2" border="0">
			<tr>
				<td><img src="image/header.jpg" width="100%"/></td>
			</tr>
		</table>
        <table width="100%" id="Main2" align="center">
          <tr>
            <td colspan="2" align="left" style="font-size:17px"><strong>Senarai Flight Pemain</strong></td>
            <td width="27%" align="left" style="font-size:17px"><a href="menuPemain.php"><img src="image/home2.png" width="100" height="30" align="right" /></a></td>
          </tr>
          <tr>
            <td width="23%" colspan="3"> <font color="#FF0000" style="font-size:8pt"> Kenyataaan :</font></td>
          </tr>
          <tr>
            <td width="23%" rowspan="2" ><font color="#FF0000" style="font-size:8pt">(1) AK= Ayer Keroh Club</font></td>
          </tr>
          <tr>
            <td colspan="2"><font color="#FF0000" style="font-size:8pt">(3) OR=ORNA Golf And Country </font></td>
          </tr>
          <tr>
            <td ><font color="#FF0000" style="font-size:8pt">(2) FA=Farmosa Golf and Country Club  </font></td>
            <td colspan="2" ><font color="#FF0000" style="font-size:8pt">(4) TR=Tiara Golf And Country Club</font></td>
          </tr>
          <tr>
            <td colspan="3" align="center">
				<table width="99%" id="TableA" border="0">
					<tr>
						<td width="13%">Pilihan</td>
						<td width="1%">:</td>
						<td width="34%">
							<select name="pilihan" id="pilihan">
							  <option value="" selected="selected">Sila Pilih</option>
							  <option value="PE_Nama" >Nama</option>
							  <option value="a.PE_ID" >No Pengenalan</option>
							  <option value="Ipt_ID" >IPT</option>
							</select>
						</td>
						<td width="5%">Carian</td>
						<td width="1%">:</td>
						<td width="46%"><input type="text" name="input" id="input" />
					    <input type="submit" name="cari" id="cari" value="Cari" class="button" style="width:90px; text-align:center;" /></td>
					</tr>
					<tr>
						<td colspan="6" align="right">&nbsp;</td>
					</tr>
				</table>
			</td>
          </tr>
        </table>

        <table width="100%" height="125" border="0" cellpadding="1" cellspacing="1" id="pemain" name="pemain" >
          <tr class="theader">
           
            <td width="50%" align="center">Nama </td>
            <td width="19%" align="center">IPT</td>
            <td width="29%" align="center">Kategori</td>
          </tr>
          <tr>
            <td height="102" colspan="13" ><div class="listbox" style="height:100px" id="cetakan2">
              <table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
               	<?php
                                   $bil = 0;
                                    $query = mydb ("SELECT a.PE_Nama as nama, a.Ipt_ID, d.Kat_Nama , e.F_ID as f1, f.F_ID as f2, g.H_ID as hole1, h.H_ID as hole2,
													i.P_ID as padang, g.H_Indeks as indeks1, g.H_Desc as desc1, h.H_Indeks as indeks2, h.H_Desc as desc2
													FROM Pemain as a 
													left join Day_1 as b on a.PE_ID = b.P1 or a.PE_ID = b.P2 or a.PE_ID = b.P3 or a.PE_ID = b.P4
													left join Day_2 as c on a.PE_ID = c.P1 or a.PE_ID = c.P2 or a.PE_ID = c.P3 or a.PE_ID = c.P4
													left join Kategori d on a.Kat_ID=d.Kat_ID
													left join Flight_Day_1 e on b.F_ID = e.F_ID
													left join Flight_Day_2 f on f.F_ID = c.F_ID
													left join Hole_Day_1 g on g.H_ID = e.H_ID
													left join Hole_Day_2 h on h.H_ID = f.H_ID
													left join Padang i on i.P_ID = g.P_ID
													left join Padang j on j.P_ID = h.P_ID
				  									WHERE " . $pilihan . " like '%" . $input . "%'");
                                    $objResult = odbc_fetch_array($query);  
									
                                    while($objResult)
                                    {
									
                                ?>
                                    <tr id="myRow" class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" ondblclick="PaparInfo(<?php echo $bil;?>,'TableC')">
                                        <td width="35%"><?php echo $objResult["nama"];?></td>
                                        <td width="10%"><?php echo $objResult["Ipt_ID"];?></td>
                                        <td width="10%"><?php echo $objResult["Kat_Nama"];?></td>
                                        <td width="35%" style="display:none"><?php echo $objResult["nama"];?></td>
                                        <td width="10%" style="display:none"><?php echo $objResult["Ipt_ID"];?></td>
                                        <td width="10%" style="display:none"><?php echo $objResult["Kat_Nama"];?></td>                                        
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["desc1"], $objResult["indeks1"];?></td>
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["desc2"], $objResult["indeks2"];?></td>
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["f1"];?></td>
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["f2"];?></td>
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["hole1"];?></td>
                                        <td width="10%" align="center" style="display:none"><?php echo $objResult["hole2"];?></td>
                                    </tr>
                              <?php 
							  		
									 $objResult = odbc_fetch_array($query);
                                    $bil++;
                                    }
							  ?>
              </table>
            </div></td>
          </tr>
        </table>
        <p>Hari 1</p>
        <table width="100%" border="0" cellspacing="1" cellpadding="1" id="pemain2" name="pemain" > 
              <tr class="theader">
             
                <td rowspan="2" width="20%" align="center">Nama </td>
                <td rowspan="2" width="11%" align="center">IPT</td>
                <td rowspan="2" width="7%" align="center">Kategori</td>
                <td width="12%" rowspan="2" align="center">Tee Box</td>
                <td colspan="2" align="center">Hari 1</td>
                
				
              </tr>
              <tr class="theader">
                <td width="13%" align="center">Flight</td>
                <td width="37%" align="center">Hole</td>
              </tr>
              <tr>
              	<td height="102" colspan="12" >
                <div class="listbox" style="height:100px">
                <table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
					 <tr class="listoff" onmouseover="this.className='liston';" onmouseout="this.className='listoff';" >
                   <td width="19%">
                            <input type="text" name="txtnama1" id="txtnama1" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="ipt1" id="ipt1" size="10" style="width:120px;" />
                        </td>
						<td width="13%">
                            <input type="text" name="kategori1" id="kategori1" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="teebox1" id="teebox1" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="fid1" id="fid1" size="10" style="width:120px;" />
                        </td>
                        <td width="20%">
                            <input type="text" name="hole1" id="hole1" size="10" style="width:120px;" />
                        </td>
                </tr>
				 
            </table>
            </div>
            </td>
		</tr>
    	</table>
        <p>Hari 2</p>
        <table width="100%" border="0" cellspacing="1" cellpadding="1" id="pemain3" name="pemain" >
          <tr class="theader">
            <td rowspan="2" width="3%" align="center">Bil</td>
            <td rowspan="2" width="19%" align="center">Nama </td>
            <td rowspan="2" width="7%" align="center">IPT</td>
            <td rowspan="2" width="7%" align="center">Kategori</td>
            <td width="7%" rowspan="2" align="center">Tee Box</td>
           
            <td colspan="2" align="center">Hari 2</td>
          </tr>
          <tr class="theader">
            <td width="16%" align="center">Flight</td>
            <td width="12%" align="center">Hole</td>
          </tr>
          <tr>
            <td height="102" colspan="12" ><div class="listbox" style="height:100px">
              <table id="TableC3" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
               
                <tr class="listoff" onmouseover="this.className='liston';" onmouseout="this.className='listoff';" >
                   <td width="19%">
                            <input type="text" name="txtnama2" id="txtnama2" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="ipt2" id="ipt2" size="10" style="width:120px;" />
                        </td>
						<td width="13%">
                            <input type="text" name="kategori2" id="kategori2" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="teebox2" id="teebox2" size="10" style="width:120px;" />
                        </td>
						<td width="16%">
                            <input type="text" name="fid2" id="fid2" size="10" style="width:120px;" />
                        </td>
                        <td width="20%">
                            <input type="text" name="hole2" id="hole2" size="10" style="width:120px;" />
                        </td>
                </tr>
              </table>
            </div></td>
          </tr>
        </table></td>
    </tr>
</table>
</form>
</body>
</html>