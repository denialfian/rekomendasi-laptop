<div class="col-md-9">
    <div class="profil">

    <?php if (Session::exists('sukses-profil-info')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('sukses-profil-info'); ?>
        </div>
    <?php endif ?>

    <?php if (Session::exists('gagal-profil-info')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('gagal-profil-info'); ?>
        </div>
    <?php endif ?>

    <h3 id="forms-horizontal">Profil Information</h3>
    <br>
    <form class="form-horizontal" action="<?= Config::get('url/base_url');?>member/profil_info_insert" method="POST">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label hor-form">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" placeholder="name" name="name" value="<?=$data['profil'][0]->name;?>" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label hor-form">email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="" placeholder="email" name="email" value="<?=$data['profil'][0]->email;?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label hor-form">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?=$data['profil'][0]->tgl_lahir;?>">
            </div>
        </div>
        <input type="hidden" name="token" value="<?=Token::create('profil_info_insert');?>">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="hover-border">Save</button>
            </div>
        </div>
    </form>
    </div>
</div>