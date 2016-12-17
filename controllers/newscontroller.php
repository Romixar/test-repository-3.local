<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        
		$db = new DB();
		
		$res = $db -> query('SELECT * FROM `news` WHERE `id` = :id',
				[':id' => 3]);
		
		var_dump($res);
		
		die;
        $news = News::getAll();
        
        $view = new View();
        
        //$view -> assign('items', $news);// плохо понятное создание свойства
        
        $view -> items = $news;// устанавливаем свойство напрямую (благодаря __set во View)
		
        $view -> display('news/all.php');
        
        
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