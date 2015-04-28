<?php  
$client = new   SoapClient( 
    'http://footballpool.dataaccess.eu/data/info.wso?WSDL'
);

$array = array(
        "iGameId" => 1
        );

print '<pre>'; 
    #print_r( $client->CountryNames());
    print_r( $client->GameInfo($array));
print '</pre>';
?>
