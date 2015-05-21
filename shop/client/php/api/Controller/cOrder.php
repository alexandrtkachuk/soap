<?php
class cOrder extends cController
{

    public function  getPayments()
    {
        $r = $this->client->Payments();
        return $r->paymentsEl->Struct;     
    }
    
    public function getOrder($params)
    {
         @list($idpay,$idItem ) = explode('?idt=',$params,2);
         #$idpay= $_GET['idp'];
         #$idItem = $_GET['idt'];
        
         return $this->client->Order(array(
             'idPay'=>$idpay,
             'idItem'=>$idItem
         ));
    } 
}  
