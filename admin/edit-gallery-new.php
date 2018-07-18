<?php session_start(); 
if (session_is_registered('id'))
{
	$userid=$_SESSION['userid'];
	include "./include/conn.php";
?>

	<div class="post">
		<h2 class="title"><a href="#">New Photo </a></h2>
		<p class="meta"><em><?php echo $tanggal;?></em></p>
		<div class="entry">
		
		
		<?php		
		
		if (isset($_POST['kirim']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
		{
			$tanggal;
			$keterangan=ucwords(htmlentities($_POST['keterangan']));
			$fotodoc=$_FILES['fotodoc']['name'];
			$type=$_FILES['fotodoc']['type'];
			
			if ($keterangan=="" || $fotodoc=="")//periksa jika data yang dimasukan belum lengkap
			{
				?><script> document.location.href='home.php?page=edit-gallery-new&status=Data Anda belum lengkap.';</script>";<?php
			}
			else
			{
				
				$uploaddir='./gallery_photo/';
				$alamatgambar=$uploaddir.$_FILES['fotodoc']['name'];
				$alamatdatabase='./admin/gallery_photo/'.$_FILES['fotodoc']['name'];
				
				
				if (move_uploaded_file($_FILES['fotodoc']['tmp_name'],$alamatgambar))//periksa jika proses upload berjalan sukses
				{
					$upload=mysql_db_query($db,"INSERT INTO gallery_photo(gambar, keterangan, tanggal) VALUES('$alamatdatabase','$keterangan','$tanggal')");
					?><script> document.location.href='home.php?page=edit-gallery&status=Data Anda berhasil di simpan.'; </script>";<?php
				}else{
					echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
				}
			}
			
		}
		else
		{
			unset($_POST['kirim']);
		}
	
	
		?>
		<h2 align="center">&nbsp;</h2>
		<p><font color='#0066FF' face='verdana' size='2'>
		<div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
		</font></p>
		
		<form enctype="multipart/form-data" action="edit-gallery-new.php" method="post">
		<table width="693" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		  <td width="14%" height="37" valign="middle">
		  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" id="gambar">
		  <font size="2" face="verdana">Gambar</font></td>
			<td><input type="file" name="fotodoc" size="30" id="gambar"></td>
		</tr>
		
		<tr>
			<td width="14%" height="30" valign="top"><font face="verdana" size="2">Keterangan</font></td>
			<td width="86%">
			<font face="Times New Roman" size="2">
			<textarea cols="30" rows="5" name="keterangan"></textarea>
			</font>
		  </td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td width="86%"><input type="submit" value="Kirim" name="kirim" onclick="return cek();">&nbsp;
		  <input type="button" name="batal" value="Batal" onclick="location.replace('home.php?page=edit-gallery');" /></td>
		</tr>
		</table>
		</form>					

			
	</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>