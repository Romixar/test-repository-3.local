<?php

function __autoload($class){// подключение контроллера, модели и доп. работа с БД (classes)
    
    if(file_exists(__DIR__.'/controllers/'.$class.'.php')){
        require __DIR__.'/controllers/'.$class.'.php';
    }
    if(file_exists(__DIR__.'/models/'.$class.'.php')){
        require __DIR__.'/models/'.$class.'.php';
    }
    if(file_exists(__DIR__.'/classes/'.$class.'.php')){
        require __DIR__.'/classes/'.$class.'.php';
    }
    if(file_exists(__DIR__.'/'.$class.'_class.php')){// подключаю config_class.php
        require __DIR__.'/'.$class.'_class.php';
    }
    
    // как только требуется незнакомый класс, запускается данная функция
}


?>