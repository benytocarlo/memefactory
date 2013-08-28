<?php
  //connection to the database
  $connection = mysql_connect("localhost","appdigit","55IKI-4TTnu_","appdigit_pruebas_fb") or die("Unable to connect to MySQL");
  $execute = mysql_select_db("appdigit_pruebas_fb",$connection) or die("Could not select Database");
?>