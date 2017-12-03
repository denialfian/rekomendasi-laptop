<div class="kotak">
    <h3>User Info : <?php echo $data['user_data']->username; ?></h3>
	<div class="kotak-grid">
		<form class="form-horizontal" action="<?= Config::get('url/base_url');?>admin/users_info_update/" method="POST">
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
	        <input type="hidden" name="token" value="<?=Token::create('users_info_update');?>">
	        <input type="hidden" name="id" value="<?=$data['profil'][0]->user_id;?>">
	        <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-3">
	                <button type="submit" name="tekan" class="btn red">
                        <i class="fa fa-save"></i> Update
                    </button>
	            </div>
	        </div>
	    </form>
	</div>
</div>