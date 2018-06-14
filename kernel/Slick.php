<?php

namespace app\kernel;

require_once 'Request.php';
require_once 'Router.php';
require_once 'Middleware.php';
require_once 'Response.php';


class Slick
{
    private $configuration;
    private $request;
    private $route;
    private $response;
    private $controller;
    private $action;
    private $params;
    private $logger;
    private $env;
    public static $app;


    public static function init($configuration)
    {
        self::$app = new self();
        self::$app->configure($configuration);
        self::$app->initRequest();
        self::$app->initRouter();
        self::$app->initMiddleware();
        self::$app->initDatabase();
        self::$app->initController();
        return self::$app->returnResult();
    }

    public  function getApp()
    {
        return self::$app;
    }

    public  function getController()
    {
        return $this->controller;
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    private function initRequest()
    {
        $this->request = Request::init();
    }

    private function initRouter()
    {
        $this->route = Router::init();
    }

    private function initMiddleware()
    {

    }

    private function initDatabase()
    {

    }

    private  function configure($configuration)
    {
        $this->configuration = $configuration;
    }

    private function initController()
    {
        $this->controller = $this->route->getController();
        $this->action = $this->route->getAction();
        $this->params = $this->route->getParams();

        //init  current controller/action
    }

    private function returnResult()
    {
        return true;
    }

    /*public static function setController($controller)
    {
        static::$app->controller = $controller;
    }*/
}