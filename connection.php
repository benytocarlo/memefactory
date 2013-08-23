<?php
  //connection to the database
  $connection = mysql_connect("localhost","root","root","memefactory") or die("Unable to connect to MySQL");
  $execute = mysql_select_db("memefactory",$connection) or die("Could not select examples");
?>