<div class="kotak">
    <h3>Data Laptop | <?php  echo $data['kategori'];?> : <?php  echo $data['item'];?></h3>
	<div class="kotak-grid table-responsive">
	    
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
					foreach ($data['laptopData'] as $l) {
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