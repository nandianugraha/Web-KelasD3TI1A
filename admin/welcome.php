<?php session_start(); 
if (session_is_registered('id'))
{
?>
	<div class="post">
		<h2 class="title"><a href="#">Welcome <?php echo $_SESSION['userid'];?>, </a></h2>
		<p class="meta"><em>Login @ <?php echo $_SESSION['tanggal'];?></em></p>
		<div class="entry">
			<center>
			<img src="img/admin.png" width="48" height="48" /><br />
			Silahkan pilih menu Admin yang akan Anda kerjakan. IP Anda : <?php echo $_SERVER['REMOTE_ADDR']?>
			</center>
	</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>