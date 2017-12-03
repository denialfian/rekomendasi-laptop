<?php 

class Member extends Controller{

     public function __construct(){
          // load model
          $user = $this->model("users");
          if (!$user->isLoggedIn()) {
               Redirect::to(Config::get('url/base_url').'user');
          }else{
               if ($user->data()->group != 2 && $user->data()->group != 1) {
                    echo "akses ditolak";
                    exit();
               }
          }
     }

     public function index($page = 1){
          $startTime = array_sum(explode(' ', microtime()));

          // load model
               $db       = new DB();
               $user     = $this->model("users");
               $cb       = $this->model('CB');
               $tfidf    = $this->model('TFIDF');
               $Paginate = $this->model('Paginate');


          // cari user
               $find = $db->table("users_profil")->where("users_id","=",$_SESSION['user']);

          // jika userid belum terdaftar, daftarkan userid ke table users_profil
               if (!$find->count()) {
                    $db->table('users_profil')->insert([
                         'id' => $_SESSION['user'],
                         'users_id' => $_SESSION['user']
                         ]);
                    $db->table('users_info')->insert(['user_id' => $_SESSION['user']]);
                    $db->table('users_likes')->insert(['user_id' => $_SESSION['user']]);
               }

          // proses mengisi user likes 
               $cekUserLikes = $db->table("users_likes")->where("user_id","=",$_SESSION['user'])->where("cek","=",'y');
               if (!$cekUserLikes->count()) {
                    $profil_likes_data = $db->table('users_likes')->where("user_id","=",$_SESSION['user'])->select();
                    // get brand data
                         $brandSql      = " SELECT brand FROM laptop GROUP BY brand ";
                         $brandData     = $db->query($brandSql)->results();

                    // get series data
                         $seriesSql      = " SELECT series FROM laptop GROUP BY series ";
                         $seriesData     = $db->query($seriesSql)->results();

                    // get OS data
                         $osSql      = " SELECT os FROM laptop GROUP BY os ";
                         $osData     = $db->query($osSql)->results();

                    $this->view("member/profil_likes",[
                         'likes' => $profil_likes_data[0],
                         'brandData' => $brandData,
                         'seriesData' => $seriesData,
                         'osData' => $osData,
                         ]);
                    exit();
               }


          // merating minimal 2
          $cekUserRating = $db->table("rating")->where("user_profil_id","=",$_SESSION['user']);
          if ($cekUserRating->count() < 2) {
               $values['users_likes_id'] = $_SESSION['user'];
               $db->table("users_profil")->where("id","=",$_SESSION['user'])->update($values);

               $sql = "  SELECT laptop.*, users.username, rating.user_profil_id, rating.nilai 
                    FROM laptop
                    LEFT JOIN rating
                         INNER JOIN users
                         ON rating.user_profil_id = users.id AND users.id = ? 
                    ON laptop.id = rating.laptop_id
                    ORDER BY laptop.id ASC";
               $bind['user'] = $_SESSION['user'];
               //$bind['brand'] = 'Asus';
               $laptopData = $db->query($sql,$bind)->results();
               $this->view('member/profil_rating',["produk" => $laptopData]);
          }else{
               // paginate
                    
                    $batas         = 12;
                    $posisi        = $Paginate->cariPosisi($batas,$page);
                    $jumData       = count($db->table('laptop')->select());
                    $jumhalaman    = $Paginate->totalHalaman($jumData,$batas);
                    $linkhalaman   = $Paginate->navHalaman($page,$jumhalaman,"member");

                    
                    $sql = "  SELECT laptop.*, users.username, rating.user_profil_id, rating.nilai 
                              FROM laptop 
                              LEFT JOIN rating
                                   INNER JOIN users
                                   ON rating.user_profil_id = users.id AND users.id = ?  
                              ON laptop.id = rating.laptop_id
                              ORDER BY laptop.id DESC LIMIT ?,?"; 
                    // bind data
                    $bind['user']       = $_SESSION['user'];
                    $bind['posisi']     = $posisi;
                    $bind['batas']      = $batas;
                    $produk             = $db->query($sql,$bind)->results();

                    $set_rekomendasi = $db->table("users_profil")->find($_SESSION['user']);
                    switch ($set_rekomendasi->rekomendasi) {
                         // rekomendasi dengan collaborative filtering
                         case 'cf':
                              $sql2 = "  SELECT rating.laptop_id, laptop.name, users.username, rating.user_profil_id, rating.nilai 
                              FROM laptop 
                              LEFT JOIN rating
                                   INNER JOIN users
                                   ON rating.user_profil_id = users.id
                              ON laptop.id = rating.laptop_id
                              ORDER BY laptop.id DESC";
                              $collaborative = $db->query($sql2)->results();

                              // rubah ke array
                              foreach ($collaborative as $p) {
                                   $ratingData[$p->user_profil_id][$p->name] = $p->nilai;
                              }
                              $cb->setData($ratingData);
                              $rekomendasiCF = array_slice($cb->getRec($_SESSION['user']), 0, 4);
                              $no = 0;
                              foreach ($rekomendasiCF as $key => $value) {
                                   $rek_set[$no] = $db->table("laptop")->where("name","=",$key)->select();
                                   $no++;
                              }
                              break;

                         // rekomendasi dengan content based 
                         case 'cb':
                              $user_likes    = $db->table("users_likes")->where("user_id","=",$_SESSION['user'])->select();
                              $laptop_data   = $db->table("laptop")->select();
                              $rekomendasiTFIDF = array_slice($tfidf->getRec($user_likes, $laptop_data),0,4);
                              $no = 0;
                              foreach ($rekomendasiTFIDF as $key => $value) {
                                   $rek_set[$no] = $db->table("laptop")->where("name","=",$key)->select();
                                   $no++;
                              }
                              break;

                         // rekomendasi dengan mixed hybrid
                         default:
                              // mixed hybrid
                              // cf rek
                              $sql2 = "  SELECT rating.laptop_id, laptop.name, users.username, rating.user_profil_id, rating.nilai 
                              FROM laptop 
                              LEFT JOIN rating
                                   INNER JOIN users
                                   ON rating.user_profil_id = users.id
                              ON laptop.id = rating.laptop_id
                              ORDER BY laptop.id DESC";
                              $collaborative = $db->query($sql2)->results();

                              // rubah ke array
                              foreach ($collaborative as $p) {
                                   $ratingData[$p->user_profil_id][$p->name] = $p->nilai;
                              }
                              $cb->setData($ratingData);
                              $rekomendasiCF = array_slice($cb->getRec($_SESSION['user']), 0, 2);
                              $no = 0;
                              foreach ($rekomendasiCF as $key => $value) {
                                   $rek1[$no] = $db->table("laptop")->where("name","=",$key)->select();
                                   $no++;
                              }
                              // cb rek
                              $user_likes    = $db->table("users_likes")->where("user_id","=",$_SESSION['user'])->select();
                              $laptop_data   = $db->table("laptop")->select();
                              $rekomendasiTFIDF = array_slice($tfidf->getRec($user_likes, $laptop_data),0,2);
                              $no = 0;
                              foreach ($rekomendasiTFIDF as $key => $value) {
                                   $rek2[$no] = $db->table("laptop")->where("name","=",$key)->select();
                                   $no++;
                              }
                              $rek_set = array_merge($rek1, $rek2);
                              break;
                    }

               $this->view('member/header');
               $this->view('member/index',[
                    "produk"       => $produk,
                    "r"            => $rek_set,
                    "pageLink"     => $linkhalaman,
                    "rekType"      => $set_rekomendasi
                    ]);
               $this->view('member/footer');
               //echo "<pre>";
               //print_r($tfidf->getRec($user_likes, $ld));
               //print_r($tfidf->getQuery());
               //echo "</pre>";
          }

          $endTime = array_sum(explode(' ', microtime()));
          echo "<pre>";
          print_r('This page took approximately '.round($endTime - $startTime, 7).' seconds to load.');
          echo "</pre>";
     }

     public function add_rating($itemID, $rate){
          // load libs
          $db = new DB();

          $user_profil_id = $_SESSION['user'];
          $laptop_id      = $itemID;
          $nilai          = $rate;

          $values['user_profil_id']     = $user_profil_id;
          $values['laptop_id']          = $laptop_id;
          $values['nilai']              = $nilai;

          try {
               $db->table("rating")->insert($values);
               Redirect::to(Config::get('url/base_url').'member');
          } catch (Exception $e) {
               echo "maaf terjadi kesalahan";
          }
     }

     public function update_rating($itemID, $rate){
          // load libs
          $db = new DB();

          $user_profil_id = $_SESSION['user'];
          $laptop_id      = $itemID;
          $nilai          = $rate;

          $values['nilai'] = $nilai;

          try {
               $db->table("rating")->where("user_profil_id","=",$user_profil_id)->where("laptop_id","=",$laptop_id)->update($values);
               Redirect::to(Config::get('url/base_url').'member');
          } catch (Exception $e) {
               echo "maaf terjadi kesalahan";
          }
     }

     public function set_rekomendasi(){
          // load libary
          $db            = new DB();
          
          if (!empty($_POST)) {
               if (Token::check("set_rekomendasi",$_POST['token'])) {

                    $db->table("users_profil")->where("users_id","=",$_SESSION['user'])->update(['rekomendasi' => $_POST['rekomendasi']]);
                    Session::flash('sukses-rek-ganti','Data berhasil Tersimpan');
                    Redirect::to(Config::get('url/base_url').'member');

               }else{
                    Session::flash('gagal-rek-ganti','Data gagal Tersimpan');
                    Redirect::to(Config::get('url/base_url').'member');
               }
          }
     }

     public function profil_likes(){
          // load libs
          $db            = new DB();
          
          $profil_likes_data  = $db->table('users_likes')->where("user_id","=",$_SESSION['user'])->select();
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

          $this->view('member/header');
          $this->view("member/profil_likes_set",[
               'likes' => $profil_likes_data[0],
               'brandData' => $brandLikes,
               'seriesData' => $seriesLikes,
               'osData' => $osLikes
               ]);
          $this->view('member/footer');
     }
	
     public function profil_likes_insert(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          
          if (!empty($_POST)) {
               if (Token::check("profil_likes_insert",$_POST['token'])) {
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

                         $db->table("users_likes")->where("user_id","=",$_SESSION['user'])->update($values);

                         Session::flash('sukses-profil-likes','Data berhasil Tersimpan');
                         Redirect::to(Config::get('url/base_url').'member/profil_likes');
                         //echo "<pre>";
                         //print_r($values);
                         //echo "</pre>";
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }else{
                    Session::flash('gagal-profil-likes','Data gagal Tersimpan');
                    Redirect::to(Config::get('url/base_url').'member/profil_likes');
               }
          }
     }

     public function laptop_detail($id = null){

          if ($id == null) {
               Redirect::to(Config::get('url/base_url').'404');
          }

          $db       = new DB();
          $tfidf    = $this->model('TFIDF');
          
          $sql = "  SELECT 
                         laptop.*,
                         users.username, 
                         rating.user_profil_id, 
                         rating.nilai 
                    FROM laptop 
                    LEFT JOIN rating
                         INNER JOIN users
                         ON rating.user_profil_id = users.id AND users.id = ?
                    ON laptop.id = rating.laptop_id WHERE laptop.id = ?";
          $bind['user']  = $_SESSION['user'];
          $bind['id']    = $id;
          $laptopData    = $db->query($sql,$bind)->results();

          // ================================> Start item terkait
          $laptop_data   = $db->table("laptop")->select();
          $rekomendasiTFIDF = $tfidf->getRec($laptopData, $laptop_data);
          $no = 0;
          foreach ($rekomendasiTFIDF as $key => $value) {
               if ($key != $laptopData[0]->name) {
                    $rek_set[$no] = $db->table("laptop")->where("name","=",$key)->select();
                    $no++;
               }
          }
          // ================================> End item terkait


          $laptopTerkait = array_slice($rek_set, 0,2);
          $this->view('member/header');
          $this->view('member/laptop_detail',
               [
                    'laptop' => $laptopData[0],
                    'itemTerkait' => $laptopTerkait,
               ]
          );
          $this->view('member/footer');
          echo "<pre>";
          //print_r($rekomendasiCF);
          echo "</pre>";
     }

     public function laptop_banding($laptop1 = null,$laptop2 = null){
          // load libs 
          $db       = new DB();

          if ($laptop1 == null || $laptop2 == null) {
               Redirect::to(Config::get('url/base_url').'404');
          }

          $sql_laptop1 = "  SELECT 
                         laptop.*,
                         users.username, 
                         rating.user_profil_id, 
                         rating.nilai 
                    FROM laptop 
                    LEFT JOIN rating
                         INNER JOIN users
                         ON rating.user_profil_id = users.id AND users.id = ?
                    ON laptop.id = rating.laptop_id WHERE laptop.id = ?";
          $bind1['user']  = $_SESSION['user'];
          $bind1['id']    = $laptop1;
          $laptopData1    = $db->query($sql_laptop1,$bind1)->results();

          $sql_laptop2 = "  SELECT 
                         laptop.*,
                         users.username, 
                         rating.user_profil_id, 
                         rating.nilai 
                    FROM laptop 
                    LEFT JOIN rating
                         INNER JOIN users
                         ON rating.user_profil_id = users.id AND users.id = ?
                    ON laptop.id = rating.laptop_id WHERE laptop.id = ?";
          $bind2['user']  = $_SESSION['user'];
          $bind2['id']    = $laptop2;
          $laptopData2    = $db->query($sql_laptop2,$bind2)->results();

          $this->view('member/header');
          $this->view('member/laptop_banding',
               [
                    'laptop1' => $laptopData1[0],
                    'laptop2' => $laptopData2[0],
               ]
          );
          $this->view('member/footer');

          //echo "<pre>";
          //print_r($laptopData1);
          //echo "</pre>";
     }

     public function profil_info(){
          $db            = new DB();
          echo "<pre>";
          //print_r($a[0][0]->name);
          echo "</pre>";
          
          $profilData = $db->table('users_info')->where("user_id","=",$_SESSION['user'])->select();

          $this->view('member/header');
          $this->view('member/profil_info',['profil' => $profilData]);
          $this->view('member/footer');
     }

     public function profil_info_insert(){
          // load libary
          $db            = new DB();
          $validate      = new Validation();
          
          if (!empty($_POST)) {
               if (Token::check("profil_info_insert",$_POST['token'])) {
                    $validate->check($_POST,[
                              'name'              => ['required' => true]
                    ]);

                    if ($validate->passed()) {
                         //$values['users_id']        = $_SESSION['id'];
                         $values['name']          = $_POST['name'];
                         $values['email']         = $_POST['email'];
                         $values['tgl_lahir']     = $_POST['tgl_lahir'];

                         $db->table("users_info")->where("user_id","=",$_SESSION['user'])->update($values);

                         Session::flash('sukses-profil-info','Data berhasil Tersimpan');
                         Redirect::to(Config::get('url/base_url').'member/profil_info');
                         //print_r($values);
                    }else{
                         $hasil = $validate->errors();
                         echo "<pre>";
                         print_r($hasil);
                         echo "</pre>";
                    }
                    
               }else{
                    Session::flash('gagal-profil-info','Terjadi kesalahan');
                    Redirect::to(Config::get('url/base_url').'member/profil_info');
               }
          }
     }

     public function get_recommendation(){
          // load model
          $db       = new DB();
          $user     = $this->model("users");
          $cb       = $this->model('CB');
          $tfidf    = $this->model('TFIDF');

          // ======================== Start ================================
          // rekomendasi dengan collaborative filtering
               $sqlCF = "  SELECT rating.laptop_id, laptop.name, users.username, rating.user_profil_id, rating.nilai 
                              FROM laptop 
                              LEFT JOIN rating
                                   INNER JOIN users
                                   ON rating.user_profil_id = users.id
                              ON laptop.id = rating.laptop_id
                              ORDER BY laptop.id DESC";
               $collaborative = $db->query($sqlCF)->results();

               // rubah ke array
               foreach ($collaborative as $p) {
                    $ratingData[$p->user_profil_id][$p->name] = $p->nilai;
               }
               $cb->setData($ratingData);
               $rekomendasiCF = array_slice($cb->getRec($_SESSION['user']), 0, 4);
          // =========================== END =============================



          // ============================= START ===========================
          // rekomendasi dengan TF IDF
               $user_likes    = $db->table("users_likes")->where("user_id","=",$_SESSION['user'])->select();
               $laptop_data   = $db->table("laptop")->select();
               $rekomendasiTFIDF = $tfidf->getRec($user_likes, $laptop_data);
          // ========================= END ===============================

          $this->view("member/get_recommendation",[
                    "CF" => $rekomendasiCF,
                    "CFCollection" => $cb->collection,
                    "CFsim" => $cb->toTableSimilarity(15),
                    "CFPredict" => $cb->toTablePredict(),
                    "tfidf" => $tfidf,
                    "tfidf-hasil" => $rekomendasiTFIDF,
                    ]);
     }

}