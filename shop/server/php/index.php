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


ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL 
$server = new SoapServer('http://192.168.0.15/~user7/soap/shop/server/php/test.php' );  
$server->addFunction("getQuote");  
$server->addFunction("test");
$server->handle();  


