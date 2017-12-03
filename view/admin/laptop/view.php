<link href="<?= Config::get('url/base_url');?>assets/css/style_member.css" rel="stylesheet">
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
<div class="kotak">
    <h3>Data Laptop</h3>
	<div class="kotak-grid table-responsive">
<div class="col-md-6">
    <div class="laptop-detail-img">

        <div class="dtpg-prodimg">
            <img alt="Bootstrap template" src="<?= Config::get('url/base_url');?>upload/laptop/<?=$data['laptop']->gambar;?>" class="img-responsive"> 
        
            <hr class="separator">
            <div class="block-rel">
                <div class="block-rel tbl-spec">
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
<div class="col-md-6">

    <div class="laptop-detail-info">
        <h1><?=$data['laptop']->name;?></h1><br>
        <div class="harga-tag">
            <span class="text-bold">Harga : Rp.<?=number_format($data['laptop']->harga, 0, '', '.');?></span>
            <span class="pricedrop-arrow"></span>
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
	</div>
</div>