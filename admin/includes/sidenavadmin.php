<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link collapsed" href="javascript: void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                        <div class="sb-nav-link-icon"><i class="fal fa-car-mechanic"></i></div>
                        Mechanics
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion1">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages1">
                            <a class="nav-link collapsed" href="add-mechanics.php">
                                Add Mechanics
                            </a>
                            <a class="nav-link collapsed" href="manage-mechanics.php">
                                Manage Mechanics
                            </a>
                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="javascript: void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages2">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                        Vehicle Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion2">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages2">
                            <a class="nav-link collapsed" href="add-category.php">
                                Add Category
                            </a>
                            <a class="nav-link collapsed" href="manage-category.php">
                                Manage Category
                            </a>
                        </nav>
                    </div>


                    <!-- <a class="nav-link" href="reg-user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Register Users
                            </a> -->


                    <a class="nav-link collapsed" href="javascript: void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages3" aria-expanded="false" aria-controls="collapsePages3">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                        Service Request
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages3" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion3">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages3">
                            <a class="nav-link collapsed" href="pending-service.php">
                                New
                            </a>
                            <a class="nav-link collapsed" href="rejected-services.php">
                                Rejected
                            </a>
                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="javascript: void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages4" aria-expanded="false" aria-controls="collapsePages4">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                        Servicing
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages4" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion4">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages4">
                            <a class="nav-link collapsed" href="pending-servicing.php">
                                Pending
                            </a>
                            <a class="nav-link collapsed" href="completed-service.php">
                                Completed
                            </a>
                        </nav>
                    </div>


                    <a class="nav-link" href="invoices.php">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-file-invoice"></i></div>
                        Generate Invoice
                    </a>
                    <a class="nav-link collapsed" href="javascript: void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages5" aria-expanded="false" aria-controls="collapsePages5">
                        <div class="sb-nav-link-icon"><i class="fa fa-list-ul"></i></div>
                        Customer Enquiry
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages5" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion5">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages5">
                            <a class="nav-link collapsed" href="notrespond-enquiry.php">
                                Not Responded Enquiry
                            </a>
                            <a class="nav-link collapsed" href="respond-enquiry.php">
                                Responded Enquiry
                            </a>
                        </nav>
                    </div>

                    <!-- <a class="nav-link" href="search-enquiry.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice"></i></div>
                                Enquiry Search
                            </a> -->
                    <!-- <a class="nav-link" href="search-service.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice"></i></div>
                                Enquiry Search
                            </a> -->



                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo htmlspecialchars($_SESSION["username"]); ?>
            </div>
        </nav>
    </div>