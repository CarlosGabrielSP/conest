<?php
// APP #################################################################################################
$rotas['/'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'index'
    ]
];

$rotas['/erro404'] = [
    'GET' => [
        'controller' => App\controllers\AppController::class,
        'action' => 'erro404'
    ]
];

// PRODUTOS #################################################################################################
$rotas['/produtos'] = [
    'GET' => [
        'controller' => App\controllers\ProdutoController::class,
        'action' => 'index'
    ]
];


return $rotas; 
