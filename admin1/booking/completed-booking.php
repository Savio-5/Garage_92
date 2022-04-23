<!-- tables -->

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table me-1"></i>
		Completed Booking
	</div>
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Booking No.</th>
					<th>Name</th>
					<th width="200">Pacakge Type</th>
					<th>Washing Point </th>
					<th>Washing Date/Time </th>
					<th width="200">Posting date </th>
					<th>Action </th>

				</tr>
			</thead>
			<tbody>
				<?php
				require "./includes/config.php";
				$sql = "SELECT *,servicebooking.id as bid from servicebooking
join servicecenters on servicecenters.id=servicebooking.servicePoint
 where status='Completed'";
				$temp = mysqli_query($conn, $sql);
				$row = mysqli_fetch_row($temp);

				if ($row > 0) {
					foreach ($temp as $result) {				?>
						<tr>
							<td><?php echo htmlentities($result['bookingId']); ?></td>
							<td><?php echo htmlentities($result['fullName']); ?></td>
							<td width="50">
								<?php $ptype = $result['vehicleType'];
								if ($ptype == 1) : echo "BASIC CLEANING ($10.99)";
								endif;
								if ($ptype == 2) : echo "PREMIUM CLEANING ($20.99)";
								endif;
								if ($ptype == 3) : echo "COMPLEX CLEANING ($30.99)";
								endif;


								?></td>


							<td><?php echo htmlentities($result['servicecentername']); ?><br />
								<?php echo htmlentities($result['servicecenteraddress']); ?></td>
							<td><?php echo htmlentities($result['serviceDate'] . "/" . $result['servicetime']); ?></td>

							<td><?php echo htmlentities($result['postingDate']); ?></td>


							<td><a href="booking-details.php?bid=<?php echo htmlentities($result['bid']); ?>&&bookingid=<?php echo htmlentities($result['bookingId']); ?>">View</a>
							</td>
						<?php } ?>
						</tr>
					<?php } else { ?>
						<tr>
							<td colspan="6" style="color:red;">No Record found</td>

						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>