<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php require 'settings.php'; ?>
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
a:link {color:<?php echo($textcolor); ?>;}      /* unvisited link */
a:visited {color:<?php echo($textcolor); ?>;}  /* visited link */
a:hover {color:<?php echo($textcolor); ?>;
text-decoration:underline;}
</style>
</head><body style="color: <?php echo($textcolor); ?>; background-color: <?php echo($backgroundcolor);?>; alink=<?php echo($textcolor); ?> link=<?php echo($textcolor); ?> vlink=#990099">




<?php

$vidrequest = $_GET['id'];

$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
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
$desc = $arry['Description'];
$desc = nl2br($desc);
$desc = preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $desc);
mysql_close($con);

?>



<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>
<h2 style="text-align: center;"><?php echo($pageheader); ?></h2>

<h2 style="text-align: center;"><div id="title"><?php echo($title); ?></div></h2>
</td>
</tr>
</tbody>
</table>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>

<td style="text-align: center; vertical-align: top; word-wrap: break-word;"> <div id="player"></div><br><div id="desc"><?php echo($desc);?></div>

Enable Autoplay <input type="checkbox" checked="true" id="autoplay">
<br>Permalink: <?php echo($WUTurl); ?>index?id=<i id="permaid"><?php echo($vidid); ?></i>
<br>

</td>

</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: center; vertical-align: top;"><big><big><big><a onclick="getVideo()" href="javascript:void(0);">GET A NEW VIDEO</a></big></big></big>
<br>
<p stlye="text-align: center;">This site has <?php echo($numofvidya);?> videos and counting! <?php if($usesubmissions){ echo("And <a href=\""); echo($WUTurl); echo("submit.php\">YOU can submit new videos!</a>");}?></p>
<br>
<form name="myform" action="report.php" method="POST">
<input id="reportid" type="hidden" name="ID" value="<?php echo($vidid); ?>">
<?php if ($usereporting) echo("<input type=\"submit\" value=\"Report This Video\"/></form>");?>
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