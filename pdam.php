<?php 


   // contoh trx 087877370243 XL10 12 juni 2014


   $hp      = $_GET[hp];   
   $opr     = $_GET[opr];
   $procod  = $_GET[procod];
   $trxdate = $_GET[trxdate];

  //$URL = "http://103.31.226.135:12107/inq_check";    //production

  
  $URL = "http://222.124.154.163:8730/webpdam.svc/reqcustomer/?idpel=1234567&clientid=demo&password=demo";  
 

   //18/06/2014

   $temp  = explode("/" , $trxdate);  

   $trxdate = $temp[2] .$temp[1] .$temp[0] ;
 

       $xml_data ='<request>

            <identifier>trx_check</identifier >
            <msisdn>'.$hp .'</msisdn>
            <productcode>'.$procod.'</productcode >
            <trxdate>'.$trxdate . '</trxdate>
            <messagehash>f5fb4b0b805cc35106f4749912bb233e0de060db</messagehash >
            </request>';          

 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_MUTE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_GET, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			//curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_datax");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
			
			$output = curl_exec($ch);	
			
            echo($output);
		

			$xml = simplexml_load_string($output);		

            //print_r($xml);

			$rc =  $xml->dcustomer;		
			
			print_r($rc);
			

			$desc =  $xml->desc ;

			$reff =  $xml->billerreff;           

			curl_close($ch);						

 

?>

