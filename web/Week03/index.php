<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>The Meme Store</title>

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



<div class="flex-container">
	<div>
    <h1>Bed is cold!</h1>	
	<img src="Images/bed.png" alt="Cold Bed" style="width:275px;">
	<p>Hilarious meme with Fry.<br>
	<br>Bed is Cold - $10.00 -- Cheap!</p>
	</p>
	<p>
	<form action='addtocart.php' method='post'>
	<input class="button" type="submit" title="Add to Cart" value="Add to Cart">
	<input type="hidden" name="item" value="Bed is Cold">
	</form>
	</p>
	 
	
	</div>


  <div>
	    <h1>Am I clever?</h1>
		<img src="Images/clever.png" alt="Clever" style="width:275px;">
		<p>Yet another Hilarious meme with Fry.<br>
	<br>Am I clever? - $10.00 -- Cheap!</p>
	</p>
		<p>
		<form action='addtocart.php' method='post'>
	<input class="button" type="submit" title="Add to Cart" value="Add to Cart">
	<input type="hidden" name="item" value="Am I Clever?">
	</form></p>
  </div>
  
  <div>
	    <h1>Is it sweet?</h1>
			<img src="Images/salt.png" alt="Salty" style="width:275px;">
		<p>Yet another Hilarious meme with Fry.<br>
	<br>What is it? - $10.00 -- Cheap!</p>
	</p>

		<form action="addtocart.php" method="post">
	<input class="button" type="submit" title="Add to Cart" value="Add to Cart">
	<input type="hidden" name="item" value="Salty?">
	</form></p>
  </div>




  
   </div> 


<div class="footer">
<?php include 'footer.php';?>
</div>
</body>
</html>