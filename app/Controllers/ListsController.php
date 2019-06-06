<?php

namespace App\Controllers;

use OpenFoodFacts\Api;
use OpenFoodFacts\Exception\ProductNotFoundException;
use Psr\Container\ContainerInterface;
use Slim\Http\Body;
use Slim\Http\Response;
use Slim\Http\Request;

class ListsController extends Controller
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
    }

    public function create(Request $request, Response $response) {

    }

    public function add(Request $request, Response $response) {
        $list = [
            "peoductname" => [
                "limit" => 'date',
                "barecode" => '8000500267035',
                "type"  => "food",
                "quanity" => '8'
            ]
        ];
        $list = json_decode($list, true);
        foreach ($list as $product =)




    }
}