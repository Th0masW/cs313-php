<?php
/**********************************************************

* 

***********************************************************/
// get the data from the POST
$busy = $_POST['howBizzy'];
$CurrentTime = Time();

require("dbConnect.php");
$db = get_db();
try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO bizzy(time, busy) VALUES(:time, :busy)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':time', $CurrentTime);
	$statement->bindValue(':howBizzy', $busy);
	$statement->execute();
	// get the new id
	
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect them to a new page to actually show the topics
header("Location: index.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>