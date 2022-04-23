<div class="agile-grids">	
				<!-- tables -->

				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Bookings Details #<?php echo $_GET['bookingid'];?></h2>
					    <table id="table">
				
						</thead>
						<tbody>
<?php 
$bid=$_GET['bid'];
$sql = "SELECT * from servicebooking
join servicecenters on servicecenters.id=servicebooking.servicePoint
 where servicebooking.id='$bid'";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
						  	<th width="200">Booking Id#</th>
							<td><?php echo htmlentities($result->bookingId);?></td>
							<th>Posting Date</th>
								<td><?php echo htmlentities($result->postingDate);?></td>
						</tr>
						<tr>
							<th>Name</th>
							<td width="300"><?php echo htmlentities($result->fullName);?></td>
							<th>Mobile No</th>
							<td><?php echo htmlentities($result->mobileNumber);?></td>
						</tr>
						<tr>
							<th>Package Type</th>
								<td>
								<?php $ptype=$result->vehicleType;
if($ptype==1): echo "BASIC CLEANING ($10.99)";endif;
if($ptype==2): echo "PREMIUM CLEANING ($20.99)";endif;
if($ptype==3): echo "COMPLEX CLEANING ($30.99)";endif;


							?></td>
							
						<th>Washing Point</th>
							<td><?php echo htmlentities($result->servicecentername	);?><br />
								<?php echo htmlentities($result->servicecenteraddress);?></td>
							</tr>
							<tr>
								<th>Washing Date</th>
							<td><?php echo htmlentities($result->serviceDate);?></td>
							<th>Washing Time</th>
							<td><?php echo htmlentities($result->servicetime);?></td>
							</tr>
							<tr>
								<th>Message (if Any)</th>
<td colspan="3"><?php echo htmlentities($result->message);?></td>
							</tr>
							
					<tr>
								<th>Status</th>
<td colspan="3"><?php echo htmlentities($result->status);?></td>
							</tr>
<?php if($result->adminRemark==''): ?>
	<tr>
		<td colspan="3">
	<button data-toggle="modal" data-target="#myModal" class="btn-primary btn">Take Action</button>
</td>
</tr>
<?php  else:?>

<tr>
	<td colspan="4" style="color:blue; font-size:22px; text-align:center; font-weight:bold;">Admin Details</td>
</tr>

<tr>
	<th>Transaction Type</th>
	<td><?php echo htmlentities($result->paymentMode);?></td>
		<th>Transaction No.(if any)</th>
	<td><?php echo htmlentities($result->txnNumber);?></td>
</tr>
<tr>
	<th>Admin Remark</th>
	<td colspan="3"><?php echo htmlentities($result->adminRemark);?></td>
</tr>
<?php endif;?>

						 <?php } }  ?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>


<!--Model-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Booking #<?php echo $_GET['bookingid'];?></h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="txntype" required class="form-control">
                <option value="">Transaction Type</option>
                <option value="e-Wallet">e-Wallet</option>
                 <option value="UPI">UPI</option>
                  <option value="Debit/Credit Card">Debit/Credit Card</option>
                   <option value="Cash">Cash</option>
                    <option value="Other">Other</option>
              </select>

       
         
            <p><input type="text" name="transactionno" class="form-control"   placeholder="Transaction Number (if any)"></p>
       
             <p><textarea name="message"  class="form-control" placeholder="Admin Remark" required></textarea></p>
             <p><input type="submit" class="btn btn-custom" name="update" value="Update"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>