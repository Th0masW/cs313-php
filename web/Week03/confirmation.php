<?php session_start();

$_SESSION["name"] = $_POST["name"];
$_SESSION["streetaddress"] = $_POST["streetaddress"];
$_SESSION["city"] = $_POST["city"];
$_SESSION["state"] = $_POST["state"];
$_SESSION["zip"] = $_POST["zip"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Meme Store Order Confirmation</title>

  <link rel="stylesheet" type="text/css" href="CSS/styles.css">
 
  </head>
<body>

<div class="header">
<?php include 'header.php';?>
</div>

<nav id="css_menu">
<div class="menu">
<?php include 'menu.php';?>
</div></nav>


<div class="flex-container">
  <div>
    
	    <?php

        echo 
			  '<h2>Your order will be sent to this address:</h2>'
			. '<p>' . $_SESSION['name']. '</p>'
			. '<p>' . $_SESSION['streetaddress']
			. '<p>' . $_SESSION['city'] . ', ' . $_SESSION['state'] . ' ' . $_SESSION['zip'] . '</p>';
		?>

	
  </div>
  
  </div>

</div>

<div class="footer">
<?php include 'footer.php';?>
</div>

</body>
</html>