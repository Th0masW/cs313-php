<?php
	//add one item to cart
    session_start();
    $itemId = $_POST['item'];
    addToQuantity($itemId);

    function addToQuantity($id) {
        $_SESSION['itemQuantity'][$id]++;	
		//And back to page
        header('Location: index.php');
    }
	
?>

