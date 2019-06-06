<?php

namespace App\Models;


class Product extends Externals {
    private $barcode;
    private $name;
    private $quantity;

    public function __construct($barecode, $name, $q = null) {
        $this->barcode = $barecode;
        $this->name = $name;
        $this->quantity = $q;

    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param null $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function commit() {

    }
}