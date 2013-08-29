<?php
$extensiones = array("jpg", "jpeg", "png", "gif");
$f = $_GET["url"];
if(strpos($f,"heroku/")==false){
die("No puedes navegar por otros directorios");
}
$ftmp = explode(".",$f);
$fExt = strtolower($ftmp[count($ftmp)-1]);

if(!in_array($fExt,$extensiones)){
die("<b>ERROR!</b> no es posible descargar ese archivo");
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$f\"\n");
$fp=fopen("$f", "r");
fpassthru($fp);
?>