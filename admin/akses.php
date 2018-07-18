<?php session_start();
	$konfirm=$_GET['go'];
	switch($konfirm)
	{
		case "session";
		?>
		<script> document.location.href='index.php?status=Silahkan Login'; </script>
		<?php
		break;
				
		case "salah_password";
		?>
		<script> document.location.href='index.php?status=Invalid Login'; </script>
		<?php
		break;
		
		default;
		?>
		<script> document.location.href='index.php?status=Silahkan Login'; </script>
		<?php
		break;
		
	}
?>
<html><link rel="shortcut icon" href="lock.ico" type="image/x-icon"></html>