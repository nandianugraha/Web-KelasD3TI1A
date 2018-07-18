<?php session_start();
if (isset($_POST['admin']))
{
	include ("./include/conn.php");
	$userid=htmlentities((trim($_POST['admin'])));
	$password=htmlentities(md5($_POST['kunci']));
	
	$login=mysql_db_query($db,"select * from admin where user='$userid' and password='$password'",$koneksi);
	
	$cek_login=mysql_num_rows($login);
		if (empty($cek_login))
		{
			echo "<script> document.location.href='akses.php?go=salah_password'; </script>";
		}
		else
		{
			//daftarkan ID jika user dan password BENAR
			while ($row=mysql_fetch_array($login))
			{
				$id=$row[0];
				session_register('id');
				session_register('userid');
				session_register('tanggal');
			}
			echo "<script> document.location.href='home.php'; </script>";
		}
}
?>


<html>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script language="javascript" src="include/script.js"></script>
<title>Login</title>
<body onLoad="document.login.userid.focus();">
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="19%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="4%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="74%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">ADMINISTRATOR</font></strong></div></td>
	<td width="21%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td background="./img/b-kiri.jpg">&nbsp; </td>
	<td>
	<table width="259" align="center">
		<tr><td width="251"><font face="verdana" size="2">&nbsp;
		</font>
		
		<form action="index.php" method="post" name="login">
		  <table width="251" height="101" border="0" align="center">
		  <tr valign="bottom">
			<td width="104" height="35"><font color="#666666" size="4" face="verdana">Username</font></td>
			  <td width="137"><font size="4" face="verdana">
				<input type="text" name="admin" size="20" id="userid">
			  </font></td>
		  </tr>
		  
		  <tr valign="top">
			<td height="34"><font color="#666666" size="4" face="verdana">Password</font></td>
			  <td><font size="4" face="verdana">
				<input type="password" name="kunci" size="20" id="passwd">
			  </font></td>
		  </tr>
		  
		  <tr>
		  	<td>&nbsp;</td>
		  	<td><font size="4" face="verdana">
				<input type="submit" value="LOGIN" onClick="return cek_login()">
			  </font></td>
		  </tr>
		  </table>
		</form>
		
				
		</td></tr>
	</table>
	</td>
	<td background="./img/b-kanan.jpg">&nbsp;</td>
	<td width="1%"></td>
</tr>
<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><font face="verdana" size="2" color="#FFFFFF"><?php echo $_GET['status'];?></font></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>
</body>
</html>