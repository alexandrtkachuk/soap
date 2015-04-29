<?php
header('Content-type: text/xml');



$doc = new DOMDocument();
@$doc->load('me.wsdl');
echo $doc->saveXML();
#print file_get_contents('stockquote1.wsdl');
#include "stockquote1.wsdl";
