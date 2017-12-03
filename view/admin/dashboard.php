<link href="<?= Config::get('url/base_url');?>assets/css/style_member.css" rel="stylesheet">
<div class="kotak">
    <h3>Dashboard</h3>
	<div class="kotak-grid">
		<div class="row">
			<div class="col-md-6 top-content compose">
				<h3>
					<i class="fa fa-users"></i> Users Data 
					<span class="badge" style="background: #8e0767;"><?php echo $data['users_count']; ?></span>
				</h3>
				<br>
				<h2>
					<i class="fa fa-user"></i> user : rating
				</h2>
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<?php foreach ($data['RatingData'] as $key): ?>
			          	<li class="">
				          	<a href="<?php echo Config::get('url/base_url'); ?>admin/users_rating/<?php  echo $key->user_profil_id;?>" data-toggle="tab">
				          		<i class="fa fa-user"></i>user ID : <?php echo $key->user_profil_id; ?>
				          		<span style="background: #555;"><?php echo $key->jumlah; ?>/<?php echo $data['laptop_count']; ?></span>
				          		<div class="clearfix"></div>
				          	</a>
			          	</li>
			          	<?php endforeach ?>
					</ul>
				</nav>
			</div>
			<div class="col-md-6 top-content compose">
				<h3>
					<i class="fa fa-laptop"></i> Laptop Data 
					<span class="badge" style="background: #8e0767;"><?php echo $data['laptop_count']; ?></span>
				</h3>
				<br>
				<h2>
					<i class="fa fa-laptop"></i> Laptop Brand
				</h2>
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<?php foreach ($data['brandData'] as $key): ?>
			          	<li class="">
				          	<a href="<?php echo Config::get('url/base_url'); ?>admin/laptop_kategori/brand/<?php  echo $key->brand;?>" data-toggle="tab">
				          		<i class="fa fa-laptop"></i><?php echo $key->brand; ?> 
				          		<span style="background: #555;"><?php echo $key->jumlah; ?></span>
				          		<div class="clearfix"></div>
				          	</a>
			          	</li>
			          	<?php endforeach ?>
					</ul>
				</nav>

				<h2>
					<i class="fa fa-laptop"></i> Laptop Series
				</h2>
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<?php foreach ($data['seriesData'] as $key): ?>
			          	<li class="">
				          	<a href="<?php echo Config::get('url/base_url'); ?>admin/laptop_kategori/series/<?php  echo str_replace(" ", "-", $key->series);?>" data-toggle="tab">
				          		<i class="fa fa-laptop"></i><?php echo $key->brand; ?> / <?php echo $key->series; ?> 
				          		<span style="background: #555;"><?php echo $key->jumlah; ?></span>
				          		<div class="clearfix"></div>
				          	</a>
			          	</li>
			          	<?php endforeach ?>
					</ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
</div>