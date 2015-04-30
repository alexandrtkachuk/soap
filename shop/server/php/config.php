<?php


$adr = 'http://'.
$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);

define('SOAP_WSDL', $adr.'/wsdl.php' );
define('SOAP_SERVER', $adr.'/index.php' );
define('SOAP_XML', 'me.wsdl' );


define('LIB', 'lib' );//folders class
define('TEMPLATES', 'template' );//folder temolate

