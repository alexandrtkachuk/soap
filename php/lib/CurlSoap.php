<?php


class CurlSoap 
{
    protected $client;

    public function __construct()
    {
    
    }   


    public function getParam($id)
    {
        $ch = curl_init(SOAP_WSO.'GameInfo/?iGameId='.$id);
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 "); 
        # User-Agent
        $headers = array
            (
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
                'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
                'Accept-Encoding: deflate',
                'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
            ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        # Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит

        $result= curl_exec($ch); // выполняем запрос curl 
        curl_close($ch);
        $res = simplexml_load_string($result);
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
        #$res = $this->client->AllGames()->AllGamesResult;

        $ch = curl_init(SOAP_WSO.'AllGames/');
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 "); 
        # User-Agent
        $headers = array
            (
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
                'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
                'Accept-Encoding: deflate',
                'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
            ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        # Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит

        $result= curl_exec($ch); // выполняем запрос curl 
        curl_close($ch);
        $res = simplexml_load_string($result);

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
