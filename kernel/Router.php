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
        $router->parseRoute();
        return $router;
    }

    private  function parseRoute()
    {
        //$layerLevel = Slick::$app->getConfiguration()->layer;
        $requestUri = $_SERVER['REQUEST_URI'];
        $uriParams = explode('/',$requestUri);
        $countUriParams =  count($uriParams);
        $defaultController = Slick::$app->getConfiguration()->default_controller;
        $defaultAction = Slick::$app->getConfiguration()->default_action;
        $this->controller = ($uriParams[1]) ? $uriParams[1]:$defaultController;
        $this->action = ($uriParams[2] && $uriParams[2] != '') ? $uriParams[2]:$defaultAction;
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
}