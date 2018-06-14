<?php

namespace app\kernel;


class Response
{
    const RESPONSE_JSON = 'json';
    const RESPONSE_XML = 'xml';

    private $headers=[];
    private $code = 200;
    private $responseType = self::RESPONSE_JSON;
    private $cookies = [];

    public function returnResult()
    {

    }

    public function addCooke($name, $value = "", $expire = 0, $path = "" , $domain = "", $secure = false , $httponly = false)
    {
        $this->cookies[$name] = [
            'value' => $value,
            'expire' => 0,
            'path' => "" ,
            'domain' => "",
            'secure' => false ,
            'httponly' => false
        ];
    }

    public function addHeader($name,$value)
    {
        $this->headers[strtolower($name)] = $value;
    }

    public function getHeader($name)
    {
        return (isset($this->headers[$name])) ? $this->headers[$name]: null;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

}