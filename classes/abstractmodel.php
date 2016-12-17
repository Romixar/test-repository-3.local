<?php

abstract class AbstractModel{
    
    protected static $table;// название таблицы в каждом дочернем классе
    
    
	// public static function getTable(){// получаю таблицу БД из подчиненного кдасса
		// return static::$table;
	// }
    
    
    
    public static function findAll(){// полуаем все записи из БД -> таблицы news
        
		
		$class = get_called_class();// получаем имя класс, вызвывающего метод

		//$table = self::getTable();// работают оба варианта
		$table = static::$table;// позднее статическое связывание
		
        $sql = 'SELECT * FROM '.$table;
		$db = new DB();
		$db -> setClassName($class);// устанавливаем имя класса в FETCH_CLASS
		return $db -> query($sql);
    }
    
    public static function findOne($id){
		
		$sql = "SELECT * FROM `".static::$table."` WHERE `id` = :id";
		// echo $sql;
		// exit;
		$db = new DB();
		//print_r($db -> query($sql, [':id' => $id]));
		//exit;
		return $db -> query($sql, [':id' => $id]);
		
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
}







?>