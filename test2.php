<?php


  
  $post_string1= "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  


  $header[] = "Accept: application/json";
  $header[] = "Accept-Encoding: gzip";
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
  curl_setopt($ch,CURLOPT_ENCODING , "gzip");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt( $ch, CURLOPT_URL, $post_string1 );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  //$response = json_decode(curl_exec($ch));
  $response = curl_exec($ch);

  print_r($response);
  

  
  
  $xml = new SimpleXmlElement($response);
  print_r($xml);  
  //$xml = simplexml_load_string($response);
  //print_r($xml);
  
  /*
  if ($response){
  $xml = new SimpleXMLElement($response);
  
    print_r($xml);
  
  $xml->registerXPathNamespace("soap", "http://schemas.xmlsoap.org/soap/envelope/");
  $path = $xml->xpath("//soap:Body");
  $path = $path[0] ;
    foreach($path->RequestPelangganResponse->RequestPelangganResult() as $table){
     echo $table->Table->alamat. "<br>";
    }
   
  }
   */
  
   //print_r($response);  
  
  
  
  
 
  
  
  
  
    function regex_all( $capture, $haystack, $return=1 ) {
       preg_match_all( "#$capture#", $haystack, $match );
       return $match[ $return ];
    }
  
  
  
  
  
    foreach(regex_all('<a:alamat>(.*?)<\/', $response) as $locationName ) {
      echo "Alamat : " . "$locationName<br>";
    }
  
    foreach(regex_all('<a:byadmin>(.*?)<\/', $response) as $data ) {
      echo "byadmin: ".  "$data<br>";
    }

  
   exit;
  
  
  
  ?>