<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>Project</title>

  <link rel="stylesheet" type="text/css" href="CSS/styles.css">
 
  </head>
<body>
<?php 
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

foreach ($db->query("SELECT * FROM public.state WHERE state = 'UT'") as $row)
{
  echo 'State Name: ' . $row['state'];

  echo '<br/>';
}
?>


<h1>Scripture Resources</h1>
        <ul>
        <?php foreach ($db->query("SELECT * FROM public.annoying_people") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["time"]); ?>
                    <?php echo($row["gender"]); ?>:<?php echo($row["state"]); ?>
                </strong>
                
            </li>
        <?php endforeach; ?>
        </ul>
        <hr />
<?php foreach ($db->query("SELECT * FROM public.state") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["state"]); ?>
                </strong>
                
            </li>
        <?php endforeach; ?>
		
		<h1>Annoying States</h1>
		<form name="form1" id="form1" action="" method="post">
		<select name="selectid" Id="select">
		<option value="">--- Select ---</option>

		<?php foreach ($db->query("SELECT * FROM public.state") as $row): ?>                        
               	<option>     
					<?php echo($row["state"]); ?>
         		</option>                    
        <?php endforeach; ?>

		</select>
		</form>
		
		
		
		
		
</body>
</html>