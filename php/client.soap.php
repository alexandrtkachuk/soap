<?php


    include('config.php');
    include(LIB.'/function.php');



    $temp_err=array(); // array errors
    $content=array(); //

    try{
        $iId=1;
        if(isset($_POST['id']))
        {
            $iId = $_POST['id'];
        }

        if(!is_numeric($iId) || $iId<1  || $iId>64)
        {
            $iId=1;
        }

        $content['id'] = $iId;
        $soap = new Soap();
        $content['str']=$soap->getParam($iId);
        $content['all']=$soap->noParams();

    }
    catch(Exception $e ){


        $temp_err[]= $e->getMessage();


    }

        
    loadTemplate('view',$content,$temp_err );


?>



