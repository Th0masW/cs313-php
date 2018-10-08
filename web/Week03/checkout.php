<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Meme Store Checkout</title>

  <link rel="stylesheet" type="text/css" href="CSS/styles.css">
  
</head>
<body>
<div class="header">
<?php include 'header.php';?>
</div>

<nav id="css_menu">
<div class="menu">
<?php include 'menu.php';?>
</div>
</nav>

<h2> Please enter the below information to complete your order.</h2>
<?php
// define variables and set to empty values
$nameErr = $streetaddressErr = $stateErr = $zipErr = $emailErr = "";
$name = $streetaddress = $state = $zip = $email = "";
$check=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["streetaddress"])) {
    $streetaddressErr = "Address is required";
  } else {
    $streetaddress = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$streetaddress)) {
      $streetaddressErr = "Only letters number and and white space allowed"; 
    }
  }

  if (empty($_POST["state"])) {
    $stateErr = "State is required";
  } else {
    $state = test_input($_POST["state"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed"; 
    }
  }
  
   if (empty($_POST["zip"])) {
    $zipErr = "Zip Code is required";
  } else {
    $zip = test_input($_POST["zip"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9 ]*$/",$zip)) {
      $zipErr = "Only numbers are allowed"; 
    }
  }
  
    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    } else {
		$check=true;
	}
  }
}


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error"></span></p>
<form method="post" action="confirmation.php">  
  Name: <input type="text" id="name" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  Street Address: <input type="text" id="streetaddress" name="streetaddress" value="<?php echo $streetaddress;?>">
  <span class="error"><?php echo $streetaddressErr;?></span>
  <br><br>
  City: <input type="text" name="city" value="<?php echo $zip;?>">
  <span class="error"> <?php echo $zipErr;?></span>
  <br><br>
  State: <input type="text" id="state" name="state" value="<?php echo $state;?>">
  <span class="error"> <?php echo $stateErr;?></span>
  <br><br>
  Zip Code: <input type="text" name="zip" value="<?php echo $zip;?>">
  <span class="error"> <?php echo $zipErr;?></span>
  <br><br>
  <br><br>
  <input type="submit" name="submit" value="Submit"> <br><br>
  
</form>



<div class="footer">
<?php include 'footer.php';?>
</div>
</body>
</html>