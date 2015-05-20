<?php

class Errors
{
    protected static  $me;
    protected $errors;
    protected $header;

    private function __construct()
    {
        $this->errors = array();
        $this->header=false;
    }

    private function __clone()
    {

    }

    public static function getMee()
    {   
        
        if(isset(self::$me) ===false )
        {
            self::$me = new self();
            return self::$me;
        }
        
        return self::$me;
    }

    public function set($val)
    {
        $this->errors[]=$val;
        return true;
    }
    
    public function setHeader($val)
    {
        $this->header=$val;
        return true;
    }
    
    public function  getHeader()
    {
        return $this->header;
    }

    public function get()
    {
        return $this->errors;
    }
}
