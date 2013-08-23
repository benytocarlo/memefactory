<?php
  require("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor de Imagenes</title>
<link href="css/style.css" rel='stylesheet' type='text/css'/>
<link href="css/jpicker.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link href='http://fonts.googleapis.com/css?family=Chicle|Flavors|Ewert|Creepster|Titan+One' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.2/TweenMax.min.js"></script>
  <script src="js/jq_rotate_min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="js/jpicker.js"></script>
<!-- 

Nombres de Tipografias:

font-family: 'Chicle', cursive;
font-family: 'Flavors', cursive;
font-family: 'Ewert', cursive;
font-family: 'Creepster', cursive;
font-family: 'Titan One', cursive;

-->



<style>
.minibox {
width:auto;
height:auto;
padding:8px;
margin-left:4px;
margin-bottom:4px;
border:2px dotted #666;
}

.minibox .form img { width:100%; height:100%;}

.selected {border:2px dotted red !important}

.fila { float:left; width:100%; margin-bottom:10px;}

.minibox { position:absolute; top:25px; left:25px;}
.minibox .form { max-width:600px; max-height:600px; width:100%; height:100%; }
.minibox .form img { width:auto; height:auto}

#sandbox_tools { width:500px; margin:25px;}

#sandbox_box { position:relative; float:left;width:810px; height:600px; top:25%; left:15px; background-color:#CFF; clear:left;}
#sandbox_post { width:250px; float:left;}

.rotate { background-color:green;}

.edit_block { background-color:transparent; border:none; width:99%; height:99%;}

p { margin:0px;}

/* Display None */

#tipo_size, #cerrar_texto, #font-colour-box { display:none;}

.noborders { border:none !important;}

#slider {}
</style>

</head>

<body>
    <div>
        <div id="sandbox_box">
          <?php
            //$divshoot = $_POST["html_shoot"];
            //echo $divshoot;
            $tabla= "img_creada";
            $donde = "id=".$_GET["id_insert"];
            $sql=mysql_query("SELECT * FROM ".$tabla." WHERE ".$donde);
            $row=mysql_fetch_array($sql);
            //echo $row["img_div"];
            echo $row["img_div"];
          ?>
        </div>
        <div id="sandbox_post"></div>
    </div>
</body>
</html>
