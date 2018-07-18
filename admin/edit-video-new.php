<?php session_start(); 
if (session_is_registered('id'))
{
	$userid=$_SESSION['userid'];
	include "./include/conn.php";
	$ok=$_POST['ok'];
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


<div class="post">
	<h2 class="title"><a href="#">New Video </a></h2>
	<p class="meta"><em><?php echo $tanggal;?></em></p>
<div class="entry">
		
		
		<?php			
		if (isset($_POST['kirim']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
		{
			$tanggal;
			$keterangan=ucwords(htmlentities($_POST['keterangan']));
			$fotodoc_gambar=$_FILES['gambar']['name'];
			$fotodoc_video=$_FILES['video']['name'];
			$ukuran=$_FILES['video']['size'];
			
			
			if ($ok=="ok"){
				//kalo tidak ada gambar
				if ($keterangan=="" || $fotodoc_video=="")//periksa jika data yang dimasukan belum lengkap
				{
					?><script> document.location.href='home.php?page=edit-video-new&status=Data Anda belum lengkap.';</script>";<?php
				
				}else{
					//folder video
					$uploaddir_video='./gallery_video/';
					
					//data untuk upload video
					$alamat_video=$uploaddir_video.$_FILES['video']['name'];
					$alamat_data_video='./admin/gallery_video/'.$_FILES['video']['name'];
					$upload_video=move_uploaded_file($_FILES['video']['tmp_name'],$alamat_video);
					//gambar default
					$alamat_data_gambar="./admin/img/preview.jpg";
					
					if ($upload_video)//periksa jika proses upload berjalan sukses
					{
						$upload=mysql_db_query($db,"INSERT INTO gallery_video(thumbnail, video, keterangan, ukuran, tanggal) VALUES('$alamat_data_gambar','$alamat_data_video','$keterangan','$ukuran','$tanggal')");
						?><script> document.location.href='home.php?page=edit-video&status=Data Anda berhasil di simpan.'; </script>";<?php
					}else{
						echo "Proses upload gagal";
					}
				}
			
			}else{
				//kalo ada gambar 
				if ($keterangan=="" || $fotodoc_gambar=="" || $fotodoc_video=="")//periksa jika data yang dimasukan belum lengkap
				{
					?><script> document.location.href='home.php?page=edit-video-new&status=Data Anda belum lengkap.';</script>";<?php
				
				}else{
					//folder gambar
					$uploaddir_thumb='./thumbnail/';
					//folder video
					$uploaddir_video='./gallery_video/';
					
					//data untuk upload gambar
					$alamat_gambar=$uploaddir_thumb.$_FILES['gambar']['name'];
					$alamat_data_gambar='./admin/thumbnail/'.$_FILES['gambar']['name'];
					$upload_gambar=move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_gambar);
					
					//data untuk upload video
					$alamat_video=$uploaddir_video.$_FILES['video']['name'];
					$alamat_data_video='./admin/gallery_video/'.$_FILES['video']['name'];
					$upload_video=move_uploaded_file($_FILES['video']['tmp_name'],$alamat_video);
					
					if ($upload_gambar || $upload_video)//periksa jika proses upload berjalan sukses
					{
						$upload=mysql_db_query($db,"INSERT INTO gallery_video(thumbnail, video, keterangan,ukuran, tanggal) VALUES('$alamat_data_gambar','$alamat_data_video','$keterangan','$ukuran','$tanggal')");
						?><script> document.location.href='home.php?page=edit-video&status=Data Anda berhasil di simpan.'; </script>";<?php
					}else{
						echo "Proses upload gagal";
					}
				}
			}
			
		}else{
			unset($_POST['kirim']);
		}
	
	
		?>
		<h2 align="center">&nbsp;</h2>
		<p><font color='#0066FF' face='verdana' size='2'>
		<div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
		</font></p>
		
		<form enctype="multipart/form-data" action="edit-video-new.php" method="post">
		<table width="693" border="0" align="center" cellpadding="0" cellspacing="0" class="datatable">
		<tr>
		  <td width="17%" height="37" valign="middle">
		  <font size="2" face="verdana">Video</font></td>
		  <td><input type="file" name="video" size="30" id="video"></td>
		</tr>
		
		<tr>
		  <td width="17%" height="37" valign="middle">&nbsp;</td>
		  <td><input type="checkbox" name="ok" value="ok">
            <span class="style5 style1">Jika tidak gambar untuk video, silahkan ceklist tanda ini !!</span></td>
		</tr>
		
		<tr>
		  <td width="17%" height="37" valign="middle">
		  <font size="2" face="verdana">Gambar Video </font></td>
		  <td><input type="file" name="gambar" size="30" id="gambar"></td>
		</tr>
		
		<tr>
			<td width="17%" height="30" valign="top"><font face="verdana" size="2">Keterangan</font></td>
			<td width="83%">
			<font face="Times New Roman" size="2">
			<textarea cols="30" rows="5" name="keterangan"></textarea>
			</font>
		  </td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td width="83%"><input type="submit" value="Kirim" name="kirim" onclick="return cek();">&nbsp;
		  <input type="button" name="batal" value="Batal" onclick="location.replace('home.php?page=edit-video');" /></td>
		</tr>
		</table>
		</form>					
		
		<p>&nbsp;</p>
		<p><strong>NOTES :</strong> </p>
		<ul>
		  <li><em>Video</em> <em>disarankan dengan format FLV.</em></li>
          <li><em>Gambar Video adalah gambar cover untuk video yang diupload.</em></li>
          <li><em>Perhatikan ukuran file video yang di upload, dengan besar bandwidth yang digunakan. </em></li>
  </ul>
</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>