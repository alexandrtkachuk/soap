<?php
    /***function*******/

function __autoload($class ){

    require_once(LIB.'/'.$class.'.php' );

}


function loadTemplate($nameTemplate,$content,$temp_err ){

    require_once(TEMPLATES.'/'.$nameTemplate.'.php');

}
/*****end fun *******/



?>
