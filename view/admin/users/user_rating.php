<div class="kotak">
    <h3>laptop yang dirating : <?php echo $data['user_data']->username; ?></h3>
	<div class="kotak-grid table-responsive">
		<table class="table" id="">
			<caption></caption>
			<thead>
				<tr>
					<th>No</th>
					<th>name</th>
					<th>rate</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($data['user_rating'] as $Laptop) {
						echo "<tr>";
						echo "<td>{$no}</td>";
						echo "<td>{$Laptop->name}</td>";
						echo "<td>{$Laptop->nilai}</td>";
						echo "</tr>";
						$no++;
					}
				?>
			</tbody>
		</table>
		
	</div>
</div>
<?php 
	echo "<pre>";
	print_r($data['user_data']);
	echo "</pre>";
?>