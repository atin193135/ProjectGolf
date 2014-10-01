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
	
		function PaparInfo(InfoInd, id) 
		{
			
			document.frmDaftarVIP.ftxtIC.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;	
			document.frmDaftarVIP.ftxtNama.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
			document.frmDaftarVIP.fcmbSaiz.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;	
			document.frmDaftarVIP.ftxtNotel.value = document.getElementById(id).rows[InfoInd].cells[5].innerHTML;
			document.frmDaftarVIP.hidKategori.value = document.getElementById(id).rows[InfoInd].cells[6].innerHTML;	
			document.frmDaftarVIP.ftxtEmel.value = document.getElementById(id).rows[InfoInd].cells[8].innerHTML;	
			document.frmDaftarVIP.ftxtGelaran.value = document.getElementById(id).rows[InfoInd].cells[9].innerHTML;		
			document.frmDaftarVIP.fjantina.value = document.getElementById(id).rows[InfoInd].cells[10].innerHTML;	
				
			document.frmDaftarVIP.hidIC.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;	
			document.frmDaftarVIP.hidSave.value="update";
		}	

		function NewRekod()
		{
			document.frmDaftarVIP.hidNew.value = "new";
			document.frmDaftarVIP.hidSave.value = "";	
			
			document.frmDaftarVIP.submit();
			return true;	
		}

		function SimpanRekod()
		{	
			if ((document.frmDaftarVIP.ftxtNama.value == "") || (document.frmDaftarVIP.ftxtNama.value == "-"))
			{
				alert("Sila pastikan ruangan 'Nama' tidak dibiarkan kosong.");
				document.frmDaftarVIP.ftxtNama.focus();
				return false;
			}
		
			if ((document.frmDaftarVIP.fcmbSaiz.value == "") || (document.frmDaftarVIP.fcmbSaiz.value == "-"))
			{
				alert("Sila pastikan ruangan 'Saiz Baju' tidak dibiarkan kosong.");
				document.frmDaftarVIP.fcmbSaiz.focus();
				return false;
			}
			
			if ((document.frmDaftarVIP.ftxtIC.value == "") || (document.frmDaftarVIP.ftxtIC.value == "-"))
			{
				alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
				document.frmDaftarVIP.ftxtIC.focus();
				return false;
			}

			if ((document.frmDaftarVIP.ftxtNotel.value == "") || (document.frmDaftarVIP.ftxtNotel.value == "-"))
			{
				alert("Sila pastikan ruangan 'No. Tel. Bimbit' tidak dibiarkan kosong.");
				document.frmDaftarVIP.ftxtNotel.focus();
				return false;
			}
			
			if ((document.frmDaftarVIP.ftxtEmel.value == "") || (document.frmDaftarVIP.ftxtEmel.value == "-"))
			{
				alert("Sila pastikan ruangan 'Emel' tidak dibiarkan kosong.");
				document.frmDaftarVIP.ftxtEmel.focus();
				return false;
			}


			
			if (document.frmDaftarVIP.hidSave.value == "" )
			{			
				document.frmDaftarVIP.hidSave.value = "save";
				document.frmDaftarVIP.submit();
				return true;
			}
			else
			{
				document.frmDaftarVIP.hidSave.value = "update";
				document.frmDaftarVIP.submit();
				return true;
			}
			return true;		

		}

		function HapusRekod()
		{
			if (document.frmDaftarVIP.hidSave.value != "" )
			{
				if (confirm("Adakah anda ingin menghapus rekod berikut ? "))
				{
					document.frmDaftarVIP.hidDelete.value = "delete";
					document.frmDaftarVIP.hidSave.value = "";
					document.frmDaftarVIP.submit();
					return true;
				}
			}
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
</head>

<?php
	$StaSave="";
	$StaDelete="";
	$StaNew="";
	$hidIc="";
	$msginfo="";

	Clearfield();

	if(isset($_POST['hidSave'])){ $StaSave = $_POST['hidSave']; };
	if(isset($_POST['hidDelete'])){ $StaDelete = $_POST['hidDelete']; };
	if(isset($_POST['hidNew'])){ $StaNew = $_POST['hidNew']; };

	if(isset($_POST['ftxtNama'])){ $nama = $_POST['ftxtNama']; };
	if(isset($_POST['fjantina'])){ $jantina = $_POST['fjantina']; }
	if(isset($_POST['ftxtGelaran'])){ $gelaran = $_POST['ftxtGelaran']; };
	if(isset($_POST['fcmbSaiz'])){ $saiz = $_POST['fcmbSaiz']; };
	if(isset($_POST['ftxtIC'])){ $ic = $_POST['ftxtIC']; };
	if(isset($_POST['ftxtNotel'])){ $nohp = $_POST['ftxtNotel']; };
	if(isset($_POST['ftxtEmel'])){ $emel = $_POST['ftxtEmel']; };
	if(isset($_POST['hidKategori'])){ $kat = $_POST['hidKategori']; };

	if(isset($_POST['hidIC'])){ $hidIc = $_POST['hidIC']; };
	
	Simpan();
	Hapus();
	Clearfield();
	
	
	function Clearfield()
	{
		$nama="";
		$jantina="";
		$gelaran="";
		$saiz="";
		$ic="";
		$nohp="";
		$emel="";
		$jawatan="";
		$mulakhidmat="";
		$nostaf="";
		$nopej="";
		$stajaw="";
		$nofaks="";
		$kelab="";
		$handicap="";
		$nonhs="";
		$kat="";
	}

	function Simpan()
	{
		global $StaSave, $msginfo, $hidIc;
		global $nama,	$jantina, $gelaran, $saiz, $ic, $nohp, $emel;
		global $jawatan, $mulakhidmat, $nostaf, $nopej, $stajaw, $nofaks;
		global $kelab, $handicap, $nonhs, $kat;

		if ($StaSave =="save")
		{
			$rs = mydb ("SELECT PE_ID FROM Pemain WHERE PE_ID='$ic'");
			$objResult = odbc_fetch_array($rs);  
			if($objResult)//Rekod Wujud  
			{
				$msginfo="Rekod telah wujud di dalam pangkalan data";
			}
			else
			{
				$rs1 = mydb ("INSERT INTO PEMAIN (PE_Nama, PE_Gelaran, PE_ID, PE_Email, PE_NoHp, PE_Jantina, PE_SaizBaju, PE_Jawatan, PE_NoStaf,
								PE_StatusJwt, PE_TkhMulaKhidmat, PE_NoPej, PE_NoFax, PE_NHSClub, PE_NoNHS, PE_Handicap, Kat_ID)
							VALUES('$nama', '$gelaran', '$ic', '$emel', '$nohp', '$jantina', '$saiz', '$jawatan', '$nostaf',
								'$stajaw','$mulakhidmat','$nopej','$nofaks','$kelab','$nonhs','$handicap', '$kat')");

				$msginfo="Rekod telah disimpan ke dalam pangkalan data";
			}
		}
		elseif ($StaSave =="update")
		{			
			$rs = mydb ("SELECT PE_ID FROM Pemain WHERE PE_ID='$hidIc'");
			$objResult = odbc_fetch_array($rs);  
			if($objResult)
			{  		
					$rs2 = mydb ("UPDATE Pemain 
								  SET PE_Nama = '$nama', PE_Gelaran = '$gelaran', PE_ID = '$ic', PE_Email = '$emel', PE_NoHp = '$nohp', 
									  PE_Jantina = '$jantina', PE_SaizBaju = '$saiz', PE_Jawatan = '$jawatan', PE_NoStaf = '$nostaf',
									  PE_StatusJwt = '$stajaw', PE_TkhMulaKhidmat = '$mulakhidmat', PE_NoPej = '$nopej', 
									  PE_NoFax = '$nofaks', PE_NHSClub = '$kelab', PE_NoNHS = '$nonhs', PE_Handicap = '$handicap', Kat_ID = '$kat'
								  WHERE PE_ID='$hidIc'");
					$msginfo="Rekod telah dikemaskini ke dalam pangkalan data";
				
			}
		}
	}
	
	function Hapus()
	{
		global $StaDelete, $msginfo, $hidIc;

		if ($StaDelete =="delete")
		{
			$rs1 = mydb("Delete FROM Pemain WHERE PE_ID='$hidIc'");
			$msginfo = "Rekod telah dihapuskan dari pangkalan data";
		}
	}

?>


<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
<tr>
    <td>
    <form name="frmDaftarVIP" id="frmDaftarVIP" action ="dftrPemain_VIP.php" method="post">
        <table width="100%" id="TableHeader" border="0">
        <tr>
            <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
        </tr>
		</table>
        <table width="100%" id="Main" align="center">
            <tr>
                <td>
                    <font color="#FF0000" style="font-size:10pt">
                    Kenyataan :<br>
                    1. Ruangan bertanda (*) adalah ruangan wajib diisi<br>
                    </font>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" id="TableA" border="0">
                    <tr>
                        <td colspan="6"><strong><u>Maklumat Peribadi</u></strong></td>
                    </tr>
					<tr>
						<td width="14%">Nama <font color="#FF0000">*</font></td>
						<td width="1%">:</td>
						<td width="45%">
                            <input type="text" name="ftxtNama" id="ftxtNama" maxlength="60" style="width:400px;">
						</td>
						<td width="14%">Jantina <font color="#FF0000">*</font></td>
						<td width="1%">:</td>
						<td width="25%">
                            <input type="radio" name="fjantina" id="fjantina" value="L" checked="checked"/>LELAKI
                            <input type="radio" name="fjantina" id="fjantina" value="P" />PEREMPUAN
						</td>
					</tr>
					<tr>
						<td>Gelaran</td>
						<td>:</td>
						<td>
							<input type="text" name="ftxtGelaran" id="ftxtGelaran" maxlength="50" style="width:200px;">
						</td>
						<td>Saiz Baju <font color="#FF0000">*</font></td>
						<td>:</td>
						<td>
                            <select name="fcmbSaiz" id="fcmbSaiz"style="width:80px">
                                <option value="" >Sila pilih</option>
                                <option value="S" >S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                                <option value="4XL">4XL</option>
                            </select>					
						</td>
					</tr>
					<tr>
						<td>No. Pengenalan <font color="#FF0000">*</font></td>
						<td>:</td>
						<td>
							<input type="text" name="ftxtIC" id="ftxtIC" maxlength="20" style="width:150px;" >
                            <input type="hidden" name="mm" id="mm"  value=""/>
							<em>(No. KP / No. KP Tentera / No. Passport)</em>
						</td>
						<td>No. Tel. Bimbit <font color="#FF0000">*</font></td>
						<td>:</td>
						<td>
							<input type="text" name="ftxtNotel" id="ftxtNotel" maxlength="20" style="width:120px;" onkeypress="return numeric_only(event);">
						</td>
					</tr>
                    <tr>
                        <td>Emel <font color="#FF0000">*</font></td>
                        <td></td>
                        <td>
							<input type="text" name="ftxtEmel" id="ftxtEmel" maxlength="100" style="width:400px;">
						</td>
                        <td>Kategori Permainan <font color="#FF0000">*</font></td>
						<td>:</td>
						<td><label>
                          <input name="fKategori" type="text" id="fKategori" value="VIP" readonly="readonly"/> <input type="hidden" name="hidKategori" id="hidKategori" value="04"/>

                        </label></td>
                    </tr>
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">
                            <input type="hidden" name="hidNew" value=""> 
                            <input type="hidden" name="hidSave" value=""> 
                            <input type="hidden" name="hidDelete" value=""> 
                            <input type="hidden" name="hidIC" value="">

                            <input type="submit" class="button" name="btnkosong" id="btnkosong" value="Rekod Baru" style="width:90px; text-align:center;" onclick="NewRekod()"/>
							<input type="submit" class="button" name="btnsimpan" id="btnsimpan" value="Simpan" style="width:90px; text-align:center;" onClick="return SimpanRekod()"/>
                            <input type="submit" class="button" name="btnhapus" id="btnhapus" value="Hapus" style="width:90px; text-align:center;" onclick="return HapusRekod()"/>
                        </td>
                    </tr>      
                    </table> 
                    <table width="100%" id="TableB" border="0">
               	  	<tr class="theader">
                        <td width="5%">Bil</td>
                        <td width="15%" align="center">No Kad Pengenalan</td>
                        <td width="33%" align="center">Nama</td>
                        <td width="10%" align="center">Jantina</td>
                        <td width="10%" align="center">Saiz Baju</td>
                        <td width="10%" align="center">No. Tel Bimbit</td>					
                        <td width="15%" align="center">Kategori</td>
						<td width="2%">&nbsp;</td>
                    </tr>
					<tr>
						<td colspan="8">
							<div class=listbox style="height:200">
								<table id="TableC" border="0" cellspacing="1" cellpadding="1" style="width: 100%; font-size: 11px;">
								<?php
                                    $i=0;
                                    $rs = mydb ("SELECT * FROM PEMAIN A
                                                INNER JOIN Kategori B ON A.Kat_ID = B.Kat_ID
												WHERE A.Kat_ID IN ('04')
												ORDER BY A.Kat_ID, A.PE_Nama");
                                    $objResult = odbc_fetch_array($rs);  
                                    while($objResult)
                                    {
                                ?>
                                    <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" onClick="PaparInfo(<?php echo $i;?>,'TableC')">
                                        <td width="5%"><?php echo $i+1;?></td>
                                        <td width="15%"><?php echo $objResult["PE_ID"];?></td>
                                        <td width="33%"><?php echo $objResult["PE_Nama"];?></td>
                                        <td width="10%">
											<?php 
												if ($objResult["PE_Jantina"]=="L")
												{
													echo 'LELAKI';
												}
												elseif ($objResult["PE_Jantina"]=="P")
												{
													echo 'PEREMPUAN';
												}
							
											?>

										</td>
                                        <td width="10%"><?php echo $objResult["PE_SaizBaju"];?></td>
                                        <td width="10%"><?php echo $objResult["PE_NoHp"];?></td>
                                        <td style="display:none"><?php echo $objResult["Kat_ID"];?></td>
                                        <td width="15%"><?php echo $objResult["Kat_Nama"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_Email"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_Gelaran"];?></td>
										<td style="display:none"><?php echo $objResult["PE_Jantina"];?></td>
                                    </tr>
           
                                    
                                    
                                <?php
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