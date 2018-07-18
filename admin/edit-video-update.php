<?php session_start(); 
if (session_is_registered('id'))
{
	include "./include/conn.php";
	$id=$_GET['id']; //id catatan
	$gambarku=$_POST['picture'];
	$videoku=$_POST['videos'];
	$ok=$_POST['ok'];
	$ok2=$_POST['ok2'];
	$ok_lah=$_POST['ok_lah'];
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


	<div class="post">
		<h2 class="title"><a href="#">Update Video </a></h2>
		<p class="meta"><em><?php echo $tanggal;?></a></em></p>
		<div class="entry">
		
		<?php
		if (isset($_POST['kirim']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
		{
			
			$tanggal;
			$keterangan=htmlentities($_POST['keterangan']);
			$gambar=$_FILES['gambar']['name'];
			$video=$_FILES['video']['name'];
			$ukuran=$_FILES['video']['size'];
			
			$idu=$_POST['id'];
			
			
			if($ok=="ok" && $ok2=="ok"){
				//echo "anda centang dua2nya";
				if ($keterangan=="")//periksa jika data yang dimasukan belum lengkap
				{
					?><script> document.location.href='home.php?page=edit-video-update&id=<?php echo $id; ?>&status=Maaf, Data Anda belum lengkap. Keterangan kosong!'; </script>";<?php
				}else{
					$upload=mysql_query("UPDATE gallery_video SET keterangan='$keterangan', tanggal='$tanggal' where id_video='$idu'",$koneksi);
					
					if($upload){
						?><script> document.location.href='home.php?page=edit-video&status=Data Anda berhasil diubah'; </script>";<?php
					}else{
						echo "Proses gagal";
					}
				}
				
			}else{
				if($ok=="ok"){
					//echo "anda centang gambar";
					if ($keterangan=="" || $video=="")//periksa jika data yang dimasukan belum lengkap
					{
						?><script> document.location.href='home.php?page=edit-video-update&id=<?php echo $id; ?>&status=Maaf, Data Anda belum lengkap. Video kosong!'; </script>";<?php
					}
					else
					{	
						//hapus video
						unlink($videoku);
						
						//upload hanya video, gambarnya tidak
						$uploaddir_video='./gallery_video/';
						$alamat_video=$uploaddir_video.$_FILES['video']['name'];
						$alamat_database_video='./admin/gallery_video/'.$_FILES['video']['name'];
						$upload_video=move_uploaded_file($_FILES['video']['tmp_name'],$alamat_video);
						
					
						$upload=mysql_query("UPDATE gallery_video SET video='$alamat_database_video',tanggal='$tanggal',keterangan='$keterangan',ukuran='$ukuran' where id_video='$idu'",$koneksi);
						?><script> document.location.href='home.php?page=edit-video&status=Data berhasil di ubah'; </script>";<?php
					}


				}else{
					//echo "anda centang video";
					if ($keterangan=="" || $gambar=="")//periksa jika data yang dimasukan belum lengkap
					{
						?><script> document.location.href='home.php?page=edit-video-update&id=<?php echo $id; ?>&status=Maaf, Data Anda belum lengkap. Gambar kosong!'; </script>";<?php
					}else{
						//jika gambar ikut di ubah
						//hapus file yang lama
						unlink($gambarku);
						
						//upload photo
						$uploaddir='./thumbnail/';
						$alamatgambar=$uploaddir.$_FILES['gambar']['name'];
						$alamatdatabase='./admin/thumbnail/'.$_FILES['gambar']['name'];
						$upload_gambar=move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatgambar);
						
						if ($upload_gambar)//periksa jika proses upload berjalan sukses
						{
							
							?><script> document.location.href='home.php?page=edit-video&status=Data Anda berhasil diubah'; </script>";<?php
							$upload=mysql_query("UPDATE gallery_video SET thumbnail='$alamatdatabase',keterangan='$keterangan', tanggal='$tanggal' where id_video='$idu'",$koneksi);
						}else{
							echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
						}
					}	
				}
			}

		}else{
			unset($_POST['kirim']);
		}
		?>
			
			
			<?php
			//////////////////////////////////UNTUK MENAMPILKAN//////////////////////////////////// 
			$tampil=mysql_db_query($db,"select * from gallery_video where id_video='$id'",$koneksi);
			while ($row=mysql_fetch_array($tampil))
			{
				$id_video=$row['id_video'];
				$gambar_lama=$row['thumbnail'];
				$video_lama=$row['video'];
				$keterangan=$row['keterangan'];
				$tanggal=$row['tanggal'];
			}
			?> 
			<p><font color='#0066FF' face='verdana' size='2'>
			<div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
			</font></p>
					
			<form enctype="multipart/form-data" action="edit-video-update.php?id=<?php echo $id_video;?>" method="post">
			<table width="519" cellspacing="0" cellpadding="0" border="0" align="center" class="datatable">
			<tr>
				<input type="hidden" name="id" value="<?php echo $id_video;?>" >
				<td width="23%" height="36" valign="top"><font size="2" face="verdana">Keterangan Video </font></td>
			    <td width="77%"><font face="Times New Roman" size="2">
			  <textarea cols="30" rows="5" name="keterangan"><?php echo $keterangan;?></textarea></font></td>
			</tr> 
			
			<?php 
			$picture=substr($gambar_lama,8,100); 
			$videos=substr($video_lama,8,100); 
			?>
			
			<tr>
				<td height="115" align="center"><span class="style3"><img src="<?php echo $picture;?>" width="100" height="100" border="0"></span>	</td>
				<input type="hidden" name="picture" value="<?php echo $picture; ?>">
				<input type="hidden" name="videos" value="<?php echo $videos; ?>">
				
				<td valign="bottom">
				<p><font face="verdana" size="1" color="#666666">
				<?php 
					//echo $gambar_lama; 
				?>
				</font></p>
				<p>
				  <input type="checkbox" name="ok" value="ok">
				  <span class="style5 style1">Jika gambar tidak ingin di ganti, silahkan ceklist tanda ini !!</span></p></td>
			</tr>
			
			<tr>
			  	<td width="23%" height="33" valign="middle">
			  	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			  	<font size="2" face="verdana">Gambar Baru </font></td>
				<td><input type="file" name="gambar" size="30"></td>
			</tr>
			
			<tr>
			  	<td width="23%" height="33" valign="middle">&nbsp;</td>
				<td><span class="style1">
			    <input type="checkbox" name="ok2" value="ok" />
              Jika video tidak ingin di ganti, silahkan ceklist tanda ini !!</span></td>
			</tr>
			
			<tr>
			  	<td width="23%" height="33" valign="middle">
			  	<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			 	<font size="2" face="verdana">Video Baru </font></td>
				<td><input type="file" name="video" size="30"></td>
			</tr>

			
			<tr>
				<td>&nbsp;</td>
				<td width="77%"><?php //echo $video_lama; ?></td>
			</tr>
			
			<tr>
				<td width="23%"><p>&nbsp;
				  </p>
			  <p>&nbsp;</p></td>
			  <td width="77%"><input type="submit" value="Update" name="kirim">&nbsp;
			  <input type="button" name="batal" value="Batal" onClick="location.replace('home.php?page=edit-video');" /></td>
			</tr>
			</table>
			</form>

		
	</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>