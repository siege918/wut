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
</head><body style="color: white; background-color: black; alink=white link=white vlink=#990099>




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
<h2 style="text-align: center;">boringtrousers thinks this stuff is funny<br><br><div id="title"><?php echo($title); ?></div></h2>
</td>
</tr>
</tbody>
</table>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <div id="player"></div><br><div id="desc"><?php echo($desc);?></div>

<br><br><font color="red">*NEW*</font> Permalink: http://wut.boringtrousers.com/index?id=<i id="permaid"><?php echo($vidid); ?></i> <font color="red">*NEW*</font>
<br>

</td>
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
        if (event.data == YT.PlayerState.ENDED) {
          getVideo();
          //window.location = "http://wut.boringtrousers.com";
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