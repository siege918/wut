<?php
$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
$vidid = $_GET["id"];

$queery = mysql_query("SELECT * FROM vidya WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);

echo $arry['Title'];
mysql_close($con);
?>
