<?php include "./include/conn.php";
$waktu;
$quey=mysql_query("select * from counter",$koneksi);
while ($row=mysql_fetch_array($quey))
{
	$tgl=$row['tgl'];
	$visit=$row['jml'];
}

if ($visit=="")
{
	mysql_db_query($db,"insert into counter values('$waktu',1)",$koneksi);
}

if (!isset($_COOKIE['kucing-counter']))
{
	$visit=$visit+1;
	mysql_db_query($db,"update counter set jml='$visit',tgl='$tanggal'",$koneksi);
}
echo "<font face=verdana size=2> Total : ".$visit." Orang</font><br><br>";
echo "<i>";
echo "Tanggal Terakhir: ".substr($tgl,0,10)."<br>";
echo "Jam Terakhir : ".substr($tgl,10,9)."<br>";
echo "IP Anda : ".$_SERVER['REMOTE_ADDR'];
echo "</i>";

?>