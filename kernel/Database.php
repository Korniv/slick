<?php

namespace app\kernel;

use \Exception;

class Database
{
    const MYSQL_CONNECT = 'mysql';
    const SQLITE_CONNECT = 'sqlite';

    private $configurations = [];
    private $connections = [];
    private $rrr = [];


    public static function init($dbConfiguration)
    {
        $dataBase = new self();
        $dataBase->configurations = $dbConfiguration;
        $dataBase->initConnections();
        //$dataBase->unsetConfigs();
        return  $dataBase;
    }

    private function initConnections()
    {
        foreach ($this->configurations as $name => $config)
        {
            if (in_array($config['type'],\PDO::getAvailableDrivers())
                && in_array($config['type'],self::getAvailableDbTypes()))
            {
                if ($config['type'] == self::MYSQL_CONNECT)
                {
                    $dsn = sprintf('mysql:dbname=%s;host=%s',$config['db'],$config['host']);
                    $user = $config['user'];
                    $password = $config['password'];
                    try {
                        $this->connections[$name] = new \PDO($dsn,$user,$password);
                    } catch(\Exception $e) {
                        //TODO THROW
                        throw new \Exception($e->getMessage());
                    }
                }
                else $this->connections[$name] = null;
            }
        }
    }

    private static function getAvailableDbTypes()
    {
        return [self::MYSQL_CONNECT/*,self::SQLITE_CONNECT*/];
    }

    private function unsetConfigs()
    {
        unset($this->configurations);
    }


}