<?php

require './src/classes/User.php';

class UserDAO {

    private static $SELECT_USER_BY_ID = "SELECT * FROM user WHERE id = :id";
    private static $SELECT_USER_LIST = "SELECT * FROM user LIMIT 10";
    private static $INSERT_USER = "INSERT INTO user(username, password, salt, name, fk_id_user_role) VALUES (:username, :password, :name, :fk_id_user_role)";
    private static $DELETE_USER_BY_ID = "DELETE FROM user WHERE id = :id";

    //parameters
    //constructor
    public function __construct($array = []) {
        
    }

    //methods
    public static function getById($id) {
        
    }

    public static function getList($size = 10) {
        try {
            $pdo = DB_Connection::getPdo();
            $stmt = $pdo->query(UserDAO::$SELECT_USER_LIST);
            
            $stmt->execute();

            $list = array();

            while ($row = $stmt->fetch()) {
                $list[] = new User($row);
            }

            return $list;
        } catch (PDOException $pdoe) {
            var_dump('PDO_EXCEPTION:', $pdoe);
            die();
        }
    }

    public static function insert($user) {
        
    }

    public static function update($user) {
        
    }

    public static function delete($user) {
        
    }

    public static function deleteList($listOfUserIds) {
        $pdo = DB_Connection::getPdo();

        $stmt = $pdo->prepare(UserDAO::$DELETE_USER_BY_ID);

        foreach ($listOfUserIds as $id) {
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        }
    }

}
