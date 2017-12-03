<?php
/*
    data sampel : 
        # dokument
            $dok =  [
                        'dok1'  => 'action romance',
                        'dok2'  => 'action crime romance horror',
                    ];
        # stopword
            $stopWord = ['ini','dan','di'];
        # stem dan term
            $term = ['mencari','bersama'];
            $stem = ['cari','sama'];

    instal
        $tfidf = new TFIDF;
        $tfidf->setStopWord($stopWord);
        $tfidf->setStemming($term, $stem);

    Cara 1: Tanpa panjang Vektor
        // set query
            $tfidf->setQuery('romance crime');
        // set dokuemnt
            $tfidf->setDocs($dok);
        // run TFIDF
            $tfidf->run();

    Cara 2: Dengan Panjang Vektor
        // query input
            $dok['query'] = 'romance crime'; # set query kedalam dokument
        // set term dengan dokument sebagai term nya
            $tfidf->setQuery($dok);
        // set dokuemnt
            $tfidf->setDocs($dok);
        // run TFIDF
            $tfidf->run();
    
    dump prosses perhitungan
        $tfidf->getCollection();

    menampilkan ke dalam tabel
        $tfidf->toTable();

*/
class TFIDF{
    public  $query,
            $docs       = [],
            $stopWord   = [],
            $stem       = [],
            $term       = [],

            $TF         = [],
            $DF         = [],
            $res;

    private $collection = [];
    private $tabel_data = [];
    
    
    public function setStopWord(array $stopWord = null)
    {
        $this->stopWord = $stopWord;
    }
    
    public function setStemming(array $stem = null, array $term = null)
    {
        $this->stem = $stem;
        $this->term = $term;
    }

    /**
     * @param string|array
     **/
    public function setQuery($query)
    {
        if (is_array($query)) {
            $query = $this->dokToQuery($query);
        }

        $query = strtolower($query);
        $remove = array("!", "?", ":", "(", ")", "&", "%", "/");
        $query  = str_replace($remove, "", $query);

        $this->query = $this->stopword($this->stemming(array_unique(explode(' ',trim($query)))));
        //array_multisort($this->query, SORT_ASC, SORT_STRING);
        return $this;
    }
    
    /**
     * @param array dua dimensi
     **/
    public function setDocs(array $docs = [])
    {
        if(count($docs))
        {
            foreach($docs as $doc => $isi)
            {
                $remove = array("**", ",", "!", "?", ":", "(", ")", "&", "%", "/");
                $isi    = str_replace($remove, "", strtolower($isi));
                $this->docs[$doc] = $this->stopWord(explode(' ',$isi));
                $this->docs[$doc] = $this->stemming($this->docs[$doc]);
            }
        }
        
        return $this;
    }

    /**
     * @param array
     * @return array
     **/
    public function stopWord(array $preference = [])
    {
        $stopWord = $this->stopWord;
        if(count($stopWord) > 0)
        {
            return array_diff($preference, $stopWord);
        }
        else
        {
            return $preference;
        }
    }
    
    /**
     * @param array
     * @return array
     **/
    public function stemming(array $preference = [])
    {
        $stem = $this->stem;
        $term = $this->term;
        
        if(count($stem) > 0 && count($term) > 0 && count($stem) == count($term))
        {
            return explode(' ', str_replace($stem, $term, implode(' ',$preference)));
        }
        else
        {
            return $preference;
        }
    }

    /**
     * digunakan untuk memecah semua dokumen menjadi term
     * @param array 
     * @return string
     **/
    public function dokToQuery(array $preference = [])
    {
        $query = null;
        foreach ($preference as $dok => $value) {
            $query .= $value.' ';
        }
        return trim($query);
    }

    public function kemiripan_kata($words = [], $input)
    {
        $input  = $input;
        $words  = $words;

        $shortest = -1;

        foreach ($words as $word) 
        {
             $lev = levenshtein($input, $word);
             if ($lev == 0) 
             {
                $closest = $word;
                $shortest = 0;
                break;
            }
            if ($lev <= $shortest || $shortest < 0) {
                $closest  = $word;
                $shortest = $lev;
            }
        }

        if ($shortest == 0) {
            return $closest;
        } else {
            return $closest;
        }

    }
    
    /** 
     * @return array 3 dimensi ['term']['dok']['nilai']
     **/
    public function TF()
    {
        $query  = $this->query;
        $docs   = $this->docs;
        
        foreach($docs as $doc => $docWords)
        {
            foreach($docWords as $k => $docWord)
            {
                foreach($query as $key => $qWords)
                {
                    if (!array_key_exists($qWords, $this->TF)) 
                    {
                        $this->TF[$qWords][$doc] = 0;
                    }
                    if (!array_key_exists($doc, $this->TF[$qWords])) 
                    {
                        $this->TF[$qWords][$doc] = 0;
                    }
                    if($qWords == $docWord)
                    {
                        $this->TF[$qWords][$doc] += 1;
                    }
                }
            }
        }
        return $this->TF;
    }
    
    /** 
     * @return array 2 dimensi ['term']['nilai']
     **/
    public function DF()
    {
        $query  = $this->query;
        $docs   = $this->docs;
        $count  = [];
        
        foreach($docs as $doc => $docWords)
        {
            foreach($docWords as $k => $docWord)
            {
                foreach($query as $key => $qWords)
                {
                    if (!array_key_exists($qWords, $count)) 
                    {
                        $count[$qWords][$doc] = 0;
                    }
                    if (!array_key_exists($doc, $count[$qWords])) 
                    {
                        $count[$qWords][$doc] = 0;
                    }
                    if($qWords == $docWord)
                    {
                        $count[$qWords][$doc] = 1;
                    }
                    $this->DF[$qWords] = array_sum($count[$qWords]);
                }
            }
        }
        return $this->DF;
    }
    
    /** 
     * @return array 2 dimensi ['dok']['bobot']
     **/
    public function run()
    {
        $query  = $this->query;
        $docs   = $this->docs;
        $TF     = $this->TF();
        $DF     = $this->DF();
        
        $WDT_sum                = [];
        $WDQ_X_WDI_SUM          = [];
        $panjang_vektor_sum     = [];
        
        foreach($TF as $word => $docWords)
        {
            foreach($docWords as $dok => $TF_value)
            {

                if (!array_key_exists($dok, $WDT_sum)) 
                {
                    $WDT_sum[$dok] = 0;
                }
                if (!array_key_exists($dok, $panjang_vektor_sum)) 
                {
                    $panjang_vektor_sum[$dok] = 0;
                }
                
                if($DF[$word] != 0)
                {
                    $IDF[$word]         = log10(count($docs) / $DF[$word]) + 1;
                }
                else
                {
                    $IDF[$word]         = 0;
                }
                
                $WDT[$word][$dok]   = $TF_value * $IDF[$word];
                $WDT_sum[$dok]      += $WDT[$word][$dok];

                if (array_key_exists('query', $docs)) 
                {
                    $WDQ[$word]     = $WDT[$word]['query'];
                    $panjang_vektor[$word][$dok] = $WDT[$word][$dok] * $WDT[$word][$dok];
                    $panjang_vektor_sum[$dok]   += $panjang_vektor[$word][$dok];
                    $panjang_vektor_sqrt[$dok]  = sqrt($panjang_vektor_sum[$dok]);
                    
                    if($dok != 'query')
                    {
                        if (!array_key_exists($dok, $WDQ_X_WDI_SUM)) 
                        {
                            $WDQ_X_WDI_SUM[$dok] = 0;
                        }
                        $WDQ_X_WDI[$word][$dok] = $WDQ[$word] * $WDT[$word][$dok];
                        $WDQ_X_WDI_SUM[$dok]    += $WDQ_X_WDI[$word][$dok];
                    }
                }

            }
        }
        
        if (array_key_exists('query', $docs))
        { 
            $docNames = array_keys($docs);
            foreach($docNames as $key => $name)
            {
                if($name != 'query')
                {
                    if(($panjang_vektor_sqrt['query'] * $panjang_vektor_sqrt[$name]) != 0)
                    {
                        $this->res[$name] = $WDQ_X_WDI_SUM[$name] / ($panjang_vektor_sqrt['query'] * $panjang_vektor_sqrt[$name]);
                    }
                    else
                    {
                        $this->res[$name] = 0;
                    }
                }
            }
        }

        array_multisort($WDT_sum, SORT_DESC);

        if (array_key_exists('query', $docs))
        {
            array_multisort($this->res, SORT_DESC);
            $this->collection = [
                                'TERM'                      => $this->query,
                                'DOCS'                      => $this->docs,
                                'TF'                        => $this->TF,
                                'DF'                        => $this->DF,
                                'IDF'                       => $IDF,
                                'WDT'                       => $WDT,
                                'WDQ'                       => $WDQ,
                                'WDT_SUM'                   => $WDT_sum,
                                'WDQ_X_WDI'                 => $WDQ_X_WDI,
                                'WDQ_X_WDI_SUM'             => $WDQ_X_WDI_SUM,
                                'PANJANG_VEKTOR'            => $panjang_vektor,
                                'PANJANG_VEKTOR_SUM'        => $panjang_vektor_sum,
                                'PANJANG_VEKTOR_SQRT'       => $panjang_vektor_sqrt,
                                'PANJANG_VEKTOR_RESULTS'    => $this->res
                            ];
            $this->tabel_data = $this->collection;
            return $this->res;
        }
        else
        {
            $this->collection = [
                                'TERM'                      => $this->query,
                                'DOCS'                      => $this->docs,
                                'TF'                        => $this->TF,
                                'DF'                        => $this->DF,
                                'IDF'                       => $IDF,
                                'WDT'                       => $WDT,
                                'WDT_SUM'                   => $WDT_sum
                            ];
            $this->tabel_data = $this->collection;
            return $WDT_sum;
        }
    }

    /** 
     * bisa digunakan setelah method run() dijalankan
     * output berupa data perhitungan 
     * @return object
     **/
    public function getCollection(){return (object) $this->collection;}

    /** 
     * @return string
     **/
    private function tableHead()
    {
        $docs   = $this->docs;
        $datas  = $this->collection;
        $tabel_head_html = '';
        
        if (array_key_exists('query', $docs))
        {
            $tabel_head_html .= '<tr>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">#</th>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">Term</th>';
                $tabel_head_html .= '<th colspan="'.count($docs).'" class="text-center">TF</th>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">DF</th>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">IDF</th>';
                $tabel_head_html .= '<th colspan="'.count($docs).'" class="text-center">WDT</th>';
                $tabel_head_html .= '<th colspan="'.(count($docs) - 1).'" class="text-center">WDQ_X_WDI</th>';
                $tabel_head_html .= '<th colspan="'.count($docs).'" class="text-center">PANJANG_VEKTOR</th>';
            $tabel_head_html .= '</tr>';
            $tabel_head_html .= '<tr class="">';
                foreach (range(1, 4) as $count) 
                {
                    foreach ($this->docs as $key => $value) 
                    {
                        if ($count == 3) 
                        {
                            if ($key != 'query') 
                            {
                                $tabel_head_html .= '<th>'.$key.'</th>';
                            }
                        }
                        else
                        {
                            $tabel_head_html .= '<th>'.$key.'</th>';
                        }
                    }
                }
            $tabel_head_html .= '</tr>';
        }
        else
        {
            $tabel_head_html .= '<tr>'; 
                $tabel_head_html .= '<th rowspan="2" class="text-center">#</th>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">Term</th>';
                $tabel_head_html .= '<th colspan="'.count($docs).'" class="text-center">TF</th>';
                $tabel_head_html .= '<th rowspan="2">DF</th>';
                $tabel_head_html .= '<th rowspan="2" class="text-center">IDF</th>';
                $tabel_head_html .= '<th colspan="'.count($docs).'" class="text-center">WDT</th>';
            $tabel_head_html .= '</tr>';
            $tabel_head_html .= '<tr>';
                foreach (range(1, 2) as $count) {
                    foreach ($this->docs as $key => $value) {
                        $tabel_head_html .= '<th>'.$key.'</th>';
                    }
                }
            $tabel_head_html .= '</tr>';
        }
        

        return $tabel_head_html;
    }

    /** 
     * @return string
     **/
    private function tableBody()
    {
        $docs   = $this->docs;
        $datas  = $this->collection;
        $tabel_body_html                = '';
        $WDT_SUM_html                   = '';
        $WDQ_X_WDI_SUM_html             = '';
        $PANJANG_VEKTOR_SUM_html        = '';
        $PANJANG_VEKTOR_SQRT_html       = '';
        $PANJANG_VEKTOR_RESULTS_html    = '';

        foreach ($docs as $key => $value) 
        {
            $WDT_SUM_html               .= '<th>'.$datas['WDT_SUM'][$key].'</th>';
            if (array_key_exists('query', $docs))
            {
                $PANJANG_VEKTOR_SUM_html    .= '<th>'.$datas['PANJANG_VEKTOR_SUM'][$key].'</th>';
                $PANJANG_VEKTOR_SQRT_html   .= '<th>'.$datas['PANJANG_VEKTOR_SQRT'][$key].'</th>';

                if ($key != 'query') 
                {
                    $WDQ_X_WDI_SUM_html          .= '<th>'.$datas['WDQ_X_WDI_SUM'][$key].'</th>';
                    if (max($datas['PANJANG_VEKTOR_RESULTS']) == $datas['PANJANG_VEKTOR_RESULTS'][$key]) 
                    {
                        $pv = '<th><span class="btn btn-success">'.$datas['PANJANG_VEKTOR_RESULTS'][$key].'</span></th>';
                    }else{
                        $pv = '<th><span class="btn btn-primary">'.$datas['PANJANG_VEKTOR_RESULTS'][$key].'</span></th>';
                    }
                    
                    $PANJANG_VEKTOR_RESULTS_html .= $pv;
                }
            }
        }
        $no = 1;
        if (array_key_exists('query', $docs))
        {
            foreach ($this->TF as $term => $dok) {
                $tabel_body_html .= '<tr>';
                    $tabel_body_html .= '<th>'.$no.'</th>';
                    $tabel_body_html .= '<td>'.$term.'</td>';
                    foreach ($dok as $key => $value){
                        $tabel_body_html .= '<td>'.$datas['TF'][$term][$key].'</td>';
                    }
                    $tabel_body_html .= '<td>'.$datas['DF'][$term].'</td>';
                    $tabel_body_html .= '<td>'.$datas['IDF'][$term].'</td>';
                    foreach ($dok as $key => $value){
                        $tabel_body_html .= '<td>'.$datas['WDT'][$term][$key].'</td>';
                    }
                    foreach ($dok as $key => $value){
                        if ($key != 'query') {
                            $tabel_body_html .= '<td>'.$datas['WDQ_X_WDI'][$term][$key].'</td>';
                        }
                    }
                    foreach ($dok as $key => $value){
                        $tabel_body_html .= '<td>'.$datas['PANJANG_VEKTOR'][$term][$key].'</td>';
                    }
                $tabel_body_html .= '</tr>';
                $no++;
            }

            $tabel_body_html .= '<tr class="danger">';
                $tabel_body_html .= '<th colspan="'.(count($this->docs) + 4).'">SUM</th>';
                $tabel_body_html .= $WDT_SUM_html;
                $tabel_body_html .= $WDQ_X_WDI_SUM_html;
                $tabel_body_html .= $PANJANG_VEKTOR_SUM_html;
            $tabel_body_html .= '</tr>';
            $tabel_body_html .= '<tr class="success">';
                $tabel_body_html .= '<th colspan="'.( ((count($this->docs) * 2) + 4) + (count($this->docs) - 1) ).'">SQRT</th>';
                $tabel_body_html .= $PANJANG_VEKTOR_SQRT_html;
            $tabel_body_html .= '</tr>';
            $tabel_body_html .= '<tr class="warning">';
                $tabel_body_html .= '<th colspan="'.( ((count($this->docs) * 2) + 4) + (count($this->docs) - 1) + 1 ).'">HASIL</th>';
                $tabel_body_html .= $PANJANG_VEKTOR_RESULTS_html;
            $tabel_body_html .= '</tr>';
        }
        else
        {
            $no = 1;
            foreach ($this->TF as $term => $dok) 
            {
                $tabel_body_html .= '<tr>';
                    $tabel_body_html .= '<th>'.$no.'</th>';
                    $tabel_body_html .= '<td>'.$term.'</td>';
                    foreach ($dok as $key => $value)
                    {
                        $tabel_body_html .= '<td>'.$datas['TF'][$term][$key].'</td>';
                    }
                    $tabel_body_html .= '<td>'.$datas['DF'][$term].'</td>';
                    $tabel_body_html .= '<td>'.$datas['IDF'][$term].'</td>';
                    foreach ($dok as $key => $value)
                    {
                        $tabel_body_html .= '<td>'.$datas['WDT'][$term][$key].'</td>';
                    }
                $tabel_body_html .= '</tr>';
                $no++;
            }

            $tabel_body_html .= '<tr>';
                $tabel_body_html .= '<th colspan="'.(count($this->docs) + 4).'">SUM</th>';
                $tabel_body_html .= $WDT_SUM_html;
            $tabel_body_html .= '</tr>';
        }

        return $tabel_body_html;
    }

    /** 
     * bisa digunakan setelah method run() dijalankan
     * output berupa HTML tabel perhitung
     * @return string
     **/
    public function toTable()
    {
        $tabel_html      = '';
        $tabel_head_html = $this->tableHead();
        $tabel_body_html = $this->tableBody();

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

    public function getRec($userLikesTable, $laptopTable)
    {
        $harga_juta = explode('.', number_format($userLikesTable[0]->harga, 0, '', '.'));
        // get query
        $query  =   $userLikesTable[0]->brand." ".
                    $userLikesTable[0]->os." ".
                    $userLikesTable[0]->series." ".
                    $userLikesTable[0]->tahun_rilis." ".
                    $userLikesTable[0]->u_layar." ".
                    $userLikesTable[0]->u_resolusi." ".
                    $userLikesTable[0]->prossesor." ".
                    $userLikesTable[0]->kecepatan." ".
                    $userLikesTable[0]->ram." ".
                    $userLikesTable[0]->storage." ".
                    $userLikesTable[0]->harga;
        // get documnet
        foreach ($laptopTable as $key) {
            $dok[$key->name] =    str_replace(" ", "-", $key->brand)." ".
                                str_replace(" ", "-", $key->os)." ".
                                str_replace(" ", "-", $key->series)." ".
                                str_replace(" ", "-", $key->u_resolusi)." ".
                                str_replace(" ", "-", $key->prossesor)." ".
                                $key->tahun_rilis." ".
                                $key->u_layar." ".
                                $key->kecepatan." ".
                                $key->ram." ".
                                $key->storage." ".
                                $key->harga;
        }

        $this->setQuery($query);
        $this->setDocs($dok);
        return $this->run();
    }
}