<?php

class cCar extends cController
{  
    function  getInfo($params)
    {
        @ list($id) = explode('/', $params , 1);

        if(is_numeric($id))
        {    
            #$result = (new Car)->get($id);
            $result= array($this->client->CarInfo($id));
            #print_r($r); 
        }
        else
        {
            #$result = (new Car)->getAll();
            $r= $this->client->AllCars();
            #print_r($r);
            $result=$r->Cars->Struct;
        }


        return $result;

    }

    
    function getSearch($params)
    {
        
        #return $params;
        #print $params;
        #@ list($year, $volume, $color, $maxspeed, $price) = explode('/', $params );
        @ $arr = explode('/', $params );

        $items = array();

        
           
            for($i=0;$i<count($arr);$i+=2)
            {
                if(count($arr)  <= $i+1)
                {
                    break;
                }
                $k = $arr[$i];
                $a = $arr[$i+1];
                if($a=='null')
                {
                    $a='';
                }
                $items[$k]= $a;
            }
            #*/
            $year = $items['year'];
            $color = $items['color'];
            $volume = $items['volume'];
            $maxspeed = $items['maxspeed'];
            $price = $items['price'];
            #Errors::getMee()->set($items);
            
            if( !$year || !is_numeric($year) || $year <0 )
            {
                Errors::getMee()->set(ERROR_7);
                return false;
            }

            if(strlen($volume)>0 &&  $volume &&  !is_numeric($volume))
            {
                Errors::getMee()->set(ERROR_7);
            return false;
        }

        if(strlen($maxspeed)>0 &&   $maxspeed &&  !is_numeric($maxspeed))
        {
            Errors::getMee()->set(ERROR_7.'max speed'.$maxspeed );
            return false;
        }

        if(strlen($price)>0 &&  $price &&  !is_numeric($price))
        {
            Errors::getMee()->set(ERROR_7);
            return false;
        } 

         
        #$result = (new Car)->serach($year, $volume, $color, $maxspeed, $price);
        $r =     $this->client->SearchCar(
            array(
                'year'=>$year,
                'engineSize'=>$volume,
                'maxSpeed'=>$maxspeed,
                'price'=>$price,
                'color'=>$color
                )
        );
        #print_r($r);
        $result=$r->Cars->Struct;
        if(count($result)>1)
        {
            return $result;
        }
        elseif(count($result)==0 )
        {
            return false;
        }
        return array($result);
    }
}
