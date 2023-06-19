<?php

namespace App\controllers;

use Cosanpa\ConEst\Controller;

class AppController extends Controller
{
    public function index(){
        $this->view("app/index");
    }

    public function erro404(){
        $this->view('app/404');
    }

}
