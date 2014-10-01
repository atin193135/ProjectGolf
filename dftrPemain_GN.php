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
			
			document.frmDaftar_N_G.ftxtIC.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;			
			document.frmDaftar_N_G.ftxtNama.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;
			document.frmDaftar_N_G.fcmbSaiz.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;	
			document.frmDaftar_N_G.ftxtNotel.value = document.getElementById(id).rows[InfoInd].cells[5].innerHTML;
			document.frmDaftar_N_G.cmbkategori.value = document.getElementById(id).rows[InfoInd].cells[6].innerHTML;	
			document.frmDaftar_N_G.ftxtEmel.value = document.getElementById(id).rows[InfoInd].cells[8].innerHTML;	
			document.frmDaftar_N_G.ftxtGelaran.value = document.getElementById(id).rows[InfoInd].cells[9].innerHTML;	
			document.frmDaftar_N_G.ftxtJawatan.value = document.getElementById(id).rows[InfoInd].cells[10].innerHTML;	
			document.frmDaftar_N_G.ftxtNoStaff.value = document.getElementById(id).rows[InfoInd].cells[11].innerHTML;	
			document.frmDaftar_N_G.fstatus.value = document.getElementById(id).rows[InfoInd].cells[12].innerHTML;	
			document.frmDaftar_N_G.ftxtMulaKhidmat.value = document.getElementById(id).rows[InfoInd].cells[13].innerHTML;				
			document.frmDaftar_N_G.ftxtNoTelPej.value = document.getElementById(id).rows[InfoInd].cells[14].innerHTML;	
			document.frmDaftar_N_G.ftxtNoFaks.value = document.getElementById(id).rows[InfoInd].cells[15].innerHTML;	
			document.frmDaftar_N_G.ftxtNamaKelab.value = document.getElementById(id).rows[InfoInd].cells[16].innerHTML;	
			document.frmDaftar_N_G.ftxtNoNHS.value = document.getElementById(id).rows[InfoInd].cells[17].innerHTML;	
			document.frmDaftar_N_G.fcmbHandicap.value = document.getElementById(id).rows[InfoInd].cells[18].innerHTML;	
			document.frmDaftar_N_G.fjantina.value = document.getElementById(id).rows[InfoInd].cells[19].innerHTML;	
				
			document.frmDaftar_N_G.hidIC.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;	
			document.frmDaftar_N_G.hidSave.value="update";
		}	

		function NewRekod()
		{
			document.frmDaftar_N_G.hidNew.value = "new";
			document.frmDaftar_N_G.hidSave.value = "";	
			
			document.frmDaftar_N_G.submit();
			return true;	
		}

		function SimpanRekod()
		{	
			if ((document.frmDaftar_N_G.ftxtNama.value == "") || (document.frmDaftar_N_G.ftxtNama.value == "-"))
			{
				alert("Sila pastikan ruangan 'Nama' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.ftxtNama.focus();
				return false;
			}
		
			if ((document.frmDaftar_N_G.fcmbSaiz.value == "") || (document.frmDaftar_N_G.fcmbSaiz.value == "-"))
			{
				alert("Sila pastikan ruangan 'Saiz Baju' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.fcmbSaiz.focus();
				return false;
			}
			
			if ((document.frmDaftar_N_G.ftxtIC.value == "") || (document.frmDaftar_N_G.ftxtIC.value == "-"))
			{
				alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.ftxtIC.focus();
				return false;
			}

			if ((document.frmDaftar_N_G.ftxtNotel.value == "") || (document.frmDaftar_N_G.ftxtNotel.value == "-"))
			{
				alert("Sila pastikan ruangan 'No. Tel. Bimbit' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.ftxtNotel.focus();
				return false;
			}
			
			if ((document.frmDaftar_N_G.ftxtEmel.value == "") || (document.frmDaftar_N_G.ftxtEmel.value == "-"))
			{
				alert("Sila pastikan ruangan 'Emel' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.ftxtEmel.focus();
				return false;
			}

			if ((document.frmDaftar_N_G.cmbkategori.value == "") || (document.frmDaftar_N_G.cmbkategori.value == "-"))
			{
				alert("Sila pastikan ruangan 'Kategori Permainan' tidak dibiarkan kosong.");
				document.frmDaftar_N_G.cmbkategori.focus();
				return false;
			}
			
			if (document.frmDaftar_N_G.cmbkategori.value == "02") 
			{
				if ((document.frmDaftar_N_G.ftxtNamaKelab.value == "") || (document.frmDaftar_N_G.ftxtNamaKelab.value == "-"))
				{
					alert("Sila pastikan ruangan 'Nama Kelab NHS' tidak dibiarkan kosong.");
					document.frmDaftar_N_G.ftxtNamaKelab.focus();
					return false;
				}

				if ((document.frmDaftar_N_G.ftxtNoNHS.value == "") || (document.frmDaftar_N_G.ftxtNoNHS.value == "-"))
				{
					alert("Sila pastikan ruangan 'No. NHS' tidak dibiarkan kosong.");
					document.frmDaftar_N_G.ftxtNoNHS.focus();
					return false;
				}

				if ((document.frmDaftar_N_G.fcmbHandicap.value == "") || (document.frmDaftar_N_G.fcmbHandicap.value == "-"))
				{
					alert("Sila pastikan ruangan 'Handicap Semasa' tidak dibiarkan kosong.");
					document.frmDaftar_N_G.fcmbHandicap.focus();
					return false;
				}
			}
			
			if (document.frmDaftar_N_G.hidSave.value == "" )
			{			
				document.frmDaftar_N_G.hidSave.value = "save";
				document.frmDaftar_N_G.submit();
				return true;
			}
			else
			{
				document.frmDaftar_N_G.hidSave.value = "update";
				document.frmDaftar_N_G.submit();
				return true;
			}
			return true;		

		}

		function HapusRekod()
		{
			if (document.frmDaftar_N_G.hidSave.value != "" )
			{
				if (confirm("Adakah anda ingin menghapus rekod berikut ? "))
				{
					document.frmDaftar_N_G.hidDelete.value = "delete";
					document.frmDaftar_N_G.hidSave.value = "";
					document.frmDaftar_N_G.submit();
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
	if(isset($_POST['ftxtJawatan'])){ $jawatan = $_POST['ftxtJawatan']; };
	if(isset($_POST['ftxtMulaKhidmat'])){ $mulakhidmat = $_POST['ftxtMulaKhidmat']; };
	if(isset($_POST['ftxtNoStaff'])){ $nostaf = $_POST['ftxtNoStaff']; };
	if(isset($_POST['ftxtNoTelPej'])){ $nopej = $_POST['ftxtNoTelPej']; };
	if(isset($_POST['fstatus'])){ $stajaw = $_POST['fstatus']; }
	if(isset($_POST['ftxtNoFaks'])){ $nofaks = $_POST['ftxtNoFaks']; };
	if(isset($_POST['ftxtNamaKelab'])){ $kelab = $_POST['ftxtNamaKelab']; };
	if(isset($_POST['fcmbHandicap'])){ $handicap = $_POST['fcmbHandicap']; };
	if(isset($_POST['ftxtNoNHS'])){ $nonhs = $_POST['ftxtNoNHS']; };
	if(isset($_POST['cmbkategori'])){ $kat = $_POST['cmbkategori']; };

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
				$rs2 = mydb ("UPDATE PEMAIN 
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
    <form name="frmDaftar_N_G" id="frmDaftar_N_G" action ="dftrPemain_GN.php" method="post">
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
                    2. Ruangan bertanda (**) adalah ruangan wajib diisi untuk kategori Nett sahaja
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
                            <input type="radio" name="fjantina" id="fjantina" value="L" checked="checked "/>LELAKI
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
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtEmel" id="ftxtEmel" maxlength="100" style="width:400px;">
						</td>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="left"><strong><u>Maklumat Perjawatan </u></strong></td>
                    </tr>
                    <tr>
                        <td>Jawatan</td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtJawatan" id="ftxtJawatan" maxlength="50" style="width:350px;">
                        </td>
                        <td>Tarikh Mula Khidmat</td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtMulaKhidmat" id="ftxtMulaKhidmat" maxlength="11" style="width:150px;">
                            <img src="image/img.gif" alt="" />
                        </td>
                    </tr>
                    <tr>
                        <td>No. Staff</td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtNoStaff" id="ftxtNoStaff" maxlength="20" style="width:150px;">
                        </td>
                        <td>No. Tel. Pejabat</td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtNoTelPej" id="ftxtNoTelPej" maxlength="20" style="width:120px;" onkeypress="return numeric_only(event);">
                        </td>
                    </tr>
                    <tr>
                        <td>Status Jawatan</td>
                        <td>:</td>
                        <td>
                            <input name="fstatus" type="radio" id="fstatus" value="TETAP" checked="checked"/>TETAP
                            <input name="fstatus" type="radio" id="fstatus" value="KONTRAK" />KONTRAK 
						</td>
                        <td>No. Faks.</td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtNoFaks" id="ftxtNoFaks" maxlength="20" style="width:120px;" onkeypress="return numeric_only(event);">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="left"><strong><u>Maklumat Golf <em>(untuk kategori Nett sahaja)</em></u></strong></td>
                    </tr>
                    <tr>
                        <td>Nama Kelab NHS <font color="#FF0000">**</font></td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtNamaKelab" id="ftxtNamaKelab" maxlength="50" style="width:350px;">
						</td>
                        <td>Handicap Semasa <font color="#FF0000">**</font></td>
                        <td>:</td>
                        <td>
                            <select name="fcmbHandicap" id="fcmbHandicap" style="width:80px">
							<option value="">Sila pilih</option>
							<?php for ($i = 1; $i <= 24; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>No. NHS <font color="#FF0000">**</font></td>
                        <td>:</td>
                        <td>
							<input type="text" name="ftxtNoNHS" id="ftxtNoNHS" maxlength="30" style="width:200px;">
                        </td>
                        <td>Kategori Permainan <font color="#FF0000">*</font></td>
						<td>:</td>
						<td>
                            <select name="cmbkategori" id="cmbkategori" style="width:80px">
                            	<option value="">Sila pilih</option>
                                <option value="01">gross</option>
                            	<option value="02">nett</option>
                            </select>
                        </td>

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
												WHERE A.Kat_ID IN ('01','02')
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
                                        <td style="display:none"><?php echo $objResult["PE_Jawatan"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_NoStaf"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_StatusJwt"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_TkhMulaKhidmat"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_NoPej"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_NoFax"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_NHSClub"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_NoNHS"];?></td>
                                        <td style="display:none"><?php echo $objResult["PE_Handicap"];?></td>
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