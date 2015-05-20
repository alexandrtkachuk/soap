<?php
class cController
{
    protected $client;
    public function __construct()
    {
        $this->client = new SoapClient(SOAP_WSDL);
        print_r($this->client->__getFunctions() );
    }

    public function __call($name,$params)
    {
        Errors::getMee()->set(ERROR_2);
        return null;
    }
}
