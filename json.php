<?php
include 'dbConnect.php';

$query = mydb("select H_ID, H_Par, H_Indeks from dbo.Hole ;");

$data = array();
$objResult = odbc_fetch_array($query);  
while($objResult)
{
	$data[] = $objResult;
}

print json_encode($data);

?>