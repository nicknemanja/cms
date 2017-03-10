<?php

require './src/classes/Article.php';

class ArticleDAO {
    
    
    //parameters
    private static $SELECT_ARTICLE_LIST = "SELECT * FROM article LIMIT 10";
    
    //constructor
    public function __construct($array = []){
            
    }
    
    //methods
    public static function getById($id) {
        
    }

    public static function getList($size = 10) {
        try {
            $pdo = DB_Connection::getPdo();
            $stmt = $pdo->query(ArticleDAO::$SELECT_ARTICLE_LIST);
            
            $stmt->execute();

            $list = array();

            while ($row = $stmt->fetch()) {
                $list[] = new Article($row);
            }

            return $list;
        } catch (PDOException $pdoe) {
            var_dump('PDO_EXCEPTION:', $pdoe);
            die();
        }
    }
    
    public static function insert($article){
        
    }
    
    public static function update($article){
        
    }
    
    public static function delete($article){
        
    }    

}
