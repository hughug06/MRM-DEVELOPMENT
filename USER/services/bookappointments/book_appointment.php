<?php
//get the data from service.php after the book trigger

require_once '../../../Database/database.php';
require_once '../../../ADMIN/authetincation.php';
if (isset($_POST['submit'])) {
   
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

} 



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
            
            <?php if ($service_type == 'tune-up') : ?>
                <form method="post" action="">
                    <h3>Tune-Up Form</h3>
                    <div class="mb-3">
                        <label for="tuneUpDetails" class="form-label">Details</label>
                        <input type="text" id="tuneUpDetails" class="form-control" name="tuneUpDetails" placeholder="Enter tune-up details">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Tune-Up</button>
                </form>

                 <!-- Form for Repair -->
            <?php elseif($service_type == 'repair') : ?>
                <form method="post" action="">
                    <h3>Repair Form</h3>
                    <div class="mb-3">
                        <label for="repairDetails" class="form-label">Details</label>
                        <input type="text" id="repairDetails" class="form-control" name="repairDetails" placeholder="Enter repair details">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Repair</button>
                </form>
            
            <!-- Form for Maintenance -->
            <?php elseif ($service_type == 'maintenance') : ?>
                <form method="post" action="">
                    <h3>Maintenance Form</h3>
                    <div class="mb-3">
                        <label for="maintenanceDetails" class="form-label">Details</label>
                        <input type="text" id="maintenanceDetails" class="form-control" name="maintenanceDetails" placeholder="Enter maintenance details">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Maintenance</button>
                </form>
            
            <!-- Form for Installation -->
            <?php elseif ($service_type == 'installation' && $product_type == 'solar') : ?>
                <div class="card shadow-lg border-0">
                    
                    <div class="card-body">
                        <form method="post" action="service_payment.php">
                            <div class="mb-3">
                                <label for="serviceSelect" class="form-label">Select Product</label>
                                <div class="input-group">
                                    <select name="serviceSelect1" id="serviceSelect" class="form-select">
                                        <option value="">-- Select a Product --</option>
                                        <?php 
                                        $query = "SELECT * FROM products WHERE availability = 1";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <option value="<?= htmlspecialchars($row['ProductName']) ?>"> <?="Product name:". htmlspecialchars($row['ProductName']) . "| STOCKS:". htmlspecialchars($row['stock'])  ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <div class="input-group-text">
                                <label for="">Custom Item</label>
                                <input type="checkbox" id="customCheck" class="form-check-input" aria-label="Custom Input Toggle" onchange="toggleCustomInput(this)">
                            </div>
                                </div>
                            </div>

                            <!-- Custom input field, initially hidden -->
                            <div class="mb-3 d-none" id="customInputContainer">
                                <h1>AVAILABLE PRODUCTS</h1>
                                <select name="serviceSelect2" id="serviceSelect" class="form-select">
                                        <option value="">-- Select a Product --</option>
                                        <?php 
                                        $query = "SELECT * FROM brand";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <option value="<?= htmlspecialchars($row['name']) ?>"><?= htmlspecialchars($row['name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                            </div>
                            <label for="">QUANTITY</label>
                            <input type="number" name="quantity">
                            <button type="submit" class="btn btn-primary" name="installation_submit">Proceed to payment</button>
                            <!-- Hidden Inputs for Data -->
                            <input type="hidden" name="availability_id" value="<?= htmlspecialchars($availability_id) ?>">
                            <input type="hidden" name="date" value="<?= htmlspecialchars($date) ?>">
                            <input type="hidden" name="start_time" value="<?= htmlspecialchars($start_time) ?>">
                            <input type="hidden" name="end_time" value="<?= htmlspecialchars($end_time) ?>">
                            
                            <!-- User Input Fields -->
                            <input type="hidden" name="name" value="<?= htmlspecialchars($full_name) ?>">
                            <input type="hidden" name="address" value="<?= htmlspecialchars($address) ?>">
                            <input type="hidden" name="city" value="<?= htmlspecialchars($city) ?>">
                            <input type="hidden" name="province" value="<?= htmlspecialchars($province) ?>">
                            <input type="hidden" name="location" value="<?= htmlspecialchars($pin_location) ?>">
                            <input type="hidden" name="serviceType" value="<?= htmlspecialchars($service_type) ?>">
                            <input type="hidden" name="productType" value="<?= htmlspecialchars($product_type) ?>">
                        </form>
                    </div>
                </div>
                
                 <!-- Form for Maintenance -->
            <?php elseif ($service_type == 'installation' && $product_type == 'generator') : ?>
                <form method="post" action="">
                    <h3>Installation Form for generator</h3>
                    <div class="mb-3">
                        <label for="maintenanceDetails" class="form-label">Details</label>
                        <input type="text" id="maintenanceDetails" class="form-control" name="maintenanceDetails" placeholder="Enter maintenance details">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Maintenance</button>
                </form>
            <?php endif; ?>

             

            </div>
            <!--APP-CONTENT CLOSE-->
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


<script>
        // jQuery to handle checkbox behavior
        $(document).ready(function() {
            $('#customCheck').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#serviceSelect').prop('disabled', true);
                    $('#customInputContainer').removeClass('d-none');
                } else {
                    $('#serviceSelect').prop('disabled', false);
                    $('#customInputContainer').addClass('d-none');
                }
            });
        });
    </script>



