<?php
include 'dbConnect.php';

$query = mydb("select * from dbo.Hole where refInc >= (select refInc from dbo.Hole where H_ID = 'AK11') 
and refInc < (select refInc from dbo.Hole where H_ID = 'AK11') + 18 ;");

$data = array();
$objResult = odbc_fetch_array($query);  
while($objResult)
{
	$data[] = $objResult;
}

print json_encode($data);

?>