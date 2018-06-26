<?php

namespace app\base;


class Controller
{
    private $id;
    private $action;

    public function __construct()
    {

    }

    public static function init()
    {

    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        //return $this->action;
    }

    public function afterAction()
    {

    }

    public function beforeAction()
    {

    }
}