<?php
function mydb($query)
{
	$conn = odbc_connect('dbb','sa','1234'); 
	if ($conn) 
	{
	//	echo $query;
		$result=odbc_exec($conn, $query);
	}
	return $result;
}

//error handler function
function customError($errno, $errstr, $errfile, $errline)
{
	echo "<b>Custom error:</b> [$errno] $errstr<br />";
	echo " Error on line $errline in $errfile<br />";
	echo "Ending Script";
	die();
}
?>