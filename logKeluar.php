<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log Keluar</title>
<body>
<?php
		session_start(); //to ensure you are using same session
		session_destroy(); //destroy the session
		header("location:index.php"); //to redirect back to "index.php" after logging out
		exit;

?>
</head>
</body>
</html>