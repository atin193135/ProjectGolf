<?php 
	include 'dbConnect.php';
	error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">
 <script src="/Golf2014100914/js/jquery-2.1.1.js"></script>
 
 	<script type="text/javascript">
		function loadData(nama, fid, hole, indeks, par, mark, hid) {
          $("#pe_nama").val(nama); 
		  $("#fid").val(fid);
		   $("#hole").val(hole); 
		  $("#indeks").val(indeks);
		   $("#par").val(par); 
	
			<?php
			$query = mydb("select * from dbo.Hole where refInc >= (select refInc from dbo.Hole where H_ID = 'hid') 
and 
refInc < (select refInc from dbo.Hole where H_ID = 'AK11') + 18
;")
			?>
		   
		   var table = $("<table width='630' border='0' cellpadding='1' cellspacing='1' id='TableC2' style='width: 80px ; font-size: 11px'></table>");

			for (i = 0; i < 18; i++) { 
			 var row = $("<tr width='502' class='listoff'></tr>");
			
			  row.append($("<td></td>").html(i+1));
			  row.append($("<td></td>").html('<input name="hole" type="text" size="9" id="hole" readonly="readonly" value="'+hole+'"/>'));
			  row.append($("<td></td>").html('<input name="indeks" type="text" size="9" id="indeks" readonly="readonly" value="'+indeks+'"/>'));
			  row.append($("<td></td>").html('<input name="par" type="text" size="9" id="par" readonly="readonly" value="'+par+'"/>'));
			  row.append($("<td></td>").html('<input name="mark" type="text" size="9" id="mark" value="" />'));
			  row.append($("<td></td>").html('<input name="hcap" type="text" size="8.8" id="hcap" value=""  readonly="readonly" />'));
			  row.append($("<td></td>").html('<input name="mshcap" type="text" size="8" id="mshcap" value=""  readonly="readonly"/>'));
			  row.append($("<td></td>").html('<input name="point" type="text" size="5" id="point" value=""  readonly="readonly"/>'));
			
			  table.append(row);
   
			}
			 
			$("#testtt").html(table);

		  }
		  
		function PaparInfo() 
		{
			document.frmFlight.submit();
			return true;	
		}	

		function NewRekod()
		{
			document.frmFlight.hidNew.value = "new";
			document.frmFlight.hidSave.value = "";	
			
			document.frmFlight.submit();
			return true;	
		}

		function SimpanRekod()
		{	
		
			if ((document.frmFlight.cmbDay.value == "") || (document.frmFlight.cmbDay.value == "-"))
			{
				alert("Sila pilih 'hari'.");
				document.frmFlight.cmbDay.focus();
				return false;
			}
			
			
			if (document.frmFlight.hidSave.value == "" )
			{			
				document.frmFlight.hidSave.value = "save";
				document.frmFlight.submit();
				return true;
			}
			return true;		
		}

		
	
	</script>
</head>
<?php
	$StaSave="";
	$StaNew="";
	$msginfo="";
	$kat_id = "";
	$day="";

	if(isset($_POST['hidSave'])){ $StaSave = $_POST['hidSave']; };
	if(isset($_POST['hidNew'])){ $StaNew = $_POST['hidNew']; };
	
	if ($StaNew == "")
	{
		if(isset($_POST['cmbDay'])){ $day = $_POST['cmbDay']; };
	}
	
	if(isset($_POST['padang']))
	{ 
		$idpadang = $_POST['padang']; 
		$i=0;
		$rs =mydb("SELECT H_Hole, H_Par, H_Indeks FROM Hole WHERE P_ID = '" . $idpadang ."'");
		$objResult = odbc_fetch_array($rs); 
		$count = odbc_num_rows($rs);

	}	
?>

<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
<tr>
    <td>
    <form name="frmFlight" id="frmFlight" action ="kiramarkah1.php" method="post">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        <table width="100%" id="Main" align="center">
            <tr>
                <td align="left" style="font-size:17px"><strong>Penentuan Pemain Kepada Flight</strong></strong></td>
              	<td width="12%" align="left" style="font-size:17px"><a href="menuUtiliti.php"><img src="image/Settings-icon.png" width="100" height="25" align="right" /></a></td>
            </tr>
            <tr>
              <td colspan="2" >&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <table width="100%" id="TableA" border="0">
					<tr>
                        <td width="18%">Padang</td>
						<td width="2%">:</td>
						<td width="43%"><select name="padang" id="padang" style="width:300px" onchange="PaparInfo()">
					
						  <?php  
                    $result = mydb("select P_Nama, P_ID from Padang order by P_Nama");
                    $row = odbc_fetch_array($result);
                    while ($row) 
                    {  
                    if($idpadang == $row['P_ID'])
                    {	
                    ?>
						  <option value="<?php echo $row['P_ID']; ?>" selected="selected" ><?php echo $row['P_Nama']; ?></option>
						  <?php 
                    }
                    else
                    { 
                    ?>
						  <option value="<?php echo $row['P_ID']; ?>"><?php echo $row['P_Nama']; ?></option>
						  <?php
                    }
                    $row = odbc_fetch_array($result);
                    }
                    ?>
					    </select></td>
					    <td width="5%">Hari</td>
					    <td width="2%">:</td>
					    <td width="30%"><select name="cmbDay" id="cmbDay"style="width:80px" onchange="PaparInfo()">
                          <option value="" >Sila pilih</option>
                          <option value="D1" <?php if ($day=="D1") {?> selected="selected" <?php } else ?> " ">Hari 1</option>
                          <option value="D2" <?php if ($day=="D2") {?> selected="selected" <?php } else ?> " ">Hari 2</option>
                        </select></td>
					</tr>
                    <tr>
                        <td colspan="6" align="right">&nbsp;</td>
					</tr>      
					</table>
                  <table width="100%" id="TableB" border="0">
               	  <tr class="theader">
                        <td width="10%" align="center">Kod Flight</td>
                        <td width="22%" align="center">Pemain 1</td>
                        <td width="22%" align="center">Pemain 2</td>
                        <td width="22%" align="center">Pemain 3</td>
                        <td width="22%" align="center">Pemain 4</td>
						<td width="2%">&nbsp;</td>
                    </tr>
					<tr>
						<td colspan="6">
							<div class=listbox style="height:250px">
								<table id="TableC" border="0" cellspacing="0" cellpadding="1" style="width: 100%; font-size: 11px;">
					  <?php
                                    $i=0;
									if ($day=="D1")
                                    	$rs = mydb ("SELECT G.H_ID as hid, G.H_Hole as hole, G.H_Indeks as indeks, G.H_Par as par,
													A.F_ID, A.P1, B.PE_Nama AS P1_Nama, B.Ipt_ID AS P1_IPT,B.PE_Handicap,
													A.P2, C.PE_Nama AS P2_Nama, C.Ipt_ID AS P2_IPT, C.PE_Handicap,
													A.P3, D.PE_Nama AS P3_Nama, D.Ipt_ID AS P3_IPT, D.PE_Handicap, 
													A.P4, E.PE_Nama AS P4_Nama, E.Ipt_ID AS P4_IPT, g.P_ID, E.PE_Handicap
													FROM Day_1 A
													LEFT JOIN Pemain B ON A.P1=B.PE_ID
													LEFT JOIN Pemain C ON A.P2=C.PE_ID
													LEFT JOIN Pemain D ON A.P3=D.PE_ID
													LEFT JOIN Pemain E ON A.P4=E.PE_ID
													INNER JOIN FLIGHT_DAY_1 F ON A.F_ID = F.F_ID
													INNER JOIN HOLE G ON F.H_ID = G.H_ID
  												    WHERE G.P_ID='" . $idpadang . "'");
									elseif ($day=="D2")
                                    	$rs = mydb ("SELECT G.H_ID as hid, G.H_Hole as hole, G.H_Indeks as indeks, G.H_Par as par,
													A.F_ID, A.P1, B.PE_Nama AS P1_Nama, B.Ipt_ID AS P1_IPT,B.PE_Handicap,
													A.P2, C.PE_Nama AS P2_Nama, C.Ipt_ID AS P2_IPT, C.PE_Handicap,
													A.P3, D.PE_Nama AS P3_Nama, D.Ipt_ID AS P3_IPT, D.PE_Handicap, 
													A.P4, E.PE_Nama AS P4_Nama, E.Ipt_ID AS P4_IPT, g.P_ID, E.PE_Handicap
													FROM Day_2 A
													LEFT JOIN Pemain B ON A.P1=B.PE_ID
													LEFT JOIN Pemain C ON A.P2=C.PE_ID
													LEFT JOIN Pemain D ON A.P3=D.PE_ID
													LEFT JOIN Pemain E ON A.P4=E.PE_ID
													INNER JOIN FLIGHT_DAY_2 F ON A.F_ID = F.F_ID
													INNER JOIN HOLE G ON F.H_ID = G.H_ID
													WHERE G.P_ID='" . $idpadang . "'");

                                    $objResult = odbc_fetch_array($rs);  
                                    while($objResult)
                                    {
										if ($i%2==0)
										{
                                ?>
                                            <tr class="listoff" style="background-color:#FFF">
                                                <td width="10%" valign="middle"><?php echo $objResult["F_ID"];?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P1_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php echo $objResult["P1"]."<br>".$objResult["P1_Nama"]."<br>(".$objResult["P1_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P2_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php echo $objResult["P2"]."<br>".$objResult["P2_Nama"]."<br>(".$objResult["P2_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P3_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php echo $objResult["P3"]."<br>".$objResult["P3_Nama"]."<br>(".$objResult["P3_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P4_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php if ($objResult["P4"]!="") { echo $objResult["P4"]."<br>".$objResult["P4_Nama"]."<br>(".$objResult["P4_IPT"].")"; } else echo "";?></td>
                                            </tr>
                                <?php
										}
										else
										{
								?>
                                            <tr class="listoff" style="background-color:#D5FF80">
                                                <td width="10%" valign="middle"><?php echo $objResult["F_ID"];?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P1_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>', '<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')" ><?php echo $objResult["P1"]."<br>".$objResult["P1_Nama"]."<br>(".$objResult["P1_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P2_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php echo $objResult["P2"]."<br>".$objResult["P2_Nama"]."<br>(".$objResult["P2_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P3_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php echo $objResult["P3"]."<br>".$objResult["P3_Nama"]."<br>(".$objResult["P3_IPT"].")";?></td>
                                                <td width="22%" ondblclick="loadData('<?= $objResult["P4_Nama"]?>', '<?= $objResult["F_ID"]?>', '<?= $objResult["hole"]?>','<?= $objResult["indeks"]?>', '<?= $objResult["par"]?>', '<?= $objResult["hid"]?>')"><?php if ($objResult["P4"]!="") { echo $objResult["P4"]."<br>".$objResult["P4_Nama"]."<br>(".$objResult["P4_IPT"].")"; } else echo "";?></td>
                                            </tr>
								<?php
										}
                                    $objResult = odbc_fetch_array($rs);
                                    $i++;
                                    }
                                ?>
								</table>
							</div>						</td>
					</tr>
				  </table>			  </td>
			</tr>
		</table>
        <br/>
        <table width="990" border="0">
          <tr>
            <td width="54">Nama</td>
            <td width="8">:</td>
            <td width="276"><label>
              <input type="text" name="pe_nama" id="pe_nama" size="40" readonly="readonly" maxlength="100" />
            </label></td>
            <td width="89">&nbsp;</td>
            <td width="62">Flight ID</td>
            <td width="6">:</td>
            <td width="465"><input type="text" name="fid" id="fid" readonly="readonly"/></td>
          </tr>
        </table>
       <center> <table width="986" border="0">
          <tr class="theader">
            <td width="17">bil</td>
            <td width="80">Hole</td>
            <td width="99">Index</td>
            <td width="146">Par</td>
            <td width="150">Markah</td>
            <td width="150">H'cap</td>
            <td width="152">markah </td>
            <td width="118">Point</td>
          </tr>
          <tr width="55%">
            <td height="542" colspan="8"><div class="listboxs" style="height:540px; width:800px ">
            <!--
              <table width="630" border="0" cellpadding="1" cellspacing="1" id="TableC2" style="width: 80px ; font-size: 11px;">
      
                <tr width="502" class="listoff">
                  <td width="17"><?php// echo $i+1;?></td>
                  <td width="80"><input name="hole" type="text" size="9" id="hole" readonly="readonly" /></td>
                  <td width="99"><input name="indeks" type="text" size="9" id="indeks" readonly="readonly" /></td>
                  <td width="149"><input name="par" type="text" size="9" id="par" readonly="readonly" /></td>
                  <td width="150"><input name="mark" type="text" size="9" id="mark" value="" /></td>
                  <td width="150"><input name="hcap" type="text" size="8.8" id="hcap" value=""  readonly="readonly" /></td>
                  <td width="152"><input name="mshcap" type="text" size="8" id="mshcap" value=""  readonly="readonly"/></td>
                  <td width="118"><input name="point" type="text" size="5" id="point" value=""  readonly="readonly"/></td>
                </tr>
         
              </table>
              -->
              <div id="testtt">
              </div>
              <p>&nbsp;</p>
            </div></td>
          </tr>
        </table>
          <table width="997" border="0">
           <tr>
             <td width="794"><input type="hidden" name="hidNew" value="" />
              <input type="hidden" name="hidSave" value="" /></td>
             <td width="193"><input type="submit" class="button" name="btnkosong" id="btnkosong" value="Reset" style="width:90px; text-align:center;" onclick="NewRekod()"/>
               <input type="submit" class="button" name="btnsimpan" id="btnsimpan" value="Simpan" style="width:90px; text-align:center;" onclick="return Simpan()"/></td>
            </tr>
         </table>
        </center>
    </form>
	</td>
</tr>
</table>
<?php if ($msginfo != "")
	{ 
?>
		<script>		
			alert('<?php echo $msginfo?>')
		</script>
<?php 
	} 
?>
</body>
</html>