<?php session_start();?>
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

	<script>

</script>
 
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="busy.php">Busy Times</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="state.php">State Tracker</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Tracker
        <small>...</small>
      </h1>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
                        <div class="card-body">
              <h4 class="card-title">
                You just updated the database with the following information:
              </h4>
              <p class="card-text">
			  <?php

// get the data from the POST
//$busy = $_POST['stateForm'];
$gender = $_POST['AnnoyingPeople'];
$state = $_POST['SelectState'];
$CurrentTime = date('m/d/Y h:i:s a', time());;
echo $CurrentTime; 
echo "    ";

//Inser data into DB
$db->query("INSERT INTO annoying_people (time, gender,state) VALUES (current_timestamp, $gender, $state)");
//display data
$statement = $db->query("SELECT gender.Gender FROM gender WHERE gender.ID = $gender");
$statement->execute();
$gender_results = $statement->fetch(PDO::FETCH_ASSOC);
?><strong><br>
<?php
echo "Gender: "; ?></strong>
<?php
echo $gender_results["gender"];?>  <br>
<strong>State:</strong>
<?php
echo "STATE::::";echo $state;
$statement = $db->query("SELECT state.STATE FROM state WHERE state.ID = $state");
$statement->execute();
$gender_results = $statement->fetch(PDO::FETCH_ASSOC);
echo $state_results["State"];?>  <br>
			  </p>
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