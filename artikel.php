<?php
	include "./include/conn.php";
	
	?><p align="center"><font face="verdana" size="2"><?php
	//untuk paging
	$query=mysql_db_query($db,"select * from berita",$koneksi); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
		?>
		<a href="index.php?page=artikel&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php echo $pages; ?></font></a> 
		<?php
			$pages++;
		}
	}else{
		$pages=0;
	}
	?></font></p><?php
	//akhir paging
	
	$page=(int)$_GET['id'];
	$offset=$page*$entries;
	$result=mysql_db_query($db,"select * from berita order by tgl desc limit $offset,$entries",$koneksi); //output
	
	$sum=mysql_db_query($db,"select * from berita",$koneksi); //untuk semua data
	$jumlah=mysql_num_rows($query); //jumlah data yang 
	
	if ($jumlah){
		while ($row=mysql_fetch_array($result))
		{
		?>
			
			
		<h1><?php echo substr($row['head'],0,15)."...";?></h1>
		<p align="justify">
		<a href="index.php?page=artikel-baca&id=<?php echo $row['id_brt'];?>"><img src="<?php echo $row['gambar'];?>" width="91" height="87" alt="firefox" class="float-left" /></a>
		  
		<?php $isi=$row['isi'];
		
		echo substr($isi,0,1000);
		?>
		</p>
		
		
		<p class="post-footer align-right"> 
		<a href="index.php?page=artikel-baca&id=<?php echo $row['id_brt'];?>" class="readmore">[Read more]</a> <font color="#999999">Author : <?php echo $row['penulis'];?> | <span class="date"><?php echo $row['tgl'];?></span></font><span class="date"></span>		</p>
			
			
			
		<?php
		}
	}else{
		?>
		<p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p>
		<?php
	} 
?>