<?php 
session_start();
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>
        
        <!-- Meta Data -->

        <?php include_once('../../partials/head.php') ?>

        <title>Dashboard</title>
        
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
                    <div class="row g-3"> 
                        <?php 
                        require_once '../../Database/database.php';
                        $workerid = $_SESSION['worker_id'];

                        $sql = "SELECT * FROM accounts WHERE role = 'service_worker' AND account_id = '$workerid'";
                       
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            $service = "SELECT * FROM service_worker 
                                        INNER JOIN accounts ON accounts.account_id = service_worker.account_id                      
                                        INNER JOIN appointments ON appointments.appointment_id = service_worker.appointment_id
                                        INNER JOIN service_payment ON service_payment.payment_id = service_worker.payment_id
                                        WHERE service_worker.account_id = '$workerid' AND appointments.status != 'Completed'";
                            $service_result = mysqli_query($conn, $service);
                            foreach ($service_result as $serviceitem) {
                               
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6"> 
                                <div class="card">
                                    <img src="../../assets/images/mrm-images/mrm-banner.png" class="card-img-top" alt="Image 1">
                                    <div class="card-body">
                                        <p class="card-text">Name: 
                                            <span class="text-success">
                                                <?= $serviceitem['name'] ?>
                                            </span>
                                        </p>
                                        <p class="card-text">Contact: 
                                            <span class="text-success">
                                                (NO FUNCTION YET)
                                            </span>
                                        </p>
                                        <p class="card-text">Service: 
                                            <span class="text-success">
                                                <?= $serviceitem['service_type'] ?>
                                            </span>
                                        </p>
                                        <?php 
                                        $currentDate = date('Y-m-d');
                                            if($serviceitem['date'] != $currentDate){                                                                                        
                                        ?>
                                         
                                         <a href="service_complete.php?account_id=<?= $serviceitem['account_id']?>&&appointment_id=<?= $serviceitem['appointment_id']?>&&payment_id=<?= $serviceitem['payment_id']?>" class="btn btn-primary">Done</a>  
                                        <?php 
                                        }
                                        ?>     
                                        <a href="user_details.php?user_id=<?= $serviceitem['account_id']?>&&appointment_id=<?= $serviceitem['appointment_id']?>" class="btn btn-primary">Details</a>                                                                                                            
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