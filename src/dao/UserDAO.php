<?php

require './src/classes/User.php';
require_once 'src/db/DB_Connection.php';

class UserDAO {
    
    private static $SELECT_USER_BY_USERNAME = "SELECT * FROM user WHERE username = :username LIMIT 1";
    private static $SELECT_USER_BY_ID = "SELECT * FROM user WHERE id_user = :id LIMIT 1";
    private static $SELECT_USER_LIST = "SELECT * FROM user LIMIT 10";
    private static $INSERT_USER = "INSERT INTO user(username, password) VALUES (:username, :password)";
    private static $DELETE_USER_BY_ID = "DELETE FROM user WHERE id = :id";
    private static $UPDATE_USER_BY_ID = "UPDATE user SET username = :username, ";

    //parameters
    //constructor
    public function __construct($array = []) {
        
    }

    //methods
    public static function getById($id) {
        
        
        
        $pdo = new PDO(DB_Connection::$DB_DSN, DB_Connection::$DB_USERNAME, DB_Connection::$DB_PASSWORD);
        try{
            $stmt = $pdo->prepare(UserDAO::$SELECT_USER_BY_ID);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            
            $user = new User($stmt->fetch());
       
            return $user;
            
            
            
        } catch (PDOException $pdoe) {
            echo 'Greska pri radu sa bazom podataka.';

            var_dump('PDO_EXCEPTION:', $pdoe);
            return null;
        } catch (Exception $e) {
            echo 'Greska pri radu sa bazom podataka.';
            var_dump('PDO_EXCEPTION:', $e);
            return null;
        }
    }

    public static function getByUsername($username) {
        try {

            $pdo = new PDO(DB_Connection::$DB_DSN, DB_Connection::$DB_USERNAME, DB_Connection::$DB_PASSWORD);
            $stmt = $pdo->prepare(UserDAO::$SELECT_USER_BY_USERNAME);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            $stmt->execute();

            return(new User($stmt->fetch()));
        } catch (PDOException $pdoe) {
            echo 'Greska pri radu sa bazom podataka.';

            var_dump('PDO_EXCEPTION:', $pdoe);
            return null;
        } catch (Exception $e) {
            echo 'Greska pri radu sa bazom podataka.';
            var_dump('PDO_EXCEPTION:', $e);
            return null;
        }
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
        try {
            //INSERT INTO user(username, password) VALUES (:username, :password)";

            $pdo = new PDO(DB_Connection::$DB_DSN, DB_Connection::$DB_USERNAME, DB_Connection::$DB_PASSWORD);
            $stmt = $pdo->prepare(UserDAO::$INSERT_USER);

            $stmt->bindParam(':username', $user->username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->password, PDO::PARAM_STR);

            return ($stmt->execute());
        } catch (PDOException $pdoe) {
            echo 'Greska pri radu sa bazom podataka.';
            var_dump('PDO_EXCEPTION:', $pdoe);
            die();
            return null;
        } catch (Exception $e) {
            echo 'Greska pri radu sa bazom podataka.';
            var_dump('PDO_EXCEPTION:', $e);
            die();
            return null;
        }
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
