<?php 

class View
{
    protected $xml;
    public function __construct($data,$extension)
    {
        
        if($data==null)
        {
            $data = array(
                'errors'=>Errors::getMee()->get()
            );                
        }
        
        if( $h= Errors::getMee()->getHeader())
        {
            header('HTTP/1.1 '.$h);
        }
                
        header('Content-Type: text/'.$extension); 

        if($extension == 'json' )
        {
            print  json_encode (array(
                'result'=>$data
            ));
        }
        elseif('txt'== $extension)
        {   
            print '<pre>';
                print_r($data);
            print '<pre>';
        }elseif('xml' ==$extension)
        {
            $this->xml = new SimpleXMLElement('<root/>');
            array_walk_recursive($data, 
            #array($xml,'addChild'));
            array($this,'parse_xml'));
            print $this->xml->asXML();


        }
        



    }
    
    protected function parse_xml($item, $key='key') 
    {
        #echo "$key holds $item\n";
        if(is_numeric($key))
        {
            $key = 'key'.$key;
        }
        if(!is_string($item))
        {
            $s=$this->parse_xml_help($item);
            $this->xml->addChild($key, $s);
        }
        else
        {
            $this->xml->addChild($key, $item);
           
        }
    }    
    
    protected function parse_xml_help($item, $key='key') 
    {
        #echo "$key holds $item\n";
        if(!is_string($item))
        {
            array_walk_recursive($item, 
                array($this,'parse_xml'));
        }
        else
        {
            return $item;
        }
    }  
    
}
