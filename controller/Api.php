<?php 

/**
* 
*/
class Api extends Controller{
	
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

                              $rekomendasiCF = array_slice($cb->getRec($ratingData,$_SESSION['user']), 0, 4);
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
                              $rekomendasiCF = array_slice($cb->getRec($ratingData,$_SESSION['user']), 0, 2);
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

				echo json_encode($produk);
          }
     }

}