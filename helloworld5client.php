<?php
 error_reporting(E_ALL & ~E_NOTICE);
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the client instance
//$client = new soapclient('http://localhost/phphack/helloworld5.php');

//$client = new soapclient('http://localhost:90/ws/helloworld5.php');


$client = "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  
 



// Check for an error
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Constructor error: ' . $err . '</b></p>';
	// At this point, you know the call that follows will fail
}
// Call the SOAP method
$names = array('Scott', 'Albert', 'Robert', 'Phyllis');
$result = $client->call(
	'hello',					// method name
	array('names' => $names)	// input parameters
);
// Check for a fault
if ($client->fault) {
	echo '<p><b>Fault: ';
	print_r($result);
	echo '</b></p>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<p><b>Error: ' . $err . '</b></p>';
	} else {
		// Display the result
		print_r($result);
	}
}
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>
