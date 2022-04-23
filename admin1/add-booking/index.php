<?php
    require './includes/config.php'
?>

<div class="grid-form1">
    <h3>Add Car Washing Booking</h3>

    <div class="tab-content">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" name="service" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                    <div class="col-sm-8">
                        <select name="vehicleType" required class="form-control">
                            <option value="">Package Type</option>
                            <option value="1">BASIC Servicing</option>
                            <option value="2">Custom Servicig</option>
                            <!-- <option value="3 ">COMPLEX CLEANING($30.99)</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Washing Point</label>
                    <div class="col-sm-8">
                        <select name="washingpoint" required class="form-control">
                            <option value="">Select Washing Point</option>
                            <?php $sql = "SELECT * from servicecenters";
                            $temp = mysqli_query($conn, $sql);
                            // $results = $temp->fetch_assoc();
                            foreach ($temp as $result) {               ?>
                                <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['servicecentername']); ?> (<?php echo htmlentities($result['servicecenteraddress']); ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="fname" class="form-control" required placeholder="Full Name">
                    </div>
                </div>



                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Mobile No</label>
                    <div class="col-sm-8">
                        <input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                    </div>
                </div>


                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email-add" required class="form-control" placeholder="Email">
                    </div>
                </div>


                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Servicing Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="serviceDate" required class="form-control">
                    </div>
                </div>



                <!-- <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Wash Time</label>
                    <div class="col-sm-8">
                        <input type="time" name="servicetime" required class="form-control">
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                        <textarea name="message" class="form-control" placeholder="Message if any"></textarea>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" name="book" class="btn-primary btn">Add</button>

                        <button type="reset" class="btn-inverse btn">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>