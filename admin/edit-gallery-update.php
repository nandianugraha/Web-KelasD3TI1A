<?php session_start(); 
if (session_is_registered('id'))
{
	include "./include/conn.php";
	$id=$_GET['id']; //id catatan
	$gambarku=$_POST['picture'];
	$ok=$_POST['ok'];
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


	<div class="post">
		<h2 class="title"><a href="#">Update Artikel </a></h2>
		<p class="meta"><em><?php echo $tanggal;?></a></em></p>
		<div class="entry">
		
		<?php
		if (isset($_POST['kirim']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
		{
			
			$tanggal;
			$keterangan=htmlentities($_POST['keterangan']);
			$fotodoc=$_FILES['fotodoc']['name'];
			$type=$_FILES['fotodoc']['type'];
			$idu=$_POST['id'];
			
			if ($ok=="ok"){
				//kalo gambar gak mau di ganti
				if ($keterangan=="")//periksa jika data yang dimasukan belum lengkap
				{
					?><script> document.location.href='home.php?page=edit-gallery-update&id=<?php echo $id; ?>&status=Maaf, Data Anda belum lengkap'; </script>";<?php
				}
				else
				{	
					$upload=mysql_query("UPDATE gallery_photo SET tanggal='$tanggal',keterangan='$keterangan' where id_photo='$idu'",$koneksi);
					?><script> document.location.href='home.php?page=edit-gallery&status=Data berhasil di ubah'; </script>";<?php
				}
			
			}else{
			
				//kalo gambar di ganti
				if ($keterangan=="" || $fotodoc=="")//periksa jika data yang dimasukan belum lengkap
				{
					?><script> document.location.href='home.php?page=edit-gallery-update&id=<?php echo $id; ?>&status=Maaf, Data Anda belum lengkap'; </script>";<?php
				}
				else
				{
					//jika gambar ikut di ubah
					//hapus file yang lama
					unlink($gambarku);
					
					$uploaddir='./gallery_photo/';
					$alamatgambar=$uploaddir.$_FILES['fotodoc']['name'];
					$alamatdatabase='./admin/gallery_photo/'.$_FILES['fotodoc']['name'];
					
					if (move_uploaded_file($_FILES['fotodoc']['tmp_name'],$alamatgambar))//periksa jika proses upload berjalan sukses
					{
						
						?><script> document.location.href='home.php?page=edit-gallery&status=Data Anda berhasil diubah'; </script>";<?php
						$upload=mysql_query("UPDATE gallery_photo SET gambar='$alamatdatabase',keterangan='$keterangan', tanggal='$tanggal' where id_photo='$idu'",$koneksi);
					}else{
						echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
					}
				}
				
			}
		}
		else
		{
			unset($_POST['kirim']);
		}
		?>
			
			
			<?php
			//////////////////////////////////UNTUK MENAMPILKAN//////////////////////////////////// 
			$tampil=mysql_db_query($db,"select * from gallery_photo where id_photo='$id'",$koneksi);
			while ($row=mysql_fetch_array($tampil))
			{
				$id_photo=$row['id_photo'];
				$gambar_lama=$row['gambar'];
				$keterangan=$row['keterangan'];
				$tanggal=$row['tanggal'];
			}
			?> 
			<p><font color='#0066FF' face='verdana' size='2'>
			<div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
			</font></p>
					
			<form enctype="multipart/form-data" action="edit-gallery-update.php?id=<?php echo $id_photo;?>" method="post">
			<table width="519" cellspacing="0" cellpadding="0" border="0" align="center" class="datatable">
			<tr>
				<input type="hidden" name="id" value="<?php echo $id_photo;?>" >
				<td width="25%" height="36" valign="top"><font size="2" face="verdana">Keterangan Gambar </font></td>
			    <td width="75%"><font face="Times New Roman" size="2">
			  <textarea cols="30" rows="5" name="keterangan"><?php echo $keterangan;?></textarea></font></td>
			</tr> 
			
			<?php $picture=substr($gambar_lama,8,100); 
			?>
			
			<tr>
				<td height="115" align="center"><span class="style3"><img src="<?php echo $picture;?>" width="100" height="100" border="0"></span>	</td>
				<input type="hidden" name="picture" value="<?php echo $picture; ?>">
				<td><p><font face="verdana" size="1" color="#666666"><?php echo $gambar_lama; ?></font></p>
				<p>
				  <input type="checkbox" name="ok" value="ok">
				  <span class="style5 style1">Jika gambar tidak ingin di ganti, silahkan ceklist tanda ini !!</span></p></td>
			</tr>
			
			<tr>
			  <td width="25%" height="33" valign="middle">
			  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			  <font size="2" face="verdana">Gambar Baru </font></td>
				<td><input type="file" name="fotodoc" size="30"></td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td width="75%">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="25%"><p>&nbsp;
				  </p>
			  <p>&nbsp;</p></td>
			  <td width="75%"><input type="submit" value="Update" name="kirim">&nbsp;
			  <input type="button" name="batal" value="Batal" onClick="location.replace('home.php?page=edit-gallery');" /></td>
			</tr>
			</table>
			</form>

		
	</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>