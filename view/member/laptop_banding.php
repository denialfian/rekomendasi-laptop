<style type="text/css" media="screen">
.star{
        color: #f1c40f;
        
}
.star:hover, .star-no:hover{
    color: #f1c40f;
}
.star-no{
        color: #555;
      
}
.fa{
    margin-right: 10px;
}
.rating-star{
    margin-bottom: 10px;
}
.panel-default>.panel-heading{
    background: #078e84;
    color: #fff;
    padding: 15px 10px;
    font-size: 1.6em;
}
.l-terkait{
    background: #fff;
    padding: 10px 20px;
}
.laptop-detail-img{
    height: 420px;
    margin-bottom: 20px;
}
</style>
<div class="col-md-4">
    <div class="laptop-detail-img">

        <div class="dtpg-prodimg">
            <img alt="Bootstrap template" src="<?= Config::get('url/base_url');?>upload/laptop/<?=$data['laptop1']->gambar;?>" class="img-responsive"> 
        
            <hr class="separator">
            <div class="block-rel">
                <div class="block-rel tbl-spec">
                    <div class="rating-star">   
                        <span>Rate :</span>                 
                        <?php
                            if ($data['laptop1']->nilai == null) {
                                echo "<td>";
                                foreach (range(1, 5) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/add_rating/".$data['laptop1']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                echo "</td>";

                            }else{
                                echo "<td>";
                                foreach (range(1, $data['laptop1']->nilai) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop1']->id."/".$star."' class='star'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                if ($data['laptop1']->nilai != 5) {
                                    foreach (range((1+$data['laptop1']->nilai), 5) as $star):
                                        echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop1']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                    endforeach;
                                }
                                
                                echo "</td>";
                            }
                        ?> 
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-laptop"></span>
                        <ul>
                            <li class="label-spec">layar : </li>
                            <li class="val-spec"><?=$data['laptop1']->u_layar;?> Inch</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">RAM : </li>
                            <li class="val-spec"><?=$data['laptop1']->ram;?></li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-save"></span>
                        <ul>
                            <li class="label-spec">Storage :</li>
                            <li class="val-spec"><?=$data['laptop1']->storage;?>GB</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">Processor : </li>
                            <li class="val-spec"><?=$data['laptop1']->prossesor;?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-md-4">
    <div class="laptop-detail-img">

        <div class="dtpg-prodimg">
            <img alt="Bootstrap template" src="<?= Config::get('url/base_url');?>upload/laptop/<?=$data['laptop2']->gambar;?>" class="img-responsive"> 
        
            <hr class="separator">
            <div class="block-rel">
                <div class="block-rel tbl-spec">
                    <div class="rating-star">   
                        <span>Rate :</span>                 
                        <?php
                            if ($data['laptop2']->nilai == null) {
                                echo "<td>";
                                foreach (range(1, 5) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/add_rating/".$data['laptop2']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                echo "</td>";

                            }else{
                                echo "<td>";
                                foreach (range(1, $data['laptop2']->nilai) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop2']->id."/".$star."' class='star'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                if ($data['laptop2']->nilai != 5) {
                                    foreach (range((1+$data['laptop2']->nilai), 5) as $star):
                                        echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop2']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                    endforeach;
                                }
                                
                                echo "</td>";
                            }
                        ?> 
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-laptop"></span>
                        <ul>
                            <li class="label-spec">layar : </li>
                            <li class="val-spec"><?=$data['laptop2']->u_layar;?> Inch</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">RAM : </li>
                            <li class="val-spec"><?=$data['laptop2']->ram;?></li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-save"></span>
                        <ul>
                            <li class="label-spec">Storage :</li>
                            <li class="val-spec"><?=$data['laptop2']->storage;?>GB</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">Processor : </li>
                            <li class="val-spec"><?=$data['laptop2']->prossesor;?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    
    <div class="col-md-6">
        <div class="laptop-detail-info">
            <h1><?=$data['laptop1']->name;?></h1><br>
            <div class="harga-tag">
                <span class="text-bold">Harga : Rp.<?=number_format($data['laptop1']->harga, 0, '', '.');?></span>
                <span class="pricedrop-arrow"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="laptop-detail-info">
            <h1><?=$data['laptop2']->name;?></h1><br>
            <div class="harga-tag">
                <span class="text-bold">Harga : Rp.<?=number_format($data['laptop2']->harga, 0, '', '.');?></span>
                <span class="pricedrop-arrow"></span>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="page-section">
            <div class="inset">
                
                <div class="spec-infwrp section">
                    <div class="spec-infoicon">
                        <span class="fa fa-info"></span>
                    </div>
                    <div class="spec-infodesc">
                        <h5 class="title-bordot fb">Basic info : </h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Nama Produk : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->name;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Tahun Rilis : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->tahun_rilis;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Brand : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->brand;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Series : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->series;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">OS : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->os;?></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Nama Produk : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->name;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Tahun Rilis : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->tahun_rilis;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Brand : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->brand;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Series : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->series;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">OS : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->os;?></span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spec-infwrp section">
                    <div class="spec-infoicon">
                        <span class="fa fa-desktop"></span>
                    </div>
                    <div class="spec-infodesc">
                        <h5 class="title-bordot fb">Screen info :</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ukuran Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->u_layar;?> Inch</span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Resolusi Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->u_resolusi;?> Pixel</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ukuran Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->u_layar;?> Inch</span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Resolusi Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->u_resolusi;?> Pixel</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spec-infwrp section">
                    <div class="spec-infoicon">
                        <span class="fa fa-gear"></span>
                    </div>
                    <div class="spec-infodesc">
                        <h5 class="title-bordot fb">Hardware info :</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Prossesor</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->prossesor;?></span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Kecepatan</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->kecepatan;?>Ghz</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Prossesor</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->prossesor;?></span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Kecepatan</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->kecepatan;?>Ghz</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spec-infwrp section">
                    <div class="spec-infoicon">
                        <span class="fa fa-save"></span>
                    </div>
                    <div class="spec-infodesc">
                        <h5 class="title-bordot fb">Memmory info :</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ram</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->ram;?>GB</span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Storage</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop1']->storage;?>GB</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ram</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->ram;?>GB</span></span>
                                            <span class="col-md-4"><span class="spec-inftitle">Storage</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop2']->storage;?>GB</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
