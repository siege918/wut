<html>
<head>
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php">
</head>
<body>

<?php

$ID = $_POST["ID"];
$to = "mebecjalt@gmail.com";
$subject = sprintf("Video # %s is broken or duplicate", $ID);
$body = "Just thought you'd like to know ^^";
$headers = "From: report@wut.boringtrousers.com\r\n" .
     "X-Mailer: php";
if (mail($to, $subject, $body, $headers)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }


?>

</body>
</html>