<?php session_start(); 
if (session_is_registered('id'))
{
include "include/conn.php";
?>

	<div class="post">
		<h2 class="title"><a href="#">Edit Gallery Video </a></h2>
		<p class="meta"><em><?php echo $tanggal;?></em></p>
		<div class="entry">
		
		<table width="492" align="left"> 
				 <tr><td width="583">     
				
				
				<div align="center">
				     <p><a href="home.php?page=edit-video-new" style="text-decoration:none" title="Upload video baru"><img src="img/video.jpg" width="32" height="32" / border="0"> Video Baru</a></p>
				     <p><font color='#0066FF' face='verdana' size='2'>
		      <div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
			    </font></p>
				   </div>
				   <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			    <?php
				//untuk paging
				$query=mysql_db_query($db,"select * from gallery_video order by tanggal desc",$koneksi); //input
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
							<a href="home.php?page=edit-video&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><?php echo $pages; ?></font></a> 
						 <?php
							$pages++;
					}
				}else{
					$pages=0;
				}
				?>
						 </font>
					 </p>
						 
				<?php
				//akhir paging
				
				
				//proses halaman
				$page=(int)$_GET['id'];
				$offset=$page*$entries;
				$result=mysql_db_query($db,"select * from gallery_video order by tanggal desc limit $offset,$entries",$koneksi); //output
				$jumlah=mysql_num_rows($query);
					
				
				if ($jumlah){
					?>
				   </div>
				   <br />
					   <table align="center" width="397" border="0" class="datatable">
					<tr>
						 <td width="29%" bgcolor="#333333"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">KETERANGAN</font></strong></div>
					  <td width="24%" bgcolor="#333333"><div align="left">
					     <div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">GAMBAR VIDEO </font></strong></div>
					  </td>
						 <td width="36%" bgcolor="#333333"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Nama Video</font></strong></div>
					  <td width="11%" bgcolor="#333333"><div align="center"><b><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">EDIT</font></b>
						 </div>
					  </td>
					</tr>
					<?php
					
					while ($row=mysql_fetch_array($result))
					{
					?>
					<tr>
						<td align="left" valign="top">
							<font face="verdana" size="1" color="#999999">
							<?php 
							echo $row['keterangan']."<br>";
							/*
							echo $row['thumbnail']."<br>";
							echo $row['video'];
							*/
							?>
							</font><br>	
						</td>
						
						<td align="center">
							<font face="verdana" size="-4" color="#666666">
							<?php 
							$gambarku=substr($row['thumbnail'],8,100);
							$gambar=substr($row['thumbnail'],12,100);
							
							?><img src="<?php echo $gambarku;?>" width="80" height="80" title="<?php echo $gambar;?>"/><?php
							
							?></font><br>
						</td>
						
						<td align="left"valign="top">
							<?php 	echo $videos=substr($row['video'],22,100);
								echo "<br>";
								echo "<b>Ukuran : </b> ".number_format($row['ukuran'],0,',','.')." bit";
							?>
						</td>
						
						<td align="center">
							<a href=home.php?page=edit-video-update&id=<?php echo $row[0]; ?> style='text-decoration:none' title="Update terakhir : <?php echo $row['tanggal'];?>">
							<img src="./img/update.png" border="0"></a>&nbsp;
							<a href=delete.php?id=<?php echo $row[0]; ?>&type=video&hal=home.php?page=edit-video onclick="return confirm('Apakah Anda yakin akan menghapus gambar : <?php echo substr($row['gambar'],22,100) ?> ?')" style='text-decoration:none' title="hapus">
							<img src="./img/hapus.png" border="0"></a>
						</td>
					</tr>
					
					<tr>
						<td colspan="4"><hr></td>
					</tr>
					<?php
					} 
					?> 
					<tr><td colspan="4" align="center"><?php echo "Jumlah Data : ".$jumlah;?></td></tr>
				   </table>
					<?php
				
				}else{
					echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
				}
				?>
				</td></tr> 
		  </table>
			
	</div>

<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>