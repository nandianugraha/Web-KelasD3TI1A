<html>
<head>
</head>
<body>
<?php
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="multimedia";
$entries=3;

$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);

$tanggal=date("Y-m-d H:i:s");
if ($koneksi)
{
	//echo "berhasil : )";
}else{
	echo "Gagal Koneksi Database MySQL!";
}

?>

</body>
</html>
