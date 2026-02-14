<?php
namespace app\controllers;

use flight\Engine;
use app\models\ObjectModel;
use Flight;

class ObjectsController 
{

    protected Engine $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function getAll(){
        $objecModel = new ObjectModel(Flight::db());
        $objets = $objecModel->getAllObjects();
        $this->app->render('Home/accueil', ['objects'=> $objets]);
    }
}