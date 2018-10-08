<?php
    session_start();
	
	if(isset($_POST["subtract"])) {
		$id=$_POST["subtract"];
		subtract($id);
	} else {
		$id=$_POST["add"];
		add($id);
	}
	
	 header('Location: shoppingcart.php');

	 function subtract($id) {
        $_SESSION['itemQuantity'][$id]--;
       
    }
    function add($id) {
        $_SESSION['itemQuantity'][$id]++;
       
    }
?>




