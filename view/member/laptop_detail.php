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
}
</style>
<div class="col-md-4">
    <div class="laptop-detail-img">

        <div class="dtpg-prodimg">
            <img alt="Bootstrap template" src="<?= Config::get('url/base_url');?>upload/laptop/<?=$data['laptop']->gambar;?>" class="img-responsive"> 
        
            <hr class="separator">
            <div class="block-rel">
                <div class="block-rel tbl-spec">
                    <div class="rating-star">   
                        <span>Rate :</span>                 
                        <?php
                            if ($data['laptop']->nilai == null) {
                                echo "<td>";
                                foreach (range(1, 5) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/add_rating/".$data['laptop']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                echo "</td>";

                            }else{
                                echo "<td>";
                                foreach (range(1, $data['laptop']->nilai) as $star):
                                    echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop']->id."/".$star."' class='star'><i class='fa fa-star fa-lg'></i></a>";
                                endforeach;
                                if ($data['laptop']->nilai != 5) {
                                    foreach (range((1+$data['laptop']->nilai), 5) as $star):
                                        echo "<a href='".Config::get('url/base_url')."member/update_rating/".$data['laptop']->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                    endforeach;
                                }
                                
                                echo "</td>";
                            }
                        ?> 
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-laptop"></span>
                        <ul>
                            <li class="label-spec">LAYAR : </li>
                            <li class="val-spec"><?=$data['laptop']->u_layar;?> Inch</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">RAM : </li>
                            <li class="val-spec"><?=$data['laptop']->ram;?>GB</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-save"></span>
                        <ul>
                            <li class="label-spec">STORAGE :</li>
                            <li class="val-spec"><?=$data['laptop']->storage;?>GB</li>
                        </ul>
                    </div>
                    <div class="td-spec">
                        <span class="icon-box-spec fa fa-gear"></span>
                        <ul>
                            <li class="label-spec">PROSSESOR : </li>
                            <li class="val-spec"><?=$data['laptop']->prossesor;?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-5">

    <div class="laptop-detail-info">
        <h1><?=$data['laptop']->name;?></h1><br>
        <div class="harga-tag">
            <span class="text-bold">Harga : Rp.<?=number_format($data['laptop']->harga, 0, '', '.');?></span>
            <span class="pricedrop-arrow"></span>
        </div>
    </div>

    <div class="panel-group l-terkait" id="accordion" role="tablist" aria-multiselectable="true">
        <h3>Laptop Terkait : </h3>
        <div class="panel panel-default">
            <?php foreach (range(0, count($data['itemTerkait']) - 1) as $no ): ?>
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $no;?>" aria-expanded="true" aria-controls="<?php echo $no;?>">
                            <span class="fa fa-laptop" aria-hidden="true"></span><?=$data['itemTerkait'][$no][0]->name;?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo $no;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                            <a href="<?= Config::get('url/base_url');?>member/laptop_detail/<?=$data['itemTerkait'][$no][0]->id;?>" class="hover-border">    Lihat
                            </a> || 
                            <a href="<?= Config::get('url/base_url');?>member/laptop_banding/<?=$data['laptop']->id;?>/<?=$data['itemTerkait'][$no][0]->id;?>" class="hover-border">    bandingkan
                            </a>    
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="page-section">
            <div class="inset">
                <h2 class="text-uppercase title-bordot fb"><span class="fa fa-gear"></span> spesifikasi laptop <?=$data['laptop']->name;?></h2>
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
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->name;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Tahun Rilis : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->tahun_rilis;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Brand : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->brand;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">Series : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->series;?></span></span>

                                            <span class="col-md-4"><span class="spec-inftitle">OS : </span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->os;?></span></span>
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
                        <h5 class="title-bordot fb">Screen info</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ukuran Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->u_layar;?> Inch</span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Resolusi Layar</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->u_resolusi;?> Pixel</span></span>
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
                        <h5 class="title-bordot fb">Hardware info</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Prossesor</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->prossesor;?></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Kecepatan</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->kecepatan;?>Ghz</span></span>
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
                        <h5 class="title-bordot fb">Memmory info</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled list-specinfo">
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Ram</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->ram;?></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <span class="col-md-4"><span class="spec-inftitle">Storage</span></span>
                                            <span class="col-md-8"><span class="spec-infval"><?=$data['laptop']->storage;?>GB</span></span>
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

<script>
    $("#accordion").collapse({
        toggle: false
    });
</script>