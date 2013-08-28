<?php
  require("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor de Imagenes</title>
<link href="css/style.css" rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Chicle|Flavors|Ewert|Creepster|Titan+One' rel='stylesheet' type='text/css'>
<!-- 

Nombres de Tipografias:

font-family: 'Chicle', cursive;
font-family: 'Flavors', cursive;
font-family: 'Ewert', cursive;
font-family: 'Creepster', cursive;
font-family: 'Titan One', cursive;

-->
<style>
#sandbox_box { position:relative; float:left;width:810px; height:600px; top:25%; left:15px; background-color:#CFF; clear:left;}
</style>

</head>

<body>
    <div>
        <div id="sandbox_box">
          <?php
            $tabla= "img_creada";
            $donde = "id=".$_GET["id_insert"];
            $sql=mysql_query("SELECT * FROM ".$tabla." WHERE ".$donde);
            $row=mysql_fetch_array($sql);
            echo $row["img_div"];
          ?>
        </div>
    </div>
</body>
</html>
