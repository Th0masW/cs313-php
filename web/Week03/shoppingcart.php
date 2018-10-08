<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>Introduction</title>

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
      echo "<h2>Your cart contents:</h2>";
        foreach($_SESSION['itemQuantity'] as $item => $quantity) {
            if($quantity > 0) {
                
                  echo  '<p>  ' . $item . ' - Quantity: ' . $quantity . '
                    <form action="changecart.php" method="post">
					<input type="submit" value="Remove one">
                    <input type="hidden" name="subtract" value="' . $item . '"></form><br>
					
                    <form action="changecart.php" method="post">
					<input type="submit" value="Add one">
                    <input type="hidden" name="add" value="' . $item . '"></form>
                    <br><a href="deleteitem.php?item=' . $item . '">Delete ' . $item . ' from cart.</a></p><hr>';
                
            } 
        }
        //check for empty cart
		if($quantity < 1) {
			echo '<p id="empty-cart">Your shopping cart is empty at this time.</p>';
		}

        
    ?>
	
	    
  </div>
  
  </div>

</div>

<div class="footer">
<?php include 'footer.php';?>
</div>

</body>
</html>