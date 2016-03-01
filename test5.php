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

  
  /*
  foreach(regex_all('<a:alamat>(.*?)<\/', $response) as $locationName ) {
      echo "Alamat : " . "$locationName<br>";
  }
  
   foreach(regex_all('<a:byadmin>(.*?)<\/', $response) as $data ) {
      echo "byadmin: ".  "$data<br>";
   }
   */
   

  $alamat= getData('<a:alamat>',$response);  
  echo "alamat : ". $alamat ."<br>" ;
  
  $d= getData('<a:byadmin>',$response);  
  echo "byadmin: ". $d ."<br>" ;


  $denda= getData('<a:denda>',$response);  
  echo "denda : ". $denda ."<br>" ;
  
  $d= getData('<a:gma>',$response);  
  echo "gma: ". $d ."<br>" ;

  $d= getData('<a:gol>',$response);  
  echo "gol: ". $d ."<br>" ;
  
  $d= getData('<a:harga>',$response);  
  echo "harga: ". $d ."<br>" ;

  echo "limbah: ". getData('<a:limbah>',$response) ."<br>" ;  
  echo "materai: ". getData('<a:materai>',$response) ."<br>" ;
  
  

  function getData($dataname,$response){
   //$src= $dataname ."(.*?)<\/";  
   //echo " src : " . $src  ."<br>";      
   foreach(regex_all($dataname.'(.*?)<\/', $response) as $data ) {
      $rtn .=  "$data";
   }
   //echo " return : " . $rtn  ."<br>";
   return $rtn;
  }



 /*
  <a:denda>0</a:denda><a:gma>0</a:gma><a:gol>-</a:gol><a:harga>0</a:harga>
  <a:limbah>0</a:limbah><a:materai>0</a:materai><a:nama/><a:pakai>0</a:pakai>
  <a:retribusi>0</a:retribusi><a:stand_i>0</a:stand_i><a:stand_l>0</a:stand_l>
  <a:status>B</a:status><a:sub_tot>0</a:sub_tot><a:tanggal>Null</a:tanggal>
  <a:thbln>-</a:thbln><a:total>0</a:total>
  
  */
  
    function regex_all( $capture, $haystack, $return=1 ) {
       preg_match_all( "#$capture#", $haystack, $match );
       return $match[ $return ];
    }
  
  
  
   exit;
  
  
  
  ?>