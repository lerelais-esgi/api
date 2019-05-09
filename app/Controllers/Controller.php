<?php

namespace App\Controllers;

use Slim\Http\Response;

class Controller {
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function __get($name) {
        $this->container->get($name);
    }
    public function redirect($response, $name, $code = 302) {
        return $response->withStatus($code)->withHeader('Location', $this->container->router->pathFor($name));
    }
    public function container() {
        return $this->container;
    }
}