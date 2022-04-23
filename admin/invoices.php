<?php
// Initialize the session
session_start();

require './includes/config_admin.php';
if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GARAGE92 - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include('./includes/headeradmin.php'); ?>
        <?php include './includes/sidenavadmin.php' ?>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <div class="content-wrapper">



                    <main>
                        <div class="container-fluid mt-4">

                            <form action="http://localhost/vsms/razorpay/invoices.php" method="post" id="invoice_form">
                                <div class="table-responsive">
                                    <nav class="navbar navbar-default card">
                                        <div class="container-fluid">
                                            <div class="navbar-header">
                                                <h4 class="navbar-brand">Billing System</h4>
                                            </div>
                                        </div>
                                    </nav>
                                    <table class="table table-bordered card">

                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="col-md-8">

                                                            <b>RECEIVER (BILL TO) INFORMATION</b><br>
                                                            <div class="form-group mt-1">
                                                                <input type="text" name="receiver-name" id="receiver-name" class="form-control input-sm" placeholder="Enter Receiver Name">
                                                            </div>
                                                            <div class="form-group mt-1">
                                                                <textarea name="invoice-description" id="invoice-description" class="form-control" placeholder="Invoice Description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>INVOICE DETAILS</b><br>
                                                            <div class="form-group mt-1">
                                                                <input type="number" name="receiver_phone-no" id="receiver_phone-no" class="form-control input-sm number_only" placeholder="Phone Number" min="0">
                                                            </div>

                                                            <div class="form-group mt-1">
                                                                <input type="email" name="receiver_email" id="receiver_email" class="form-control input-sm" placeholder="Receivers Email">
                                                            </div>
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" name="draft-invoice" id="draft-invoice" value="1">
                                                                <label for="draft-invoice">Draft Invoice</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <table id="invoice-item-table" class="table table-bordered table-hover table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th width="5%">S/N.</th>
                                                                <th width="20%">Item Name</th>
                                                                <th width="20%">Description</th>
                                                                <th width="5%">Quantity</th>
                                                                <th width="12.5%" rowspan="1">Amount</th>
                                                                <th width="3%" rowspan="2"></th>
                                                            </tr>
                                                            <tr>
                                                                <td><span id="sr_no">1</span></td>
                                                                <td><input type="text" name="item_name" id="item_name" class="form-control input-sm"></td>
                                                                <td><input type="text" name="item_description" id="item_description" data-srno="1" class="form-control input-sm"></td>
                                                                <td><input type="number" name="item_quantity" id="item_quantity" data-srno="1" class="form-control input-sm" min="0"></td>
                                                                <td><input type="number" name="item_amount" id="item_amount" data-srno="1" class="form-control input-sm" min="0"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <input type="hidden" name="total_item" id="total_item" value="1">
                                                    <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-success" value="Create">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </main>

                </div>
            </div>
            <?php include './includes/footeradmin.php' ?>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script>
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
</script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>
<?php }  ?>