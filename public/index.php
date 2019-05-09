<?php
/**
 * Created by PhpStorm.
 * User: rkezal
 * Date: 19/02/2019
 * Time: 10:53
 */
require '../vendor/autoload.php';
session_start();

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require('../app/container.php');

$container = $app->getContainer();


// Middlewares
$app->add(function($request, $response, $next) {
    $response = $next($request, $response);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/', \App\Controllers\HomeController::class . ':get');
$app->post('/login', \App\Controllers\LoginController::class . ':login');

//$app->get('/login', \App\Controllers\AccountController::class . ':get')->setName('login');

$app->run();