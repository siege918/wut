<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php require 'settings.php'; ?>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1;">
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php"><title><?php echo($sitename); ?></title>

<style type="text/css">
h1 {
font-family: "Times New Roman",Times,serif;
font-size: xx-large;
font-weight: bolder;
font-style: normal;
text-transform: uppercase;
text-align: center;
color: <?php echo($textcolor); ?>;
}
a:link {color:<?php echo($textcolor); ?>;}      /* unvisited link */
a:visited {color:<?php echo($textcolor); ?>;}  /* visited link */
a:hover {color:<?php echo($textcolor); ?>;
text-decoration:underline;}
</style>
</head><body style="color: <?php echo($textcolor); ?>; background-color: <?php echo($backgroundcolor);?>; alink=<?php echo($textcolor); ?> link=<?php echo($textcolor); ?> vlink=#990099">


<?php

   require_once('recaptchalib.php');
   $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);						
if ($usecaptcha && !$resp->is_valid) {
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
}
else{
$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM submissions");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];
$thisvidid = $numofvidya + 1;

$title = mysql_real_escape_string($_POST["title"]);

$thislink = $_POST["link"];
$pattern = '/v=[a-zA-Z0-9\-_]*/';
preg_match($pattern, $thislink, $matches);
$link = substr($matches[0], 2);

$description = mysql_real_escape_string($_POST["desc"]);

mysql_query("INSERT INTO submissions (ID, Title, Link, Description, Email)
VALUES ($thisvidid, '$title', '$link', '$description', '$email')");

mysql_close($con);
}



?>
<h1>VIDEO SUBMITTED</h1>
</body></html>