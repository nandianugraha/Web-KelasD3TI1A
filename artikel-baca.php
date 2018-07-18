<?php
	include "./include/conn.php";
	$id=$_GET['id'];
	
	$query=mysql_query("select * from berita where id_brt='$id'",$koneksi); //untuk semua data
	$jumlah=mysql_num_rows($query); //jumlah data yang 
	
	if ($jumlah){
		while ($row=mysql_fetch_array($query))
		{
		?>
			
			
		<h1><?php echo $row['head'];?></h1>
		<p align="justify">
		<img src="<?php echo $row['gambar'];?>" width="120" height="111" alt="firefox" class="float-left" />
		<?php echo $row['isi'];?>
		</p>
		
		
		<p class="post-footer align-right"> 
		<a href="index.php?page=artikel">&laquo;Kembali</a>&nbsp;&nbsp;Author : <?php echo $row['penulis'];?><span class="date"><?php echo $row['tgl'];?></span> 
		</p>
			
			
			
		<?php
		}
	}else{
		?>
		<p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p>
		<?php
	} 
?>