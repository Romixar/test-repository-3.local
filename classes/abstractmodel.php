<?php

abstract class AbstractModel{
    
    protected static $table;// название таблицы в каждом дочернем классе
    protected static $class;// название класса в каждом дочернем классе
    
    
    
    
    
    public static function getAll(){
        
        $db = new DB();
        
        $sql = 'SELECT * FROM `'.static::$table.'`';// у потомка берём таблицу
        
        return $db -> queryAll($sql, static::$class);// имя класса также у потомка
        
    }
    
    public static function getOne($id){
        
        $db = new DB();
        
        $sql = 'SELECT * FROM `'.static::$table.'` WHERE `id` = '.$id;
        
        return $db -> queryOne($sql, static::$class);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}







?>