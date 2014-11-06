<?php
include 'dbConnect.php';

$query = mydb("SELECT a.PE_Nama as nama, a.Ipt_ID, d.Kat_Nama , e.F_ID as f1, f.F_ID as f2, g.H_ID as hole1, h.H_ID as hole2,
				i.P_ID as padang, g.H_Indeks as indeks1, g.H_Desc as desc1, h.H_Indeks as indeks2, h.H_Desc as desc2
				FROM Pemain as a 
				left join Day_1 as b on a.PE_ID = b.P1 or a.PE_ID = b.P2 or a.PE_ID = b.P3 or a.PE_ID = b.P4
				left join Day_2 as c on a.PE_ID = c.P1 or a.PE_ID = c.P2 or a.PE_ID = c.P3 or a.PE_ID = c.P4
				left join Kategori d on a.Kat_ID=d.Kat_ID
				left join Flight_Day_1 e on b.F_ID = e.F_ID
				left join Flight_Day_2 f on f.F_ID = c.F_ID
				left join Hole_Day_1 g on g.H_ID = e.H_ID
				left join Hole_Day_2 h on h.H_ID = f.H_ID
				left join Padang i on i.P_ID = g.P_ID
				left join Padang j on j.P_ID = h.P_ID 
				where  e.F_ID = '".$_GET['f1']."' or f.F_ID =  = '".$_GET['f2']."'");

$data = array();
$full_data = array();
while($row = odbc_fetch_array($query))
{
	//$data[] =
	$data[] =  $row;
}

$test = json_encode($data);
$lol = json_decode($test);
?>