<?php
	$db=new mysqli("localhost","root","","library");
	session_start();
	$s="delete from books where Bid={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('test.php?mes=Data Deleted','_self');</script>";
?>