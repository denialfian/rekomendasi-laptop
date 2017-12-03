<?php 

/**
* 
*/
class App
{
	protected $controller = 'User'; 

	protected $method = 'index';

	protected $params = [];

	function __construct()
	{
		/*
			1.	$actionUrl[0] sebagai nama file dan class
			2.	$actionUrl[1] sebagai method dari class $actionUrl[0]
			3. 	$actionUrl[2] sebagai parameter dari method $actionUrl[1] dan class $actionUrl[0]
		*/
		$actionUrl = $this->action();
		// print_r($actionUrl);


		/*
			1.	cek file 
			2. 	jika ada unset $actionUrl[0] atau hapus $actionUrl[0]
			3. 	jika tidak ada load file 404.php
		*/



		if (isset($actionUrl)) {
			if (file_exists('controller/' . $actionUrl[0] . '.php')) {
				$this->controller = $actionUrl[0];
				unset($actionUrl[0]);
			}else{
				require_once '404.php';
				exit;
			}
		}


		require_once 'controller/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		/*
			1.	jika ada $actionUrl[1]
			2.	jika ada method $actionUrl[1] di class $this->controller hapus $actionUrl[1]
			3.	jika tidak ada load 404.php
		*/
		if (isset($actionUrl[1])) {
			if (method_exists($this->controller, $actionUrl[1])) {
				$this->method = $actionUrl[1];
				unset($actionUrl[1]);
			}else{
				//require_once '404.php';
				//exit;
			}
		}
		

		/*
			1.	jika ada $actionUrl maka $this->params = array_values($actionUrl)
			2.	jika tidak ada null atau []
		*/
		$this->params = $actionUrl ? array_values($actionUrl) : [];

		/*
			1.	panggil method $this->method dari class $this->controller dengan parameter $this->params
		*/
		call_user_func_array([$this->controller, $this->method ],$this->params);

		// print_r(array_values($this->params));
	}

	/*
		1. 	jika ada $_GET['action'] 
			contoh $_GET['action'] = home/index/params
		2. 	pecah $_GET['action'] dengan '/'
	*/
	public function action(){
		if (isset($_GET['action'])) {
			return $action = explode('/',filter_var(rtrim($_GET['action'] , '/'), FILTER_SANITIZE_URL));
		}
	}
}