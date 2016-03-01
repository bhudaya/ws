<?php
//Deifne user credentials to use with requests
        $user = "demo";
        $passwd = "demo";

        //Define header array for cURL requestes
        $header = array('Contect-Type:application/xml', 'Accept:application/xml');

        //Define base URL
        $url = 'http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo';

        //Define http request nouns
        $ls = $url . "landscapes";

        //Initialise cURL object
        $ch = curl_init();

             //Set cURL options
            curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => $header, //Set http header options
            CURLOPT_URL => $ls, //URL sent as part of the request
            //CURLOPT_HTTPAUTH => CURLAUTH_BASIC, //Set Authentication to BASIC
            //CURLOPT_USERPWD => $user . ":" . $passwd, //Set username and password options
            CURLOPT_HTTPGET => TRUE //Set cURL to GET method
           ));

        //Define variable to hold the returned data from the cURL request
        $data = curl_exec($ch);

        //Close cURL connection
        curl_close($ch);

        //Print results
        print_r($data);

?>