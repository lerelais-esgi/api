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
$app->add(new \App\Middlewares\APIMiddleware($container));
$app->add(new \App\Middlewares\HeaderMiddleware());

$app->get('/', \App\Controllers\HomeController::class . ':get');
$app->post('/login', \App\Controllers\LoginController::class . ':login');
$app->get('/product/getInfo/[{code}]', \App\Controllers\ProductController::class . ':getInfo');
$app->get('/account/getInfo', \App\Controllers\AccountController::class . ':getInfo');

$app->delete('/lists', \App\Controllers\ListsController::class . ':delete');
$app->put('/lists', \App\Controllers\ListsController::class . ':add');
$app->patch('/lists', \App\Controllers\ListsController::class . ':update');


//$app->get('/login', \App\Controllers\AccountController::class . ':get')->setName('login');

$app->run();