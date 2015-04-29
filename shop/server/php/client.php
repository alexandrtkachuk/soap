<?php 
ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 

  $client = new SoapClient("http://192.168.56.88/soap/shop/server/php/test.php");  
    print_r($client->__getFunctions() );
    print($client->test("ibm"));  
?>
