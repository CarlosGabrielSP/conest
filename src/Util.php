<?php 

namespace Cosanpa\ConEst;

class Util
{
    public static function redireciona(String $url = "/", array $dados = []) {
        if($dados){
            $i = 1;
            $url .= "?";
            foreach($dados as $key => $value){
                $url .= $key . "=" . $value;
                if($i == count($dados)) break;
                $url .= "&";
                $i++;
            }
        }
        header('Location: ' . $url);
        exit();
    }

    public static function notificacao(String $status = "info", String $msg = NULL) {
        switch($status){
            case "sucesso":
                $_SESSION['notificacao'] = (object) ['status' => 'success', 'msg' => $msg??'Operação realizada com Sucesso'];
                break;
            case "erro":
                $_SESSION['notificacao'] = (object) ['status' => 'danger', 'msg' => $msg??'Ocorreu um erro ao executar operação'];
                break;
            case "info":
                $_SESSION['notificacao']  = (object) ['status' => 'info', 'msg' => $msg??'']; 
        }
    }

}
