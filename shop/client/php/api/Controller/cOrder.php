<?php
class cOrder extends cController
{

    public function  getPayments()
    {     
        #return  (new Order)->PaymentList();
        $r = $this->client->List();
        var_dump($r);
        print 'ttt'; 
    }
    
    public function getOrder($params)
    {
        $r = explode('?idt=',$params);
        $r['user']= $this->user->info();
        $r['uid']= $r['user']['id'];
       #return  (new Order)->addOrder($r['uid'],$r[0],$r[1]);
    
    }
    

}  
