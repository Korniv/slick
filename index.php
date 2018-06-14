<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'kernel/Slick.php';
$config = require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'config/config.php';
\app\kernel\Slick::init($config);
echo '<pre>';
var_dump(\app\kernel\Slick::$app);
//var_dump(file_get_contents('php://input'),$_SERVER);
//var_dump($config);
//var_dump(dirname(__FILE__).DIRECTORY_SEPARATOR.'kernel/Slick.php');
//\kernel\Slick::init();