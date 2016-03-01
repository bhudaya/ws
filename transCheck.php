<?php 

   // contoh trx 087877370243 XL10 12 juni 2014


   $hp      = $_GET[hp];   
   $opr     = $_GET[opr];
   $procod  = $_GET[procod];
   $trxdate = $_GET[trxdate];
   
   
  //$URL = "http://103.31.226.135:12107/inq_check";    //production
  
   
  $URL = "http://10.31.3.13:12107/trx_check";  
 
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
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);			
			
			$output = curl_exec($ch);			
			$xml = simplexml_load_string($output);		
            //print_r($xml);
			$rc =  $xml->rc ;		
			$desc =  $xml->desc ;
			$reff =  $xml->billerreff;           
			curl_close($ch);						
 
?>

<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td bgcolor="#C3DAF9">
		<?php
		
		    echo "Hasil cek : " . "<br>";
			//echo $rc   . " | ";
			echo $desc . "<br>";
			echo "Reff Id  : " . $reff . "<br>";

		
		?>	
		</td>
	</tr>
</table>