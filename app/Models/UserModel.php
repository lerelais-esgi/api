<?php

namespace App\Models;


use phpDocumentor\Reflection\Types\Parent_;

class UserModel extends Externals {
    private $user;

    public function __construct($container, $id = null, $user = null)
    {
        if($id != null) {
            parent::__construct($container);
            $r = $this->container->db->prepare('SELECT * FROM `users` WHERE `id`= :i');
            $r->execute(['i' => $id]);
            $r = $r->fetchAll(\PDO::FETCH_ASSOC);
            $this->user = array_shift($r);
        }
        else {

        }
    }
}