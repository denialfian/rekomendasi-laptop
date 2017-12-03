<?php

class Controller{
	public $test = "test";
	public function model($model){
		require_once 'model/' . $model . '.php';

		return new $model();
	}

	public function view($view,$data = []){
		require_once 'view/' . $view . '.php';
	}
}