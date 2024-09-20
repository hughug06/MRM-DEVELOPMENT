<?php 
//require_once '../authetincation.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../partials/head.php') ?>

    <title> Product control</title>
    
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    


    

    <div class="page">

         <!-- app-header -->
         <?php include_once('../../partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card">
                    <?php 
                    //service_id	account_id	user_id	admin_id	appointment_id	

                    require_once '../../Database/database.php';
                    $workerid =  $_SESSION['worker_id'];

                    $sql = "select * from accounts where role = 'service_worker' and account_id = '$workerid'";
                    $result = mysqli_query($conn , $sql);
                    if(mysqli_num_rows($result) > 0){
                        $service = "Select * from service_worker 
                        INNER JOIN accounts ON accounts.account_id = service_worker.account_id                      
                        INNER JOIN appointments ON appointments.appointment_id = service_worker.appointment_id
                        where service_worker.account_id = '$workerid'";
                        $service_result = mysqli_query($conn , $service);
                        foreach ($service_result as $serviceitem){
                                ?> 
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 1">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $serviceitem['service_type'] ?></h5>
                                            <p class="card-text"><?= $serviceitem['name'] ?></p>
                                            <p class="card-text">contact: (NO FUNCTION YET)</p>
                                            <p class="card-text"><?= $serviceitem['date'] ?></p>
                                            <p class="card-text"><?= $serviceitem['location'] ?></p>
                                            <a href="#" class="btn btn-primary">Check</a>
                                        </div>
                                <?php
                        }
                                              
                    }
                    ?>
                    
                </div>
            </div>

            </div>
        </div>
        <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->

    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
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

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>