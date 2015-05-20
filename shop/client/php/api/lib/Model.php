<?php
class Model
{  
    public static function __callStatic($name, $arguments) 
    {
        require_once(MODEL.'/'.$name.'.php');
        return new $name;
    }
}
