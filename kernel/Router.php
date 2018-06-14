<?php

namespace app\kernel;

class Router
{
    private $controller;
    private $action;
    private $params = array();

    public static function init()
    {
        $router = new self();
        //self::initRequest();
        $router->parseRoute();
        return $router;
    }

    private  function parseRoute()
    {
        $config = Slick::$app->getConfiguration();
        //$layerLevel = $config['layer'];
        $requestUri = $_SERVER['REQUEST_URI'];
        $uriParams = explode('/',$requestUri);
        $countUriParams =  count($uriParams);
        $this->controller = ($uriParams[1]) ? $uriParams[1]:$config['default']['controller'];
        $this->action = ($uriParams[2] && $uriParams[2] != '') ? $uriParams[2]:$config['default']['action'];
        $this->params = ($countUriParams > 3) ? array_slice($uriParams,3): [];
    }

    public function getController()
    {
        return $this->controller;
    }
    public function getAction()
    {
        return $this->action;
    }
    public function getParams()
    {
        return $this->params;
    }


    private static function initRequest()
    {

    }

}