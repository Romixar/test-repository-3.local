<?php

require_once __DIR__.'/function.php';


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);// получить путь без GET параметров

$path_parts = explode('/',$path);


// создаем ЧПУ

$ctrl = !empty($path_parts[1]) ? $path_parts[1] : 'News';// контроллер получаем (по умолчанию News)
$act = !empty($path_parts[2]) ? $path_parts[2] : 'All';// метод контроллера получаем (по умолчанию All)

$controllerClassName = $ctrl.'Controller';// состаляем название класса

$controller = new $controllerClassName;// создание объекта класса контроллер

$method = 'action'.$act;// составляем название метода


try{// отлов ошибки на самом верхнеми уровне

	$controller -> $method();// запускаем сотавленный метод объекта класса контроллер
	
}catch(Exception $e){
	
	$view = new View();
	
	$view -> error = $e -> getMessage();
	
	$view -> display('error.php');
	
	
}




?>