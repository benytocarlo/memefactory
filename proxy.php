<?php
// File Name: proxy.php
if (!isset($_GET['id_insert'])) die();
	$id_insert = $_GET['id_insert'];
	$url = "ws-wanted.herokuapp.com/memefactory/idmeme/".$id_insert.".json";
	$url = 'http://' . str_replace('http://', '', $url); // Avoid accessing the file system
	echo file_get_contents($url);
?>