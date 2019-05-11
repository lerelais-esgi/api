<?php
namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class HeaderMiddleware {

    public function __construct() {

    }

    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);
        return $response->withHeader('Content-Type', 'application/json');
    }
}