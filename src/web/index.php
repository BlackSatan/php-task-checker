<?php
use src\core\AppContext;
use src\core\AppServer;
use src\App;

$config = require(__DIR__ . '/../config/main.php');

$context = new AppContext($config);
$server = new AppServer($context);
App::$app = $context;

$response = $server->handleRequest();
$server->sendResponse($response);