<?php

class DB{
    
    
    public function __construct(){
        
        mysql_connect(Config::DB_HOST,Config::DB_USER,Config::DB_PASS);
        mysql_selectdb(Config::DB_NAME);
        
    }
    
    public function queryAll($sql, $class = 'stdClass'){// извлечь массив записей
        
        $res = mysql_query($sql);
        
        if($res === false) return false;
        
        $ret = [];// для хранения массива ответа из БД
        
        while($row = mysql_fetch_object($res, $class)){// сразу запаковываем в объект
            
            $ret[] = $row;// получается массив объектов
            
        }
        return $ret;
        
    }
    
    public function queryOne($sql, $class = 'stdClass'){// извлечь одну (первую) запись
        
        return $this -> queryAll($sql, $class)[0];
    }
    
    
}



?>