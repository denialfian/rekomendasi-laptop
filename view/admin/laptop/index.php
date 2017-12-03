<div class="kotak">
    <h3>Data Laptop</h3>
	<div class="kotak-grid table-responsive">

		<?php if (Session::exists('sukses-laptop-update')): ?>
	        <div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Success!</strong> <?php echo Session::flash('sukses-laptop-update'); ?>
	        </div>
	    <?php endif ?>

	    <?php if (Session::exists('gagal-laptop-update')): ?>
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Errors!</strong> <?php echo Session::flash('gagal-laptop-update'); ?>
	        </div>
	    <?php endif ?>

	    <?php if (Session::exists('sukses-laptop-insert')): ?>
	        <div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Success!</strong> <?php echo Session::flash('sukses-laptop-insert'); ?>
	        </div>
	    <?php endif ?>

	    <?php if (Session::exists('gagal-laptop-insert')): ?>
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Errors!</strong> <?php echo Session::flash('gagal-laptop-insert'); ?>
	        </div>
	    <?php endif ?>

	    <?php if (Session::exists('sukses-laptop-delete')): ?>
	        <div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Success!</strong> <?php echo Session::flash('sukses-laptop-delete'); ?>
	        </div>
	    <?php endif ?>

	    <?php if (Session::exists('gagal-laptop-delete')): ?>
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Errors!</strong> <?php echo Session::flash('gagal-laptop-delete'); ?>
	        </div>
	    <?php endif ?>
	    
		<a href="<?= Config::get('url/base_url');?>admin/laptop_add" title="" class="btn btn-primary">add</a>
		<table class="table" id="tabeldata">
			<caption></caption>
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($data['laptopdata'] as $l) {
						echo "<tr>";
						echo "<td>{$no}</td>";
						echo "<td><a href='".Config::get('url/base_url')."admin/laptop_rating/".$l->id."' class='btn btn-primary'> {$l->name}</a></td>";
						echo "<td>";
						echo "<a href='".Config::get('url/base_url')."admin/laptop_view/".$l->id."'><span class='fa fa-eye btn blue' aria-hidden='true'></span></a> ";
						echo "<a href='".Config::get('url/base_url')."admin/laptop_edit/".$l->id."'><span class='fa fa-pencil btn green' aria-hidden='true'></span></a> ";
						echo "<a href='".Config::get('url/base_url')."admin/laptop_delete/".$l->id."'><span class='fa fa-trash btn red' aria-hidden='true'></span></a>";
						echo "</td>";
						echo "</tr>";
						$no++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>