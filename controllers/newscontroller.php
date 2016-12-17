<?php

class NewsController{
    
    public function actionAll(){// получение всех новостей
        
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