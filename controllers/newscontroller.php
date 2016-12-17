<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        
		// $article = new News();
		// $article -> title = 'Сенсация!';
		// $article -> author = 'Вася Пупкин';
		
		// $article -> insert();
		
		
		
		die;
        
        
        
    }
    
    public function actionOne(){// получение одной новости
        
        $id = $_GET['id'];
        $item = News::getOne($id);
        
        $view = new View();
        
        $view -> assign('item', $item);
        
        $view -> display('news/one.php');
        
        
    }
    
    public function actionFind($column, $value){// вернутся все строки с заданными значениями
		
		
		$items = News::findByColumn($column, $value);
		
		
		
		
	}
    
    
    
}


?>