<?php
	include "./include/conn.php";
	
	$result2=mysql_db_query($db,"select * from berita order by tgl desc limit 0,3",$koneksi); //output
	
	$jumlah2=mysql_num_rows($result2); //jumlah data yang 
	
	if ($jumlah2){
		while ($row2=mysql_fetch_array($result2))
		{
		?>

		<p align="left"> 
		<a href="index.php?page=artikel-baca&id=<?php echo $row2['id_brt'];?>" class="shout"><img src="images/artikel.png" border="0"/ class="shout"><?php echo substr($row2['head'],0,15)."...";?></a>
		</p>
			

		<?php
		}
	}else{
		?>
		<p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p>
		<?php
	} 
?>