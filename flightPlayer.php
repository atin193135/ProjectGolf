<?php 
	include 'dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Kejohanan Golf Antara IPTA 2014</title>
	<link rel="stylesheet" href="golf750.css" type="text/css">

	<script type="text/javascript">
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
			if ((document.frmFlight.cmbKat.value == "") || (document.frmFlight.cmbKat.value == "-"))
			{
				alert("Sila pilih 'Kategori Permainan'.");
				document.frmFlight.cmbKat.focus();
				return false;
			}
		
			if ((document.frmFlight.cmbDay.value == "") || (document.frmFlight.cmbDay.value == "-"))
			{
				alert("Sila pilih 'Agihan Untuk'.");
				document.frmFlight.cmbDay.focus();
				return false;
			}
			
			if ((document.frmFlight.txtJumP.value == "") || (document.frmFlight.txtJumP.value == "0"))
			{
				alert("Tiada pemain yang berdaftar di bawah kategori ini");
				document.frmFlight.txtJumP.focus();
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

		function HapusRekod()
		{
			if ((document.frmFlight.cmbKat.value == "") || (document.frmFlight.cmbKat.value == "-"))
			{
				return false;
			}
		
			if ((document.frmFlight.cmbDay.value == "") || (document.frmFlight.cmbDay.value == "-"))
			{
				return false;
			}
			
			if ((document.frmFlight.txtJumP.value == "") || (document.frmFlight.txtJumP.value == "0"))
			{
				return false;
			}

			if (confirm("Adakah anda ingin menghapuskan data-data yang telah diproses ? "))
			{
				document.frmFlight.hidDelete.value = "delete";
				document.frmFlight.hidSave.value = "";
				document.frmFlight.submit();
				return true;
			}
		}

	</script>
</head>
<?php
	$StaSave="";
	$StaDelete="";
	$StaNew="";
	$msginfo="";
	$kat_id = "";
	$jum_p =0;
	$jum_f =0;
	$day="";

	if(isset($_POST['hidSave'])){ $StaSave = $_POST['hidSave']; };
	if(isset($_POST['hidDelete'])){ $StaDelete = $_POST['hidDelete']; };
	if(isset($_POST['hidNew'])){ $StaNew = $_POST['hidNew']; };
	
	if ($StaNew == "")
	{
		if(isset($_POST['cmbKat'])){ $kat_id = $_POST['cmbKat']; };
		if(isset($_POST['cmbDay'])){ $day = $_POST['cmbDay']; };
	}

	if ($kat_id !='')
	{
		$rs = mydb ("SELECT count(PE_ID) as Bil FROM Pemain WHERE Kat_ID='$kat_id'");
		$objResult = odbc_fetch_ array($rs);  
		if($objResult)
		{
			$jum_p = $objResult["Bil"];
			$jum_f = ceil($jum_p / 4);
		}
	}
	
	Simpan();
	Hapus();

	function Simpan()
	{
		global $day, $jum_f, $jum_p, $StaSave, $kat_id, $msginfo;
		
		$flightid="";
		$range_P1="";
		$range_P2="";
		$range_P3="";
		$range_P4="";
		$start="";
		$end="";
		$kat_acm="";

		//Get Kat_Acm
		$rs = mydb ("SELECT Kat_Acm FROM Kategori WHERE Kat_ID='$kat_id'");
		$objResult = odbc_fetch_array($rs);  
		if($objResult)
		{
			$kat_acm=$objResult["Kat_Acm"];
		}

		if ($StaSave =="save")
		{			
			if ($day == "D1")
			{
				//Delete data sedia ada 
				$rs = mydb ("Delete From Day_1");

				//Insert data Flight_ID
				for ($i=1; $i<=$jum_f; $i++)
				{
					$flightid=$day.$kat_acm.'F'.str_pad($i, 2, '0', STR_PAD_LEFT);
					$rs1 = mydb ("INSERT INTO Day_1 (F_ID, Kat_ID) VALUES ('$flightid', '$kat_id')");
				}
				
				for ($m=1; $m<=4; $m++)
				{
					if ($m==1)
					{
						$start=1;
						$end=$jum_f;
					}
					elseif ($m==2)
					{
						$start =$end+1;
						$end = $jum_f*2;
					}
					elseif ($m==3)
					{
						$start =$end+1;
						$end =  $jum_f*3;

					}
					elseif ($m=4)
					{
						$start =$end+1;
						$end = $jum_p;
					}
					
					$k=1;			
					for ($i=$start; $i<=$end; $i++)
					{
						if ($m==1)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_1 
										SET P1=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID, PE_ID) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==2)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_1 
										SET P2=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID, PE_ID) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==3)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_1 
										SET P3=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID, PE_ID) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==4)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_1 
										SET P4=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID, PE_ID) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'													
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						if ($i==$end) 
							$k=1; 
					}
				}
				$msginfo="Proses Penentuan Flight Pemain telah dilaksanakan dan rekod telah disimpan ke dalam pangkalan data";	
			}
			elseif ($day == "D2")
			{
				//Delete data sedia ada 
				$rs = mydb ("Delete From Day_2");

				//Insert data Flight_ID
				for ($i=1; $i<=$jum_f; $i++)
				{
					$flightid=$day.$kat_acm.'F'.str_pad($i, 2, '0', STR_PAD_LEFT);
					$rs1 = mydb ("INSERT INTO Day_2 (F_ID, Kat_ID) VALUES ('$flightid', '$kat_id')");
				}

				for ($m=1; $m<=4; $m++)
				{
					if ($m==1)
					{
						$start=1;
						$end=$jum_f;
					}
					elseif ($m==2)
					{
						$start =$end+1;
						$end = $jum_f*2;
					}
					elseif ($m==3)
					{
						$start =$end+1;
						$end =  $jum_f*3;

					}
					elseif ($m=4)
					{
						$start =$end+1;
						$end = $jum_p;
					}
					
					$k=1;			
					for ($i=$start; $i<=$end; $i++)
					{
						if ($m==1)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_2
										SET P1=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID DESC, PE_Nama) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==2)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_2
										SET P2=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID DESC, PE_Nama) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==3)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_2 
										SET P3=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID DESC, PE_Nama) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						elseif ($m==4)
						{						
							$flightid=$day.$kat_acm.'F'.str_pad($k, 2, '0', STR_PAD_LEFT);
							$rs = mydb("UPDATE Day_2 
										SET P4=(SELECT tbl.PE_ID
												FROM 
												(
													SELECT PE_ID,
													ROW_NUMBER() OVER ( ORDER BY Ipt_ID DESC, PE_Nama) 'rownum'
													FROM Pemain
													WHERE Kat_ID='$kat_id'													
												) tbl
												 WHERE rownum='$i')
										WHERE F_ID ='$flightid'");
							$k++;
						}
						if ($i==$end) 
							$k=1; 
					}
				}
				$msginfo="Proses Penentuan Flight Pemain telah dilaksanakan dan rekod telah disimpan ke dalam pangkalan data";	
			}
		}
	}

	function Hapus()
	{
		global $StaDelete, $day, $msginfo, $kat_id, $jum_p, $jum_f;

		if ($StaDelete =="delete")
		{
			if ($day == "D1")
				$rs1 = mydb("Delete FROM Day_1 WHERE Kat_ID='$kat_id'");
			elseif ($day == "D2")
				$rs1 = mydb("Delete FROM Day_2 WHERE Kat_ID='$kat_id'");

			$msginfo="Rekod telah dihapuskan dari pangkalan data";

			$StaDelete="";
			//$msginfo="";
			$kat_id = "";
			$jum_p =0;
			$jum_f =0;
			$day="";

		}
	}

	
?>

<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
<tr>
    <td>
    <form name="frmFlight" id="frmFlight" action ="flightPlayer.php" method="post">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        <table width="100%" id="Main" align="center">
            <tr>
                <td width="90%" align="left" style="font-size:17px"><strong>Penentuan 'Flight' Pemain</strong></strong></td>
              	<td width="10%" align="left" style="font-size:17px"><a href="menuUtiliti.php"><img src="image/menu utama.jpg" width="120" height="35" align="right" /></a></td>
            </tr>
            <tr>
                <td colspan="2" >
					<font color="#FF0000" style="font-size:10pt">Kenyataan :<br />
					1. Ruangan bertanda (*) adalah ruangan wajib diisi
					</font>
				</td>
            </tr>
            <tr>
              	<td colspan="2" >&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <table width="100%" id="TableA" border="0">
					<tr>
                        <td>Kategori Permainan</td>
						<td>:</td>
						<td>
                            <select name="cmbKat" id="cmbKat" style="width:150px" onchange="PaparInfo()">
                                <option value="">Sila pilih</option>
								<?php
                                    $i=0;
                                    $rs = mydb ("SELECT * FROM Kategori ORDER BY Kat_ID");
                                    $objResult = odbc_fetch_array($rs);  
                                    while($objResult)
                                    {
										if($kat_id == $objResult['Kat_ID'])
										{ ?>
											<option value="<?php echo $objResult['Kat_ID'];?>" selected="selected" ><?php echo $objResult['Kat_Nama'];?></option>
										  <?php 
										}
										else
										{ ?>
											<option value="<?php echo $objResult['Kat_ID'];?>"  ><?php echo $objResult['Kat_Nama'];?></option>
										  <?php 
										}										
                                    $objResult = odbc_fetch_array($rs);
                                    $i++;
                                    }
                                ?>
                            </select>
						</td>
						<td>Agihan Untuk</td>
						<td>:</td>
						<td>
                            <select name="cmbDay" id="cmbDay"style="width:80px" onchange="PaparInfo()">
                                <option value="" >Sila pilih</option>
                                <option value="D1" <?php if ($day=="D1") {?> selected="selected" <?php } else ?> " ">Hari 1</option>
                                <option value="D2" <?php if ($day=="D2") {?> selected="selected" <?php } else ?> " ">Hari 2</option>
                            </select>												
						</td>
					</tr>
					<tr>
                        <td width="18%">Pemain Berdaftar</span></td>
                        <td width="2%">:</td>
                        <td width="30%">
                            <input type="text" name="txtJumP" id="txtJumP" size="10" style="width:50px;" readonly="readonly" value="<?php echo $jum_p;?>"/> orang
                        </td>
                        <td width="18%">Jumlah 'Flight'</td>
                        <td width="2%">:</td>
                        <td width="30%">
                            <input type="text" name="txtJumF" id="txtJumF" size="10" style="width:50px;" readonly="readonly" value="<?php echo $jum_f;?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">&nbsp;</td>
					</tr>
                    <tr>
                        <td colspan="6" align="right">
                            <input type="hidden" name="hidNew" value=""> 
                            <input type="hidden" name="hidSave" value=""> 
                            <input type="hidden" name="hidDelete" value=""> 
        
                            <input type="submit" class="button" name="btnkosong" id="btnkosong" value="Rekod Baru" style="width:90px; text-align:center;" onclick="NewRekod()"/>
                            <input type="submit" class="button" name="btnsimpan" id="btnsimpan" value="Proses" style="width:90px; text-align:center;" onClick="return SimpanRekod()"/>
                            <input type="submit" class="button" name="btnhapus" id="btnhapus" value="Batal Proses" style="width:90px; text-align:center;" onclick="return HapusRekod()"/>
                        </td>
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
							<div class=listbox style="height:400px">
								<table id="TableC" border="0" cellspacing="0" cellpadding="1" style="width: 100%; font-size: 11px;">
								<?php
                                    $i=0;
									if ($day=="D1")
                                    	$rs = mydb ("SELECT A.F_ID, A.P1, B.PE_Nama AS P1_Nama, B.Ipt_ID AS P1_IPT, 
													A.P2, C.PE_Nama AS P2_Nama, C.Ipt_ID AS P2_IPT, 
													A.P3, D.PE_Nama AS P3_Nama, D.Ipt_ID AS P3_IPT, 
													A.P4, E.PE_Nama AS P4_Nama, E.Ipt_ID AS P4_IPT
													FROM Day_1 A
													LEFT JOIN Pemain B ON A.P1=B.PE_ID
													LEFT JOIN Pemain C ON A.P2=C.PE_ID
													LEFT JOIN Pemain D ON A.P3=D.PE_ID
													LEFT JOIN Pemain E ON A.P4=E.PE_ID
													WHERE A.Kat_ID='$kat_id'");
									elseif ($day=="D2")
                                    	$rs = mydb ("SELECT A.F_ID, A.P1, B.PE_Nama AS P1_Nama, B.Ipt_ID AS P1_IPT, 
													A.P2, C.PE_Nama AS P2_Nama, C.Ipt_ID AS P2_IPT, 
													A.P3, D.PE_Nama AS P3_Nama, D.Ipt_ID AS P3_IPT, 
													A.P4, E.PE_Nama AS P4_Nama, E.Ipt_ID AS P4_IPT
													FROM Day_2 A
													LEFT JOIN Pemain B ON A.P1=B.PE_ID
													LEFT JOIN Pemain C ON A.P2=C.PE_ID
													LEFT JOIN Pemain D ON A.P3=D.PE_ID
													LEFT JOIN Pemain E ON A.P4=E.PE_ID
													WHERE A.Kat_ID='$kat_id'");

                                    $objResult = odbc_fetch_array($rs);  
                                    while($objResult)
                                    {
										if ($i%2==0)
										{
                                ?>
                                            <tr class="listoff" style="background-color:#FFF">
                                                <td width="10%" valign="middle"><?php echo $objResult["F_ID"];?></td>
                                                <td width="22%" ><?php echo $objResult["P1"]."<br>".$objResult["P1_Nama"]."<br>(".$objResult["P1_IPT"].")";?></td>
                                                <td width="22%" ><?php echo $objResult["P2"]."<br>".$objResult["P2_Nama"]."<br>(".$objResult["P2_IPT"].")";?></td>
                                                <td width="22%" ><?php echo $objResult["P3"]."<br>".$objResult["P3_Nama"]."<br>(".$objResult["P3_IPT"].")";?></td>
                                                <td width="22%" ><?php if ($objResult["P4"]!="") { echo $objResult["P4"]."<br>".$objResult["P4_Nama"]."<br>(".$objResult["P4_IPT"].")"; } else echo "";?></td>
                                            </tr>
                                <?php
										}
										else
										{
								?>
                                            <tr class="listoff" style="background-color:#D5FF80">
                                                <td width="10%" valign="middle"><?php echo $objResult["F_ID"];?></td>
                                                <td width="22%" ><?php echo $objResult["P1"]."<br>".$objResult["P1_Nama"]."<br>(".$objResult["P1_IPT"].")";?></td>
                                                <td width="22%" ><?php echo $objResult["P2"]."<br>".$objResult["P2_Nama"]."<br>(".$objResult["P2_IPT"].")";?></td>
                                                <td width="22%" ><?php echo $objResult["P3"]."<br>".$objResult["P3_Nama"]."<br>(".$objResult["P3_IPT"].")";?></td>
                                                <td width="22%" ><?php if ($objResult["P4"]!="") { echo $objResult["P4"]."<br>".$objResult["P4_Nama"]."<br>(".$objResult["P4_IPT"].")"; } else echo "";?></td>
                                            </tr>
								<?php
										}
                                    $objResult = odbc_fetch_array($rs);
                                    $i++;
                                    }
                                ?>
								</table>
							</div>
						</td>
					</tr>
					</table>
				</td>
			</tr>
		</table>
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