<?php 

$wsdl = 'http://'.
$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/wsdl.php';
$wsdl=str_replace('client', 'server', $wsdl);

define('SOAP_WSDL', $wsdl );
define('LIB', 'lib' );//folders class
define('TEMPLATES', 'template' );//folder temolate

?>
