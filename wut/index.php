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
$queer = mysql_query("SELECT MAX(ID) as Maximum FROM vidya");
$arr = mysql_fetch_array($queer);
$numofvidya = $arr['Maximum'];

if ($vidrequest==0){
$vidid = mt_rand( 1, $numofvidya);
}

else{
$vidid = $vidrequest;
}

$queery = mysql_query("SELECT * FROM vidya WHERE ID=$vidid");
$arry = mysql_fetch_array($queery);
$title = $arry['Title'];
$link = $arry['Link'];
$sfw = $arry['SFW'];
$desc = $arry['Description'];
mysql_close($con);

?>



<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<!-- <h2 style="text-align: center;">boringtrousers needs help keeping WUT up</h2>


<h3 style="text-align: center;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

(this link will be moved to the bottom once we've raised enough to keep the site up for another month)</h3>
//-->

<h2 style="text-align: center;"><div id="title"><?php echo($title); ?></div></h2>
</td>
</tr>
</tbody>
</table>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>

<td width="10%" align="center"><font color="black">ad go here</font></td>

<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <div id="player"></div><br><div id="desc"><?php echo($desc);?></div>

<font color="red">*NEW*</font> Enable Autoplay <input type="checkbox" checked="true" id="autoplay"> <font color="red">*NEW*</font>
<br>Permalink: http://wut.boringtrousers.com/index?id=<i id="permaid"><?php echo($vidid); ?></i>
<br>

</td>

<td width="10%" align="center"><font color="black">ad go here</font></td>

</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: center; vertical-align: top;"><big><big><big><a onclick="getVideo()" href="javascript:void(0);">GET A NEW VIDEO</a></big></big></big>
<br>
<p stlye="text-align: center;">This site has <?php echo($numofvidya);?> videos and counting! And <a href="http://wut.boringtrousers.com/submit.php">YOU can submit  new videos!</a></p>
<br>
<form name="myform" action="report2.php" method="POST">
<input id="reportid" type="hidden" name="ID" value="<?php echo($vidid); ?>">
<input type="submit" value="Reporting is active again DON'T MAKE ME REGRET IT"/></form>
<br>

</td></tr></tbody></table>


<script>
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var vidget=new XMLHttpRequest();
      var titleget=new XMLHttpRequest();
      var descget=new XMLHttpRequest();
      var linkget=new XMLHttpRequest();

      var vidid;
      var vidtitle;
      var viddesc;
      var vidlink;

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
        if (event.data == YT.PlayerState.ENDED && document.getElementById("autoplay").checked) {
          getVideo();
          //window.location = "http://wut.boringtrousers.com";
        }
      }

      function onError(event)
      {
         if (document.getElementById("autoplay").checked)
         {
            getVideo();
         }
      }

      function getVideo()
      {
         vidget.open("GET","vidget.php?t=" + Math.random(),true);
         vidget.send();
      }

      vidget.onreadystatechange=function()
      {
      if (vidget.readyState==4 && vidget.status==200)
         {
            vidid=vidget.responseText;
            titleget.open("GET","titleget.php?id=" + vidid + "&t=" + Math.random(),true);
            titleget.send();
         }
      }

      titleget.onreadystatechange=function()
      {
      if (titleget.readyState==4 && titleget.status==200)
         {
            document.getElementById("title").innerHTML=titleget.responseText;
            descget.open("GET","descget.php?id=" + vidid + "&t=" + Math.random(),true);
            descget.send();
         }
      }

      descget.onreadystatechange=function()
      {
      if (descget.readyState==4 && descget.status==200)
         {
            document.getElementById("desc").innerHTML=descget.responseText;
            linkget.open("GET","linkget.php?id=" + vidid + "&t=" + Math.random(),true);
            linkget.send();
         }
      }

      linkget.onreadystatechange=function()
      {
      if (linkget.readyState==4 && linkget.status==200)
         {
            player.loadVideoById(linkget.responseText);
            document.getElementById("reportid").value=vidid;
            document.getElementById("permaid").innerHTML=vidid;
         }
      }
    </script>
</body></html>