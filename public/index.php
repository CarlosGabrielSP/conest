<?php

use Cosanpa\ConEst\Router;

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

$rotas = require_once __DIR__ . "/../lib/rotas.php";
$router = new Router($rotas);
$router->handler();
