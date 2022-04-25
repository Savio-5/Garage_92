<?php
// Initialize the session
session_start();

require './includes/config_admin.php';

$msg = "";
if (strlen($_SESSION['adid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $catname = $_POST['catename'];
    $eid = substr(base64_decode($_GET['editid']), 0, -5);

    $query = mysqli_query($conn, "update tblcategory set VehicleCat = '$catname' where ID=$eid");
    if ($query) {
      $msg = "Category has been update.";
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
  }
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
    <?php include('./includes/sidenavadmin.php'); ?>
    <div id="layoutSidenav_content">

      <main>
        <div class="container-fluid px-4">
          <div class="content">
            <div class="container-fluid">

              <div class="row">
                <div class="col-12">
                  <div class="card-box">
                    <h4 class="m-t-0 header-title">Update Vehicle Category</h4>
                    <p class="text-muted m-b-30 font-14">

                    </p>

                    <div class="row">
                      <div class="col-12">
                        <div class="p-20">

                          <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                  echo $msg;
                                                                                }  ?> </p>
                          <?php
                          $cid = substr(base64_decode($_GET['editid']), 0, -5);
                          $ret = mysqli_query($conn, "select * from tblcategory where ID='$cid'");
                          $cnt = 1;
                          while ($row = mysqli_fetch_array($ret)) {
                          ?>


                            <form class="form-horizontal" role="form" method="post" name="submit">

                              <div class="form-group row">
                                <label class="col-2 col-form-label" for="example-email">Category Name</label>
                                <div class="col-10">
                                  <input type="text" id="catename" name="catename" class="form-control" placeholder="Vehicle Category" required="true" value="<?php echo $row['VehicleCat']; ?>">
                                </div>
                              </div>

                            <?php } ?>


                            <div class="form-group row">
                              <div class="col-12">
                                <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
                              </div>
                            </div>
                            </form>
                        </div>
                      </div>

                    </div>

                  </div> <!-- end card-box -->
                </div><!-- end col -->
              </div>

            </div> <!-- container -->

          </div> <!-- content -->
        </div>
      </main>
      <?php include('./includes/footeradmin.php'); ?>
    </div>
    </div>

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