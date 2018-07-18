<link rel="stylesheet" type="text/css" href="images/BrightSide.css" />
<?php
$mode=$_GET['mode'];
include "./include/conn.php";

if($mode=='box'){
	//echo "untuk mengisi bukutamu";
	$waktu;
	$nama=htmlentities(ucwords($_GET['nama']));
	$web="http://".htmlentities($_GET['web']);
	$pesan=htmlentities($_GET['pesan']);
	
	if ($nama=="" or $web=="" or $pesan==""){
		echo "Data Anda Belum Lengkap!";
	}else{
		$query=mysql_db_query($db,"insert into shoutbox values('','$nama','$web','$pesan','$tanggal')",$koneksi);
		if($query){
			echo "Data Anda Berhasil Disimpan :)";
		}
	}
}

if($mode=='view'){
	//************awal paging************//
	$query=mysql_db_query($db,"select * from shoutbox",$koneksi); 
	$get_pages=mysql_num_rows($query); 
	
	if ($get_pages>$entries) 
	{
		$jumlah_halaman=ceil($get_pages/$entries);
		$halaman_aktif=$_GET['id'];
		
		//untuk prev
		if(($halaman_aktif-1)>0){
			$prev=$halaman_aktif-1;
			?><a href="javascript:;" onclick="view(<?php echo $prev; ?>)" style="text-decoration:none"><font size="2" face="verdana" color="#009900"> &laquo;Prev&nbsp;&nbsp;</font></a><?php
		}
		
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
			//untuk menandai halaman yang aktif
			if ($pages==$halaman_aktif){
				$font="<font size='2' face='verdana' color='red'>";
			}else{
				$font="<font size='2' face='verdana' color='#009900'>";
			}
			
			?><a href="javascript:;" onclick="view(<?php echo $pages; ?>);" style="text-decoration:none"><?php echo $font.$pages; ?></font></a><?php
			$pages++;
		}
	}else{
		$pages=0;
	}
	
	//untuk next
	if($halaman_aktif<$jumlah_halaman){
		$next=$halaman_aktif+1;
		?>&nbsp;&nbsp;<a  href="javascript:;" onclick="view(<?php echo $next; ?>)" style="text-decoration:none"><font size="2" face="verdana" color="#009900">Next&raquo;</font></a><?php
	}
	//**************akhir paging*****************//
	
	//dapatkan nilai id halaman
	$page=((int)$_GET['id'])-1;
	$offset=$page*$entries;
	
	//menampilkan data dengan menggunakan limit sesuai parameter paging yang diberikan
	$result=mysql_db_query($db,"select * from shoutbox order by waktu desc limit $offset,$entries",$koneksi); 
	$jumlah=mysql_num_rows($query);
	?>
	<br><font face="verdana" color="#999999">Jumlah Data : <?php echo $jumlah; ?></font><br><br>
	<?php

	
	if ($jumlah){
		?>
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		<table class="datatable">
		<?php
		while($row=mysql_fetch_array($result)){
		?>
		<tr>
			<td width="17"><a href="<?php echo $row['web'];?>" target="_blank"><img src="./images/web.gif" border="0" class="shout"/></a></td>
			<td width="216"><?php echo $row['nama'];?></td>
		</tr>
		<tr>
			<td colspan="2"><?php echo $row['pesan'];?></td>
		</tr>
		<?php
		}
		?>
		</table>
		<?php
	}else{
		?><font color="#FF0000" face="verdana" size="2">Belum ada data!</font><?php
	}
}

?>

