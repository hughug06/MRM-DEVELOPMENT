<?php 
session_start();
require_once '../../Database/database.php';
$worker_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>
        <title>Pending</title> 
        <!-- Favicon -->
        <link rel="icon" href="../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
        
        <!-- Choices JS -->
        <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        
        <!-- Bootstrap Css -->
        <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!-- Main Theme Js -->
        <script src="../../assets/js/main.js"></script>

        <!-- Style Css -->
        <link href="../../assets/css/styles.min.css" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="../../assets/css/icons.css" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

        <!-- Simplebar Css -->
        <link href="../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        
        <!-- Color Picker Css -->
        <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">

        <!-- Choices Css -->
        <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">
    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once('../../partials/header.php') ?>
            <!-- /app-header -->

            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->

            <div class="main-content app-content">
                <div class="container-fluid">
                    <h2 class="main-content-title fs-24">Completed</h2>
                    <div class="row">
                    <?php 
                     $completed = "SELECT * FROM service_booking
                     INNER JOIN worker_ongoing ON worker_ongoing.booking_id = service_booking.booking_id  
                     INNER JOIN user_info on user_info.user_id = worker_ongoing.client_id  
                     INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id 
                     INNER JOIN maintenance_complete on maintenance_complete.booking_id = service_booking.booking_id 
                     WHERE booking_status = 'completed' and worker_ongoing.worker_id = '$worker_id'";
                     $result_completed = mysqli_query($conn, $completed);
                    if(mysqli_num_rows($result_completed) > 0){
                        while($row = mysqli_fetch_assoc($result_completed)){
                         
                      
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h5 class="mb-0 text-success"><?= $row['service_type'] . " - " . $row['product_type']?></h5>
                                </div>
                                <div class="card-body">
                                    <!-- Location Field -->
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <div class="form-control" readonly>
                                            <?= $row['pin_location'] ?>
                                        </div>
                                    </div>

                                    <!-- Start Time Field -->
                                    <div class="mb-3">
                                        <label class="form-label">Start Time</label>
                                        <div class="form-control" readonly>
                                        <?= $row['start_time'] ?>
                                        </div>
                                    </div>

                                    <!-- End Time Field -->
                                    <div class="mb-3">
                                        <label class="form-label">End Time</label>
                                        <div class="form-control" readonly>
                                        <?= $row['end_time'] ?>
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
            </div>
            
        </div>


        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->

        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <!-- Scroll To Top -->


        <!-- Popper JS -->
        <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Defaultmenu JS -->
        <script src="../../assets/js/defaultmenu.min.js"></script>

        <!-- Node Waves JS-->
        <script src="../../assets/libs/node-waves/waves.min.js"></script>

        <!-- Sticky JS -->
        <script src="../../assets/js/sticky.js"></script>

        <!-- Simplebar JS -->
        <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../assets/js/simplebar.js"></script>

        <!-- Color Picker JS -->
        <script src="../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

        <!-- Custom-Switcher JS -->
        <script src="../../assets/js/custom-switcher.min.js"></script>

        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

    </body>

</html>