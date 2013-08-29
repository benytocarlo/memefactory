<?php
  require("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor de Imagenes</title>
<link href="http://appdigital.cl/test_jquery/edit_image/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://appdigital.cl/test_jquery/edit_image/css/generator_style.css" rel="stylesheet" type="text/css" media="all" />
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
