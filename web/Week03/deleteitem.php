<?php
    session_start();

    $itemId = $_GET['item'];
    deleteItem($itemId);
	 header('Location: shoppingcart.php');

    function deleteItem($id) {
        $_SESSION['itemQuantity'][$id] = 0;      
    }

?>