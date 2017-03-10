<?php

class DB_Connection {

    public static $DB_DSN = 'mysql:host=localhost;dbname=cms_j';
    public static $DB_USERNAME = 'root';
    public static $DB_PASSWORD = 'Nemanja1!!@';
    public static $PDO_CONNECTION = null;

    public static function getPdo() {
        if (DB_Connection::$PDO_CONNECTION === null) {
            return new PDO(DB_Connection::$DB_DSN, DB_Connection::$DB_USERNAME, DB_Connection::$DB_PASSWORD);
        } else {
            return DB_Connection::$PDO_CONNECTION;
        }
    }

}
