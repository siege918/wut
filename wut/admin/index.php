<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php require_once("../settings.php"); ?>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title><?php echo($sitename);?></title>

<style type="text/css">
h1 {
font-family: "Times New Roman",Times,serif;
font-size: xx-large;
font-weight: bolder;
font-style: normal;
text-transform: uppercase;
text-align: center;
color: <?php echo($textcolor);?>;
}
</style>
</head><body style="color: white; background-color: <?php echo($backgroundcolor);?>;" alink="<?php echo($textcolor);?>" link="<?php echo($textcolor);?>" vlink="#990099">



<?php
$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];
if ($numofvidya>0)
{
$vidid = mt_rand( 1, $numofvidya);
$queery = mysql_query("SELECT * FROM submissions WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);
$title = $arry['Title'];
$link = $arry['Link'];
$desc = $arry['Description'];
}
else
{
	echo "<p style=\"text-align: center;\"><b><big><big><big><big>No submissions left to moderate!</big></big></big></big></p>";
}
mysql_close($con);?>

<form name="form" action="do.php" method="POST">
<input type="hidden" name="id" value="<?php echo($vidid); ?>">

<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h1><?php echo($sitename);?></h1>
<h2 style="text-align: center;">Admin Database<br><br>Title:<br><input style="font-size: 20pt;" size="40" type="text" name="title" value="<?php echo($title); ?>"></h2>
</td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <iframe src="http://www.youtube.com/embed/<?php echo($link);?>?autoplay=1" allowfullscreen="" frameborder="0" height="360" width="640"></iframe><br>Video ID:<br><input style="font-size: 14pt;" type="text" name="link" value="<?php echo($link); ?>"><br>Description:<br><textarea name="desc" rows="4" cols="80"><?php echo($desc);?></textarea></td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: center; vertical-align: top;"><big><big><big><big><a href="wut.php">GET A NEW VIDEO</a></big></big></big></big><br>

<input type="submit" name="action" value="Accept The Video"/>
<input type="submit" name="action" value="Deny The Video"/>
<input type="submit" name="action" value="Save Changes Without Accepting"/>

</form><br><p stlye="text-align: center;">There are <?php echo($numofvidya);?> videos awaiting moderation!</p></td></tr></tbody></table></body></html>