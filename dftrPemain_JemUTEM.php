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
			
			document.frmDaftarJemputanUtem.ftxtNokp.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtNama.value = document.getElementById(id).rows[InfoInd].cells[2].innerHTML;			
			document.frmDaftarJemputanUtem.fcmbSaiz.value = document.getElementById(id).rows[InfoInd].cells[4].innerHTML;
			document.frmDaftarJemputanUtem.ftxtTel.value = document.getElementById(id).rows[InfoInd].cells[5].innerHTML;	
			document.frmDaftarJemputanUtem.hidKategori.value = document.getElementById(id).rows[InfoInd].cells[6].innerHTML;
			document.frmDaftarJemputanUtem.ftxtGelaran.value = document.getElementById(id).rows[InfoInd].cells[8].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtEmail.value = document.getElementById(id).rows[InfoInd].cells[9].innerHTML;				
			document.frmDaftarJemputanUtem.ftxtNamaSyarikat.value = document.getElementById(id).rows[InfoInd].cells[10].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtAlamatSyarikat.value = document.getElementById(id).rows[InfoInd].cells[11].innerHTML;
		
			document.frmDaftarJemputanUtem.ftxttelPej.value = document.getElementById(id).rows[InfoInd].cells[12].innerHTML;
			
			document.frmDaftarJemputanUtem.ftxtNoFaks.value = document.getElementById(id).rows[InfoInd].cells[13].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtKpPcdg.value = document.getElementById(id).rows[InfoInd].cells[14].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtNoStaffPcdg.value = document.getElementById(id).rows[InfoInd].cells[15].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtEmailPncdg.value = document.getElementById(id).rows[InfoInd].cells[16].innerHTML;
			document.frmDaftarJemputanUtem.ftxtNamaPcdg.value = document.getElementById(id).rows[InfoInd].cells[17].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtPtjPcdg.value = document.getElementById(id).rows[InfoInd].cells[18].innerHTML;	
			document.frmDaftarJemputanUtem.ftxtNoTelPcdg.value = document.getElementById(id).rows[InfoInd].cells[19].innerHTML;	
			document.frmDaftarJemputanUtem.fjantina.value = document.getElementById(id).rows[InfoInd].cells[20].innerHTML;	
			
			document.frmDaftarJemputanUtem.hidIC.value = document.getElementById(id).rows[InfoInd].cells[1].innerHTML;	
			document.frmDaftarJemputanUtem.hidSave.value="update";
		
		}	


function NewRekod()
		{
			document.frmDaftarJemputanUtem.hidNew.value = "new";
			document.frmDaftarJemputanUtem.hidSave.value = "";	
			
			document.frmDaftarJemputanUtem.submit();
			return true;	
		}

		function SimpanRekod()
		{	
			if ((document.frmDaftarJemputanUtem.ftxtNama.value == "") || (document.frmDaftarJemputanUtem.ftxtNama.value == "-"))
			{
				alert("Sila pastikan ruangan 'Nama' tidak dibiarkan kosong.");
				document.frmDaftarJemputanUtem.ftxtNama.focus();
				return false;
			}
		
			if ((document.frmDaftarJemputanUtem.fcmbSaiz.value == "") || (document.frmDaftarJemputanUtem.fcmbSaiz.value == "-"))
			{
				alert("Sila pastikan ruangan 'Saiz Baju' tidak dibiarkan kosong.");
				document.frmDaftarJemputanUtem.fcmbSaiz.focus();
				return false;
			}
			
			if ((document.frmDaftarJemputanUtem.ftxtNokp.value == "") || (document.frmDaftarJemputanUtem.ftxtNokp.value == "-"))
			{

				alert("Sila pastikan ruangan 'No. Pengenalan' tidak dibiarkan kosong.");
				document.frmDaftarJemputanUtem.ftxtNokp.focus();
				return false;
			}

			if ((document.frmDaftarJemputanUtem.ftxtTel.value == "") || (document.frmDaftarJemputanUtem.ftxtTel.value == "-"))
			{
				alert("Sila pastikan ruangan 'No. Tel. Bimbit' tidak dibiarkan kosong.");
				document.frmDaftarJemputanUtem.ftxtTel.focus();
				return false;
			}
			
			if ((document.frmDaftarJemputanUtem.ftxtEmail.value == "") || (document.frmDaftarJemputanUtem.ftxtEmail.value == "-"))
			{
				alert("Sila pastikan ruangan 'Emel' tidak dibiarkan kosong.");
				document.frmDaftarJemputanUtem.ftxtEmail.focus();
				return false;
			}
			
			if (frmDaftarJemputanUtem.hidSave.value == "" )
			{
				frmDaftarJemputanUtem.hidSave.value = "save";
				document.frmDaftarJemputanUtem.submit();
				return true;
			}
			else
			{
				frmDaftarJemputanUtem.hidSave.value = "update";
				document.frmDaftarJemputanUtem.submit();
				return true;
			}
			return true;		

		}

		function HapusRekod()
		{
			if (frmDaftarJemputanUtem.hidSave.value != "" )
			{
				if (confirm("Adakah anda ingin menghapus rekod berikut ? "))
				{
					frmDaftarJemputanUtem.hidDelete.value = "delete";
					frmDaftarJemputanUtem.hidSave.value = "";
					document.frmDaftarJemputanUtem.submit();
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
		if(isset($_POST['fcmbSaiz'])){ $Saiz = $_POST['fcmbSaiz']; };
	if(isset($_POST['ftxtGelaran'])){ $Gelaran = $_POST['ftxtGelaran']; };

	if(isset($_POST['ftxtNokp'])){ $ic = $_POST['ftxtNokp']; };
	if(isset($_POST['ftxtTel'])){ $nohp = $_POST['ftxtTel']; };
	if(isset($_POST['ftxtEmail'])){ $Email = $_POST['ftxtEmail']; };
	if(isset($_POST['ftxttelPej'])){ $NotelPej = $_POST['ftxttelPej']; };
	if(isset($_POST['ftxtNoFaks'])){ $NoFaks = $_POST['ftxtNoFaks']; };

	if(isset($_POST['ftxtAlamatSyarikat'])){ $AlamatSyarikat = $_POST['ftxtAlamatSyarikat']; };
	if(isset($_POST['ftxtNamaSyarikat'])){ $NamaSyarikat = $_POST['ftxtNamaSyarikat']; };
	
	if(isset($_POST['ftxtKpPcdg'])){ $IcPcdg = $_POST['ftxtKpPcdg']; };
	if(isset($_POST['ftxtNoStaffPcdg'])){ $NoStaffPcdg = $_POST['ftxtNoStaffPcdg']; };
	if(isset($_POST['ftxtEmailPncdg'])){ $EmailPncdg = $_POST['ftxtEmailPncdg']; };
	if(isset($_POST['ftxtNamaPcdg'])){ $NamaPcdg = $_POST['ftxtNamaPcdg']; };
	if(isset($_POST['ftxtPtjPcdg'])){ $PtjPcdg = $_POST['ftxtPtjPcdg']; };
	if(isset($_POST['ftxtNoTelPcdg'])){ $NoTelPcdg = $_POST['ftxtNoTelPcdg']; };
	if(isset($_POST['hidKategori'])){ $kat = $_POST['hidKategori']; };	
	if(isset($_POST['hidIC'])){ $hidIc = $_POST['hidIC']; };
	
	Simpan();
	Hapus();
	Clearfield();
	

	function Clearfield()
	{
		
	    $nama="";
		$ic=""; 
	    $Gelaran=""; 
		$Email=""; 
	    $nohp="";
		$NamaSyarikat=""; 
		$jantina=""; 
        $Saiz=""; 
	  	$NotelPej=""; 
		$NoFaks=""; 
		$AlamatSyarikat=""; 
		$IcPcdg="";  
		$NoStaffPcdg=""; 
		$EmailPncdg=""; 
		$NamaPcdg=""; 
		$PtjPcdg=""; 
		$NoTelPcdg=""; 
		$kat="";
	}
	

	function Simpan()
	{
		global $StaSave, $msginfo, $hidIc;
		global $nama,$ic, $Gelaran, $Email, $nohp, $NamaSyarikat, $jantina;
		global $Saiz, $NotelPej, $NoFaks, $AlamatSyarikat;
		global $IcPcdg, $NoStaffPcdg, $EmailPncdg;
		global $NamaPcdg, $PtjPcdg, $NoTelPcdg,$kat;

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
				$rs1 = mydb ("INSERT INTO Pemain (PE_Nama, PE_Gelaran, PE_ID, PE_Email, PE_NoHp, PE_NamaSyarikat,PE_Jantina, PE_SaizBaju,
								PE_NoPej, PE_NoFax,PE_AlamatSyarikat,PE_NoICPencadang,PE_NoStafPencadang,PE_EmailPencadang,PE_NamaPencadang, PE_PTJPencadang,PE_NoTelPencadang,Kat_ID)
							VALUES('$nama', '$Gelaran', '$ic', '$Email', '$nohp','$NamaSyarikat', '$jantina', '$Saiz', '$NotelPej','$NoFaks','$AlamatSyarikat','$IcPcdg','$NoStaffPcdg','$EmailPncdg','$NamaPcdg','$PtjPcdg','$NoTelPcdg' ,'$kat')");

				$msginfo="Rekod telah disimpan ke dalam pangkalan data";
			}
		}
		elseif ($StaSave =="update")
		{			
			$rs = mydb ("SELECT PE_ID FROM Pemain WHERE PE_ID='$hidIc'");
			$objResult = odbc_fetch_array($rs);  
			if($objResult)
			{  		
			


		$rs2 =mydb("UPDATE Pemain set PE_Nama= '$nama',PE_Gelaran ='$Gelaran',PE_Email ='$Email',PE_NoHp ='$nohp',PE_NamaSyarikat='$NamaSyarikat',PE_Jantina='$jantina', PE_SaizBaju='$Saiz', 
				   PE_NoPej= '$NotelPej', PE_NoFax='$NoFaks',PE_AlamatSyarikat='$AlamatSyarikat',
				   PE_NoICPencadang='$IcPcdg',PE_NoStafPencadang='$NoStaffPcdg', PE_EmailPencadang='$EmailPncdg', PE_NamaPencadang ='$NamaPcdg',PE_PTJPencadang='$PtjPcdg', 
				   PE_NoTelPencadang='$NoTelPcdg',Kat_ID='$kat' WHERE PE_ID ='$hidIc'" );

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




</script>
<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
<tr>
    <td>
	<form name="frmDaftarJemputanUtem" id="frmDaftarJemputanUtem" action ="dftrPemain_JemUTEM.php" method="post">
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
                    <td colspan="6"  align="left"><strong><u>Maklumat Peribadi</u></strong></td>
				</tr>
				<tr>
					<td width="14%">Nama <font color="#FF0000">*</font></td>
					<td width="1%">:</td>
					<td width="45%">
						<input  name="ftxtNama" type="text" id="ftxtNama"  maxlength="60" style="width:400px;"/>
					</td>
					<td width="14%">Jantina  <font color="#FF0000">*</font></td>
					<td width="1%">:</td>
					<td width="25%">
                        <input type="radio" name="fjantina" id="fjantina" value="L" checked="checked" />LELAKI
                        <input type="radio" name="fjantina" id="fjantina" value="P" />PEREMPUAN
					</td>
				</tr>
                <tr>
                    <td>Gelaran </td>
                    <td>:</td>
                    <td>
						<input name="ftxtGelaran" type="text" id="ftxtGelaran" maxlength="50" style="width:200px;"/>
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
                    <td>No. Pengenalan<font color="#FF0000">*</font></td>
                    <td>:</td>
                    <td>
						<input name="ftxtNokp" type="text" id="ftxtNokp"  maxlength="20" style="width:150px;"  />
						<input type="hidden" name="mm" id="mm" value="" />
					</td>
                    <td>No. Tel. Pejabat</td>
                    <td>:</td>
                    <td>
						<input name="ftxttelPej" type="text" id="ftxttelPej" maxlength="20" style="width:120px;" onkeypress="return numeric_only(event);"/>
					</td>
                </tr>
                <tr>
                    <td>Emel<font color="#FF0000">*</font></td>
                    <td>:</td>
                    <td>
						<input name="ftxtEmail" type="text" id="ftxtEmail" maxlength="100" style="width:400px;"/>
					</td>
                    <td>No. Faks.</td>
                    <td>:</td>
                    <td>
						<input name="ftxtNoFaks" type="text" id="ftxtNoFaks" maxlength="20" style="width:120px;" onkeypress="return numeric_only(event);"/>
					</td>
                </tr>
                <tr>
                    <td>No. Tel. Bimbit <font color="#FF0000">*</font></td>
                    <td>:</td>
                    <td>
						<input name="ftxtTel" type="text" id="ftxtTel" maxlength="20" style="width:120px;"  onkeypress="return numeric_only(event);"/>
					</td>
                    <td rowspan="2">Alamat Syarikat</td>                    
                    <td rowspan="2">:</td>
                    <td rowspan="2">
						<textarea name="ftxtAlamatSyarikat" id="ftxtAlamatSyarikat" cols="42" rows="4"></textarea>
					</td>                
                </tr>
                <tr>
                    <td>Nama  Syarikat </td>
                    <td>:</td>
                    <td>
						<input name="ftxtNamaSyarikat" type="text" id="ftxtNamaSyarikat" maxlength="20" style="width:400px;"/>
					</td>                
                </tr>
                <tr>
                    <td colspan="6" align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="6"  align="left"><strong><u>Maklumat Peribadi Pencadang </u></strong></td>
                </tr>
                <tr>
                    <td>Nama Pencadang</td>
                    <td>:</td>
                    <td>
						<input  name="ftxtNamaPcdg" type="text" id="ftxtNamaPcdg" maxlength="100" style="width:400px;" />
					</td>
                    <td>No. Staff</td>
                    <td>:</td>
                    <td>
						<input name="ftxtNoStaffPcdg" type="text" id="ftxtNoStaffPcdg" maxlength="5" style="width:100px;"/>
					</td>
                </tr>
                <tr>
                    <td>No. Kad Pengenalan</td>
                    <td>:</td>
                    <td>
						<input name="ftxtKpPcdg" type="text" id="ftxtKpPcdg"  maxlength="20" style="width:150px;" onkeypress="return nonnumeric_only(event);" />
					</td>
                    <td>Pejabat</td>
                    <td>:</td>
                    <td>
						<input name="ftxtPtjPcdg" type="text" id="ftxtPtjPcdg" maxlength="50" style="width:300px;"/>
					</td>
                </tr>
                <tr>
                    <td>Emel</td>
                    <td>:</td>
                    <td>
						<input name="ftxtEmailPncdg" type="text" id="ftxtEmailPncdg" maxlength="100" style="width:400px;"/>
					</td>
                    <td>No. Tel. Pejabat</td>
                    <td>:</td>
                    <td>
						<input name="ftxtNoTelPcdg" type="text" id="ftxtNoTelPcdg" maxlength="20" style="width:120px;"   onkeypress="return numeric_only(event);"/>
					</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td>Kategori Permainan</td>
                    <td>:</td>
                    <td><input name="fkat" type="text" id="fkat" size="20" maxlength="14" value="Jemputan UTeM" readonly="readonly"//> <input type="hidden" name="hidKategori" id="hidKategori" value="05"/></td>
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
                            $rs = mydb("SELECT * FROM Pemain as A inner join Kategori as B on A.Kat_ID=B.Kat_ID where B.Kat_ID ='05' ORDER BY A.Kat_ID, A.PE_Nama");
                            $objResult=odbc_fetch_array($rs);
                            while($objResult)
                            {
                        ?>
                            <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" onClick="PaparInfo(<?php echo $i;?>,'TableC')">
                                <td width="5%"><?php echo $i+1;?></td>
                                <td width="15%"><?php echo $objResult["PE_ID"];?></td>
                                <td><?php echo $objResult["PE_Nama"];?></td>
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
                                <td style="display:none"><?php echo $objResult["PE_Gelaran"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_Email"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NamaSyarikat"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_AlamatSyarikat"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NoPej"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NoFax"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NoIcPencadang"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NoStafPencadang"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_EmailPencadang"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NamaPencadang"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_PTJPencadang"];?></td>
                                <td style="display:none"><?php echo $objResult["PE_NoTelPencadang"];?></td>
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