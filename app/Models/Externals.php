<?php

namespace App\Models;

class Externals
{

    protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

}