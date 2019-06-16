<?php

namespace App\Controllers;
use Slim\Http\Request;
use Slim\Http\Response;

class StockController extends Controller {

    public function getStock(Request $request, Response $response) {
        $r = $this->container()->db->prepare('SELECT * FROM `stock` WHERE user = 0');
        $r->execute();
        $r = $r->fetchAll(\PDO::FETCH_KEY_PAIR);
        die(var_dump($r));
        echo $r;
    
    }
}