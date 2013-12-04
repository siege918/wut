<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<?php require('settings.php'); ?>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title><?php echo($sitename); ?></title>

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
recaptcha_area
{
    margin: 0 auto;
}
</style>
</head><body style="color: <?php echo($textcolor); ?>; background-color: <?php echo($backgroundcolor); ?>;" alink="<?php echo($textcolor); ?>" link="<?php echo($textcolor); ?>" vlink="#990099">

<form  name="input" action="add.php" method="post">
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h1>Submit a Video To <a href=<?php echo($WUTurl); ?>><?php echo($sitename);?></a></h1>
<h2 style="text-align: center;"><?php echo($submissionheader); ?><br><br> Video Title (make it up): <input type="text" name="title" /></h2>
</td>
</tr>
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
  if ($usecaptcha)
  {
     require_once('recaptchalib.php');;
     echo recaptcha_get_html($publickey);
  }
  ?>
</div></td></tr>
<tr style="text-align: center; vertical-align: top; word-wrap: break-word;"><td><?php if ($usesubmissions){echo("<input type=\"submit\" value=\"Submit\" />");}?></tr></td>
</tbody>
</table>
<br>
</body></html>