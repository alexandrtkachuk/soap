<?php

ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 

include('config.php');
#include(LIB.'/function.php');



$temp_err=array(); // array errors
$content=array(); //

try{


    $client = new SoapClient(SOAP_WSDL); 
    
      
    
    print '<pre>';
        print_r($client->__getFunctions() );
    

   $r =  $client->AllCars(  );
     print_r($r->Cars->Struct);   
    #var_dump($client->AllCars(  ));  
var_dump($client->SearchCar(  ));
    #print($client->getGoods(4,5)).'<br/>';
    #print($client->getGoods2Categories(3)).'<br/>';
    #print($client->addOrder('test')).'<br/>';

print '</pre>';
}
catch(Exception $e ){ 

    $temp_err[]= $e->getMessage();
    
    print $e->getMessage();

}


#loadTemplate('view',$content,$temp_err );

