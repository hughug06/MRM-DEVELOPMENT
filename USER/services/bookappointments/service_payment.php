<?php
//get the data from service.php after the book trigger

require_once '../../../Database/database.php';
require_once '../../../ADMIN/authetincation.php';


if (isset($_POST['installation_submit'])) {
 
    $totalCost = 0;
    //4 HIDDEN DATA
        $availability_id = $_POST['availability_id'];
        $date = $_POST['date'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        //user input
        $full_name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $pin_location = $_POST['location'];
        $service_type = $_POST['serviceType']; 
        $product_type = $_POST['productType'];   
        $quantity = $_POST['quantity'];  

        //NOT CUSTOM
        $option1 = isset($_POST['serviceSelect1']) ? $_POST['serviceSelect1'] : false;
        //CUSTOM INPUT
        $option2 = isset($_POST['serviceSelect2']) ? $_POST['serviceSelect2'] : false;

        


?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    
    include_once(__DIR__. '/../../../partials/head.php');
    ?>
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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
   
</head>

<body>

    <div class="page">

        <!-- app-header -->
        <?php include_once(__DIR__. '/../../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../../partials/sidebar.php')?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">
                <?php 
                if($option1 && $service_type == 'installation' && $product_type == 'solar'){ // IF THE CONDITION IS INSTALLATION , SOLAR 
                    $sql = "select * from products where ProductName = '$option1'";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    $stocks = $row['stock'];  // CURRENT STOCKS OF SELECTED ITEM
                    $amount = $row['max_price'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                    
    
                    if($stocks < $quantity){
                        echo "Product is out of stock"; // SHOW FALSE
                        exit();
                    }
    
                    // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                  
                    $service_picing = "select * from service_pricing"; 
                    $package_installation_solar = "select * from package_installation_solar";
    
                    $result_solar = mysqli_query($conn , $package_installation_solar);
                    $result_pricing = mysqli_query($conn , $service_picing);
    
                    while($row = mysqli_fetch_assoc($result_solar)){
                        // Make sure to reset $result_pricing before looping through it again
                        mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
    
                        while($row2 = mysqli_fetch_assoc($result_pricing)){
                            if($row2['quantity'] < $row['quantity']){
                                echo "not on stock<br>";    // FALSE 
                                exit();
                            }
                            else if($row2['quantity'] > $row['quantity']){
                                echo "on stock<br>";    // PROCEED
                            }
                        }
                    }
    
                    
                    mysqli_data_seek($result_solar, 0); // Reset the $result_solar pointer to the start for the next loop
                    while($resultItem = mysqli_fetch_assoc($result_solar)){ 
                        $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                    }
                    // Get the total amount of package_installation_solar + product itself and 10% mark-up
                    $quotation = $amount + $totalCost;
                    $mark_up = $quotation * .1;
                    $final_value = $quotation + $mark_up;
                    echo $final_value;
                    ?> 
                    <form action="">
                        
                    </form>
                    
                    
                    <?php
                    
                    
                    
    
                
            }


            // else if($option1 && $service_type == 'installation' && $product_type == 'generator'){ // IF THE CONDITION IS INSTALLATION , GENERATOR 
    
            // }
            // else if($option2){
            //     echo $option2;
            // }
        
        exit();
    }
                ?>
            </div>
        </div>
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../../partials/footer.php') ?>
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

    <!-- Custom JS -->
    <script src="../../../assets/js/custom.js"></script>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




