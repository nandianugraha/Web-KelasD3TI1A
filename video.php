<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #0066FF;
}
-->
</style>
<h1>Gallery<span class="green"> Video</span><img src="images/video.jpg" alt="photo" width="32" height="32" class="shout"/></h1>
 
<center>
<script type="text/javascript" src="swfobject.js"></script>
<?php
	include "./include/conn.php";
	//$play="video4.flv";
	//$thumbnail="preview.jpg";
	
	$play=$_GET['play'];
	$query=mysql_query("select * from gallery_video where id_video='$play'",$koneksi);
	$cek=mysql_num_rows($query);
	while($row=mysql_fetch_array($query))
	{
		$keterangan=$row['keterangan'];
		$play=substr($row['video'],22,100);
		$thumbnail=substr($row['thumbnail'],18,100);
		$download=$row['video'];
		$ukuran=$row['ukuran'];
	}
	
	if($cek){
	?><p align="right"><a href="<?php echo $download;?>" title="Klik disini"><span class="style1"><blink>Download Video</blink></span><img src="images/download.gif" class="shout"/></a>
	<?php echo "Ukuran : ".number_format($ukuran,0,',','.')." bit";?>
	</p><?php
	}
?>
<div>
<div id="container2" style="z-index:1;"></div>
<br /><marquee behavior="scroll" scrollamount="3"><?php echo $keterangan;  ?></marquee>
<script type="text/javascript">
var s1 = new SWFObject("http://localhost/video_online/admin/gallery_video/player.swf","ply","380","320","9","#ffffff");
s1.addParam("allowfullscreen","true");
s1.addParam("allowscriptaccess","always");
s1.addParam("flashvars","file=<?php echo $play;?>&image=http://localhost/video_online/admin/thumbnail/<?php echo $thumbnail;?>");
s1.write("container2");
</script>
</div>
</center>

<?php
	
	?><p align="center"><font face="verdana" size="2"><?php
	//untuk paging
	$entries2=6;
	$query=mysql_db_query($db,"select * from gallery_video",$koneksi); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries2)  //proses
	{
		echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries2))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
		?>
		<a href="index.php?page=video&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php echo $pages; ?></font></a> 
		<?php
			$pages++;
		}
	}else{
		$pages=0;
	}
	?></font></p><?php
	//akhir paging
	
	$page=(int)$_GET['id'];
	$offset=$page*$entries2;
	$result=mysql_db_query($db,"select * from gallery_video order by tanggal desc limit $offset,$entries2",$koneksi); //output
	
	$sum=mysql_db_query($db,"select * from gallery_video",$koneksi); //untuk semua data
	$jumlah=mysql_num_rows($query); //jumlah data yang 
	
		$kolom=3;
		?>
		<table class="datatable"><tr><?php
		$i=0;
	
	if ($jumlah){
		while ($row=mysql_fetch_array($result))
		{
			$id_video=$row['id_video'];
			$gambar=$row['thumbnail'];
			$video=$row['video'];
			$keterangan=$row['keterangan'];
			$tanggal=$row['tanggal'];
			$nama=substr($gambar,22,100);
			$nama_video=substr($video,22,100);
			
			if($i>=$kolom){
				echo "</tr><tr>";
				$i=0;
			}
			$i++;
			?>
			<td align=center><br>
				<a href="index.php?page=video&play=<?php echo $id_video;?>" class="info" name="gambar" title="<?php echo $keterangan;?>">
				<img src="<?php echo $gambar;?>" width="80" height="80"/><br />
				<div class="nama"><?php echo $nama_video;?></div></a>
			</td>	
			
			<?php
		}
		
		?></tr></table><?php
		
		echo "<center>Jumlah Data : ".$jumlah."</center>";
		echo "<br>";
	}else{
		?>
		<p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p>
		<?php
	} 
?>