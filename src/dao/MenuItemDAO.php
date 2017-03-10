<?php

class MenuItemDAO {
    
    
    private static $SELECT_MENU_ITEM_LIST = "SELECT * FROM menu_item LIMIT :sizeOfList";
    
    /*
      <?php
      /* Execute a prepared statement by binding PHP variables
      $calories = 150;
      $colour = 'red';
      $sth = $dbh->prepare('SELECT name, colour, calories
      FROM fruit
      WHERE calories < :calories AND colour = :colour');
      $sth->bindParam(':calories', $calories, PDO::PARAM_INT);
      $sth->bindParam(':colour', $colour, PDO::PARAM_STR, 12);
      $sth->execute();
      ?>
     */

    //parameters

    //methods
    public static function getById($id) {
        
        
        
    }

    public static function getList($size = 10) {
        
    }

    public static function insert($user) {
        
    }

    public static function update($user) {
        
    }

    public static function delete($user) {
        
    }

}
