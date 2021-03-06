<?php
include 'dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kejohanan Golf Antara IPTA 2014</title>
    <link rel="stylesheet" href="golf750.css" type="text/css">

    <script type="text/javascript">
        function PaparInfo() {
            document.frmFlight.submit();
            return true;
        }

        function NewRekod() {
            document.frmFlight.hidNew.value = "new";
            document.frmFlight.hidSave.value = "";

            document.frmFlight.submit();
            return true;
        }

        function SimpanRekod() {
            if ((document.frmFlight.cmbkat.value == "") || (document.frmFlight.cmbkat.value == "-")) {
                alert("Sila pilih 'padang'.");
                document.frmFlight.cmbkat.focus();
                return false;
            }

            if ((document.frmFlight.cmbDay.value == "") || (document.frmFlight.cmbDay.value == "-")) {
                alert("Sila pilih 'Agihan Untuk'.");
                document.frmFlight.cmbDay.focus();
                return false;
            }

            if ((document.frmFlight.txtJumP.value == "") || (document.frmFlight.txtJumP.value == "0")) {
                alert("Tiada pemain yang berdaftar di bawah padang ini");
                document.frmFlight.txtJumP.focus();
                return false;
            }

            if (document.frmFlight.hidSave.value == "") {
                document.frmFlight.hidSave.value = "save";
                document.frmFlight.submit();
                return true;
            }
            return true;
        }

        function HapusRekod() {
            if ((document.frmFlight.cmbkat.value == "") || (document.frmFlight.cmbkat.value == "-")) {
                return false;
            }

            if ((document.frmFlight.cmbDay.value == "") || (document.frmFlight.cmbDay.value == "-")) {
                return false;
            }

            if ((document.frmFlight.txtJumP.value == "") || (document.frmFlight.txtJumP.value == "0")) {
                return false;
            }

            if (confirm("Adakah anda ingin menghapuskan data-data yang telah diproses ? ")) {
                document.frmFlight.hidDelete.value = "delete";
                document.frmFlight.hidSave.value = "";
                document.frmFlight.submit();
                return true;
            }
        }

    </script>
</head>
<?php
$StaSave = "";
$StaDelete = "";
$StaNew = "";
$msginfo = "";
$kat_id = "";
$jum_h = 0;
$jum_f = 0;
$day = "";

if (isset($_POST['hidSave'])) {
    $StaSave = $_POST['hidSave'];
};
if (isset($_POST['hidDelete'])) {
    $StaDelete = $_POST['hidDelete'];
};
if (isset($_POST['hidNew'])) {
    $StaNew = $_POST['hidNew'];
};

if ($StaNew == "") {
    if (isset($_POST['cmbkat'])) {
        $kat_id = $_POST['cmbkat'];
    };
    if (isset($_POST['cmbDay'])) {
        $day = $_POST['cmbDay'];
    };
}

if ($kat_id != '') {
    $rs = mydb("SELECT count(H_ID) as Bil FROM Hole WHERE Kat_ID='$kat_id'");
    $objResult = odbc_fetch_array($rs);
    if ($objResult) {
        $jum_h = $objResult["Bil"];
        $jum_f = ceil($jum_h * 2);
    }
}

Simpan();
Hapus();

function Simpan()
{
    global $day, $jum_f, $jum_h, $StaSave, $kat_id, $msginfo;

    $flightid1 = "";
    $holeid1 = "";
    $start = "";
    $end = "";
    $f = null;
    $hole = null;

    $rs1 = mydb("SELECT F_ID FROM Day_1 WHERE Kat_ID='" . $kat_id . "'");
	
	$rs3 = mydb("SELECT F_ID FROM Day_2 WHERE Kat_ID='" . $kat_id . "'");

    $rs2 = mydb("SELECT H_ID FROM Hole WHERE Kat_ID='" . $kat_id . "'");

    if ($StaSave == "save") {
        if ($day == "D1") {

            $datatest = array();
            while($row2 = odbc_fetch_array($rs1)) {

                $datatest[] = $row2["F_ID"];
            }

            $count_from = 0;
            $count_to = 2;
            while($row1 = odbc_fetch_array($rs2)) {
                $count = 0;
                foreach($datatest as $row3) {
                    if ($count < $count_to && $count >= $count_from) {
                        mydb("INSERT INTO FlightD1 (H_ID, F_ID) values ('" . $row1["H_ID"] . "','" . $row3 . "')");
                        $count_from++;
						
                    } else {


                    }
                    $count++;

                }
                $count_to = $count_to + 2;
            }

            $msginfo = "Proses Penentuan Flight Pemain telah dilaksanakan dan rekod telah disimpan ke dalam pangkalan data";
        }

        if ($day == "D2") {

           
            $datatest = array();
            while($row4 = odbc_fetch_array($rs3)) {

                $datatest[] = $row4["F_ID"];
            }

            $count_from = 0;
            $count_to = 2;
            while($row1 = odbc_fetch_array($rs2)) {
                $count = 0;
                foreach($datatest as $row3) {
                    if ($count < $count_to && $count >= $count_from) {
                        mydb("INSERT INTO FlightD2 (H_ID, F_ID) values ('" . $row1["H_ID"] . "','" . $row3 . "')");
                        $count_from++;
						
                    } else {


                    }
                    $count++;

                }
                $count_to = $count_to + 2;
            }

            $msginfo = "Proses Penentuan Flight Pemain telah dilaksanakan dan rekod telah disimpan ke dalam pangkalan data";

        }
    }
}

function Hapus()
{
    global $StaDelete, $day, $msginfo, $kat_id, $jum_p, $jum_f;

    if ($StaDelete == "delete") {
        if ($day == "D1")
            $rs1 = mydb("Delete FROM Day_1 WHERE Kat_ID='$kat_id'");
        elseif ($day == "D2")
            $rs1 = mydb("Delete FROM Day_2 WHERE Kat_ID='$kat_id'");

        $msginfo = "Rekod telah dihapuskan dari pangkalan data";

        $StaDelete = "";
        $kat_id = "";
        $jum_p = 0;
        $jum_f = 0;
        $day = "";

    }
}


?>
<body class="oneColLiqCtrHdr">
<table width="950" id="Outer" align="center" style="border: 3px solid #888;">
    <tr>
        <td>
            <form name="frmFlight" id="frmFlight" action="holetoflight.php" method="post">
                <table width="100%" id="TableHeader" border="0">
                    <tr>
                        <td><img src="image/header.jpg" width="100%"/></td>
                    </tr>
                </table>
                <table width="100%" id="Main" align="center">
                    <tr>
                        <td width="90%" align="left" style="font-size:17px"><strong>Penentuan Flight Kepada
                                Hole </strong></strong></td>
                        <td width="10%" align="left" style="font-size:17px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <table width="100%" id="TableA" border="0">
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>
                                        <select name="cmbkat" id="cmbkat" style="width:150px" onchange="PaparInfo()">
                                            <option value="">Sila pilih</option>
                                            <?php
                                            $i = 0;
                                            $rs = mydb("SELECT * FROM Kategori ORDER BY Kat_ID");
                                            $objResult = odbc_fetch_array($rs);
                                            while ($objResult) {
                                                if ($kat_id == $objResult['Kat_ID']) {
                                                    ?>
                                                    <option value="<?php echo $objResult['Kat_ID']; ?>"
                                                            selected="selected"><?php echo $objResult['Kat_Nama']; ?></option>
                                                <?php
                                                } else {
                                                    ?>
                                                    <option
                                                        value="<?php echo $objResult['Kat_ID']; ?>"><?php echo $objResult['Kat_Nama']; ?></option>
                                                <?php
                                                }
                                                $objResult = odbc_fetch_array($rs);
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>Hari</td>
                                    <td>:</td>
                                    <td>
                                        <select name="cmbDay" id="cmbDay" style="width:80px" onchange="PaparInfo()">
                                            <option value="">Sila pilih</option>
                                            <option value="D1" <?php if ($day == "D1") { ?>
                                                    selected="selected" <?php } else ?> " ">Hari 1</option>
                                            <option value="D2" <?php if ($day == "D2") { ?>
                                                    selected="selected" <?php } else ?> " ">Hari 2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="18%">Bilangan Hole</td>
                                    <td width="2%">:</td>
                                    <td width="30%">
                                        <input type="text" name="txtJumP" id="txtJumP" size="10" style="width:50px;"
                                               readonly="readonly" value="<?php echo $jum_h; ?>"/></td>
                                    <td width="18%">Bilangan Flight</td>
                                    <td width="2%">:</td>
                                    <td width="30%">
                                        <input type="text" name="txtJumF" id="txtJumF" size="10" style="width:50px;"
                                               readonly="readonly" value="<?php echo $jum_f; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="text-align: left">&nbsp;</td>
                                    <td align="right" style="text-align: left">&nbsp;</td>
                                    <td colspan="4" align="right" style="text-align: left">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right">
                                        <input type="hidden" name="hidNew" value="">
                                        <input type="hidden" name="hidSave" value="">
                                        <input type="hidden" name="hidDelete" value="">

                                        <input type="submit" class="button" name="btnkosong" id="btnkosong"
                                               value="Rekod Baru" style="width:90px; text-align:center;"
                                               onclick="NewRekod()"/>
                                        <input type="submit" class="button" name="btnsimpan" id="btnsimpan"
                                               value="Simpan" style="width:90px; text-align:center;"
                                               onClick="return SimpanRekod();"/></td>
                                </tr>
                            </table>
                            <table width="60%" id="TableB" border="0">
                                <tr class="theader">
                                    <td width="28%" align="center">Hole ID</td>
                                    <td width="49%" align="center">Flight ID</td>

                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div class=listbox style="height:400px">
                                            <table id="TableC" border="0" cellspacing="0" cellpadding="1"
                                                   style="width: 100%; font-size: 11px;">
                                                <?php
                                                $i = 0;
                                                if ($day == "D1")
                                                    $rs = mydb("select a.H_ID, a.F_ID from FlightD1 as a,Day_1 as b
													where b.F_ID = a.F_ID
													and b.Kat_ID = '$kat_id'");
                                                elseif ($day == "D2")
                                                    $rs = mydb("select a.H_ID, a.F_ID from FlightD2 as a,Day_2 as b
													where b.F_ID = a.F_ID
													and b.Kat_ID = '$kat_id'");

                                                $objResult = odbc_fetch_array($rs);
                                                while ($objResult) {
                                                    ?>
                                                    <tr class="listoff" style="background-color:#FFF">
                                                        <td width="39%"
                                                            valign="middle"><?php echo $objResult["H_ID"]; ?></td>
                                                        <td width="61%"><?php echo $objResult["F_ID"];?></td>

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
<?php if ($msginfo != "") {
    ?>
    <script>
        alert('<?php echo $msginfo?>')
    </script>
<?php
}
?>
</body>
</html>