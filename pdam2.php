<?php

//$url="http://www.arrowcast.net/fids/mco/fids.asp?sort=city&city=&number=&airline=&adi=A";

  
  $url = "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  


$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents

$data = curl_exec($ch); // execute curl request
curl_close($ch);


print_r($data);

$xml = simplexml_load_string($data);
print_r($xml);

?>