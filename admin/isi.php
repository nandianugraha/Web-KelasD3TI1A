<?php
$page=$_GET['page'];

switch($page)
{
	case "welcome";
	include "welcome.php";
	break;
			
	case "edit-profil";
	include "edit-profil.php";
	break;
	
	case "edit-shoutbox";
	include "edit-shoutbox.php";
	break;

	case "edit-artikel";
	include "edit-artikel.php";
	break;
	
	case "edit-artikel-new";
	include "edit-artikel-new.php";
	break;
	
	case "edit-artikel-update";
	include "edit-artikel-update.php";
	break;
	
	case "edit-video";
	include "edit-video.php";
	break;
	
	case "edit-gallery";
	include "edit-gallery.php";
	break;
	
	case "edit-gallery-new";
	include "edit-gallery-new.php";
	break;
	
	case "edit-gallery-update";
	include "edit-gallery-update.php";
	break;
	
	case "edit-video";
	include "edit-video.php";
	break;
	
	case "edit-video-new";
	include "edit-video-new.php";
	break;
	
	case "edit-video-update";
	include "edit-video-update.php";
	break;
	
	default;
	include "welcome.php";
	break;
}

?>