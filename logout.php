<?php
	include "database/config.php";
	session_start();
	
	unset ($_SESSION["Aid"]);
	unset ($_SESSION["name"]);
	unset ($_SESSION["Uid"]);
	unset ($_SESSION["nom"]);
	
	session_destroy();
	echo "<script>window.open('home.php','_self');</script>";
?>