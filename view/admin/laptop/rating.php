
<div class="kotak">
    <h3>User Yang Merating</h3>
    <div class="kotak-grid table-responsive">
	<table class="table">
		<caption></caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Username Id</th>
				<th>Rate</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach ($data['laptopdata'] as $l) {
					echo "<tr>";
					echo "<td>{$no}</td>";
					echo "<td>{$l->user_profil_id}</td>";
					echo "<td>{$l->nilai}</td>";
					echo "</tr>";
					$no++;
				}
			?>
		</tbody>
	</table>
	</div>
</div>