<?php
//get the data from service.php after the book trigger
session_start();
require_once '../../Database/database.php';
if (isset($_POST['product'])) {
   
    $selectedProducts = $_POST['selected_products'];
    $start_time =  $_SESSION['start_time'];
    $end_time = $_SESSION['end_time'];
    $date =$_SESSION['date'];
    $id = $_SESSION['chaintercomavailid'];
    $meeting_url = "https://meet.jit.si/meeting_".$id;
    $products = []; 
    foreach ($selectedProducts as $productId) {
        $select = "select * from products where ProductID = '$productId'";
        $select_result = mysqli_query($conn , $select);
        $product_result = mysqli_fetch_assoc($select_result);
        $products[] = $product_result['product']; // Append each product ID to the $products array
    }
    print_r($products);
    exit();
    $sql = "insert into chaintercom_appointment(meeting_url,date)
            VALUES('$meeting_url' , '$date') ";
    $result = mysqli_query($conn , $sql);
    

    //unset all session
    unset($_SESSION['start_time']);
    unset($_SESSION['end_time']);
    unset($_SESSION['date']);
    unset($_SESSION['chaintercomavailid']);
} 

?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    
    include_once(__DIR__. '/../../partials/head.php');
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

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>


    <div class="page">

             <!-- app-header -->
             <?php include_once(__DIR__. '/../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                
            <div class="container mt-5">
    
    <!-- Success Message Card -->
    <div class="card p-4 text-center mt-4 shadow-lg border-success">
        <div class="alert alert-success" role="alert">
            Your appointment has been approved!
        </div>
<!-- Header Row with Modern Design -->
<div class="row">
        <div class="col text-center">
            <h2 class="display-6 fw-bold text-primary">Chaintercom Inquire Details</h2>
            <p class="lead text-muted">Find the latest product details and specifications below</p>
        </div>
    </div>
    <?php 
    
    foreach ($selectedProducts as $productId) {
        $select = "select * from products where ProductID = '$productId'";
        $select_result = mysqli_query($conn , $select);
        $row = mysqli_fetch_assoc($select_result);
             // Further processing can be done here
   
    ?>
    <!-- Product and Specs Row with Modern Card Design -->
    <div class="row mt-4">
        <div class="col">
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="text-secondary">Products</h5>
                <p class="fw-light"><?= $row['ProductName']; ?></p> <!-- Replace with actual product text -->
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="text-secondary">Specs</h5>
                <p class="fw-light"><?= $row['Specification']; ?></p> <!-- Replace with actual specs text -->
            </div>
        </div>
    </div>
    <?php 
     }
    ?>
        <div class="mt-4">
            <!-- Back to Chaintercom Button -->
            <a href="chaintercom_landing.php" class="btn btn-primary btn-lg me-2">Back to Chaintercom</a>

            <!-- Check Appointment Button -->
            <a href="check-appointment.php" class="btn btn-success btn-lg">Check Appointment</a>
        </div>
    </div>
</div>



   
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
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

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <!-- <script src="../../assets/js/custom.js"></script> -->

</body>

</html>
