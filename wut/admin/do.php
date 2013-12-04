<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1;">
<meta HTTP-EQUIV="REFRESH" content="1; url=wut.php">
<title>WUT</title>

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

$action = $_POST["action"];


$id = $_POST["id"];

$title = mysql_real_escape_string($_POST["title"]);

$sfw = $_POST["sfw"];

$link = mysql_real_escape_string($_POST["link"]);

$description = mysql_real_escape_string($_POST["desc"]);

$email = $_POST["email"];


if($action=="Accept The Video")
{
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM vidya");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];
$thisvidid = $numofvidya + 1;

mysql_query("INSERT INTO vidya (ID, SFW, Title, Link, Description)
VALUES ($thisvidid, $sfw, '$title', '$link', '$description')");
mysql_query("DELETE FROM submissions WHERE ID=$id");
$queeries = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arries = mysql_fetch_array($queeries);
$highestid = $arries['Maximum'];
$thisvidid = $numofvidya + 1;
mysql_query("UPDATE submissions SET ID=$id
WHERE ID=$highestid");
mysql_query("ALTER TABLE submissions ORDER BY ID");

echo "<p style=\"text-align: center;\"><b><big><big><big><big>Video has been accepted!</big></big></big></big></p>";

$tweet = "NEW VIDEO ADDED: \"$title\" http://wut.boringtrousers.com/index.php?id=$thisvidid";


require 'tweet/tmhOAuth.php';
require 'tweet/tmhUtilities.php';
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'Vjv0HjHnSQVNi2ch6XBVA',
  'consumer_secret' => 'U2xERc0RCLWQCXj9jWzlwfUXscyYvRCzl786nPduoFo',
  'user_token'      => '953075124-3e8BZGuoYliPVe9jVDM2SK9gEdvp13M6TZWZPnSt',
  'user_secret'     => 'WjcnmiGoYIeNhfj229Mn5tbHUuoMt0uOwoal18aQpU',
));

$code = $tmhOAuth->request('POST', $tmhOAuth->url('1/statuses/update'), array(
  'status' => $tweet
));

if ($code == 200) {
  tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
} else {
  tmhUtilities::pr($tmhOAuth->response['response']);
}

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


$to      = $email;
$subject = "Your submission of $title to WUT has been denied";
$message = "The video you submitted, <a href=\"http://www.youtube.com/watch?v={$link}\">\"$title\"</a>, has been rejected from rotation on <a href=\"wut.boringtrousers.com\">WUT.</a> Respond to this email if you have any questions regarding the rejection of your video. Be sure to include a link to the video you submitted, as we do not keep records of rejected videos.";
$headers = 'From: submissions@wut.boringtrousers.com' . "\r\n" .
    'Reply-To: submissions@wut.boringtrousers.com' . "\r\n" .
    'Content-Type: text/html' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}



mysql_close($con);
?>
</body></html>