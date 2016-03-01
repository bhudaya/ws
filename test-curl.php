<?php

    ini_set('display_errors', '1');



    //$URL = "http://cdc-cc-psw.ccell.local:12107/inq_prefix";    

      $URL = "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  

 

    
    

     $xml ='<request>

             <identifier>inq_prefix</identifier>

             <msisdn>0812276543322</msisdn>

             <messagehash>f5fb4b0b805cc35106f4749912bb233e0de060db</messagehash>

             </request>';

    

    

    



    //setting the curl parameters.

    $ch = curl_init();



    curl_setopt($ch, CURLOPT_URL,$URL);

    curl_setopt($ch, CURLOPT_VERBOSE, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    //curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));

    //curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);



        if (curl_errno($ch)) 

    {

        // moving to display page to display curl errors

          echo curl_errno($ch) ;

          echo curl_error($ch);

    } 

    else 

    {

        //getting response from server

        $response = curl_exec($ch);

         print_r($response);

         curl_close($ch);

    }

    

    

    

 ?>