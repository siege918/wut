<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1;">
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php"><title>WUT</title>

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

require_once('recaptchalib.php');
  $privatekey = "6LekrdUSAAAAADeHVvGpKVQB9G1NxSnyxpu9N-jD";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
								
if (!$resp->is_valid) {
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
}
else{
$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];
$thisvidid = $numofvidya + 1;

$title = mysql_real_escape_string($_POST["title"]);

$issfw = $_POST["sfw"];
if ($issfw=="NSFW")
{
	$sfw = 0;
}
else
{
	$sfw = 1;
}

$thislink = $_POST["link"];
$pattern = '/v=[a-zA-Z0-9\-_]*/';
preg_match($pattern, $thislink, $matches);
$link = substr($matches[0], 2);

$description = mysql_real_escape_string($_POST["desc"]);

mysql_query("INSERT INTO submissions (ID, SFW, Title, Link, Description, Email)
VALUES ($thisvidid, $sfw, '$title', '$link', '$description', '$email')");

mysql_close($con);
}



?>
<h1>VIDEO SUBMITTED</h1>
</body></html>