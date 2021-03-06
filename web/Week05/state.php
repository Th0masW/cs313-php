<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

<title>CS 313 Project</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

 
  </head>
<body>

<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">CS-313 Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="busy.php">Busy Times</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="state.php">State Tracker
			  <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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

?>
	
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">State Tracker
        <small>...</small>
      </h1>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
                        <div class="card-body">
              <h4 class="card-title">
                Break Out by States
              </h4>
              <p class="card-text">
			  
			  <table><tr><td><strong>STATE....   </strong></td><td><strong>COUNT   </strong></td></tr>
			   <?php foreach ($db->query("select state.state,count(*) 
						from state inner join annoying_people 
						on state.id=annoying_people.state group by state.state order by count desc;") as $row): ?>
            <tr>
                
                   <td> <?php echo($row["state"]); ?> </td> 
                   <td> <?php echo($row["count"]); ?></td>
                
                
            </tr>
        <?php endforeach; ?>
       </table>	  
			  	  
			  </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            
            <div class="card-body">
              <h4 class="card-title">
                Break out by Gender
              </h4>
              <p class="card-text">
			  
			  <table><tr><td><strong>Gender....   </strong></td><td><strong>COUNT   </strong></td></tr>
			   <?php foreach ($db->query(" select gender.gender,count(*) 
											from gender inner join annoying_people 
											on gender.id=annoying_people.gender group 
											by gender.gender order by count desc;") as $row): ?>
            <tr>
                
                   <td> <?php echo($row["gender"]); ?> </td> 
                   <td> <?php echo($row["count"]); ?></td>
                
                
            </tr>
        <?php endforeach; ?>
       </table>	  
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
             <div class="card-body">
              <h4 class="card-title">
                States
              </h4>
              <p class="card-text">Place holder for State tracker</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; CS 313 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>