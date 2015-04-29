<?php

$iId=1;
if(isset($_POST['id']))
{
    $iId = $_POST['id'];
}

if(!is_numeric($iId) || $iId<1)
{
    $iId=1;
}


?>

<div>
    <form method="POST">
        <label>id macth:</label>
        <input type="number" min="1" name="id" value="<?php print $iId; ?>" >
        <input type="submit">
        
    </form>
</div>
<?php 
#print_r($_POST);

$client = new   SoapClient( 
    'http://footballpool.dataaccess.eu/data/info.wso?WSDL'
);

$array = array(
        "iGameId" => $iId
        );
$res = $client->GameInfo($array);

print '<pre>'; 
    #print_r($client->__getFunctions() );
    #print_r( $client->CountryNames());
    #print_r( $client->GameInfo($array));
    #print_r($res->GameInfoResult);
print '</pre>';


$res = $res->GameInfoResult;
print '<table>
    <tr>
    <td>data </td> 
    <td>'.$res->dPlayDate.'</td>
    </tr>
    <tr>
    <td>time </td> 
    <td>'.$res->tPlayTime.'</td>
    </tr>
    <tr>
    <td>team 1</td> 
    <td>'.$res->Team1->sName.' <img src="'.$res->Team1->sCountryFlag.'"> </td>
    </tr>
    <tr>
    <td>team 2</td> 
    <td>'.$res->Team2->sName.' <img src="'.$res->Team2->sCountryFlag.'"> </td>
    </tr>
    <tr>
    <td>score</td> 
    <td>'.$res->sScore.'</td>
    </tr>

    </table>';


