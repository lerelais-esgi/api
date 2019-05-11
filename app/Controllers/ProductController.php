<?php

namespace App\Controllers;

use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Slim\Http\Body;
use Slim\Http\Response;
use Slim\Http\Request;

final class ProductController extends Controller
{

    private function requestOFF(Response $response, $code) {
        $api = new Api('food', 'fr-fr');
        try {
            $p = $api->getProduct($code);  //
        } catch (ProductNotFoundException $e) {
            $r = ['status' => 404, 'message' => $e->getMessage()];
            return $r;
        }
        $r['name'] = $p->__get("product_name_fr"); //TODO multilang
        $r['image'] = $p->__get("selected_images")["front"]["display"]["fr"]; //TODO: multilang
        $r['code'] = 200;
        return $r;
    }

    public function getInfo(Request $request, Response $response, $args)
    {
        if(isset($args["code"])) {
            $d = $this->requestOFF($response, $args["code"]);
            $response = $response->withStatus($d['code'])->write(json_encode($d));
            return $response;
        }
        else {
            $r = ["code" => "400", "message" => "Product code not provided"];
            return $response->withStatus(400)->write(json_encode($r));
        }

    }
}