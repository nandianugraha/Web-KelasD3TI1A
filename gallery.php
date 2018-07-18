<h1>Gallery<span class="green"> Photo</span><img src="images/photo.jpg" alt="photo" width="49" height="41" class="shout"/></h1>
<?php
	include "./include/conn.php";
	
	?><p align="center"><font face="verdana" size="2"><?php
	//untuk paging
	$entries2=6;
	$query=mysql_db_query($db,"select * from gallery_photo",$koneksi); //input
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
		<a href="index.php?page=gallery&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php echo $pages; ?></font></a> 
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
	$result=mysql_db_query($db,"select * from gallery_photo order by tanggal desc limit $offset,$entries2",$koneksi); //output
	
	$sum=mysql_db_query($db,"select * from gallery_photo",$koneksi); //untuk semua data
	$jumlah=mysql_num_rows($query); //jumlah data yang 
	
		$kolom=3;
		?>
		<table class="datatable"><tr>
		<?php
		$i=0;
	
	
	if ($jumlah){
		while ($row=mysql_fetch_array($result))
		{
			$gambar=$row['gambar'];
			$keterangan=$row['keterangan'];
			$tanggal=$row['tanggal'];
			$nama=substr($gambar,22,100);
			
			if($i>=$kolom){
				echo "</tr><tr>";
				$i=0;
			}
			$i++;
			?>
			<td align=center><br>
				<a href="<?php echo $gambar;?>" class="info" name="gambar" title="<?php echo $keterangan;?>">
				<img src="<?php echo $gambar;?>" width="80" height="80"/><br />
				<div class="nama"><?php echo $nama;?></div></a>
			</td>	
			
			<?php
		}
		
		?></tr></table><?php
		
		echo "<center>Jumlah Data : ".$jumlah."</center>";
	}else{
		?>
		<p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p>
		<?php
	} 
?>

<script language="javascript"> 
$('a.info').bigPicture({
  'enableInfo': false,
  'infoPosition': 'top'
}); 
</script>
<!--
<EMBED allowScriptAccess="never" allownetworking="internal" SRC="include/LION_KING.mp3" AUTOSTART=TRUE LOOP=TRUE WIDTH=0 HEIGHT=0 ALIGN=”CENTER”></EMBED>
-->
