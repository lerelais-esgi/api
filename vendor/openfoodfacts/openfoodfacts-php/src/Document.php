<?php

namespace OpenFoodFacts;

/**
 * In mongoDB all element are object, it not possible to define property.
 * All property of the mongodb entity are store in one property of this class and the magic call try to access to it
 */
class Document
{
    /**
     * the whole data
     * @var array
     */
    private $data;

    /**
     * the whole data
     * @var array
     */
    private $api;

    /**
     * Initialization the document and specify from which API it was extract
     * @param array $data the whole data
     * @param string $api the api name
     */
    public function __construct(array $data, string $api = null)
    {
        $this->data = $data;
        $this->api  = $api;
    }

    /**
     * @inheritDoc
     */
    public function __get(string $name)
    {
        return $this->data[$name];
    }
    /**
     * @inheritDoc
     */
    public function __isset(string $name):bool
    {
        return isset($this->data[$name]);
    }

}
