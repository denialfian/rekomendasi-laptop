<?php

class Token{

	public static function create($sessionName){
		return Session::input($sessionName, md5(uniqid()));
	}

	public static function check($sessionName,$token){

		if (Session::exists($sessionName) && $token === Session::get($sessionName)) {
			Session::delete($sessionName);
			return true;
		}
		
		return false;
	}
}