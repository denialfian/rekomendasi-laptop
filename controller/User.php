<?php

class User extends Controller{

	public function index(){
		// load model
        $user = $this->model("users");
        //print_r($_SESSION['gagal']);
          	if ($user->isLoggedIn()) {
               	if ($user->data()->group == 1) {
                    //echo "admin";
                    Redirect::to(Config::get('url/base_url').'admin');
                    //print_r($_SESSION['user']);
               	}else if ($user->data()->group == 2){
               		//echo "member";
               		Redirect::to(Config::get('url/base_url').'member');
               		//print_r($_SESSION['user']);
               	}
          }else{
          		$this->view("login/index",['test' => "test"]);
          }
		
	}

	public function logout(){
		// load model
		$user = $this->model("users");
		$user->logout();
		Redirect::to(Config::get('url/base_url').'user');
	}

	public function signin(){
		// load libary
		$db 		= new DB();
		$validate 	= new Validation();

		// load model
		$user = $this->model("users");

		if (!empty($_POST)) {
			if (Token::check("signinToken",$_POST['token'])) {

				$validate->check($_POST,[
						'username' 			=> ['required' => true],
						'password' 			=> ['required' => true]
				]);

				if ($validate->passed()) {
					if ($user->login($_POST['username'], $_POST['password'])) {
						print_r($user->data());
						if ($user->data()->group == 1) {
							Session::flash('sukses-login','login berhasil, selamat datang');
							Redirect::to(Config::get('url/base_url').'admin');
						}else if ($user->data()->group == 2){
							Session::flash('sukses-login','login berhasil, selamat datang');
							Redirect::to(Config::get('url/base_url').'member');
						}
					}else{
						Session::flash('gagal-login','Maaf, username atau password salah');
						Redirect::to(Config::get('url/base_url').'user');
					}
				}

				$hasil = $validate->errors();
				print_r($hasil);
				
			}
		}
	}

	public function signup(){
		// load libary
		$db 		= new DB();
		$validate 	= new Validation();
		$hash 		= new Hash();

		// load model
		$user = $this->model("users");
		
		if (!empty($_POST)) {
			if (Token::check("signupToken",$_POST['token'])) {
				$validate->check($_POST,[
						'username' 			=> ['required' => true, 'min' => 1,	'max' => 20, 'unique' => 'users'],
						'password' 			=> ['required' => true, 'min' => 6],
						'password_again' 	=> ['required' => true, 'matches' => 'password']
				]);

				if ($validate->passed()) {
					$salt 		= $hash->salt();
					$password 	= $hash->make($_POST['password'],$salt);

					$values['username'] = $_POST['username'];
					$values['password'] = $password;
					$values['joined'] 	= date('Y-m-d H:i:s');
					$values['group'] 	= 2;

					try {
			               
			           	$user->insert($values);
			               
		               	if ($user->login($_POST['username'], $_POST['password'])) {
							if ($user->data()->group == 1) {
								Session::flash('sukses-login','login berhasil, selamat datang');
								Redirect::to(Config::get('url/base_url').'admin');
							}else if ($user->data()->group == 2){
								Session::flash('sukses-login','login berhasil, selamat datang');
								Redirect::to(Config::get('url/base_url').'member');
							}
						}else{
							Session::flash('gagal-login','terjadi kesalahan');
							Redirect::to(Config::get('url/base_url').'user');
						}

			          	// Redirect::to(Config::get('url/base_url').'member');
			        } catch (Exception $e) {
			        		echo "<pre>";
			        			print_r($e);
			        		echo "</pre>";
			        }
				}else{
					$hasil = $validate->errors();
					print_r($hasil);
				}
				
			}
		}
	}


}