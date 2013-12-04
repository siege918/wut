<?php
$newcookie = $_COOKIE['bump'] + 1;

if($newcookie < 4)
{
	$database = "vidya";
}
else
{
	$database = "bump";
	$newcookie = 0;
}

$expire=time()+60*60*24*30;
setcookie("bump", $newcookie, $expire);

?>

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
a:link {color:#FFFFFF;}      /* unvisited link */
a:visited {color:#FFFFFF;}  /* visited link */
a:hover {color:#FFFFFF;
text-decoration:underline;}
</style>
</head><body style="color: white; background-color: black; alink=white link=white vlink=#990099">




<?php

$vidrequest = $_GET['id'];


$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM $database");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];

if ($vidrequest==0){
$vidid = mt_rand( 1, $numofvidya);
}

else{
$vidid = $vidrequest;
}


$queery = mysql_query("SELECT * FROM $database WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);
$title = $arry['Title'];
$link = $arry['Link'];
$sfw = $arry['SFW'];
$desc = $arry['Description'];
mysql_close($con);?>



<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h2 style="text-align: center;">boringtrousers thinks this stuff is funny<br><br> <a style="text-decoration:none;" href="http://www.youtube.com/watch?v=<?php echo($link);?>"><?php

if ($sfw==0){
	echo("<font color=\"red\"><big>[NSFW]</big></font> ");
} 
 echo($title); ?></a></h2>
</td>
</tr>
</tbody>
</table>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <div id="player"></div><br><?php echo($desc);?>

<br><br><font color="red">*NEW*</font> Permalink: http://wut.boringtrousers.com/index?id=<?php echo($vidid); ?> <font color="red">*NEW*</font>
<br><!--<a href="http://www.youtube.com/watch?v=<?php echo($link);?>">Watch on YouTube</a>-->

</td>
</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: center; vertical-align: top;"><big><big><big><a href="index.php">GET A NEW VIDEO</a></big></big></big>
<br>
<p stlye="text-align: center;">This site has <?php echo($numofvidya);?> videos and counting! And <a href="http://wut.boringtrousers.com/submit.php">YOU can submit  new videos!</a></p>
<br>
<form name="myform" action="report2.php" method="POST">
<input type="hidden" name="ID" value="<?php echo($vidid); ?>">
<input type="submit" value="Reporting is active again DON'T MAKE ME REGRET IT"/></form>
<br>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7447322185765162";
/* WUT */
google_ad_slot = "2291959897";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</br>
<a class="twitter-timeline" data-dnt=true href="https://twitter.com/WutVideo" data-widget-id="269699045738561537">Tweets by @WutVideo</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</td></tr></tbody></table>


<script>
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '360',
          width: '640',
          videoId: '<?php echo($link); ?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
          location.reload();
        }
      }
    </script>
</body></html>