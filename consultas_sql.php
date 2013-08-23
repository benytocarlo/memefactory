<?php
    require ("connection.php");
	//////// Actualiza Datos ///////////
	$img_div 	= $_POST["img_div"];
	$id_usuario = "12123123";

	$tabla= "img_creada";
	$campos	= "id_usuario,img_div";
	$valores	= "'$id_usuario','$img_div'";
    $result = mysql_query("INSERT INTO ".$tabla." (".$campos.") VALUES (".$valores.")");
    echo mysql_insert_id();
	mysql_close($connection);
?>