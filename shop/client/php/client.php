<?php

ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 

include('config.php');
#include(LIB.'/function.php');



$temp_err=array(); // array errors
$content=array(); //

try{


    #$client = new SoapClient(SOAP_WSDL); 
    
    $client = new SoapClient('http://192.168.56.88/soap/shop/client/php/me.xml',
   array( 'soap_version' => SOAP_1_2) 
    );  
    
    print '<pre>';
        print_r($client->__getFunctions() );
    print '</pre>';
    
        
    var_dump($client->sendSms( 
            array( 'test'=>2)
        //$myClass
    ));  
    #print($client->getGoods(4,5)).'<br/>';
    #print($client->getGoods2Categories(3)).'<br/>';
    #print($client->addOrder('test')).'<br/>';


}
catch(Exception $e ){ 

    $temp_err[]= $e->getMessage();
    
    print $e->getMessage();

}


#loadTemplate('view',$content,$temp_err );

