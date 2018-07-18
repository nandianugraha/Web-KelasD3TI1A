<h1>	
   <font face="Arial, Helvetica, sans-serif" color="#000000" size="2"><h4>
	  <script language="JavaScript" type="text/javascript">
		var message="Meooong....Selamat Datang"
		var neonbasecolor="white"
		var neontextcolor="black"
		var flashspeed=100  //dalam milisekon
		
		var n=0
		if (document.all||document.getElementById){
		document.write('<font color="'+neonbasecolor+'">')
		for (m=0;m<message.length;m++)
		document.write('<span id="neonlight'+m+'">'+message.charAt(m)+'</span>')
		document.write('</font>')
		}
		else
		document.write(message)
		
		function crossref(number){
		var crossobj=document.all? eval("document.all.neonlight"+number) : document.getElementById("neonlight"+number)
		return crossobj
		}
		
		function neon(){
		
		//Mengubah semua karakter ke warna dasar
		if (n==0){
		for (m=0;m<message.length;m++)
		//eval("document.all.neonlight"+m).style.color=neonbasecolor
		crossref(m).style.color=neonbasecolor
		}
		
		//bergantian dan merubah karakter ke warna yang lain
		crossref(n).style.color=neontextcolor
		
		if (n<message.length-1)
		n++
		else{
		n=0
		clearInterval(flashing)
		setTimeout("beginneon()",1500)
		return
		}
		}
		function beginneon(){
		if (document.all||document.getElementById)
		flashing=setInterval("neon()",flashspeed)
		}
		beginneon()
	</script>
	</h4></font>
	</span></h1>
<p align="justify"><img src="images/Kapten.jpg" width="120" height="111" alt="firefox" class="float-left" />Ich ada kucing bisa ngomong!!!. Please dech jangan lebay, itu adminnya yang nulis...hehehe. Btw (By the way), situs apaan sech ini?. Ini teh situs MULTIMEDIA tentang kucing. Buat para penggemar kucing di seluruh dunia maya :) (kereeeen!!!!). Disini ada gallery photo kucing-kucing yang <em>ingsyalloh</em> lucu-lucu. Video lucu tentang kucingnya juga ada loch. Untuk menambah wawasan Anda tentang &quot;Perkucingan&quot;, di situs ini juga ada artikel yang bisa anda baca sendiri atau rame-rame :D </p>
  <p align="justify">Yaudah ndak mau panjang lebar sambutanya. mudah-mudahan situs ini berguna bagi semua pengunjung. kurang dan lebihnya saya mohon maaf dalam penggunaan kata-kata <em>informal</em> dalam situs ini.  Wasalam... <br />
  </p>
  <h1><blink>Last <span class="green">Video</blink></span><img src="images/video.jpg" width="32" height="32" class="shout"/></h1>
    
	<p align="center"><font face="verdana" size="2">
	
	<?php
	//untuk paging
	$entries2=3;
	$query=mysql_db_query($db,"select * from gallery_video",$koneksi); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries2)  //proses
	{
		//echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries2))
		{
			if ($pages!=1)
			{
				//echo " | ";
			}
		?>
		<a href="index.php?page=video&id=<?php echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php //echo $pages; ?></font></a> 
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
				<img src="<?php echo $gambar;?>" width="80" height="80" class="thumbnail"/><br />
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
  <p class="post-footer align-right"> <a href="index.php?page=video" class="readmore">Many more</a><span class="date"><?php echo $tanggal;?></span> </p>
  <a name="SampleTags"></a>
  
  