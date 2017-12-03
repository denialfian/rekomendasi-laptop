<?php 

/**
* 
*/
class Admin extends Controller{
     public function __construct(){
          // load model
          $user = $this->model("users");
          if (!$user->isLoggedIn()) {
               Redirect::to(Config::get('url/base_url').'user');
          }else{
               if ($user->data()->group != 1) {
                    echo "not akses";
                    exit();
               }
          }
     }
     
	public function index(){
          // load libs
          $db = new DB();

          $usersData = count($db->table("users")->select());
          $laptopData = count($db->table("laptop")->select());

          $brandSql      = " SELECT brand, count(*) AS jumlah FROM laptop GROUP BY brand";
          $brandData     = $db->query($brandSql)->results();

          $seriesSql      = " SELECT brand,series, count(*) AS jumlah FROM laptop GROUP BY series";
          $seriesData     = $db->query($seriesSql)->results();

          $ratingSql      = " SELECT user_profil_id, count(*) AS jumlah 
                                   FROM rating 
                                   GROUP BY user_profil_id";
          $RatingData     = $db->query($ratingSql)->results();

          $this->view("admin/header");
          $this->view("admin/dashboard",[
               "users_count" => $usersData,
               "laptop_count" => $laptopData,
               "brandData" => $brandData,
               "RatingData" => $RatingData,
               "seriesData" => array_slice($seriesData, 0, 7),
          ]);
          $this->view("admin/footer");
     }

     public function users(){
          // load libs
          $db = new DB();
          $userdata = $db->table("users")->select();

          $this->view("admin/header");
          $this->view("admin/users/index",["userdata" => $userdata]);
          $this->view("admin/footer");
     }

     public function users_update_view($id = null){
          $db = new DB();
          
          if ($id == null) {
            Redirect::to(Config::get('url/base_url').'users');
          }

          $this->view("admin/header");
          $this->view("admin/users/edit",[
               "users" =>  $find = $db->table("users")->find($id)
          ]);
          $this->view("admin/footer");
     }

     public function users_update(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          $hash          = new Hash();
          
          if (!empty($_POST)) {
               if (Token::check("users_update",$_POST['token'])) {
                    $validate->check($_POST,[
                              'new_password'           => ['required' => true,'min' => 6],
                              'new_password_again'     => ['required' => true,'matches' => 'new_password']
                    ]);

                    if ($validate->passed()) {
                         $salt               = $hash->salt();
                         $password           = $hash->make($_POST['new_password'],$salt);
                         $values['password'] = $password;
                         $id = $_POST['id'];

                         $db->table("users")->where("id","=",$id)->update($values);
                         Redirect::to(Config::get('url/base_url').'admin/users');
                         //print_r($values);
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }
          }
     }

     public function laptop(){
          // load libs
          $db = new DB();
          $laptopdata = $db->table("laptop")->select();

          $this->view("admin/header");
          $this->view("admin/laptop/index",["laptopdata" => $laptopdata]);
          $this->view("admin/footer");

          echo "<pre>";
          //print_r($_SERVER);
          echo "</pre>";
     }

     public function laptop_add(){
          $this->view("admin/header");
          $this->view("admin/laptop/add");
          $this->view("admin/footer");
     }

     public function laptop_insert(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          
          if (!empty($_POST)) {
               if (Token::check("laptop_insert",$_POST['token'])) {
                    $validate->check($_POST,[
                              'name'               => ['required' => true, 'unique' => 'laptop']
                    ]);

                    $validate->uploadFile('gambar', true, true, 'upload/laptop/');

                    if ($validate->passed()) {

                         $values['name']          = $_POST['name'];
                         $values['brand']         = $_POST['brand'];
                         $values['os']            = $_POST['os'];
                         $values['series']        = $_POST['series'];
                         $values['tahun_rilis']   = $_POST['tahun_rilis'];
                         $values['u_layar']       = $_POST['u_layar'];
                         $values['u_resolusi']    = $_POST['u_resolusi'];
                         $values['prossesor']     = $_POST['prossesor'];
                         $values['kecepatan']     = $_POST['kecepatan'];
                         $values['ram']           = $_POST['ram'];
                         $values['storage']       = $_POST['storage'];
                         $values['harga']         = $_POST['harga'];
                         $values['gambar']        = $validate->_file['filename'];

                         $db->table("laptop")->insert($values);
                         Session::flash('sukses-laptop-insert','Data berhasil Tersimpan');
                         Redirect::to(Config::get('url/base_url').'admin/laptop');
                         /*
                         echo "<pre>";
                         print_r($values);
                         print_r($validate->_file);
                         print_r($_FILES);
                         echo "</pre>";
                         */
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }else{
                    Session::flash('gagal-laptop-insert','Data gagal Tersimpan');
                    Redirect::to(Config::get('url/base_url').'admin/laptop');
               }
          }
     }

     public function laptop_edit($id = null){
          $db = new DB();
          
          if ($id == null) {
            Redirect::to(Config::get('url/base_url').'laptop');
          }

          $this->view("admin/header");
          $this->view("admin/laptop/edit",[
               "laptop" =>  $find = $db->table("laptop")->find($id)
          ]);
          $this->view("admin/footer");
     }

     public function laptop_update(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();

          if (!empty($_POST)) {
               if (Token::check("laptop_update",$_POST['token'])) {
                    $validate->check($_POST,[
                              'name'               => ['required' => true]
                    ]);

                    if (!empty($_FILES['gambar']['name'])) {
                         $validate->uploadFile('gambar', true, true, 'upload/laptop/');
                         $values['gambar']        = $validate->_file['filename'];
                    }

                    if ($validate->passed()) {
                         $id = $_POST['id'];
                         $values['name']          = $_POST['name'];
                         $values['brand']         = $_POST['brand'];
                         $values['os']            = $_POST['os'];
                         $values['series']        = $_POST['series'];
                         $values['tahun_rilis']   = $_POST['tahun_rilis'];
                         $values['u_layar']       = $_POST['u_layar'];
                         $values['u_resolusi']    = $_POST['u_resolusi'];
                         $values['prossesor']     = $_POST['prossesor'];
                         $values['kecepatan']     = $_POST['kecepatan'];
                         $values['ram']           = $_POST['ram'];
                         $values['storage']       = $_POST['storage'];
                         $values['harga']         = $_POST['harga'];
                         
                         $db->table("laptop")->where("id","=",$id)->update($values);

                         Session::flash('sukses-laptop-update','Data berhasil Tersimpan');
                         Redirect::to(Config::get('url/base_url').'admin/laptop');
                         /*
                         echo "<pre>";
                         print_r($validate);
                         print_r($_FILES);
                         echo "</pre>";
                         */
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }else{
                    Session::flash('gagal-laptop-update','Data gagal Tersimpan');
                    Redirect::to(Config::get('url/base_url').'admin/laptop');
               }
          }
     }

     public function laptop_delete($id = null){
          $db            = new DB();

          if ($id == null) {
               Session::flash('gagal-laptop-delete','Terjadi kesalahan');
               Redirect::to(Config::get('url/base_url').'admin/laptop');
          }

          if ($delete = $db->table("laptop")->where("id","=",$id)->delete()) {
               Session::flash('sukses-laptop-delete','Data berhasil Tersimpan');
               Redirect::to(Config::get('url/base_url').'admin/laptop');
          }else{
               Session::flash('gagal-laptop-delete','Data gagal Tersimpan');
               Redirect::to(Config::get('url/base_url').'admin/laptop');
          }
     }

     public function laptop_rating($id = null){
          $db = new DB();
          $laptopdata = $db->table('rating')->where("laptop_id","=",$id)->select();

          $this->view("admin/header");
          $this->view("admin/laptop/rating",["laptopdata" => $laptopdata]);
          $this->view("admin/footer");
     }

     public function users_rating($id = null){
          // load libs
          $db = new DB();
          
          if ($id == null) {
            Redirect::to(Config::get('url/base_url').'admin');
          }

          $sql = "  SELECT laptop.*, users.username, rating.user_profil_id, rating.nilai 
                    FROM laptop 
                    LEFT JOIN rating
                         INNER JOIN users
                         ON rating.user_profil_id = users.id AND users.id = ? 
                    ON laptop.id = rating.laptop_id
                    ORDER BY laptop.id ASC";
          $bind['user']  = $id;
          $laptopData    = $db->query($sql,$bind)->results();
          $usersData    = $db->table("users")->find($id);

          $this->view("admin/header");
          $this->view("admin/users/user_rating",[
                    "user_rating"  =>  $laptopData,          
                    "user_data"    =>  $usersData          
          ]);
          $this->view("admin/footer");
     }

     public function laptop_kategori($kategori = null, $item = null){
          // load libs
          $db = new DB();
          $item = str_replace("-", " ", $item);

          $laptopData = $db->table("laptop")->where($kategori,"=",$item)->select();

          
          $this->view("admin/header");
          $this->view("admin/laptop/kategori",[
               "laptopData" => $laptopData,
               "kategori" => $kategori,
               "item" => $item
          ]);
          $this->view("admin/footer");
          
          echo "<pre>";
          //print_r($laptopData);
          echo "</pre>";
     }

     public function laptop_view($id = null){
          // load libs
          $db = new DB();

          $laptopData = $db->table("laptop")->find($id);

          
          $this->view("admin/header");
          $this->view("admin/laptop/view",[
               "laptop" => $laptopData
          ]);
          $this->view("admin/footer");
          
          echo "<pre>";
          print_r($laptopData);
          echo "</pre>";
     }

     public function users_info_view($id = null){
          // load libs
          $db = new DB();
          
          if ($id == null) {
            Redirect::to(Config::get('url/base_url').'admin');
          }

          $userInfo    = $db->table("users_info")->where("user_id","=",$id)->select();
          $usersData    = $db->table("users")->find($id);

          $this->view("admin/header");
          $this->view("admin/users/user_info",[
                    "profil"       =>  $userInfo,
                    "user_data"    =>  $usersData            
          ]);
          $this->view("admin/footer");

          echo "<pre>";
          print_r($userInfo);
          echo "</pre>";
     }

     public function users_info_update(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          
          if (!empty($_POST)) {
               if (Token::check("users_info_update",$_POST['token'])) {
                    $validate->check($_POST,[
                              'name'              => ['required' => true]
                    ]);

                    if ($validate->passed()) {
                         //$values['users_id']        = $_SESSION['id'];
                         $values['name']          = $_POST['name'];
                         $values['email']         = $_POST['email'];
                         $values['tgl_lahir']     = $_POST['tgl_lahir'];

                         $id = $_POST['id'];

                         $db->table("users_info")->where("user_id","=",$id)->update($values);
                         Redirect::to(Config::get('url/base_url').'admin/users_info_view/'.$id);
                         //print_r($values);
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }
          }
     }

     public function users_likes_view($id = null){
          // load libs
          $db            = new DB();

          if ($id == null) {
            Redirect::to(Config::get('url/base_url').'admin');
          }
          
          $profil_likes_data  = $db->table('users_likes')->where("user_id","=",$id)->select();
          $usersData    = $db->table("users")->find($id);

          // start get brand data
               $brandSql      = " SELECT brand FROM laptop GROUP BY brand ";
               $brandData     = $db->query($brandSql)->results();
               foreach ($brandData as $brand) {
                    if (in_array($brand->brand, explode(" ", $profil_likes_data[0]->brand))) {
                         $brandLikes[$brand->brand] = "checked";
                    }else{
                         $brandLikes[$brand->brand] = null;
                    }
               }
          // end get brand data

          // start get series data
               $seriesSql      = " SELECT series FROM laptop GROUP BY series ";
               $seriesData     = $db->query($seriesSql)->results();
               foreach ($seriesData as $serieses) {
                    if (in_array(str_replace(" ", "-", $serieses->series), explode(" ", $profil_likes_data[0]->series))) {
                         $seriesLikes[$serieses->series] = "checked";
                    }else{
                         $seriesLikes[$serieses->series] = null;
                    }
               }
          // end get series data

          // start get OS data
               $osSql      = " SELECT os FROM laptop GROUP BY os ";
               $osData     = $db->query($osSql)->results();
               foreach ($osData as $data_os) {
                    if (in_array(str_replace(" ", "-", $data_os->os), explode(" ", $profil_likes_data[0]->os))) {
                         $osLikes[$data_os->os] = "checked";
                    }else{
                         $osLikes[$data_os->os] = null;
                    }
               }
          // end get OS data

          // start get OS data
               $osSql      = " SELECT os FROM laptop GROUP BY os ";
               $osData     = $db->query($osSql)->results();
               foreach ($osData as $data_os) {
                    if (in_array(str_replace(" ", "-", $data_os->os), explode(" ", $profil_likes_data[0]->os))) {
                         $osLikes[$data_os->os] = "checked";
                    }else{
                         $osLikes[$data_os->os] = null;
                    }
               }
          // end get OS data

          $this->view('admin/header');
          $this->view("admin/users/user_likes",[
               'likes'        => $profil_likes_data[0],
               'brandData'    => $brandLikes,
               'seriesData'   => $seriesLikes,
               'osData'       => $osLikes,
               "user_data"    =>  $usersData  
               ]);
          $this->view('admin/footer');

               echo "<pre>";
               print_r($osLikes);
               echo "</pre>";
     }

     public function users_likes_update(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          
          if (!empty($_POST)) {
               if (Token::check("users_likes_update",$_POST['token'])) {
                    $validate->check($_POST,[
                              'brand'        => ['required' => true],
                              'os'           => ['required' => true],
                              'series'       => ['required' => true]
                    ]);

                    if ($validate->passed()) {
                         $brand = null;
                         foreach ($_POST['brand'] as $key => $value) {
                              $brand .= $value." ";
                         }

                         $series = null;
                         foreach ($_POST['series'] as $key => $value) {
                              $series .= str_replace(" ", "-", $value)." ";
                         }

                         $os = null;
                         foreach ($_POST['os'] as $key => $value) {
                              $os .= str_replace(" ", "-", $value)." ";
                         }

                         $values['cek']           = 'y';
                         $values['brand']         = trim($brand);
                         $values['os']            = trim($os);
                         $values['series']        = trim($series);
                         $values['tahun_rilis']   = $_POST['tahun_rilis'];
                         $values['u_layar']       = $_POST['u_layar'];
                         $values['u_resolusi']    = str_replace(" ", "-", $_POST['u_resolusi']);
                         $values['prossesor']     = str_replace(" ", "-", $_POST['prossesor']);
                         $values['kecepatan']     = $_POST['kecepatan'];
                         $values['ram']           = $_POST['ram'];
                         $values['storage']       = $_POST['storage'];
                         $values['harga']         = $_POST['harga'];
                         $values['all_likes']     =    str_replace(" ", "-", trim($brand))."-".
                                                       trim($os)."-".
                                                       trim($series)."-".
                                                       $_POST['tahun_rilis']."-".
                                                       $_POST['u_layar']."-".
                                                       $_POST['u_resolusi']."-".
                                                       $_POST['kecepatan']."-".
                                                       $_POST['prossesor']."-".
                                                       $_POST['ram']."-".
                                                       $_POST['storage']."-".
                                                       $_POST['harga'];

                         $db->table("users_likes")->where("user_id","=",$_POST['id'])->update($values);
                         Redirect::to(Config::get('url/base_url').'admin/users_likes_view/'.$_POST['id']);
                         echo "<pre>";
                         print_r($values);
                         echo "</pre>";
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }
          }
     }

	public function logout(){
          // load model
          $user = $this->model("users");
          $user->logout();
          Redirect::to(Config::get('url/base_url'));
     }

}