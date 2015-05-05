<?php

include('config.php');


function test($test) 
{ 
   
   $var = $test;
   return  $var;        
}  


function getCategories($temp )
{
    return 'good call getCategoriesi!';
    #return $xmlString;
}


function getGoods($start=0,$end)
{
    return 'good call getGoods'.$start.'-'.$end;
    return $xmlString;
}

function getGoods2Categories($idCategory)
{
    return 'good call getGoods2Categories param='.$idCategory;
    return $xmlString;
}

function addOrder($xmlString)
{

    return true;
}

function sendSms($MessegeList)
{
    $test = array('status'=>false);
    return $test;
}


ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL 


#$server = new SoapServer(SOAP_WSDL);    
$server = new SoapServer('http://192.168.56.88/soap/shop/client/php/me.xml');
$server->addFunction("sendSms");
$server->addFunction("getGoods");
$server->addFunction("getGoods2Categories");
$server->addFunction("addOrder");
$server->handle();  


