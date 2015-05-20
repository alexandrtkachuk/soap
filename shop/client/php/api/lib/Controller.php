<?php
class Controller
{  
    public static function __callStatic($name, $arguments) 
    {

        if(file_exists (CONTROLLER.'/c'.$name.'.php'))
        {
            require_once(CONTROLLER.'/c'.$name.'.php');
            $name = 'c'.$name;
            return new $name;
        }

        $name = ucfirst ($name);

        if(file_exists (CONTROLLER.'/c'.$name.'.php'))
        {
            require_once(CONTROLLER.'/c'.$name.'.php');
            $name = 'c'.$name;
            return new $name;
        }
        Errors::getMee()->set(ERROR_1);
        return false;
    }

}
