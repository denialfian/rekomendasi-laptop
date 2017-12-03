<?php
/*
	// hash
		$salt 	= $hash->salt();
		$make 	= $hash->make("deni",$salt);
		$verify	= $hash->verify("deni",$make);
*/
class Hash{
	public static function make($string , $salt = ''){
		$options = [
		    'cost' => 11,
		    'salt' => $salt
		];
		return password_hash($string, PASSWORD_BCRYPT, $options);
	}

	public static function salt(){
		return mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
	}

	public static function verify($string, $hash){
		if (password_verify($string, $hash)) {
		    return true;
		} else {
		    return false;
		}
	}
}