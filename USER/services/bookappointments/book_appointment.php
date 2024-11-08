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
    
} 

if (isset($_POST['installation_submit'])) {
    // Check for custom input or select value
    if (!empty($_POST['customInput'])) {
        $selectedService = $_POST['customInput']; // Get custom input value if present
    } elseif (!empty($_POST['serviceSelect'])) {
        $selectedService = $_POST['serviceSelect']; // Get selected service value
    } else {
        $selectedService = 'No service selected';
    }

    echo "Selected Service: " . htmlspecialchars($selectedService);
    exit();
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
            <?php elseif ($service_type == 'installation') : ?>
                <form method="post" action="book_appointment.php">
                    <div class="mb-3">
                        <label for="serviceSelect" class="form-label">Select Product</label>
                        <div class="input-group">
                            <select name="serviceSelect" id="serviceSelect" class="form-select">
                                <option value="">-- Select a Product --</option>
                                <?php 
                                $query = "SELECT * FROM products WHERE availability = 1";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <option value="<?= $row['ProductName'] ?>"><?= $row['ProductName'] ?></option>
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
                        <label for="customInput" class="form-label">Custom Input</label>
                        <input type="text" id="customInput" name="customInput" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary" name="installation_submit">Submit</button>
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



