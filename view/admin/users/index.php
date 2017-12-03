<div class="kotak">
    <h3>Data Users</h3>
	<div class="kotak-grid table-responsive">
		<table class="table" id="tabeldata">
			<caption></caption>
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Group</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($data['userdata'] as $u) {
						echo "<tr>";
						echo "<td>{$no}</td>";
						echo "<td>{$u->username}</td>";
						if ($u->group == 2) {
							echo "<td>Member</td>";
							echo "<td>";
							echo "	<a href='".Config::get('url/base_url')."admin/users_rating/".$u->id."' >
									<span class='fa fa-star btn yellow' aria-hidden='true'></span>
									</a>";
							echo "	<a href='".Config::get('url/base_url')."admin/users_info_view/".$u->id."' >
									<span class='fa fa-info btn blue' aria-hidden='true'></span>
									</a>";
							echo "	<a href='".Config::get('url/base_url')."admin/users_likes_view/".$u->id."' >
									<span class='fa fa-heart btn red' aria-hidden='true'></span>
									</a>";
							echo "	<a href='".Config::get('url/base_url')."admin/users_update_view/".$u->id."' >
									<span class='fa fa-lock btn green' aria-hidden='true'></span>
									</a>";
							echo "</td>";
						}else{
							echo "<td>Admin</td>";
							echo "<td>";
							echo "	<a href='".Config::get('url/base_url')."admin/users_update_view/".$u->id."' >
									<span class='fa fa-lock btn green' aria-hidden='true'></span>
									</a>";
							echo "</td>";
						}
						echo "</tr>";
						$no++;
					}
				?>
			</tbody>
		</table>
</div>
</div>