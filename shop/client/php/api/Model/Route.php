<?php

class Route 
{
    public $class;
    public $method;
    public $params;
    public $extension;

    public function __construct()
    {

        $arr=explode('/', $_SERVER['SCRIPT_NAME']);
        $url = $_SERVER['REQUEST_URI'];
        foreach($arr as $item)
        { 
            $url = preg_replace ( '/'.$item.'\//' , '' , $url,1);
        }

        @ list( $this->class,$this->method,$param) = explode('/',$url,3);
        #@ list($this->params,$this->extension) =  explode('.', $param , 2);
        #print 'url='.$url;
        $this->params= $param;

        #@ list($this->params,$this->extension)= 
        #     preg_split('/^(\w+)\.([^\d+]\w+)|[\/](\w+)\.([^\d+]\w+)|[\/]\.([^\d+]\w+)/',$param,2,PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE );

        #print_r($this->params);

        #print '<br>'.$t.'<br/>';

        #print $this->extension;
        #print "end";
        
        #die();
        if(isset($t ))
        {
            $this->params.=$t;
        }
         
        if(!isset($this->extension) || strlen($this->extension)<1)
        {
            $this->extension =  EXTENSION;
        }
    }

    public function get()
    {
        return 
            array(
                $this->class,
                $this->method,
                $this->params,
                $this->extension
            );
    }
}
