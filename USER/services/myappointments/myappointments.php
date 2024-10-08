
<?php 
require_once '../../../ADMIN/authetincation.php';
require_once '../../../Database/database.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'/../../../partials/head.php'); ?>

        <title> Inquries </title>
        <!-- Favicon -->
        <link rel="icon" href="../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
        
        <!-- Choices JS -->
        <script src="../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        
        <!-- Bootstrap Css -->
        <link id="style" href="../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!-- Main Theme Js -->
        <script src="../../../assets/js/main.js"></script>

        <!-- Style Css -->
        <link href="../../../assets/css/styles.min.css" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="../../../assets/css/icons.css" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

        <!-- Simplebar Css -->
        <link href="../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        
        <!-- Color Picker Css -->
        <link rel="stylesheet" href="../../../assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

        <!-- Choices Css -->
        <link rel="stylesheet" href="../../../assets/libs/choices.js/public/assets/styles/choices.min.css">

        <!-- Prism CSS -->
        <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once(__DIR__.'/../../../partials/header.php')?>
            <!-- app-sidebar -->
            <?php include_once(__DIR__.'/../../../partials/sidebar.php')?>

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row square row-sm">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu ">
                                    <a class="nav-link  active" data-bs-toggle="tab" href="#pending">Pending</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#payment">Payment</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#approved">Approved</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#cancelled">Cancelled</a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="pending">
                                                <div class="mb-4 main-content-label">Pending</div>
                                                <div class="card-body border">  
                                                            <!-- Content Here -->
                                                             <?php 
                                                             $userid = $_SESSION['account_id'];
                                                             $sql = "select * from appointments 
                                                             inner join service_pricing on appointments.appointment_id = service_pricing.appointment_id 
                                                             where appointments.account_id = '$userid'";
                                                             $result = mysqli_query($conn, $sql);
                                     
                                                             if (mysqli_num_rows($result) > 0) {
                                                                 while ($row = mysqli_fetch_assoc($result)) {
                                                                     if ($row['status'] === "Canceled") { // Ensure to use === for strict comparison
                                                                         continue; // Skip this iteration
                                                                     }
                                                              
                                                             ?>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card shadow-sm mb-4">
                                                                        <div class="card-header bg-primary text-white text-center">
                                                                            <h4 class="card-title mb-0">Appointment Summary</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Name</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['name']) ?> </p> 
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Address</h6>
                                                                                    <p class="text-muted">123 Main St, Springfield</p>
                                                                                </div>
                                                                            </div>

                                                                            <hr>

                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Appointment Date</h6>
                                                                                    <p class="text-muted">October 15, 2024</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Appointment Time</h6>
                                                                                    <p class="text-muted">3:00 PM - 4:00 PM</p>
                                                                                </div>
                                                                            </div>

                                                                            <hr>

                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Amount</h6>
                                                                                    <p class="text-muted">$150.00</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Payment Status</h6>
                                                                                    <span class="badge bg-success">Paid</span>
                                                                                </div>
                                                                            </div>

                                                                            <hr>

                                                                            <div class="row mb-3">
                                                                                <div class="col-md-12 text-center">
                                                                                    <h6 class="fw-bold">Appointment Status</h6>
                                                                                    <span class="badge bg-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-center">
                                                                            <button type="button" class="btn btn-primary">Check Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="payment">
                                                <div class="mb-4 main-content-label">Payment</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body  tab-pane p-4 border-top-0 p-0" id="approved">
                                                <div class="mb-4 main-content-label">Approved</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cancelled">
                                                <div class="mb-4 main-content-label">Cancelled</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>                                                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                      }
                    }
                    ?>
                </div>
            </div>
            <!-- Footer Start -->
            <?php include_once(__DIR__.'/../../../partials/footer.php') ?>
            <!-- Footer End -->  
        </div>

        
        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <!-- Scroll To Top -->

        <!-- Popper JS -->
        <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Defaultmenu JS -->
        <script src="../../../assets/js/defaultmenu.min.js"></script>

        <!-- Node Waves JS-->
        <script src="../../../assets/libs/node-waves/waves.min.js"></script>

        <!-- Sticky JS -->
        <script src="../../../assets/js/sticky.js"></script>

        <!-- Simplebar JS -->
        <script src="../../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../../assets/js/simplebar.js"></script>

        <!-- Color Picker JS -->
        <script src="../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

        <!-- Custom-Switcher JS -->
        <script src="../../../assets/js/custom-switcher.min.js"></script>

        <!-- Prism JS -->
        <script src="../../../assets/libs/prismjs/prism.js"></script>
        <script src="../../../assets/js/prism-custom.js"></script>

        <!-- Custom JS -->
        <script src="../../../assets/js/custom.js"></script>

    </body>

</html>






