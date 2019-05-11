<?php
namespace App\Middlewares;
use Slim\Http\Body;
use Slim\Http\Request;
use Slim\Http\Response;

class APIMiddleware {

    public function __construct() {

    }
    public function __invoke(Request $request, Response $response, $next)
    {
        if($request->hasHeader('X-Auth-key')) {
            $h = $request->getHeader('X-Auth-key');
            return $next($request, $response);
        } else {
            $r = ['status' => '403', 'message' => 'API token no provided'];
            $r = json_encode($r);
            $body = new Body(fopen('php://temp', 'r+'));
            $body->write($r);

            return $response
                ->withBody($body)
                ->withStatus(403);
        }

    }
}