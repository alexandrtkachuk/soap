<?php

$quotes = array(  
      "ibm" => 98.42  
  );    

function getQuote($symbol) {  
      global $quotes;  
        return $quotes[$symbol];  
}

function test($test) 
{ 
   global $var; 
   $var = $test;
   return  $var;        
}  

ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL 
ini_set("soap.wsdl_cache_dir", '/home/alexandr/soap/shop/server/php/tmp/'); // где будет кэш
#ini_set("soap.wsdl_cache_ttl", "2");

$server = new SoapServer('http://192.168.56.88/soap/shop/server/php/test.php' );  
$server->addFunction("getQuote");  
$server->addFunction("test");
$server->handle();  


