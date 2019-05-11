<?php
namespace App\Middlewares;
use Slim\Http\Body;
use Slim\Http\Request;
use Slim\Http\Response;

class APIMiddleware {

    private $container;
    public function __construct($container) {
        $this->container = $container;
    }
    public function __invoke(Request $request, Response $response, $next)
    {
        if ($request->hasHeader('X-Auth-key')) {
            $h = $request->getHeader('X-Auth-key');
            $r = $this->container->db->prepare('SELECT * FROM `users` WHERE token = :t');
            $r->execute(['t' => $h[0]]);
            $r = $r->fetch(\PDO::FETCH_LAZY);
            if(empty($r['id'])) {
                $r = ['status' => '403', 'message' => 'API token not allowed'];
                $r = json_encode($r);
                $body = new Body(fopen('php://temp', 'r+'));
                $body->write($r);
                return $response
                    ->withBody($body)
                    ->withStatus(403);
            }
            $_SESSION["u"] = [
             "e" => $r["email"],
             "f" => $r["firstname"],
             "l" => $r["lastname"],
             "a" => $r["address"]
            ];
            return $next($request, $response);
        } else if($request->getUri()->getPath() == "login" || $request->getUri()->getPath() == "/") {
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