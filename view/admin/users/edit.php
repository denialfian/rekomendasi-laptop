<div class="kotak">
    <h3>User change password : <?php echo $data['users']->username; ?></h3>
	<div class="kotak-grid">
		<form class="form-horizontal" action="<?= Config::get('url/base_url');?>admin/users_update/" method="POST">
	        <div class="form-group">
	            <label for="" class="col-sm-3 control-label hor-form">new password</label>
	            <div class="col-sm-8">
	                <input type="password" class="form-control" placeholder="password baru" name="new_password" required="">
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="" class="col-sm-3 control-label hor-form">new password again</label>
	            <div class="col-sm-8">
	                <input type="password" class="form-control" placeholder="password baru lagi" name="new_password_again" required="">
	            </div>
	        </div>

	        <input type="hidden" name="token" value="<?=Token::create('users_update');?>">
	        <input type="hidden" name="id" value="<?=$data['users']->id;?>">
	        <div class="form-group">
	            <div class="col-sm-offset-3 col-sm-8">
	                <button type="submit" name="tekan" class="btn red">
                        <i class="fa fa-save"></i> Update
                    </button>
	            </div>
	        </div>
	    </form>
	</div>
</div>