<?php

namespace App\Controllers;
define('ENCRYPT_METHOD', 'aes-256-cbc');
use Slim\Http\Response;

class Controller {
    private $container;
    private $secret;

    public function __construct($container) {
        $this->container = $container;
        $this->secret = "abcdefghijklmnopqrstuvwxyz";
    }

    public function __get($name) {
        $this->container->get($name);
    }
    public function redirect($response, $name, $code = 302) {
        return $response->withStatus($code)->withHeader('Location', $this->container->router->pathFor($name));
    }
    public function container() {
        return $this->container;
    }
    protected function encrypt($to_crypt) {
        $salt = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPT_METHOD));
        $to_crypt = openssl_encrypt($to_crypt, ENCRYPT_METHOD, $this->secret, 0, $salt);
        return $salt.$to_crypt;
    }

    protected function decrypt($to_decrypt) {
        $saltlen = openssl_cipher_iv_length(ENCRYPT_METHOD);
        return rtrim(openssl_decrypt(substr($to_decrypt, $saltlen), ENCRYPT_METHOD, $this->secret, 0, substr($to_decrypt, 0, $saltlen)), "\0");
    }
}