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

$desc = $arry['Description'];
$desc = nl2br($desc);
$desc = preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $desc);
echo($desc);
mysql_close($con);
?>