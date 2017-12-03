<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Page</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />

		<!-- bootstrap-->
		<link href="<?= Config::get('url/base_url');?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- font-awesome -->
		<link href="<?= Config::get('url/base_url');?>assets/css/font-awesome.css" rel="stylesheet"> 
		<!-- Custom Theme files -->
		<link href="<?= Config::get('url/base_url');?>assets/css/style_login.css" rel='stylesheet' type='text/css' />
		<!-- bootstrap and jquery-->
		<script src="<?= Config::get('url/base_url');?>assets/js/jquery.min.js"> </script>
		<script src="<?= Config::get('url/base_url');?>assets/js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login container">
		<h1><a href="#">Laptop Recomendation System</a></h1>
		<br>
	    <?php if (Session::exists('gagal-login')): ?>
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Success!</strong> <?php echo Session::flash('gagal-login'); ?>
	        </div>
	    <?php endif ?>

		<div class="login-bottom col-md-6">
			<h2>Login</h2>
			<form action="<?= Config::get('url/base_url');?>user/signin" method="POST">

				<div class="col-md-6">
					<div class="login-mail">
						<input type="text" name="username" value="" placeholder="Username" required=""/>
						<i class="fa fa-user"></i>
					</div>
					<div class="login-mail">
						<input type="password" placeholder="Password" name="password" required="">
						<i class="fa fa-lock"></i>
					</div>
				</div>

				<div class="col-md-6 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="hidden" name="token" value="<?=Token::create('signinToken');?>">
						<input type="submit" value="Login">
					</label>
				</div>
			
				<div class="clearfix"> </div>

			</form>
		</div>

		<div class="login-bottom col-md-6">
			<h2>Register</h2>
			<form action="<?= Config::get('url/base_url');?>user/signup" method="POST">

				<div class="col-md-6">
					<div class="login-mail">
						<input type="text" name="username" value="" placeholder="Username" required=""/>
						<i class="fa fa-user"></i>
					</div>
					<div class="login-mail">
						<input type="password" placeholder="Password" name="password" required="">
						<i class="fa fa-lock"></i>
					</div>
					<div class="login-mail">
						<input type="password" placeholder="Password Again" name="password_again" required="">
						<i class="fa fa-lock"></i>
					</div>
				</div>

				<div class="col-md-6 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="hidden" name="token" value="<?=Token::create('signupToken');?>">
						<input type="submit" value="Register">
					</label>
				</div>
				
				<div class="clearfix"> </div>

			</form>
		</div>
	</div>


	<div class="copy-right">
	   	<p> &copy; 2017. All Rights Reserved </p>	    
	</div>
</body>
</html>

