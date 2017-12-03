<?php

class Paginate{


	// Fungsi untuk mencek halaman dan posisi data
		public function cariPosisi($batas,$page = 1){
			if($page == null){
				$posisi = 0;
				$page = 1;
			}else{
				$posisi = ($page - 1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total halaman
		public function totalHalaman($jmldata,$batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3, dst
		function navHalaman($halaman_aktif, $jmlhalaman,$link){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if ($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
				$link_halaman .= "
				<a href='". Config::get('url/base_url') .$link."/1' class='btn btn-primary' >&laquo;</a>
				<a href='".  Config::get('url/base_url') .$link."/".$prev."' class='btn btn-primary' ><i class='fa fa-arrow-left'></i></a>
				";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif - 2; $i < $halaman_aktif; $i++) { 
				if($i < 1) continue;
				$angka .= " <a href='". Config::get('url/base_url') .$link."/".$i."' class='btn btn-primary'>".$i."</a>"; 
			}
			$angka .= " <span class='btn btn-default'>".$halaman_aktif."</span>";

		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		      if($i > $jmlhalaman) break;
			    $angka .= " <a href='". Config::get('url/base_url') .$link."/".$i."' class='btn btn-primary'>".$i."</a> ";
		    }
			$angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='". Config::get('url/base_url') .$link."/".$jmlhalaman."'' class='btn btn-primary'>".$jmlhalaman."</a> " : " ");
			
			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
		    if($halaman_aktif < $jmlhalaman){
			    $next = $halaman_aktif+1;
			    $link_halaman .= "
			    <a href='". Config::get('url/base_url') .$link."/".$next."' class='btn btn-primary'><i class='fa fa-arrow-right'></i></a>  
		       	<a href='". Config::get('url/base_url') .$link."/".$jmlhalaman."' class='btn btn-primary' >&raquo;</a> ";
		    }
		    return $link_halaman;

		}
}