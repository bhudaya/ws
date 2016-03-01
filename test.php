<?php

  $post_string1 = "http://api.ean.com/ean-services/rs/hotel/v3/info?cid=55505&minorRev=99&apiKey=5d9cp7nfxruc7p788fvvqpwn&locale=en_US&currencyCode=USD&type=xml&hotelId=123912";  
  $header[] = "Accept: application/json";
  $header[] = "Accept-Encoding: gzip";
  
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
  curl_setopt($ch,CURLOPT_ENCODING , "gzip");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt( $ch, CURLOPT_URL, $post_string1 );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  $response = json_decode(curl_exec($ch));
  print_r($response);  exit;
  
  
  ?>