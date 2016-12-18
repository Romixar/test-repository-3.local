<?php

class DB{
    
	private $dbh;
	private $classname = 'stdClass';
    
    public function __construct(){
        
		$this -> dbh = new PDO('mysql:dbname=test;host=localhost', 'root', '');// подключение с использ-ем PDO
        
    }
	
	public function setClassName($classname){
		$this -> classname = $classname;
	}
    
	// $params - должен быть масив вида [:id => $id]
	public function query($sql, $params = []){// должен вернуть результат запроса
		
		$sth = $this -> dbh -> prepare($sql);// создаём подготовленный запрос
		$sth -> execute($params); // исполняем запрос с указанными параметравми
		//return $sth -> fetchAll(PDO::FETCH_OBJ);// получить все результаты выполнения запроса ввиде объекта
		return $sth -> fetchAll(PDO::FETCH_CLASS, $this -> classname);// получить все результаты
		// выполнения запроса ввиде объекта нужного класса
		
	}
	
	public function execute($sql, $params = []){
		
		$sth = $this -> dbh -> prepare($sql);// создаём подготовленный запрос
		
		return $sth -> execute($params); 
	}
	
	public function lastInsertId(){// вернём ID последней вставленно записи
		return $this -> dbh -> lastInsertId();// вернём ID последней вставленно записи
	}
	
	
    
}



?>