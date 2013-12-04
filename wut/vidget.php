<?php
$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM vidya");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];


$vidid = mt_rand( 1, $numofvidya);


echo $vidid;
mysql_close($con);
?>