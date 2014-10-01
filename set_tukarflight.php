<?php
session_start();
error_reporting(0);
require_once('dbConnect.php');

if (isset($_POST["cariA"])) {
    $kategori = $_POST['kategori'];
    $pilihanA = $_POST['pilihanA'];
    $InputA = $_POST['inputA'];

    if ($kategori=="PILIH" || $pilihanA == "PILIH" || empty($InputA)) {
        echo '<script>alert("Tolong la oi...isi betul2!!!");</script>';
    } else {

        $query1 = "SELECT a.PE_Nama, a.PE_ID, a.Ipt_ID, a.PE_Handicap, b.Kat_Nama,"
                . " c.F_ID FROM Pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID left join FlightList as c on a.PE_ID = c.PE_ID WHERE a.Kat_ID = '" . $kategori . "' AND " . $pilihanA . " like '%" . $InputA . "%'";
    }
}
if (isset($_POST["cariB"])) {
    $kategori = $_POST['kategori'];
    $pilihanB = $_POST['pilihanB'];
    $InputB = $_POST['inputB'];

    if ($kategori == "PILIH" || $pilihanB == "PILIH" || empty($InputB)) {
        echo '<script>alert("Tolong la oi...isi betul2!!!");</script>';
    } else {
        $query2 = "SELECT a.PE_Nama, a.PE_ID, a.Ipt_ID, a.PE_Handicap, b.Kat_Nama,"
                . " c.F_ID FROM Pemain as a left join kategori as b on a.Kat_ID = b.Kat_ID left join FlightList as c on a.PE_ID = c.PE_ID WHERE a.Kat_ID = '" . $kategori . "' AND " . $pilihanB . " like '%" . $InputB . "%'";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>Penukaran Flight</title>
		<link rel="stylesheet" href="golf750.css" type="text/css">
        <script src="/Golf2014/js/jquery-2.1.1.js"></script>
        <script>
            function loadData(nama, ic, ipt, hc, cat, fid) {
                $("#fPE_NamaA").val(nama);
                $("#fPE_IDA").val(ic);
                $("#fIpt_IDA").val(ipt);
                $("#fPE_HandicapA").val(hc);
                $("#fKat_namaA").val(cat);
                $("#fF_IDA").val(fid);
            }
            function loadDataB(nama, ic, ipt, hc, cat, fid) {
                $("#fPE_NamaB").val(nama);
                $("#fPE_IDB").val(ic);
                $("#fIpt_IDB").val(ipt);
                $("#fPE_HandicapB").val(hc);
                $("#fKat_namaB").val(cat);
                $("#fF_IDB").val(fid);
            }
        </script>
    <style type="text/css">
<!--
.oneColLiqCtrHdr #Outer tr td #form1 center table tr td #pemainA {
	text-align: left;
}
-->
    </style>
    </head>
    <body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888; font-family: Verdana, Arial, Helvetica, sans-serif; text-align: left;">
<tr>
    <td>
      <form id = "form1" name = "form1" method = "post" action ="set_tukarflight.php">
        <table width="100%" id="TableHeader" border="0">
            <tr>
                <td colspan="6"><img src="image/header.jpg" width="100%"/></td>
            </tr>
		</table>
        <div align="right" style="vertical-align:central;color:#CCFF66;">
          <p><a href="menusetup.php"><img src="image/back_icon.png" width="80" height="25"/></a></p>
        </div>
        <p><strong><u>Penukaran Flight</u></strong></p>
        <center>
<table border = "0" width="99%">
                    <tr>
                        <td>Kategori:
                            <?php
                            $Kat_nama_data = mydb("SELECT Kat_Nama,Kat_ID FROM Kategori");
                            ?>
                            <select name="kategori" id="kategori">
                                <option value="PILIH" selected="selected" >PILIH</option>
                                <?php
                                while ($row = (odbc_fetch_array($Kat_nama_data))) {
									if($kategori == $row['Kat_ID']){	

                                    echo '<option value="' . $row["Kat_ID"] . '" selected>' . $row["Kat_Nama"] . '</option>';
									  }else{ 
									echo '<option value="' . $row["Kat_ID"] . '">' . $row["Kat_Nama"] . '</option>';
                                }
								}
                                ?>
                            </select>
                        </td>
                    </tr>

                   <tr>
                     <td>                               
                            <p><u><strong>Maklumat Pemain A</strong></u></p>
                 <table width="280" border="0">
                              <tr>
                                <td width="44">Pilih</td>
                                <td width="6">:</td>
                                <td width="208"><select name="pilihanA" id="pilihanA">
                                  <option value="PILIH">PILIH</option>
                                  <option value="PE_Nama" >NAMA</option>
                                  <option value="a.PE_ID" >IC</option>
                                  <option value="Ipt_ID" >IPT</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td>Carian</td>
                                <td>:</td>
                                <td><input name="inputA" type="text" id="inputA"/>
                                <input type="submit" name="cariA" id="cariA" value="CARI"/></td>
                              </tr>
                       </table></br>
                 <table width="748" border="0" id="pemainA" name="pemainA">
                                    <tr class="theader">
                                    <td width="348"><center>Nama</center></td>
                                    <td width="241"><center>No. Kad Pengenalan</center></td>
                                    <td width="137"><center>IPT</center></td>
                            </tr> 
                                <?php
                                if (isset($query1)) {

                                    $_SESSION["part1"] = $query1;
                                }
                                $table_data = mydb($_SESSION["part1"]);


                                if (isset($_SESSION["part1"])) {?>
								
                                <?php while ($row = (odbc_fetch_array($table_data))) {?>
                                        <tr  class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" onclick="loadData('<?= $row["PE_Nama"] ?>', '<?= $row["PE_ID"] ?>', '<?= $row["Ipt_ID"] ?>', '<?= $row["PE_Handicap"] ?>', '<?= $row["Kat_Nama"] ?>', '<?= $row["F_ID"] ?>');">
                                            <td><?= $row["PE_Nama"] ?></td>
                                            <td><?= $row["PE_ID"] ?></td>
                                            <td><?= $row["Ipt_ID"] ?></td>
                   </tr>
<?php
                                    }
									
                                } else {
                                    if (isset($query1)) {
                                        while ($row = (odbc_fetch_array($table_data))) {
                                            ?>
                                            <tr  class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';"  onclick="loadData('<?= $row["PE_Nama"] ?>', '<?= $row["PE_ID"] ?>', '<?= $row["Ipt_ID"] ?>', '<?= $row["PE_Handicap"] ?>', '<?= $row["Kat_Nama"] ?>', '<?= $row["F_ID"] ?>');">
                                                <td><?= $row["PE_Nama"] ?></td>
                                                <td><?= $row["PE_ID"] ?></td>
                                                <td><?= $row["Ipt_ID"] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
					   </table>
                            <br />
                          
                       <table border="0">
                                <tr>
                                    <td width="90">Handicap</td>
                                    <td width="10">:</td>
                                    <td><input name="fPE_HandicapA" type="text" id="fPE_HandicapA" readonly="readonly" /></td>
                                </tr>
                                <tr>
                                    <td>Flight ID</td>
                                    <td>:</td>
                                    <td><input name="fF_IDA" type="text" id="fF_IDA" readonly="readonly" /></td>
                                </tr>
                       </table>
                       <input name="fPE_NamaA" type="hidden" id="fPE_NamaA" readonly="readonly"/>
                       <input name="fPE_IDA" type="hidden" id="fPE_IDA" />
                        <input name="fIpt_IDA" type="hidden" disabled="disabled" id="fIpt_IDA" />
                     <input name="fKat_namaA" type="hidden" disabled="disabled" id="fKat_namaA" /></td>
                  </tr>
                 
                   <tr>
                        <td>                               
                            <p><u><strong>Maklumat Pemain B</strong></u></p>
                          <table width="280" border="0">
                              <tr>
                                <td width="44">Pilih</td>
                                <td width="6">:</td>
                                <td width="208"><select name="pilihanB" id="pilihanB">
                                  <option selected="selected" value="PILIH">PILIH</option>
                                  <option value="PE_Nama" >NAMA</option>
                                  <option value="a.PE_ID" >IC</option>
                                  <option value="Ipt_ID" >IPT</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td>Carian</td>
                                <td>:</td>
                                <td><input name="inputB" type="text" id="inputB"/>
                                <input type="submit" name="cariB" id="cariB" value="CARI"/></td>
                              </tr>
                          </table></br>
                           
                         
                          <table width="748" border="0" id="pemainB" name="pemainB">
                              <tr class="theader">
                                    <td width="358" style="text-align: center">Nama</td>
                                    <td width="238" style="text-align: center">No. Kad Pengenalan</td>
                                    <td width="130" style="text-align: center">IPT</td>
                              </tr> 
                                <?php
                                if (isset($query2)) {

                                    $_SESSION["part2"] = $query2;
                                }
                                $table_dataB = mydb($_SESSION["part2"]);


                                if (isset($_SESSION["part2"])) {?>
								
                                    <?php while ($row = (odbc_fetch_array($table_dataB))) {?>
                                        <tr class="listoff" onMouseOver="this.className='liston';" onMouseOut="this.className='listoff';" onclick="loadDataB('<?= $row["PE_Nama"] ?>', '<?= $row["PE_ID"] ?>', '<?= $row["Ipt_ID"] ?>', '<?= $row["PE_Handicap"] ?>', '<?= $row["Kat_Nama"] ?>', '<?= $row["F_ID"] ?>');">
                                            <td><?= $row["PE_Nama"] ?></td>
                                            <td><?= $row["PE_ID"] ?></td>
                                            <td><?= $row["Ipt_ID"] ?></td>
                            </tr>
                                        <?php
                                    }
                                } else {
                                    if (isset($query2)) {
                                        while ($row = (odbc_fetch_array($table_dataB))) {
                                            ?>
                                            <tr onclick="loadDataB('<?= $row["PE_Nama"] ?>', '<?= $row["PE_ID"] ?>', '<?= $row["Ipt_ID"] ?>', '<?= $row["PE_Handicap"] ?>', '<?= $row["Kat_Nama"] ?>', '<?= $row["F_ID"] ?>');">
                                                <td><?= $row["PE_Nama"] ?></td>
                                                <td><?= $row["PE_ID"] ?></td>
                                                <td><?= $row["Ipt_ID"] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                          </table>
                            <br />
                            <table border="0">
                                <tr>
                                    <td width="92">Handicap</td>
                                    <td width="10">:</td>
                                    <td width="270"><input name="fPE_HandicapB" type="text" id="fPE_HandicapB" readonly="readonly" /></td>
                                </tr>
                                <tr>
                                    <td>Flight ID</td>
                                    <td>:</td>
                                    <td><input name="fF_IDB" type="text" id="fF_IDB" readonly="readonly" />
                                      <input name="fPE_NamaB" type="hidden" id="fPE_NamaB" readonly="readonly"/>
                                      <input name="fPE_IDB" type="hidden" id="fPE_IDB" />
                                    <input name="fIpt_IDB" type="hidden" disabled="disabled" id="fIpt_IDB" />
                                    <input name="fKat_namaB" type="hidden" disabled="disabled" id="fKat_namaB" /></td>
                                </tr>
                            </table>   
                        </td>
                    </tr>
                    
                     <tr>
      
       			        <td align="right">
   			            <input type="submit" name="PENUKARAN" id="PENUKARAN" value="Penukaran flight" />   			            </span><a href="urussetia.php">
       			        <?php
						if(isset($_POST['PENUKARAN']) )
						{
							$pemainA = $_POST['fPE_IDA']; 
							$F_IDA = $_POST['fF_IDA']; 
							$pemainB = $_POST['fPE_IDB'];
							$F_IDB = $_POST['fF_IDB']; 
							
						$update1  = mydb("update FlightList set F_ID = '" . $F_IDA . "' where  PE_ID='" . $pemainB . "'");
						$update2  = mydb("update FlightList set F_ID = '" . $F_IDB . "' where  PE_ID='" . $pemainA . "'");
						
						if($update1 && $update2)
						{
							echo "<script>alert('Flight pemain berjaya ditukar'); </script>";
							echo '<meta HTTP-EQUIV="Refresh">';
						}
						else
						{
							echo "<script>alert('Flight pemain tidak berjaya ditukar'); </script>";
						}
						}
						
						?>
       			      </a></td>
     			   </tr>
          </table></center>
      </form>
	</td>
</tr>
</table>
</body>
</html>