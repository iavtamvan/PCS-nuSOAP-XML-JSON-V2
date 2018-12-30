<?php

// Includs client to get $client object
include 'lib/client.php';

$id = $_GET['id']; // id from url

/**
* Calling the "delete" method by "__soapCall" from SOAP SERVER 
* $client: object of SOAP CLIENT
* @params: $id
*/
if( $client->__soapCall("delete", array($id)) ){
	$message = "Record is deleted successfully.";
	
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
?>
<a href="index.php">Back to List</a>