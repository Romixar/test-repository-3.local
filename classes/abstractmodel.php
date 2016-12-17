<?php

abstract class AbstractModel{
    
    protected static $table;// название таблицы в каждом дочернем классе
    
	protected $data = [];// здесь будут счвойства дочерних объектов (поля таблицы)
    
	
	public function __set($k, $v){// добавляем свойства дочернего объекта во внутр-й массив
		// в нашем случае при вызове news создаём ему свойства
		$this -> data[$k] = $v;
	}
	
	public function __get($k){
		return $this -> data[$k];
	}
	
	
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
		return $db -> query($sql, [':id' => $id])[0];// чтобы вернуть объект добавить []
		
	}
	
	public static function findByColumn($column, $value){// поиск в заданной колонке заданного поля
	
		$sql = 'SELECT * FROM `'.static::$table.'` WHERE `'.$column.'` = :'.$column;
		//echo $sql;exit;
		$db = new DB();
		
		//print_r($db -> query($sql, [':'.$column => $value]));
		return $db -> query($sql, [':'.$column => $value]);
		
		
		
	}
    
    public function insert(){
		
		//$cols = array_keys($this -> data);// получаем список полей (ключи массива)
		
		
		$data = [];// здесь будет тот  же массив, но измененными ключами :title => jnjb, :author => bhbh
		
		// foreach($cols as $col){// получаем ключи и значеия в нужном формате
			// $data[':'.$col] = $this -> data[$col];
		// }
		$cols = [];// здесь будут ключи (колонки таблицы)
		
		foreach($this -> data as $col => $val){// получаем ключи и значеия в нужном формате
			$cols[] = $col;
			$data[':'.$col] = $val;
		}

		
		$sql = 'INSERT INTO `'.static::$table.'` '.
				'('.implode(', ',$cols).')'.
				' VALUES'.
				' ('.implode(',',array_keys($data)).')';// ключи из обработанного массива (с :)
		
		
		
		$db = new DB();
		$db -> execute($sql, $data);
		
	}
    
    
    
    
    
    
    
    
    
    
    
}







?>