<?php

use app\controllers\ExempleController;
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


}, [SecurityHeadersMiddleware::class]);