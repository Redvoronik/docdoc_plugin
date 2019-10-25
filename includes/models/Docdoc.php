<?php
class Docdoc
{
    private $username;
    private $password;

    function __construct() {
        $this->username = get_option('username');
        $this->password = get_option('password');
    }
    
    public function cityList()
    {
        return $this->sendRequest('city');
    }

    public function specialisations($cityId = null)
    {
        $requestString = 'speciality/';
        $requestString = $cityId ? $requestString . "city/{$cityId}/" : $requestString;
        return $this->sendRequest($requestString);
    }

    public function district($cityId)
    {
        return $this->sendRequest("district/city/{$cityId}");
    }

    private function endPoint()
    {
        return "https://{$this->username}:{$this->password}@back.docdoc.ru/api/rest/1.0.6/json/";
    }

    private function sendRequest($query)
    {
        $url = $this->endPoint() . $query;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'IE20');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
}