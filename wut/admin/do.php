<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php require_once("../settings.php"); ?><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1;">
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php">
<title>WUT</title>

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

$action = $_POST["action"];


$id = $_POST["id"];

$title = mysql_real_escape_string($_POST["title"]);

$link = mysql_real_escape_string($_POST["link"]);

$description = mysql_real_escape_string($_POST["desc"]);


if($action=="Accept The Video")
{
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM vidya");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];
$thisvidid = $numofvidya + 1;

mysql_query("INSERT INTO vidya (ID, Title, Link, Description)
VALUES ($thisvidid, '$title', '$link', '$description')");
mysql_query("DELETE FROM submissions WHERE ID=$id");
$queeries = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arries = mysql_fetch_array($queeries);
$highestid = $arries['Maximum'];
$thisvidid = $numofvidya + 1;
mysql_query("UPDATE submissions SET ID=$id
WHERE ID=$highestid");
mysql_query("ALTER TABLE submissions ORDER BY ID");

echo "<p style=\"text-align: center;\"><b><big><big><big><big>Video has been accepted!</big></big></big></big></p>";

}

if($action=="Save Changes Without Accepting")
{
mysql_query("UPDATE submissions SET Title=$title, Link=$link, Description='$description'
WHERE ID=$id");
}

if($action=="Deny The Video")
{
mysql_query("DELETE FROM submissions WHERE ID=$id");
$queeries = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arries = mysql_fetch_array($queeries);
$highestid = $arries['Maximum'];
$thisvidid = $numofvidya + 1;
mysql_query("UPDATE submissions SET ID=$id
WHERE ID=$highestid");
mysql_query("ALTER TABLE submissions ORDER BY ID");
}



mysql_close($con);
?>
</body></html>