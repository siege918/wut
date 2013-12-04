<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>WUT</title>

<style type="text/css">
h1 {
font-family: "Times New Roman",Times,serif;
font-size: xx-large;
font-weight: bolder;
font-style: normal;
text-transform: uppercase;
text-align: center;
color: white;
}
</style>
</head><body style="color: white; background-color: black;" alink="white" link="white" vlink="#990099">




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
$vidid = $_GET['id'];
$queery = mysql_query("SELECT * FROM vidya WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);
$title = $arry['Title'];
$link = $arry['Link'];
$sfw = $arry['SFW'];
$desc = $arry['Description'];
mysql_close($con);?>

<form name="myform" action="index.php" method="GET">

<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h1>wut</h1>
<h2 style="text-align: center;">BoringTrousers
Thinks This Stuff Is Funny<br><br> <?php

if ($sfw==0){
	echo("<font color=\"red\"><big>[NSFW]</big></font> ");
} 
 echo($title); ?></h2>
</td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <iframe src="http://www.youtube.com/embed/<?php echo($link);?>?autoplay=1" allowfullscreen="" frameborder="0" height="360" width="640"></iframe><br><?php echo($desc);?></td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: center; vertical-align: top;"><input type="text" name="id" /><br><input type="submit" value="Go To This Video"/></form><p stlye="text-align: center;">This site has <?php echo($numofvidya);?> videos and counting! And <a href="http://wut.boringtrousers.com/submit.php">YOU can submit  new videos!</a></p></td></tr></tbody></table></body></html>