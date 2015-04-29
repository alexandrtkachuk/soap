<?php  
  $client = new SoapClient("http://192.168.0.15/~user7/soap/shop/server/php/test.php");  
    print_r($client->__getFunctions() );
    #print($client->test("ibm"));  
?>
