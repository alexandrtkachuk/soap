<?php



$ch = curl_init('http://footballpool.dataaccess.eu/data/info.wso/GameInfo/?iGameId=1');
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

# добавляем заголовков к нашему запросу. Чтоб смахивало на настоящих
#curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookies);  
#curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookies);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
# Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит

$result= curl_exec($ch); // выполняем запрос curl - обращаемся к сервера php.su
curl_close($ch);

print $result;
