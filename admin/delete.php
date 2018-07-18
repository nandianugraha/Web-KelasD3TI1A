<?php session_start();
if (session_is_registered('id'))
{
	include "./include/conn.php";
	$id=$_GET['id'];
	$hal=$_GET['hal'];
	$jenis=$_GET['type'];
	$id_lokasi=$_GET['id_lokasi'];
	$gambar=$_GET['gambar'];
	
	switch($jenis)
	{
		case "delshout";
			//echo "anda hapus guestbook";
			$hapus="delete from shoutbox where id_shout='$id'";
			$hasil=mysql_db_query($db,$hapus);
			if ($hasil)
			{
				echo "<script> document.location.href='$hal&status=Data sudah di hapus'; </script>";
			}
			else
			{
				echo "Proses Penghapusan data gagal";
				echo mysql_error();
			}
		break;
		
		case "catatan";
			//hapus data dan filenya
			$myFile ="./gambar/".$gambar;
			unlink($myFile);
			
			$hapus="delete from berita where id_brt='$id'";
			$hasil=mysql_db_query($db,$hapus);
			if ($hasil)
			{
				echo "<script> document.location.href='$hal&status=Data sudah di hapus'; </script>";
			}
			else
			{
				echo "Proses Penghapusan data gagal";
				echo mysql_error();
			}
			break;
			
		case "photo";
			//hapus data dan filenya
			$query=mysql_query("select * from gallery_photo where id_photo='$id'",$koneksi);
			while($row=mysql_fetch_array($query))
			{
				$gambar=substr($row['gambar'],22,100);
			}
			
			
			$myFile ="./gallery_photo/".$gambar;
			unlink($myFile);
			
			$hapus="delete from gallery_photo where id_photo='$id'";
			$hasil=mysql_db_query($db,$hapus);
			if ($hasil)
			{
				echo "<script> document.location.href='$hal&status=Data sudah di hapus'; </script>";
			}
			else
			{
				echo "Proses Penghapusan data gagal";
				echo mysql_error();
			}
			break;
		
		case "video";
			//hapus data dan filenya
			//hapus data dan filenya
			$query=mysql_query("select * from gallery_video where id_video='$id'",$koneksi);
			while($row=mysql_fetch_array($query))
			{
				$gambar=substr($row['thumbnail'],18,100);
				$video=substr($row['video'],22,100);
			}
			
			$myVideo ="./gallery_video/".$video;
			unlink($myVideo);
			

			$myFile ="./thumbnail/".$gambar;
			unlink($myFile);
	
			
			
			$hapus="delete from gallery_video where id_video='$id'";
			$hasil=mysql_db_query($db,$hapus);
			if ($hasil)
			{
				echo "<script> document.location.href='$hal&status=Data sudah di hapus'; </script>";
			}
			else
			{
				echo "Proses Penghapusan data gagal";
				echo mysql_error();
			}
			break;
	}
		
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>