<?php

namespace app\kernel;

class Request
{
    const REQUEST_GET = 'GET';
    const REQUEST_POST = 'POST';
    const REQUEST_PUT = 'PUT';
    const REQUEST_DELETE = 'DELETE';
    const REQUEST_OPTIONS = 'OPTIONS';

    private $method;
    private $get;
    private $post;
    private $cookies;
//    private $session;
    private $rawBody;
    private $headers;


    public static function init()
    {
        $request = new self();
        $request->parseHeaders();
        $request->parseCookie();
        $request->parseBody();
        return $request;
    }

    private function parseHeaders()
    {
        foreach (apache_request_headers() as $headerName => $headerContent)
        {
            $this->headers[$headerName] = $headerContent;
        }
    }

    private function parseCookie()
    {
        $this->cookies = $_COOKIE;
    }

    private function parseBody()
    {
        $this->rawBody = file_get_contents('php://input');
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->get = $_GET;
        $this->post = $_POST;
    }


    public function isCookie($cookieName)
    {
        return isset($this->headers[$cookieName]);
    }

    public function getCookie($cookieName)
    {
        return ($this->isCookie($cookieName)) ? $this->cookies[$cookieName] : null;
    }

    public function getCookies()
    {
        return $this->cookies;
    }

    public function isHeader($headerName)
    {
        return isset($this->headers[$headerName]);
    }

    public function getHeaders()
    {
        return $this->headers;
    }
    public function getHeader($headerName)
    {
        return ($this->isHeader($headerName)) ? $this->headers[$headerName] : null;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function isGet()
    {
        return $this->method == self::REQUEST_GET;
    }
    public function isPost()
    {
        return $this->method == self::REQUEST_POST;
    }

    public function isMethod($method)
    {
        return $this->method == $method;
    }

    public function getRawBody()
    {
        return $this->rawBody;
    }

    public function getParameters()
    {
        if ($this->isGet()) return $this->get;
        if ($this->isPost()) return $this->post;
        return null;
    }

    public function getPostParameters()
    {
        return $this->post;
    }
    public function getGetParameters()
    {
        return $this->get;
    }

}