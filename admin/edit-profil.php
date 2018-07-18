<?php session_start();
//////////////////page=2////////////////////////

if (session_is_registered('id'))
{
	include "./include/conn.php";
	$id=$_SESSION['id'];
	
	$user=htmlentities($_POST['user']);
	$kunci=htmlentities($_POST['kunci']);
	$namaku=htmlentities(ucwords($_POST['nama']));
	$email=htmlentities($_POST['email']);
	
	//periksa apakah udah submit
	if (isset($_POST['user']))
	{
		//periksa apakah masih kosong
		if (empty($kunci) || empty($user) || empty($namaku) || empty($email))
		{
			echo "<script> document.location.href='home.php?page=edit-profil&status=Maaf, Data Anda belum lengkap!!'; </script>";
		}else{	
			$password=md5($kunci);
			$edit=mysql_db_query($db,"UPDATE admin SET nama='$namaku',user='$user', password='$password', email='$email' where id='$id' ",$koneksi);
			
			//jika sudah berhasil 
			if ($edit)
			{
				echo "<script> document.location.href='home.php?page=edit-profil&status=Data berhasil disimpan!!'; </script>";
			}else{
				echo "GAGAL";
			}
		}

	}else{
		unset($_POST['user']);
	}
		
?>
		<div class="post">
		<h2 class="title"><a href="#">Edit Profil</a></h2>
		<p class="meta"><em><?php echo $tanggal;?></em></p>
		<div class="entry">
		
			
			
			<table width="376" align="left" >
			<tr><td width="368">
			<font color="#0033FF" face='verdana' size='2'>
			  <div align="center">
			    <blink><?php echo $_GET['status'] ?></blink>
				<p>
		      </div>
			 </font>
			
			 <form action="edit-profil.php" method="post">
			  <table border="0" align="left" class="datatable">
			  <?php
				include "./include/conn.php";
				$query=mysql_db_query($db,"SELECT * from admin where id='$id'",$koneksi);
				while ($row=mysql_fetch_array($query))
				{
				?>
			  
			  <tr>
				<td><font face="verdana" size="2">Nama Lengkap </font></td>
				<td><input type="text"  dir="ltr" size="25" name="nama" value="<?php echo $row['nama']; ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><font face="verdana" size="2">Email </font></td>
				<td><input type="text"  dir="ltr" size="25" name="email" value="<?php echo $row['email']; ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><font face="verdana" size="2">User name </font></td>
				<td><input type="text" size="25" name="user" value="<?php echo $row['user'];?>" /></td>
			  </tr>
			  
			  <tr>
				<td><font face="verdana" size="2">Password </font></td>
				<td>
					<input type="password" size="25" name="kunci" />
				</td>
			  </tr>
			  <tr>
			  	<td></td>
			  	<td><font color="#333333" size="-4" face="verdana">(Max 6 digit 0-9 a-z case sensitif)</font></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><input name="submit" type="submit" value="Simpan" /></td>
			  </tr>
				<?php
				}
				?>
			</table>
			</form >		
			</td></tr>
		</table>
			
			
			
			
		<div>
		</div>
	</div>		
<?php
}
else
{
echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>
