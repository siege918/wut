<?php
require("settings.php");
$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM vidya");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];


$vidid = mt_rand( 1, $numofvidya);


echo $vidid;
mysql_close($con);
?>