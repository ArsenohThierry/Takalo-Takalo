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

    public function getObjectById($id){
        $objectModel = new ObjectModel(Flight::db());
        $object = $objectModel->getObjectById((int)$id);
        $this->app->render('Home/ficheObjet', ['object' => $object]);
    }

    public function getMyObjects(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            $this->app->render('Home/mesObjets', ['objects' => [], 'nbObjets' => 0]);
            return;
        }

        $objectModel = new ObjectModel(Flight::db());
        $myObjects = $objectModel->getMyObjects((int)$userId);
        $nbObjets = $objectModel->getNumberMyObjects((int)$userId);
        
        error_log('DEBUG getMyObjects: userId=' . $userId . ', count=' . count($myObjects) . ', result=' . json_encode($myObjects));
        
        $this->app->render('Home/mesObjets', ['objects' => $myObjects, 'nbObjets' => $nbObjets]);
    }
    }
