<?php session_start(); 
if (session_is_registered('id'))
{
include "include/conn.php";
?>

	<div class="post">
		<h2 class="title"><a href="#">Edit Artikel </a></h2>
		<p class="meta"><em><?php echo $tanggal;?></em></p>
		<div class="entry">
		
		<table width="376" align="left"> 
				 <tr><td width="368">     
				
				 
				
				
				<div align="center">
				     <p><a href="home.php?page=edit-artikel-new" style="text-decoration:none" title="Buat artikel baru"><img src="./img/new-artikel.png" / border="0">Artikel Baru</a></p>
				    <p><font color='#0066FF' face='verdana' size='2'>
					
		      <div align="center"><blink><?php echo $_GET['status'] ?></blink></div>
			    </font></p>
				   </div>
				   <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			    <?php
				//untuk paging
				$query=mysql_db_query($db,"select * from berita order by tgl desc",$koneksi); //input
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
							<a href="home.php?page=edit-artikel&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><?php echo $pages; ?></font></a> 
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
				$result=mysql_db_query($db,"select * from berita order by tgl desc limit $offset,$entries",$koneksi); //output
				$jumlah=mysql_num_rows($query);
					
				
				if ($jumlah){
					?>
				   </div><br />
				   
					   <table align="center" width="362" border="0" class="datatable">
					<tr>
						 <td width="41%" bgcolor="#333333"><div align="center"><b><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">ARTIKEL</font></b>
						   </div>
						 <td width="37%" bgcolor="#333333"><div align="left">
					     <div align="center"><b><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">GAMBAR</font></b> </div></td>
						 <td width="22%" bgcolor="#333333"><div align="center"><b><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">EDIT</font></b>
						 </div>
					  </td>
					</tr>
					<?php
					
					while ($row=mysql_fetch_array($result))
					{
					?>
					<tr>
						<td align="left" valign="top">
							<font face="verdana" size="1" color="#999999">By : <?php echo $row[2]; ?></font><br>
							<font face="verdana" size="2" color="#0033FF"><?php echo $head=$row['head']; ?></font>		
						</td>
						
						<td align="center">
							<font face="verdana" size="-4" color="#666666">
							<?php 
							$gambarku=substr($row['gambar'],8,100);
							$gambar=substr($row['gambar'],15,100);
							
							?><img src="<?php echo $gambarku;?>" width="80" height="80" /><?php
							
							?></font><br>	
						</td>
						
						<td align="center">
							<a href=home.php?page=edit-artikel-update&id=<?php echo $row[0]; ?> style='text-decoration:none' title="Update terakhir : <?php echo $row[1];?>">
							<img src="./img/update.png" border="0"></a>&nbsp;
							<a href=delete.php?id=<?php echo $row[0]; ?>&gambar=<?php echo $gambar; ?>&type=catatan&hal=home.php?page=edit-artikel onclick="return confirm('Apakah Anda yakin akan menghapus artikel : <?php echo $head; ?> ?')" style='text-decoration:none' title="hapus">
							<img src="./img/hapus.png" border="0"></a>
						</td>
					</tr>
					
					<tr>
						<td colspan="3"><hr></td>
					</tr>
					<?php
					} 
					?> 
					<tr><td colspan="3" align="center"><?php echo "Jumlah Data : ".$jumlah;?></td></tr>
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