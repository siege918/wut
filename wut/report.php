<html>
<head>
<meta HTTP-EQUIV="REFRESH" content="1; url=index.php">
</head>
<body>

<?php
require("settings.php");

$ID = $_POST["ID"];
$con = mysql_connect("localhost",$sql_user,$sql_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($sql_db, $con);
mysql_query("INSERT INTO report (ID)
VALUES ($ID)");

echo("Report successful!")
?>

</body>
</html>