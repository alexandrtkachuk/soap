<?php

function __autoload($class )
{
    if(file_exists (LIB.'/'.$class.'.php'))
    {
        require_once(LIB.'/'.$class.'.php');
    }
}

