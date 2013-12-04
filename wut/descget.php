<?php
require("settings.php");
$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
$vidid = $_GET["id"];

$queery = mysql_query("SELECT * FROM vidya WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);

echo $arry['Description'];
mysql_close($con);
?>