<?php

namespace Cosanpa\ConEst;

class Router
{
    /*Array que receberá todas as rotas com suas respectivas informações, Controller e Action.
    Exemplo: ['/users'] => ['controller' => 'UserController', 'action' => 'users']*/
    private $rotas = [];

    function __construct($rotas){
        $this->rotas = $rotas;
    }

    /*Função verifica a existência da rota*/
    protected function rotaExiste($rota, $method){
        return isset($this->rotas[$rota][$method]);
    }

    /*Função recupera a rota informada, se existir*/
    protected function getInfoRota($rota, $method){
        if($this->rotaExiste($rota, $method)){
            return $this->rotas[$rota][$method];
        }
    }

    // protected function autenticacao($infoRota){
    //     if($infoRota['restrito']){
    //         if ($infoRota['restrito'] === 'aluno' && !isset($_SESSION['logado'])){
    //             Util::redireciona('/login');
    //         }
    //         if ($infoRota['restrito'] === 'admin' && !isset($_SESSION['admin'])){
    //             Util::redireciona('/admin/login');
    //         }
    //     }
    // }

    public function handler(){
        $rota_acessada = explode("?", $_SERVER["REQUEST_URI"]);
        if(is_array($rota_acessada)){
            $rota_acessada = $rota_acessada[0];
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if(strlen($rota_acessada) > 1) $rota_acessada = rtrim($rota_acessada,'/');
        if($infoRota = $this->getInfoRota($rota_acessada,$method)){
            // var_dump($this->getInfoRota($rota_acessada,$method));
            // exit();
            // $this->autenticacao($infoRota);
            $controller = new $infoRota['controller'];
            $action = $infoRota['action'];
            $controller->$action(3);
        } else {
            header('Location: ' . '/erro404');
            exit();
        }
    }
}
