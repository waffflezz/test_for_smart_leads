<?php

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH . '/vendor/autoload.php';

use App\Kernel\App;

header('Content-type: application/json');

$app = new App();
$app->run();
