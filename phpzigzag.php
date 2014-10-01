<?php

$database = array(
    "haz",
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v", 
    "w",
	"x",
	"y"

);

$pemain = array();
$ic = array();


for ($as = 0 ; $as < sizeof($database); $as++) {
    $ic[] = $as + 880319495059;
}
foreach ($database as $value) {
    $pemain[] = $value;
}

$bil_flight = ceil(sizeof($pemain) / 4);
echo "BIL PEMAIN : " . sizeof($pemain) . "<br/>";
echo "BIL FLIGHT : " . $bil_flight . "<br/>";
$offset = $bil_flight;



?>

<html>
<head>

</head>
<body>


<table border="1" style="float: left">

    <?php
    // table flight
    echo "<thead style='background-color: lightcoral'>
    <td>Flight</td>
    </thead>";
    $flight = 0;
    while (true) {
        $flight++;
        echo "<tr>";
        echo "<td>";
        echo "FLIGHT" . $flight;
        echo "</td>";
        echo " </tr>";

        if ($flight == $bil_flight) {

            break;
        }


    }
    ?>
</table>
<table border="1" style="float: left">
    <?php
    // pemain pemain 1
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 1</td>
     <td>IC</td>
    </thead>";
    $k = 0;
    while ($k < sizeof($pemain)) {

        echo "<tr>";
        echo "<td>";
        echo $pemain[$k];
        echo "</td>";

        // letak ic kat sini
        echo "<td>";
        echo $ic[$k];
        echo "</td>";
        // --
        echo " </tr>";
        $k++;
        if ($k == $bil_flight) {
            $bil_flight = $bil_flight + $offset;
            break;
        }


    }
    ?>
</table>

<table border="1" style="float: left">
    <?php
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 2</td>
    </thead>";

    while ($k < sizeof($pemain)) {

        echo "<tr>";
        echo "<td>";
        echo $pemain[$k];
        echo "</td>";
        echo " </tr>";
        $k++;
        if ($k == $bil_flight) {
            $bil_flight = $bil_flight + $offset;
            break;
        }


    }
    ?>
</table>

<table border="1" style="float: left">
    <?php
    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 3</td>
    </thead>";

    while ($k < sizeof($pemain)) {

        echo "<tr>";
        echo "<td>";
        echo $pemain[$k];
        echo "</td>";
        echo " </tr>";
        $k++;
        if ($k == $bil_flight) {
            $bil_flight = $bil_flight + $offset;

            break;
        }


    }
    ?>
</table>

<table border="1" style="float: left">
    <?php

    echo "<thead style='background-color: lightcoral'>
    <td>PEMAIN 4</td>
    </thead>";
    while ($k < sizeof($pemain)) {

        echo "<tr>";
        echo "<td>";
        echo $pemain[$k];
        echo "</td>";
        echo " </tr>";
        $k++;
        if ($k == $bil_flight) {
            $bil_flight = $bil_flight + $offset;
            break;
        }


    }
    ?>
</table>
</body>
</html>


