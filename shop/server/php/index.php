<?php

include('config.php');
include(LIB.'/function.php');

function AllCars()
{
    $r= (new Car)->getAll();
    return array('Cars'=>$r);    
}

function CarInfo($id)
{
    $r= (new Car)->Car($id);
    #sleep(4);
    return array(
        'year'=>$r[0]->year , 
        'id'=>$r[0]->id, 
        'title'=>$r[0]->title,
        'price'=>$r[0]->price, 
        'engineSize'=>$r[0]->engineSize,
        'maxSpeed'=>$r[0]->maxSpeed,
        'image'=>$r[0]->image,
        'color'=>$r[0]->color
    );    
}

function SearchCar($Car)
{
    $r= (new Car)->Search(
        $Car->year,
        $Car->engineSize,
        $Car->color,
        $Car->maxSpeed,
        $Car->price 
    );
    return array('Cars'=>$r); 
}

function Payments($e = 2 )
{
    return  array(
    'paymentsEl'=>
        (new Order)->PaymentList());
   
}

function Order($param)
{
    (new Order)->addOrder(1,
        $param->idItem,
        $param->idPay
    );

    return true;
}

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL 


$server = new SoapServer(SOAP_WSDL);    
#$server = new SoapServer('http://192.168.56.88/soap/shop/client/php/me.xml');
$server->addFunction("SearchCar");
$server->addFunction("AllCars");
$server->addFunction("CarInfo");
$server->addFunction("Payments");
$server->addFunction("Order");
$server->handle();  


