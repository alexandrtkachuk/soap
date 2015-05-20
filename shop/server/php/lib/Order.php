<?php

class Order
{
    public function __construct()
    {
    
    }

    public function PaymentList()
    {
        $sql=Sql::getMee(); 
        $result = $sql->Select(
            'id',            
            'name'      
        )->setTables(TABLE_PAYMENTS)->Result();
        
      return $result;
    }


    public function addOrder($idUser, $idItem, $idPay)
    {
        $sql=Sql::getMee();

        $result = $sql->Insert(
            'idUser','?',
            'idPayment','?',
            'idCar','?'
            ) -> setTables(TABLE_ORDERS) -> Result(
                array($idUser,$idPay,$idItem)
            );
        return $result;
    }

}
