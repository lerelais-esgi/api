<?php

namespace App\Controllers;

use App\Models\UserModel;
use Slim\Http\Response;
use Slim\Http\Request;
final class HomeController extends Controller {

    /**
     * @method GET
     * @param Request $request
     * @param Response $response
     * @return false|string
     */
    public function get(Request $request, Response $response) {
        new UserModel($this->container(), '10');
        $r['status'] = 'ok';
        $r['message'] = 'Welcome to Le Relais API';
        return json_encode($r);
    }
}