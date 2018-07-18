<?php setcookie("kucing-counter","visitor",time()+3600); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Kucing Lucu</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="images/BrightSide.css" type="text/css" />
<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

<script language="javascript" src="include/script.js"></script>
<script language="javascript" src="ajax.js"></script>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery.bigPicture.js"></script> 
<script type="text/javascript" src="./js/jquer.bigPicture-min.js"></script> 
<script type="text/javascript" src="./js/jquery.bigPicture-pack.js"></script> 
<script type="text/javascript" src="./js/jquery.easing.js"></script>  

<link rel="stylesheet" type="text/css" href="css/core.css"/>
<link rel="stylesheet" type="text/css" href="css/skin.css"/> 

</head>
<body>
<div id="wrap">
<div id="header">
<h1 id="logo">D3TI . <span class="green">2A</span></h1>
<form method="post" class="searchform" action="http://google.com/">
<p>
<input type="text" name="search_query" class="textbox" />
<input type="submit" name="search" class="button" value="Search" />
</p>
</form>
<ul>

<?php include "menu-top.php";?>

</ul>
</div>
<div id="content-wrap">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="820" height="120">
<param name="movie" value="images/headerphoto.swf" />
<param name="quality" value="high" />
<embed src="images/headerphoto.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="820" height="120"></embed>
</object>
<div id="sidebar" >
<h1>Menu Utama </h1>


<?php include "menu.php";?>


<p>&nbsp;</p>
<h1>Counter</h1>
<p><?php include "counter.php";?></p>

<p>&nbsp;</p>
<h1>Last Artikel</h1>
<p><?php include "artikel-last.php";?></p>

</div>
<div id="main" > <a name="TemplateInfo"></a>


<?php include "isi.php";?>


</div>

<div id="rightbar">
<h1>Time is Money </h1>
<p><span id="tick2" style="font-size: 18px;"></span></p>
<p>&nbsp;</p>

<h1>Kalender</h1>
<p><?php include "./include/kalender.php";?></p>
<p>&nbsp;</p>

<h1>ShoutBox</h1>
<p><?php include "shoutbox.php";?></p>

</div>
</div>
<div id="footer">
<div class="footer-left">
<p class="align-left"> &copy; 2010 Kucing Lucu| Design by <a href="http://www.styleshout.com/" target="_blank">styleshout</a> | Valid <a href="http://validator.w3.org/check/referer" target="_blank">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">CSS</a> </p>
</div>
<div class="footer-right">
<p class="align-right"> <a href="index.php">Home</a>&nbsp;|&nbsp; <a href="http://www.ri32.wordpress.com" target="_blank">Ri32</a>&nbsp;|&nbsp; <a href="http://www.labhouse.co.cc" target="_blank">LabHouse</a> </p>
</div>
</div>
</div>
</body>/
<script language="javascript">
$('#example6').bt({
padding: 30,
width: 80,
spikeLength: 50,
spikeGirth: 50,
cornerRadius: 20,
fill: 'rgba(0, 0, 0, .8)',
strokeWidth: 3,
strokeStyle: '#CC0',
cssStyles: {color: '#FFF', fontWeight: 'bold'}
});
</script>
</html>

