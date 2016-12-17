<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        
		$article = new News();
		$article -> title = 'Привет!';
		$article -> author = 'Батовский РОМИЧ!';
		
		$article -> insert();
		
		
		
		die;
        
        
        
    }
    
    public function actionOne(){// получение одной новости
        
        $id = $_GET['id'];
        $item = News::getOne($id);
        
        $view = new View();
        
        $view -> assign('item', $item);
        
        $view -> display('news/one.php');
        
        
    }
    
    
    
    
    
}


?>