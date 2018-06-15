<?php
define('SLICK_ENV','dev');
define('SLICK_SIMPLE_LAYER_LEVEL',1);
$config = [
    'name' => 'microb app',
    'alias' => 'slick.dev',
    'layer' =>SLICK_SIMPLE_LAYER_LEVEL,
    'env' => SLICK_ENV,
    'default_controller'=> 'api',
    'default_action'=> 'get',
    'db' => require dirname(__FILE__).DIRECTORY_SEPARATOR.'db.php',
    'params' => require dirname(__FILE__).DIRECTORY_SEPARATOR.'params.php',
];
return $config;