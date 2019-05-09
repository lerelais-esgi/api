<?php

namespace App\Controllers;

use Slim\Http\Response;
use Slim\Http\Request;

class HomeController extends Controller {

    public function get(Request $request,  Response $response) {
        $r['status'] = 'ok';
        $r['message'] = 'Welcome to LeRelais API';
        return json_encode($r);
    }
}