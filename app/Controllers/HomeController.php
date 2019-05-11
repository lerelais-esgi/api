<?php

namespace App\Controllers;

use Slim\Http\Response;
use Slim\Http\Request;

class HomeController extends Controller {

    /**
     * @method GET
     * @param Request $request
     * @param Response $response
     * @return false|string
     */
    public function get(Request $request, Response $response) {
        $r['status'] = 'ok';
        $r['message'] = 'Welcome to Le Relais API';
        return json_encode($r);
    }
}