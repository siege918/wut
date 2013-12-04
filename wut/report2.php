<html>
<head>
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php">
</head>
<body>

<?php

$ID = $_POST["ID"];
$con = mysql_connect("localhost","mebecj_wut","867-5309");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mebecj_wut", $con);
mysql_query("INSERT INTO report (ID)
VALUES ($ID)");

echo("Report successful!")
?>

</body>
</html>