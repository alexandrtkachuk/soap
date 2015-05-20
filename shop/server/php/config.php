<?php


$adr = 'http://'.
$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);

define('SOAP_WSDL', $adr.'/wsdl.php' );
define('SOAP_SERVER', $adr.'/index.php' );
define('SOAP_XML', 'me.wsdl' );
define('SOAP_HOST', 'http://'.$_SERVER['SERVER_NAME'] );

define('LIB', 'lib' );//folders class
define('TEMPLATES', 'template' );//folder temolate


define('TABLE_USERS', 'carshop_users');
define('TABLE_GOODS', 'carshop_cars'); #товары
define ('TABLE_ORDERS','carshop_orders');

define ('TABLE_PAYMENTS','carshop_payment');
define('DB_NAME', 'user7');
define('USER', 'user7');
define('PASS', 'tuser7');
define('DB_HOST', '');


