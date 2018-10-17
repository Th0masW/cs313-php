<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>Project</title>

  <link rel="stylesheet" type="text/css" href="CSS/styles.css">
 
  </head>
<body>

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT state FROM state') as $row)
{
  echo 'State Name: ' . $row['state'];

  echo '<br/>';
}

</body>
</html>