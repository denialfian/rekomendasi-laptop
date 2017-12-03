<style type="text/css" media="screen">
.btn-file {
    position: relative;
    overflow: hidden;
    width: 80%;
    margin-left: 190px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
    padding: 10px 20px;
    background: #078e84;
    color: #fff;
}
.nav-tabs > li > a{
    padding: 10px 20px;
    background: #8e0767;
    color: #fff;
}
.nav-tabs > li > a:hover{
    color: #555;
}
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
.gambar{
    width: auto;
    height: 160px;

}
</style>
<div class="kotak">
    <h3>Update Data Laptop</h3>
    <div class="kotak-grid table-responsive">
        <form class="form-horizontal" action="<?= Config::get('url/base_url');?>admin/laptop_update" method="POST" enctype="multipart/form-data">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Information</a></li>
                <li role="presentation"><a href="#screen" aria-controls="screen" role="tab" data-toggle="tab">Screen</a></li>
                <li role="presentation"><a href="#hardware" aria-controls="hardware" role="tab" data-toggle="tab">Hardware</a></li>
                <li role="presentation"><a href="#memory" aria-controls="memory" role="tab" data-toggle="tab">Memory</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="basic">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="name" name="name" required="" value="<?=$data['laptop']->name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="merk" name="brand" required="" value="<?=$data['laptop']->brand;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">Series</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="Series" name="series" required="" value="<?=$data['laptop']->series;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">OS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="os" name="os" required="" value="<?=$data['laptop']->os;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">Tanggal Riris</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="tahun rilis" name="tahun_rilis" required="" value="<?=$data['laptop']->tahun_rilis;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label hor-form">harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="harga" name="harga" required="" value="<?=$data['laptop']->harga;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label hor-form">Gambar</label>
                            <input id="laptop-img" class="file-loading" type="file" name="gambar">
                            <script>
                                $(document).on('ready', function() {
                                    $("#laptop-img").fileinput({
                                        browseClass: "btn btn-primary btn-block",
                                        showCaption: false,
                                        showRemove: false,
                                        showUpload: false,
                                        initialPreview: [
                                            '<img src="<?= Config::get('url/base_url');?>upload/laptop/<?=$data['laptop']->gambar;?>" class="file-preview-image gambar"'
                                        ]
                                    });
                                });
                            </script>
                        </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="screen">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">Ukuran Layar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="inch" name="u_layar" required="" value="<?=$data['laptop']->u_layar;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">Resolusi Layar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="pixel" name="u_resolusi" required="" value="<?=$data['laptop']->u_resolusi;?>">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="hardware">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">prossesor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="prossesor" name="prossesor" required="" value="<?=$data['laptop']->prossesor;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">kecepatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" placeholder="GHz" name="kecepatan" required="" value="<?=$data['laptop']->kecepatan;?>">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="memory">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">ram</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="" placeholder="ram" name="ram" required="" value="<?=$data['laptop']->ram;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label hor-form">storage</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="" placeholder="GB" name="storage" required="" value="<?=$data['laptop']->storage;?>">
                        </div>
                    </div>
                </div>
              </div>

            </div>
            <input type="hidden" name="token" value="<?=Token::create('laptop_update');?>">
            <input type="hidden" name="id" value="<?=$data['laptop']->id;?>">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>