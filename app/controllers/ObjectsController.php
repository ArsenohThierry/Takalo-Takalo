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

    public function getAll()
    {
        $objecModel = new ObjectModel(Flight::db());
        $objets = $objecModel->getAllObjects();
        $this->app->render('Home/accueil', ['objects' => $objets]);
    }

    public function getObjectById($id)
    {
        $objectModel = new ObjectModel(Flight::db());
        $object = $objectModel->getObjectById((int) $id);
        $this->app->render('Home/ficheObjet', ['object' => $object]);
    }

    public function getMyObjects()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            $this->app->render('Home/mesObjets', ['objects' => [], 'nbObjets' => 0]);
            return;
        }

        $objectModel = new ObjectModel(Flight::db());
        $myObjects = $objectModel->getMyObjects((int) $userId);
        $nbObjets = $objectModel->getNumberMyObjects((int) $userId);

        error_log('DEBUG getMyObjects: userId=' . $userId . ', count=' . count($myObjects) . ', result=' . json_encode($myObjects));

        $this->app->render('Home/mesObjets', ['objects' => $myObjects, 'nbObjets' => $nbObjets]);
    }
    public function getObjectsAEchanger($id)
    {
        $objectModel = new ObjectModel(Flight::db());

        //prendre l objet de l autre personne
        $object = $objectModel->getObjectById((int) $id);

        //prendre mes objets
        session_start();
        $myobjects = $objectModel->getMyObjects((int) $_SESSION['user']['id']);

        // Vérifier si l'utilisateur a sélectionné un de ses objets (paramètre GET 'mine')
        $selectedMine = null;
        if (!empty($_GET['mine'])) {
            $mineId = (int) $_GET['mine'];
            // Chercher dans la liste des mes objets
            foreach ($myobjects as $m) {
                if ((int) $m['id'] === $mineId) {
                    $selectedMine = $m;
                    break;
                }
            }
            // Si pas trouvé (sécurité), essayer de le récupérer depuis la base
            if ($selectedMine === null) {
                $selectedMine = $objectModel->getObjectById($mineId);
            }
        }

        $this->app->render('Echange/mes-objets-echange', ['object' => $object, 'myobjects' => $myobjects, 'selectedMine' => $selectedMine]);
    }
    public function submitEchange(){
        $data = $this->app->request()->data;
        $objectModel = new ObjectModel(Flight::db());

        //update leur statut
        $objectModel->updateStatut((int)$data['mine_id']);
        $objectModel->updateStatut((int)$data['target_id']);

        $this->app->render('Home/accueil', ['message' => 'Proposition d\'échange envoyée !']);
    }
}
