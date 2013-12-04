<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>WUT</title>

<style type="text/css">
</style>
</head><body>



<?php
$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
$vidid = 1;
$queery = mysql_query("SELECT Link FROM vidya");
$arry = mysql_fetch_array($queery);
$i = 0;
while ($arry = mysql_fetch_array($queery, MYSQL_NUM)) {'
	$i++;
    printf("%s: http://www.youtube.com/watch?v=%s <br>", $i, $arry[0]);  
}
mysql_close($con);?>
</body></html>