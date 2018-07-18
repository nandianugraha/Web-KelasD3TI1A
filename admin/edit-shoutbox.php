<?php session_start(); 
if (session_is_registered('id'))
{
	include "include/conn.php";
?>

	<div class="post">
	<h2 class="title"><a href="#">Edit ShoutBox</a></h2>
	<p class="meta"><em><?php echo $tanggal;?></em></p>
	<div class="entry">
			
			
	<table width="480" align="left">
	<tr><td width="472">
	
	<p align="center"><font face="verdana" size="2"><?php
	//untuk paging
	$query=mysql_db_query($db,"select * from shoutbox order by waktu desc",$koneksi); //input
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
		?><a href="home.php?page=edit-shoutbox&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><?php echo $pages; ?></font></a><?php
				$pages++;
		}
	}else{
		$pages=0;
	}
	?></font></p><?php
	//akhir paging
	
	
	//proses halaman
	$page=(int)$_GET['id'];
	$offset=$page*$entries;
	$result=mysql_db_query($db,"select * from shoutbox order by waktu desc limit $offset,$entries",$koneksi); //output
	$jumlah=mysql_num_rows($query);
	
	if ($jumlah){
		?>
		<div align="center">
		<p><font color='#0066FF' face='verdana' size='2'><?php echo $_GET['status'] ?></font></p>
		</div>
		
		<table width="471" border=0 align=center cellpadding="5" class="datatable">
		<tr>
			<td width="148"  bgcolor="#333333"><div align="center"><b><font size="2" face="Arial, Helvetica, sans-serif" color="#FFFFFF">NAMA</font></b></font></td>
			<td width="234"  bgcolor="#333333"><div align="center"><b><font size="2" face="Arial, Helvetica, sans-serif" color="#FFFFFF">PESAN</font></b></font></td>
			<td width="51"  bgcolor="#333333"><div align="center"><b><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">HAPUS</font></b></td>
		</tr>
		<?php
		while ($data=mysql_fetch_array($result))
		{
			?>
			<tr>
			<td><font color='#666666' face='verdana' size='1'><?php echo $data['waktu']; ?></font><br>
					<a href="mailto:<?php echo $data['web'];?>" style="text-decoration:none" title="<?php echo $data['web'];?>"><font color='#0066FF' face='verdana' size='2'><?php echo $nama=$data['nama']; ?>
					</font></a></td>
			<td><font color='#000000' face='verdana' size='2'><?php echo $data['pesan']; ?></font></td>
			<td>
			  <div align="center"><a href=delete.php?id=<?php echo $data['id_shout']; ?>&type=delshout&hal=home.php?page=edit-shoutbox  onclick="return confirm('Apakah Anda yakin akan menghapus pesan dari : <?php echo $nama; ?> ?')" style='text-decoration:none' title="Hapus">
			      <img src="./img/hapus.png" border="0"></a></div></td>
			</tr>
			<tr>
				<td height="12" colspan="6"><hr></td>
			</tr>
			<?php
		}
		?>
		<tr><td colspan="3" align="center">Jumlah Data : <?php echo $jumlah;?></td></tr>
		</table>
		
		<?php
		}else{
		?><font color="#FF0000" face="verdana" size="2"><b><p align="center">Belum ada data!!</p></b></font><?php
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