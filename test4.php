<?php

$url= "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  
  $ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url);
$html = curl_exec( $ch );
//$html = $tidy->parseString( $html, $tc, 'utf8' );
//$tidy->cleanRepair();
//$html = $tidy->body()->value;
//$xml = new SimpleXMLElement($html);

//$xml = $xml->xpath( "//ul[@id='wxoptions']/li[3]/a" ); //Your XPATH

print_r( $xml );



?>