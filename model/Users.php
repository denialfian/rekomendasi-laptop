<?php

class Users{
	private $_db,
			$_data,
			$_sessionName,
			$isLoggedIn;

	public function __construct($user = null){
		$this->_db = new DB();
		$this->_sessionName = Config::get('session/user_session');

		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
                    $this->isLoggedIn = true;
                }else {
                	$this->isLoggedIn = false;
                }
			}
		}else{
			$this->find($user);
		}
	}

    public function find($user = null){
    	$user = $this->_db->escape($user);
    	if ($user) {
    		$field = (is_numeric($user)) ? 'id' : 'username';

    		$data 	= $this->_db->table("users")->where($field,"=",$user)->first();
    		//$first 	= $data->first();
    		//$count 	= $data->count();

    		if (count($data)) {
    			$this->_data = $data;
    			return true;
    		}

    	}

    	return false;
    }

    public function login($username = null, $password = null){
    	$password = $this->_db->escape($password);
    	$user = $this->find($username);
    	
    	if ($user) {
    		if (Hash::verify($password,$this->data()->password)) {
    			Session::input($this->_sessionName,$this->data()->id);

    			return true;
    		}
    	}
    	return false;
    }

    public function hasPermission($key) {
    	/*
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            return !empty($permissions[$key]);
        }

        return false;
        */
    }

    public function logout(){
    	Session::delete($this->_sessionName);
    }

    public function data(){
    	return $this->_data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

    public function insert($values = []){
    	if(!$this->_db->table('users')->insert($values)) {
            throw new Exception('Maaf, Terjadi kesalahan.');
        }
    }

    public function update($values = [], $id = null){
    	if(!$this->_db->table('users')->where("id","=",$id)->update($values) && $id == null) {
            throw new Exception('Maaf, Terjadi kesalahan.');
        }
    }

    public function delete($id = null){
    	if( !$this->_db->table('users')->where("id","=",$id)->delete() && $id == null) {
            throw new Exception('Maaf, Terjadi kesalahan.');
        }
    }
}			