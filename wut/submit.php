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
recaptcha_area
{
    margin: 0 auto;
}
</style>
</head><body style="color: white; background-color: black;" alink="white" link="white" vlink="#990099">

<form  name="input" action="add.php" method="post">
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h1>Submit a Video To <a href=http://wut.boringtrousers.com>WUT</a></h1>
<h2 style="text-align: center;">BoringTrousers
Might Think This Is Funny<br><br> Video Title (make it up): <input type="text" name="title" /></h2>
</td>
</tr>
<tr>
<td>
<p style="text-align: center;">Not Safe For Work <input type="checkbox" name="sfw" value="NSFW" /></p>
</tr>
</td>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> Video Link (Just the one in your address bar): <input type="text" name="link" /><br>Description: <textarea name="desc" rows="10" cols="30">Put your description here, k? :D</textarea></td>
</tr>
<tr style="text-align: center; vertical-align: top; word-wrap: break-word;"><td>
<div align="center">
  <?php
  require_once('recaptchalib.php');
  $publickey = "6LekrdUSAAAAAFFHF5HNMUAuZVLietQIiqvyRQfr"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
  ?>
</div>
  Sorry, guys. We've had spambot issues</td></tr>
<!--<tr style="text-align: center; vertical-align: top; word-wrap: break-word;"><td>Email Address (Only put it here if you want to be informed if your video has been accepted or rejected. Otherwise, leave it blank):<br> <input type="text" name="email" /></td></tr>-->
<tr style="text-align: center; vertical-align: top; word-wrap: break-word;"><td><input type="submit" value="Submit" /></tr></td>
</tbody>
</table>
<br>
</body></html>