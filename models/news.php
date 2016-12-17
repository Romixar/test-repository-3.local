<?php

class News extends AbstractModel{
    
    public $id;
    public $title;
    public $author;
    
    protected static $table = 'news';// название таблицы
    protected static $class = 'News';// название класса
    
    
    
//    public static function getAll(){
//        
//        $db = new DB();
//        
//        $sql = 'SELECT * FROM `'.static::$table.'`';// у потомка беём таблицу
//        
//        return $db -> queryAll($sql, static::$class);// имя класса также у потомка
//        
//    }
//    
//    public static function getOne($id){
//        
//        $db = new DB();
//        
//        $sql = 'SELECT * FROM `'.static::$table.'` WHERE `id` = '.$id;
//        
//        return $db -> queryOne($sql, static::$class);
//    }
//    
//    
//    
    
    
    
}





?>