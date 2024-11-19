<?php 
session_start();
require_once '../../Database/database.php';
$worker_id = $_SESSION['user_id'];
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
                            <!-- Checklist -->
                            <ul class="list-group mb-4">
                                <?php 
                                $worker_id = $_SESSION['user_id'];

                                // Query to get data for the current worker
                                $sql = "SELECT * FROM worker_ongoing
                                        INNER JOIN service_booking ON service_booking.booking_id = worker_ongoing.booking_id
                                        WHERE worker_id = $worker_id";
                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $product_type = $row['product_type'];
                                    $service_type = $row['service_type'];
                                    $is_custom = $row['is_custom_brand'];
                                    $status = $row['status'];
                                    $booking_id = $row['booking_id'];
                                    $working_id = $row['working_id'];
                                    // Determine the command based on conditions
                                    if ($is_custom == '0' && $service_type == 'installation' && $product_type == 'solar') {
                                        $command = "SELECT * FROM package_installation_solar";
                                    } elseif ($is_custom == '1' && $service_type == 'installation' && $product_type == 'solar') {
                                        $command = "SELECT * FROM brands WHERE brand = '" . mysqli_real_escape_string($conn, $row['brand']) . "'";
                                    } elseif ($is_custom == '0' && $service_type == 'installation' && $product_type == 'generator') {
                                        $command = "SELECT * FROM package_installation_generator";
                                    } elseif ($is_custom == '1' && $service_type == 'installation' && $product_type == 'generator') {
                                        $command = "SELECT * FROM brands WHERE brand = '" . mysqli_real_escape_string($conn, $row['brand']) . "'";
                                    } elseif ($service_type == 'tune-up' && $product_type == 'generator') {
                                        $command = "SELECT * FROM package_tuneup_generator";
                                    } elseif ($service_type == 'maintenance' && $product_type == 'solar') {
                                        $command = "SELECT * FROM package_maintenance_solar";
                                    } elseif ($service_type == 'maintenance' && $product_type == 'generator') {
                                        $command = "SELECT * FROM package_maintenance_generator";
                                    } elseif ($service_type == 'repair' && $product_type == 'solar') {
                                        $command = "SELECT * FROM package_repair_solar";
                                    } elseif ($service_type == 'repair' && $product_type == 'generator') {
                                        $command = "SELECT * FROM package_repair_generator";
                                    } else {
                                        echo "<h3>No matching service type or product type found.</h3>";
                                        $command = null;
                                    }

                                    if ($command) {
                                        $result_list = mysqli_query($conn, $command);
                                    }

                                    // Display status header
                                    switch ($status) {
                                        case 'pick_up':
                                            echo "<h3>PICK UP ( CHECKLIST )</h3>";
                                            break;
                                        case 'delivery':
                                            echo "<h3>DELIVERY</h3>";
                                            break;
                                        case 'arrive':
                                            echo "<h3>ARRIVE</h3> ( CHECKLIST )";
                                            break;
                                        case 'ongoing_construction':
                                            echo "<h3>ONGOING CONSTRUCTION</h3>";
                                            break;
                                        case 'checking':
                                            echo "<h3>CHECKING</h3>";
                                            break;
                                        case 'completed':
                                            echo "<h3>COMPLETED</h3>";
                                            break;
                                        default:
                                            echo "<h3>STATUS UNKNOWN</h3>";
                                            break;
                                    }
                                if($status == 'pick_up' || $status == 'arrive'){
                                ?>
                                <form action="function.php" method="POST">
                                    <?php if (isset($result_list) && mysqli_num_rows($result_list) > 0): ?>
                                        <input class="form-check-input me-2" type="checkbox">
                                        <label class="form-check-label">
                                                    <?=htmlspecialchars($row['brand']) ?>
                                                </label>
                                        <?php while ($listing = mysqli_fetch_assoc($result_list)): ?>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-2" type="checkbox" name="tasks[]">
                                                <label class="form-check-label">
                                                    <?= htmlspecialchars($listing['description']) . ' | ' . htmlspecialchars($listing['unit']) ?>
                                                </label>
                                            </li>
                                        <?php endwhile; ?>
                                        <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <!-- hidden data for booking_id -->
                                        <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
                                        <input type="hidden" name="working_id" value="<?= $working_id ?>">
                                    </div>
                                            
                                    <?php else: ?>
                                        <li class="list-group-item">No items found.</li>
                                    <?php endif; ?>
                                    
                                </form>
                                </ul>
                                
                                <?php } 
                                else if($status == 'delivery'){
                                    $delivery = "SELECT * FROM worker_ongoing
                                    INNER JOIN service_booking ON service_booking.booking_id = worker_ongoing.booking_id
                                    INNER JOIN user_info on user_info.user_id = service_booking.user_id 
                                    INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id   
                                    where worker_id = '$worker_id' and working_id = '$working_id'
                                    ";
                                    $delivery_result = mysqli_query($conn , $delivery);
                                    if(mysqli_num_rows($delivery_result) > 0){
                                        $statusMap = [
                                            'pick_up' => 16, // 1/6 of 100%
                                            'delivery' => 33, // 2/6 of 100%
                                            'arrive' => 50, // 3/6 of 100%
                                            'ongoing_construction' => 66, // 4/6 of 100%
                                            'checking' => 83, // 5/6 of 100%
                                            'completed' => 100 // 6/6 of 100%
                                        ];
                                       
                                        $result = mysqli_fetch_assoc($delivery_result);
                                        $status = $result['status'];
                                        $progressPercentage = $statusMap[$status] ?? 0; // Default to 0 if status is not found
                                        
                                    ?> 
                                    <div class="container mt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Client Information</h5>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p><strong>Client Name:</strong> <?= htmlspecialchars($result['first_name'] . " " . $result['last_name']); ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Pin Location:</strong> <?= htmlspecialchars($result['pin_location']); ?></p>
                                                        <p><strong>Address:</strong> <?= htmlspecialchars($result['address']); ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p><strong>Payment Status:</strong> <span class="badge bg-success">For second payment</span></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Project Progress:</strong></p>
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: <?= $progressPercentage; ?>%;"
                                                                aria-valuenow="<?= $progressPercentage; ?>"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <?= $progressPercentage; ?>%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Status:</strong> <span class="badge bg-warning text-dark">Delivery</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <form action="function.php" method="POST">
                                        <div class="d-grid mt-3">
                                            <button type="submit" class="btn btn-primary">Arrive</button>
                                            <!-- hidden data for booking_id -->
                                            <input type="hidden" name="booking_id" value="<?= htmlspecialchars($result['booking_id']); ?>">
                                            <input type="hidden" name="working_id" value="<?= htmlspecialchars($result['working_id']); ?>">
                                        </div>
                                        </form>
                                    </div>

                                    
                                    <?php
                                         
                                    }
                                }
                            }
                                
                                else { ?>
                                    <h3>No work for now</h3>
                                <?php } ?>
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

