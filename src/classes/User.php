<?php

class User {

    public $id;
    public $username;
    public $password;
    public $fk_id_user_role;
    public $role;
    public $active;

    public function __construct($userData = []) {
        $this->id = isset($userData['id_user']) ? $userData['id_user'] : '';
        $this->username = isset($userData['username']) ? $userData['username'] : '';
        $this->password = isset($userData['password']) ? $userData['password'] : '';
        $this->fk_id_user_role = isset($userData['fk_id_user_role']) ? $userData['fk_id_user_role'] : '';
        $this->active = isset($userData['active']) ? $userData['active'] : '';
        
        switch ($this->fk_id_user_role){
            case '1':
                $this->role = 'korisnik';
                break;
            case '2':
                $this->role = 'admin';
                break;
            default :
                $this->role = 'N/A';
        }
    }

    public static function getByUsername($username) {
        //select po usernameu
        return UserDAO::getByUsername($username);
    }
    
    public static function getById($id){
        return UserDAO::getById($id);
    }

    public static function createNew($user) {
        return UserDAO::insert($user);
    }

}
