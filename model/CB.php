<?php 
/*
	cara pake
	1. set data
	# 
	params : username|productName|Rating
	$data = [
		'user1' =>  [
						'produk1' => 4,
						'produk2' => 3,
					],
		'user2' =>  [
						'produk2' => 5,
						'produk3' => 5,
					],
		'user3' =>  [
						'produk1' => 4,
						'produk2' => 3,
						'produk3' => 3,
						'produk4' => 3,
					],
	];
	$cb = new CB;
	$cb->setData($data);
	print_r($cb->getRec('user1'));
	
	render ke table
	$cb->toTableSimilarity(); 
	$cb->toTablePredict(); 
*/
class CB {
    public $data;
    public $results;
    public $collection;

    public function setData(array $data){$this->data = $data;}

    public function cekUser($data, $user){

        if (array_key_exists($user, $data)) {
            return true;
        }else{
            return false;
        }
    }

    public function collection($user = null){
        $data = $this->data;

        // collection users and items
        foreach ($data as $users => $item) {
            foreach ($item as $nama => $rating) {
                $allUsers[] = $users;
                $allItems[] = $nama;
            }
        }

        array_multisort($allUsers, SORT_ASC, SORT_STRING);
        array_multisort($allItems, SORT_ASC);

        $allUsers = array_unique($allUsers);
        $allItems = array_unique($allItems);

        // collection similarity
        foreach ($allItems as $key1 => $nama1) {
            if ($user != null) {
                $ratingUser[$nama1] = array_key_exists($nama1, $data[$user]) ? $data[$user][$nama1] : 0;
            }

            foreach ($allItems as $key2 => $nama2) {
                if ($nama1 != $nama2) {
                    $sim[$nama1][$nama2]                = $this->adjustedCosine($nama1, $nama2);
                    $simAbs[$nama1][$nama2]             = abs($sim[$nama1][$nama2]);
                }
            }
            $totalSim[$nama1]       = array_sum($simAbs[$nama1]);
        }


        return $this->collection = [
            'users' => $allUsers,
            'items' => $allItems,
            'sim'   => $sim,
            'totalSim'  => $totalSim,
            'ratingUser'    => $ratingUser,
        ];
    }

    public function adjustedCosine($item1, $item2){
        $himpunanUser1  = null;
        $resItem11      = null;
        $resItem22      = null;

        $data = $this->data;
        foreach ($data as $user => $items) {
            $itemI[$user] = array_key_exists($item1, $items) ? $items[$item1] : 0;
            $itemJ[$user] = array_key_exists($item2, $items) ? $items[$item2] : 0;
            $rata[$user]  = array_sum($data[$user]) / count($data[$user]);

            if ($itemI[$user] !== 0  && $itemJ[$user] !== 0) {
                $resItem1 = $itemI[$user] - $rata[$user];
                $resItem2 = $itemJ[$user] - $rata[$user];

                $resItem11 += pow($itemI[$user] - $rata[$user], 2);
                $resItem22 += pow($itemJ[$user] - $rata[$user], 2);

            }else{
                $resItem1 = 0;
                $resItem2 = 0;
            }
            $himpunanUser1 += $resItem1 * $resItem2;
        }

        $himpunanUser2 = sqrt($resItem11) * sqrt($resItem22);
        if ($himpunanUser1 == 0 && $himpunanUser2 == 0) {
            $similarity =  0;
        }else{
            $similarity =  $himpunanUser1 / $himpunanUser2;
        }

        return $similarity;
    }

    public function getRec(string $user){
        $collection = $this->collection($user);
        $ratingUser = $collection['ratingUser'];
        $totalSim   = $collection['totalSim'];

        foreach($collection['sim'] as $nama1 => $similar){
            foreach ($similar as $nama2 => $value) {
                $himpunanItemSim[$nama1][$nama2]    = $ratingUser[$nama2] * $value;
            }
            $totalHimpunan[$nama1]  = array_sum($himpunanItemSim[$nama1]);

            if($ratingUser[$nama1] == 0) {
                if ($totalHimpunan[$nama1] != 0 && $totalSim[$nama1] != 0) {
                    $weightSum[$nama1]      = $totalHimpunan[$nama1] / $totalSim[$nama1];
                }else{
                    $weightSum[$nama1] = null;
                }
            }else{
                $weightSum[$nama1] = null;
            }
        }
        array_multisort($weightSum, SORT_DESC); 
        $this->results = $weightSum;

        return $weightSum;
    }

    public function toTableSimilarity($tableHead = 100){
        $collection = $this->collection;

        $sim = $collection['sim'];
        $tabel_html = '';
        $tabel_head_html = '';
        $tabel_body_html = '';

        // table header
        $tabel_head_html .= '<tr>';
            $tabel_head_html .= '<th rowspan="" class="text-center">#</th>';
            foreach ($collection['items'] as $key => $itemName) {
                $tabel_head_html .= '<th>'.substr($itemName, 0, $tableHead).'</th>';
            }
        $tabel_head_html .= '</tr>';

        // table body
        foreach ($collection['items'] as $key1 => $itemName1) {
            $tabel_body_html .= '<tr>';
                $tabel_body_html .= '<th>'.substr($itemName1, 0, $tableHead).'</th>';
                foreach ($collection['items'] as $key2 => $itemName2) {
                    $sims = array_key_exists($itemName2, $sim[$itemName1]) ? $sim[$itemName1][$itemName2] : '<strong>1</strong>';
                    $tabel_body_html .= '<td>'.$sims.'</td>';
                }
            $tabel_body_html .= '</tr>';
        }

        $tabel_html .= '<div class="table-responsive">';
            $tabel_html .= '<table class="table table-bordered table-hover table-condensed">';
            $tabel_html .= '<thead class="">';
                $tabel_html .= $tabel_head_html;
            $tabel_html .= '</thead>';
            $tabel_html .= '<tbody>';
                $tabel_html .= $tabel_body_html;
            $tabel_html .= '<tbody>';
            $tabel_html .= '</table>';
        $tabel_html .= '</div>';

        return $tabel_html;
    }

    public function toTablePredict(){
        $collection = $this->collection;
        $results    = $this->results;

        $tabel_html = '';
        $tabel_head_html = '';
        $tabel_body_html = '';

        // table header
        $tabel_head_html .= '<tr>';
            $tabel_head_html .= '<th class="">Item</th>';
            $tabel_head_html .= '<th class="">Bobot</th>';
        $tabel_head_html .= '</tr>';

        // table body
        foreach ($results as $name => $bobot) {
            $predict = $bobot != 0 ? $bobot : 'sudah diratiing';
            $tabel_body_html .= '<tr>';
                $tabel_body_html .= '<th>'.$name.'</th>';
                $tabel_body_html .= '<th>'.$predict.'</th>';
            $tabel_body_html .= '</tr>';
        }

        $tabel_html .= '<div class="table-responsive">';
            $tabel_html .= '<table class="table table-bordered table-hover table-condensed">';
            $tabel_html .= '<thead class="">';
                $tabel_html .= $tabel_head_html;
            $tabel_html .= '</thead>';
            $tabel_html .= '<tbody>';
                $tabel_html .= $tabel_body_html;
            $tabel_html .= '<tbody>';
            $tabel_html .= '</table>';
        $tabel_html .= '</div>';

        return $tabel_html;
    }
}