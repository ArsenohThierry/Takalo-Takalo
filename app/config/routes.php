<?php

use app\controllers\ExempleController;
use app\controllers\ObjectsController;
use app\controllers\UserController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function ($router) use ($app) {

	// $router->get('/', function () use ($app) {
	// 	$app->render('Login/login', ['message' => BASE_URL . '']);
	// });

	$router->get('/', [ExempleController::class, 'getAll']);

	$router->get('/adminStatistiques', function () use ($app) {
		$app->render('AdminStatistiques/statistiques', ['message' => BASE_URL . '']);
	});

	$router->post('/inscription', [UserController::class, 'register']);
	$router->post('/login', [UserController::class, 'login']);

	$router->get('/home',[ObjectsController::class, 'getAll']);

	$router->get('/object/@id', [ObjectsController::class, 'getObjectById']);

	$router->get('/mes-objets', [ObjectsController::class, 'getMyObjects']);

	$router->get('/proposer-echange/@id', [ObjectsController::class, 'getObjectsAEchanger']);

	
}, [SecurityHeadersMiddleware::class]);