<?php
//get the data from service.php after the book trigger
session_start();
if (isset($_GET['availability_id'], $_GET['date'], $_GET['start_time'], $_GET['end_time'])) {
    $_SESSION['availability_id'] = $_GET['availability_id'];
    $_SESSION['date'] = $_GET['date'];
    $_SESSION['start_time'] = $_GET['start_time'];
    $_SESSION['end_time'] = $_GET['end_time'];

    // Now you have the availability_id, date, start_time, and end_time to process further
   // echo "Booking confirmed for availability ID: $availability_id on $date from $start_time to $end_time.";
    
} 




?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    
    include_once(__DIR__. '/../partials/head.php');
    ?>
    <title> Inquries </title>
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
             <?php include_once(__DIR__. '/../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                <form action="book_appointment.php" method="POST" id="serviceForm">
                    <h1 class="text-start pb-4 d-flex justify-content-center text-warning">SERVICES</h1>
                    <?php

                    require_once '../../Database/database.php';
                    
                    $user = $_SESSION['user_id'];
                    $sql = "select * from user_info where user_id = '$user'";
                    $result = mysqli_query($conn, $sql);
                   
                    if(mysqli_num_rows($result))
                    {
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; 
                        
                            
                    ?>
                    <div class="form-group text-start mb-3">
                        <label for="s_fName" class="text-muted">Full Name</label>
                        <input class="form-control" type="text" name="name" id="s_fName" disabled placeholder="" value="<?= $name ?>">
                    </div>

                    <?php 
                    }
                    ?>

                    <div class="form-group text-start mb-3">
                        <label for="s_Brand" class="text-muted">Brand</label>
                        <input class="form-control" type="text" name="brand" id="s_Brand" placeholder="">
                    </div>
                    
                    <div class="form-group text-start mb-3">
                        <label for="s_Product" class="text-muted">Product</label>
                        <select class="form-control" name="product" id="s_Product">
                            <option value="solar">Solar</option>
                            <option value="generator">Generator</option>
                        </select>
                    </div>
                    
                    <div class="form-group text-start mb-3">
                        <label for="powerLabel" class="text-muted" id="powerLabel">KVA</label>
                        <input class="form-control" type="text" name="power" id="powerInput" placeholder="">
                    </div>
                    
                    <div class="form-group text-start mb-3">
                        <label for="su_Email" class="text-muted">Running Hours Unit</label>
                        <input class="form-control" type="text" name="running_hours" id="su_Email" placeholder="">
                    </div>
                    
                    <div class="form-group text-start mb-3">
                        <label for="s_Type" class="text-muted">Service Type</label>
                        <select class="form-control" name="service_type" id="s_Type">
                            <option value="maintenance">Maintenance</option>
                            <option value="repair">Repair</option>
                            <option value="installation">Installation</option>
                            <option value="tune_up">Tune-up</option>
                        </select>
                    </div>
            <div class="d-flex flex-column align-items-stretch flex-grow mt-5">
                <button type="submit" name="book" class="btn btn-warning text-white py-2">Book</button>
            </div>
        </form>
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../partials/footer.php') ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Event listener for product selection
    $('#s_Product').on('change', function() {
        var product = $(this).val(); // Get the selected product
        
        // Change the label for KVA/Watts
        if (product === 'generator') {
            $('#powerLabel').text('KVA');  // Change label to KVA for Generator
            $('#s_Type option[value="tune_up"]').prop('disabled', false);  // Enable Tune-up
        } else if (product === 'solar') {
            $('#powerLabel').text('Watts');  // Change label to Watts for Solar
            $('#s_Type option[value="tune_up"]').prop('disabled', true);  // Disable Tune-up
        }
    });
});
</script>