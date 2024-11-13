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
                    <div class="card mt-5" style="width: 100%; padding: 20px;">
                        <div class="card-body">
                            <!-- Heading -->
                            <h3 class="card-title text-center mb-4">For pick up</h3>

                            <!-- Checklist -->
                            <ul class="list-group mb-4">
                                <?php 
                                $sql = "select * from worker_ongoing
                                        inner join service_booking on service_booking.booking_id = worker_ongoing.booking_id
                                        ";
                                $result = mysqli_query($conn , $sql);
                                $row = mysqli_fetch_assoc($result);
                                $product_type = $row['product_type'];
                                $service_type = $row['service_type'];
                                $is_custom = $row['is_custom_brand'];


                                if($is_custom == '0' && $service_type == 'installation' && $product_type == 'solar'){ // IF NOT CUSTOM
                                   
                                    $command = "select * from package_installation_solar";
                                }
                 
                                else if($is_custom == '1' && $service_type == 'installation' && $product_type == 'solar'){ // IF CUSTOM
                                    $command = "select * from brands where brand = '" . $row['brand'] ."'";
                                }  

                                else if($is_custom == '0' && $service_type == 'installation' && $product_type == 'generator'){     // IF NOT CUSTOM
                                    $command = "select * from package_installation_generator";
                                }
                                else if($is_custom == '1' && $option2 && $service_type == 'installation' && $product_type == 'generator'){  // IF CUSTOM
                                    $command = "select * from brands where brand = '" . $row['brand'] ."'";
                                }
                                else if($service_type == 'tune-up' && $product_type == 'generator'){
                
                                    $command = "select * from package_tuneup_generator";
                                }
                                else if($service_type == 'maintenance' && $product_type == 'solar'){
                                
                                    $command = "select * from package_maintenance_solar";
                                }
                                else if($service_type == 'maintenance' && $product_type == 'generator'){
                                    $command = "select * from package_maintenance_generator";
                                }
                                else if($service_type == 'repair' && $product_type == 'solar'){
                                    $command = "select * from package_repair_solar";
                                }
                                else if($service_type == 'repair' && $product_type == 'generator'){
                                    $command = "select * from package_repair_generator";
                                }

                                $check_list = $command;
                                $result_list = mysqli_query($conn , $check_list);
                              
                                while($listing = mysqli_fetch_assoc($result_list)){

                                
                                ?>
                                <li class="list-group-item">
                                    <input class="form-check-input me-2" type="checkbox" id="task1">
                                    <label class="form-check-label" for="task1"><?= $listing['description'] .'|'. $listing['unit'] ?> </label>
                                </li>
                                <?php 
                                }
                                ?>
                            </ul>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
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