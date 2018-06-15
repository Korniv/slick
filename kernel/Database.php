<?php

namespace app\kernel;


class Database
{
    const MYSQL_CONNECT = 'mysql';

    private $configurations = [];
    private $connections = [];


    public static function init($dbConfiguration)
    {
        $dataBase = new self();
        $dataBase->configurations = $dbConfiguration;
        //var_dump($dataBase);
        $dataBase->initConnections();
        //$dataBase->unsetConfigs();
       // var_dump($dataBase);die();
        return  $dataBase;
    }

    private function initConnections()
    {
        foreach ($this->configurations as $name => $config)
        {
            if ($config['type'] == self::MYSQL_CONNECT)
            {
                $dsn = sprintf('mysql:dbname=%s;host=%s',$config['db'],$config['host']);
                $user = $config['user'];
                $password = $config['password'];
                try {
                    $this->connections[$name] = new \PDO($dsn,$user,$password);
                } catch(\Exception $e) {
                    throw new \Exception($e->getMessage(),0,$e);
                    //var_dump( $e->getMessage());
                }


            }
            else $this->connections[$name] = null;
        }
    }

    private function unsetConfigs()
    {
        unset($this->configurations);
    }


}