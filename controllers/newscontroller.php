<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        $article = News::findByColumn('title', 'Новость 1');// находим новость
		
		$article -> title = 'Новость 1 ОБНОВЛЕНА!!!';// добавляем ей свойство
		
        $article -> update();//  обновляем
		
		var_dump($article -> id);
		
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
		
		
		return News::findByColumn($column, $value);
		
		
		
		
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