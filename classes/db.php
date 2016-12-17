<?php

class DB{
    
	private $dbh;
    
    public function __construct(){
        
		$this -> dbh = new PDO('mysql:dbname=test;host=localhost', 'root', '');// подключение с использ-ем PDO
        
    }
    
	public function query($sql, $params = []){// должен вернуть результат запроса
		
		$sth = $this -> dbh -> prepare($sql);// создаём подготовленный запрос
		$sth -> execute($params); // исполняем запрос с указанными параметравми
		return $sth -> fetchAll(PDO::FETCH_OBJ);// получить все результаты выполнения запроса ввиде объекта
		
	}
	
	
    
}



?>