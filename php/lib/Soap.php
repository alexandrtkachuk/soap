<?php


class Soap 
{
    protected $client;

    public function __construct()
    {
        $this->client = new   SoapClient(SOAP_WSDL);
    }   


    public function getParam($id)
    {
        
        $array = array(
            "iGameId" => $id
        );
        $res = $this->client->GameInfo($array);        

        $res = $res->GameInfoResult;
        
        $temp = array();

        $temp['date'] = $res->dPlayDate;
        $temp['time'] = $res->tPlayTime;
        $temp['team1']['name'] = $res->Team1->sName;
        $temp['team1']['flag'] = $res->Team1->sCountryFlag;
        $temp['team2']['name'] = $res->Team2->sName;
        $temp['team2']['flag'] = $res->Team2->sCountryFlag;
        $temp['score'] = $res->sScore;


        return $temp;
        

    } 
    
    public function noParams()
    {
        $res = $this->client->AllGames()->AllGamesResult;
        $temp = array();

        for( $i=0;$i<count($res->tGameInfo);$i++)
        {
            $temp[$i]['id'] = $res->tGameInfo[$i]->iId;
            $temp[$i]['team1']['name'] = $res->tGameInfo[$i]->Team1->sName;
            $temp[$i]['team1']['flag'] = $res->tGameInfo[$i]->Team1->sCountryFlag;
            $temp[$i]['team2']['name'] = $res->tGameInfo[$i]->Team2->sName;
            $temp[$i]['team2']['flag'] = $res->tGameInfo[$i]->Team2->sCountryFlag;
        }
        
        return $temp;
    }

}
