<?php
  require("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editor de Imagenes</title>
<link href="css/style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<style>
.minibox {
width: 50px;
height: 50px;
float:left;
margin-left:4px;
margin-bottom:4px;
border:2px dotted #666;
}

.fila { float:left; width:100%; margin-bottom:10px;}

.minibox .form { width:100%; height:100%; border-radius:8px; background-color:green;}

#sandbox_tools { width:500px; margin:25px;}

#sandbox_box { float:left;width:810px; height:600px; top:25%; left:15px; background-color:#CFF; clear:left;}
#sandbox_post { width:250px; float:left;}

.rotate { background-color:green;}

p { margin:0px;}

#slider {}
</style>

</head>

<body>
    <div>
        
        <div id="sandbox_tools">
          <div class="fila">
            <button id="addbox">Añadir Caja</button>
          </div>
            <div class="fila">
              <label>Añadir Tipo</label>
            <input type="text" id="texto_input" />
                <button id="addtext">Añadir Texto</button>
            </div>
      <div class="fila">
              <label>Rotar Imagen</label>
            <div id="slider"></div>
            </div>
            <div class="fila">
              <button id="erase_element">Eleminar Elemento Seleccionado</button>
            </div>
            <div class="fila">
              <button id="print_html">Imprimir HTML</button>
              <form action="screenshot.php" method="post" name="form" id="form">
                <input value="" name="html_shoot" id="html_shoot">
              </form>
            </div>
        </div>
        <div id="sandbox_box">
          <?php
            //$divshoot = $_POST["html_shoot"];
            //echo $divshoot;
            $tabla= "img_creada";
            $donde = "id=12123123";
            $sql=mysql_query("SELECT * FROM ".$tabla." WHERE ".$donde);
            $row=mysql_fetch_array($sql);
            //echo $row["img_div"];
            echo $row["img_div"];
          ?>
        </div>
        <div id="sandbox_post"></div>
    </div>
</body>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.2/TweenMax.min.js"></script>
  <script src="js/jq_rotate_min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</html>
