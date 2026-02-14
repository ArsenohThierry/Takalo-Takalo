<?php
namespace app\controllers;

use flight\Engine;
use app\models\UserModel;
use Flight;

class UserController
{

    protected Engine $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function register(){
        // récupérer les données POST
        $data = $this->app->request()->data;

        // accéder aux champs (ex: username, email, password)
        $username = isset($data['nom']) ? trim($data['nom']) : null;
        $email = isset($data['email']) ? filter_var($data['email'], FILTER_SANITIZE_EMAIL) : null;
        $password = isset($data['password']) ? $data['password'] : null;

        if ($username == null || $email == null || $password == null ) {
            $this->app->render('Login/login', ['message' => 'Erreur lors de l\'inscription. Veuillez remplir tous les champs.']);
        }
        $usermodel = new UserModel(Flight::db());
        $result = $usermodel->createUser($username, $email, $password);
        if (!$result) {
            $this->app->render('Login/login', ['message' => 'Erreur lors de l\'inscription. Veuillez réessayer.']);
        }
            $this->app->redirect('home');
        }

        public function login(){
            // récupérer les données POST
            $data = $this->app->request()->data;
    
            // accéder aux champs (ex: username, email, password)
            $email = isset($data['email']) ? trim($data['email']) : null;
            $password = isset($data['password']) ? $data['password'] : null;
    
            if ($email == null || $password == null) {
                $this->app->render('Login/login', ['message' => 'Erreur lors de la connexion. Veuillez remplir tous les champs.']);
                return;
            }
    
            // Ici, vous devriez vérifier les informations d'identification de l'utilisateur
            // en interrogeant la base de données et en comparant les mots de passe.
            $userModel = new UserModel(Flight::db());
            $user = $userModel->verifyUser($email, $password);
            
            if ($user) {
                // Si la connexion est réussie :
                $this->app->redirect('home');
            } else {
                $this->app->render('Login/login', ['message' => 'Erreur lors de la connexion. Veuillez vérifier vos identifiants.']);
            }
        }
    }
