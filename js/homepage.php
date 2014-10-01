<? session_start();?>
<html>
<head>
<title>Sistem Pemantauan Kehadiran Pelajar JTMK</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style2 {font-size: 12px}
.style4 {font-size: 14px; font-weight: bold; color: #FFFF00; }
.style5 {color: #FFFF00}
.style9 {color: #FFFF00; font-weight: bold; }
-->
</style>
</head>
<?

require_once('conn/conn.php');
$kategori="select * from spkp_kategori";

if(isset($_REQUEST['masuk'])){
			$select="select * from spkp_pensyarah
					left join spkp_kategori on kategori_kod = pensyarah_kategori 
					where pensyarah_username='".$_REQUEST['username']."'and pensyarah_password='".$_REQUEST['password']."'";
		
$hot_select = mysql_query($select, $hot) or die(mysql_error());
$row = mysql_fetch_assoc($hot_select);
$_SESSION['pen_username']=$row['pensyarah_username'];
$_SESSION['pen_password']=$row['pensyarah_password'];
$_SESSION['pen_nama']=$row['pensyarah_nama'];
$_SESSION['pen_kate']=$row['pensyarah_kategori'];
$_SESSION['pen_ic']=$row['pensyarah_noic'];
$_SESSION['kate_kod']=$row['kategori_kod'];
$_SESSION['kate_nama']=$row['kategori_nama'];



	if($row>0){
	echo "<script>alert('Selamat Datang Ke Sistem Pemantauan Kehadiran Pelajar JTMK');</script>";
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=main.php">';
	}else{
	echo "<script>alert('User ID dan Password tidak diterima.');</script>";
	
	}
}
?>



<body topmargin="10" >
<table  width="700" height="500"  border="0" align="center" cellpadding="0" cellspacing="0"  background="image/homepage.jpg">
  <tr>
    <td align="right">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <form method="post">
  <table align="right" ><!--DWLayoutTable-->
  <tr>
  <td width="100"> <div align="left"><span class="style9">ID Pengguna </span></div></td>
  <td width="5"> <span class="style5">:</span> </td>
  <td><input name="username" type="text" class="style001" maxlength="8" size="20" /></td>
  </tr>
  
  <tr>
  <td> <div align="left"><span class="style4">Kata Laluan </span></div></td>
  <td> <span class="style5">:</span> </td>
  <td> 
    
      <div align="left">
        <input name="password" type="password" class="style001" maxlength="8" size="20"/>
      </div></td>
	  <tr>
	  <td height="30" colspan="3" valign="top" > <div align="center">
	    <input name="masuk" type="Submit" value="Submit" align="right" />
	    <input type="reset" name="Reset" value="Reset" />
	    </div>
	    <label>
	    </label></td>
	  </tr>
	  <tr>
	    <td height="30" colspan="3" valign="top" ><div align="left"><a href="password/L_password.php" class="style2">Lupa Katalaluan?</a></div></td>
	  </tr>
</table>
</form>
</table>
</div>
</td>
</tr>
</table>
</body>
</html>