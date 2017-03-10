<?php

class User {

    public $id;
    public $username;
    public $fk_id_user_role;

    public function __construct($userData = []) {
        $this->id = isset($userData['id_user']) ? $userData['id_user'] : '';
        $this->username = isset($userData['username']) ? $userData['username'] : '';
        $this->fk_id_user_role = isset($userData['fk_id_user_role']) ? $userData['fk_id_user_role'] : '';
    }

    
}
