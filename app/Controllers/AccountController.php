<?php

namespace App\Controllers;

use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Slim\Http\Body;
use Slim\Http\Response;
use Slim\Http\Request;

class AccountController extends Controller
{
    public function getInfo(Request $request, Response $response) {
        $r = $this->container()->db->prepare('SELECT * FROM `users` WHERE token = :t');
        $r->execute(['t' => $request->getHeader("X-Auth-key")[0]]);
        $r = $r->fetch(\PDO::FETCH_ASSOC);
        $res = [];
        if($r["type"] == 1) {
            $res = [
                "account_type" => "business",
                "name" => $r["business"],
                "email" => $r["email"],
                "address" => $r["address"],
                "token" => $r["token"]
        ];
        } else {
            $res = [
                "account_type" => "personal",
                "firstname" => $r["firstname"],
                "lastname" => $r["lastname"],
                "email" => $r["email"],
                "address" => $r["address"],
                "token" => $r["token"]];
        }
        return $response->write(json_encode($res));
    }
}