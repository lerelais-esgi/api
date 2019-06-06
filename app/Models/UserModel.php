<?php

namespace App\Models;


class User extends Externals {
    private $user;

    public function __construct($container, $user = null)
    {
        if(isset($user["id"])) {
            parent::__construct($container);
            $r = $this->container->db->prepare('SELECT * FROM `users` WHERE `id`= :i');
            $r->execute(['i' => $user["id"]]);
            $r = $r->fetchAll(\PDO::FETCH_ASSOC);
            $this->user = array_shift($r);
        }
        else {
            //TODO: PREPARE TO REGISTER
        }
    }

    public function __get($value) { //TODO: DELETE THIS !!!
        return $this->user[$value];
    }
}