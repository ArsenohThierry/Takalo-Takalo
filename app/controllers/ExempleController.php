<?php
namespace app\controllers;

use flight\Engine;
use app\models\ExempleModel;
use Flight;

class ExempleController
{

    protected Engine $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
    public function getAll(){
        $exempleModel = new ExempleModel(Flight::db());
        $data = $exempleModel->getAll();
        $this->app->render('Login/login', ['data' => $data]);
    }
}