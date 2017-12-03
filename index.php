<?php 


require_once("core/Configuration.php");

spl_autoload_register(function($class){
		require_once 'libs/' .$class. '.php';
	});

require_once("core/App.php");
require_once("core/Controller.php");
$app = new App();
?>
