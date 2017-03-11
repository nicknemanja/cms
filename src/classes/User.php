<?php

class User {

    public $id;
    public $username;
    public $password;
    public $fk_id_user_role;

    public function __construct($userData = []) {
        $this->id = isset($userData['id_user']) ? $userData['id_user'] : '';
        $this->username = isset($userData['username']) ? $userData['username'] : '';
        $this->password = isset($userData['password']) ? $userData['password'] : '';
        $this->fk_id_user_role = isset($userData['fk_id_user_role']) ? $userData['fk_id_user_role'] : '';
        
    }

    public static function getByUsername($username) {
        //select po usernameu
        return UserDAO::getByUsername($username);
    }

    public static function createNew($user) {
        return UserDAO::insert($user);
    }

}
