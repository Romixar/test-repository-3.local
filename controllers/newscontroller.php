<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        $article = new News();
		 $article -> title = 'Супер новость XXXXXX!';
		 $article -> author = 'РОМАРИО_XXX';
		
        $article -> update(5);
		
		//$this -> actionAdd();
		
		
		die;
        
        
        
    }
    
    public function actionOne(){// получение одной новости
        
        $id = $_GET['id'];
        $item = News::findOne($id);
        
        $view = new View();
        
        $view -> assign('item', $item);
        
        $view -> display('news/one.php');
        
        
    }
    
    public function actionFind($column, $value){// вернутся все строки с заданными значениями
		
		
		$items = News::findByColumn($column, $value);
		
		
		
		
	}
    
    public function actionAdd(){
         $article = new News();
		 $article -> title = 'Супер новость сенсация!';
		 $article -> author = 'РОМАРИО';
		
        $id = $article -> insert();
        echo 'Создана запись с ID = '.$id;
		
		if($id) $article -> id = $id;
    }
    
    
    
}


?>