<style type="text/css" media="screen">
.file-caption-main {
    width: 80%;
    padding-left: 15px;
}
.btn-file {
    position: relative;
    overflow: hidden;
    width: 80%;
    margin-left: 190px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
    padding: 10px 20px;
}
.nav-tabs > li > a{
    padding: 10px 20px;
    background: #8e0767;
    color: #fff;
}
.nav-tabs > li > a:hover{
    color: #555;
    background: #fff;
}
.nav-tabs{
    margin-bottom: 20px;
}
</style>
<div class="col-md-9">
    <div class="profil">

    <?php if (Session::exists('sukses-profil-likes')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('sukses-profil-likes'); ?>
        </div>
    <?php endif ?>

    <?php if (Session::exists('gagal-profil-likes')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('gagal-profil-likes'); ?>
        </div>
    <?php endif ?>

    <h3 id="forms-horizontal">Profil Likes</h3>
    <br>
    <form class="form-horizontal" action="<?= Config::get('url/base_url');?>member/profil_likes_insert" method="POST">
        <div>
          <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Information</a>
                </li>
                <li role="presentation">
                    <a href="#screen" aria-controls="screen" role="tab" data-toggle="tab">Screen</a>
                </li>
                <li role="presentation">
                    <a href="#hardware" aria-controls="hardware" role="tab" data-toggle="tab">Hardware</a>
                </li>
                <li role="presentation">
                    <a href="#memory" aria-controls="memory" role="tab" data-toggle="tab">Memory</a>
                </li>
            </ul>
          <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="basic">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">Brand</label>
                        <div class="col-sm-10">
                            <?php foreach ($data['brandData'] as $name => $cek): ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="<?=$name;?>" name="brand[]" <?=$cek;?> > <?=$name; ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">Series</label>
                        <div class="col-sm-10">
                            <?php foreach ($data['seriesData'] as $name => $cek): ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="<?=$name;?>" name="series[]" <?=$cek;?> > <?=$name; ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">OS</label>
                        <div class="col-sm-10">
                            <?php foreach ($data['osData'] as $name => $cek): ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="<?=$name;?>" name="os[]" <?=$cek;?> > <?=$name; ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">tahun Riris</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="" placeholder="tahun Riris" name="tahun_rilis" required="" value="<?=$data['likes']->tahun_rilis;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">harga</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="" placeholder="harga" name="harga" value="<?=$data['likes']->harga;?>">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="screen">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label hor-form">Ukuran Layar</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="inch" name="u_layar" value="<?=$data['likes']->u_layar;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label hor-form">Resolusi Layar</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="pixel" name="u_resolusi" value="<?=$data['likes']->u_resolusi;?>">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="hardware">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">prossesor</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="prossesor" name="prossesor" value="<?=$data['likes']->prossesor;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">kecepatan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="GHz" name="kecepatan" value="<?=$data['likes']->kecepatan;?>">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="memory">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">ram</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="" placeholder="ram" name="ram" value="<?=$data['likes']->ram;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">storage</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="" placeholder="GB" name="storage" value="<?=$data['likes']->storage;?>">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <input type="hidden" name="token" value="<?=Token::create('profil_likes_insert');?>">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="hover-border">Save</button>
            </div>
        </div>

    </form>
    </div>
</div>