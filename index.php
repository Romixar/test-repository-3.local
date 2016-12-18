<?php

require_once __DIR__.'/function.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';// контроллер получаем (по умолчанию News)
$act = isset($_GET['act']) ? $_GET['act'] : 'All';// метод контроллера получаем (по умолчанию All)

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