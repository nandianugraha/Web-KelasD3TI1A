<?php session_start();
if (session_is_registered('id'))
{
	$_SESSION['id'];
	$user_id=$_SESSION['userid'];
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Administrator (<?php echo ucwords($user_id);?>)</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div id="logo">
			<h1><a href="#">Administrator</a></h1>
			<p>Situs KucingLucu</p>
		</div>
		<hr />
		<!-- end #logo -->
		<div id="header">
			<div id="menu">
				<ul>
					<li><a href="home.php" class="first">Home</a></li>
					<li><a href="logout.php" onclick="return confirm('Apakah Anda yakin akan keluar?')">Logout (<?php echo $user_id; ?>)</a></li>
				</ul>
			</div>
		</div>
		<!-- end #header -->
		<!-- end #header-wrapper -->
		<div id="page">
			<div id="content">
			 
			 <?php include "isi.php";?>
	
		  </div>
	</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
					  <h2>Menu  :  </h2>
						<ul>
							
							<?php include "menu.php";?>
							
						</ul>
					</li>
			  </ul>
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<p>
		  <!-- end #page -->
	</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div id="footer">
			<p>Copyright &copy; 2010 labhouse.co.cc All rights reserved. Design by <a href="http://www.ri32.wordpress.com" target="_blank">ri32.wordpress.com</a>.</p>
		</div>
		<!-- end #footer -->
	</body>
	</html>
<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>
