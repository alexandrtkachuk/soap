<?php

include('config.php');

header('Content-type: text/xml');



$wsdl=file_get_contents(SOAP_XML);

$wsdl=str_replace('%%SERVER%%', SOAP_SERVER, $wsdl);
$wsdl=str_replace('%%HOST%%', SOAP_HOST, $wsdl);


print $wsdl;
