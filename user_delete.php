<?php
	include ('database/config.php');
	session_start();
	$s="delete from users where Uid={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('view_users.php?mes=Data Deleted','_self');</script>";


?>