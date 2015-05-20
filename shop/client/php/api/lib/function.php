<?php

function __autoload($class )
{
    if(file_exists (LIB.'/'.$class.'.php'))
    {
        require_once(LIB.'/'.$class.'.php');
    }
    elseif( file_exists (CONTROLLER.'/'.$class.'.php'))
    {
        require_once(CONTROLLER.'/'.$class.'.php' );
    }

    elseif( file_exists (MODEL.'/'.$class.'.php'))
    {
        require_once(MODEL.'/'.$class.'.php' );
    }

    return false;
}

