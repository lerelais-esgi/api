<?php

namespace App\Controllers;

use Slim\Http\Response;
use Slim\Http\Request;

final class LoginController extends Controller
{

    /**
     * @method POST
     * @param Request $request
     * @param Response $response
     * @return false|string
     */
    public function login(Request $request, Response $response)
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $r = $this->container()->db->prepare('SELECT * FROM `users` WHERE email = :e');
            $r->execute(['e' => $_POST['email']]);
            $r = $r->fetch(\PDO::FETCH_LAZY);
            if ($this->decrypt($r['password']) == $_POST['password']) {
                $t = bin2hex(openssl_random_pseudo_bytes(16));
                $this->container()->db->prepare("UPDATE `users` SET `token` = ?, `last_ip` = ? WHERE id = ?")
                       ->execute([$t, $_SERVER['REMOTE_ADDR'], $r['id']]);
                $r = ['logged' => true, 'token' => $t];
            } else {
                $r = ['logged' => false, 'token' => '0'];
            }

        }
    return json_encode($r);
    }
}