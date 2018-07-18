<?php
$page=$_GET['page'];

switch($page)
{
	case "home";
	include "home.php";
	break;
			
	case "gallery";
	include "gallery.php";
	break;
	
	case "video";
	include "video.php";
	break;

	case "about";
	include "about.php";
	break;
	
	case "artikel";
	include "artikel.php";
	break;
	
	case "artikel-baca";
	include "artikel-baca.php";
	break;
	
	default;
	include "home.php";
	break;
}

?>