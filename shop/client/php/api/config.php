<?php 

$wsdl = 'http://'.
$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/wsdl.php';
$wsdl=str_replace('client', 'server', $wsdl);
$wsdl=str_replace('/api', '', $wsdl);

define('SOAP_WSDL', $wsdl );

define('DIR_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
define('LIB', 'lib' );//folders class
define('CONTROLLER', 'Controller' );
define('MODEL', 'Model' );//folders class
define('EXTENSION', 'json');
define('EXTENSIONS',serialize( 
    array('json','txt', 'html', 'xml') 
));

##########ERRORS#####################

define('ERROR_1', 'No class ');
define('ERROR_2', 'No method ');
define('ERROR_3', 'Undefiner extension');
define('ERROR_4', 'access error');
define('ERROR_5', 'wrong email adress');
define('ERROR_6', 'need 3 params');
define('ERROR_7', 
    'Errros searsh perams ( year(int) ,'.
    '[volume(float)] , [color(string)],[maxSpeed(int)],[price(float)])');
