<?php

class View{
    
    //const PATH = __DIR__.'/../views/';
    
    protected $data = [];// будут храниться данные для отображения
    
    
    
    
    
//    public function assign($name, $value){// переводится назначить
//        $this -> data[$name] = $value;// будем передавать данные которые хотим отобразить
//    }
    
    public function __set($k, $v){// вызовется при попытке задать несуществующие свойства
        
        $this -> data[$k] = $v;// будем передавать данные которые хотим отобразить
        
    }
	
	public function __get($k){// вызовется при попытке прочитать несуществующее свойство
		
		return $this -> data[$k];
		
	}
    
    public function render($template){// подготавливает к выводу, но не выводит
        
        foreach($this -> data as $key => $val){// преобразуем в красивую переменную $items
            $$key = $val;
        }
        
		ob_start();// запись в буфер
        include __DIR__.'/../views/'.$template;
		
		$content = ob_get_contents();// получение из буфера
		
        ob_end_clean();// вывод из буфера и его очистка
		
		return $content;
        
    }
	
	public function display($template){
		
		echo $this -> render($template);
		
	}
    
    
    
    
}



?>