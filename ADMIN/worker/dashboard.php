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
        <!-- Leaflet CSS -->
 
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
        <!-- Leaflet Routing Machine CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <!-- Leaflet Routing Machine JS -->
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <style>
        #map {
            width: 100%;
            height: 400px;
            border-radius: 0.25rem;
        }
    </style>
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
                                        INNER JOIN user_info on user_info.user_id = service_booking.user_id 
                                        INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id 
                                        where worker_id = '$worker_id' AND booking_status != 'completed'
                                        ";
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
                                            // $custom = "SELECT * FROM brand WHERE name = '" . mysqli_real_escape_string($conn, $row['brand']) . "'";
                                            $command = "SELECT * FROM package_installation_solar";
                                        } elseif ($is_custom == '0' && $service_type == 'installation' && $product_type == 'generator') {
                                            $command = "SELECT * FROM package_installation_generator";
                                        } elseif ($is_custom == '1' && $service_type == 'installation' && $product_type == 'generator') {
                                            // $custom= "SELECT * FROM brand WHERE name = '" . mysqli_real_escape_string($conn, $row['brand']) . "'";
                                            $command = "SELECT * FROM package_installation_generator";
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
                                    
                                        <?php if (isset($result_list) && mysqli_num_rows($result_list) > 0): ?>
                                            <div class="row mt-4">
                                                    <!-- First Card: Where the item is from -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Item Origin</h5>
                                                                <p><strong>From:</strong> <span class="fw-bold text-primary">!NOTE: PUT LOCATION OF WAREHOUSE HERE</span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Second Card: Where it will deliver -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Delivery Location</h5>
                                                                <p><strong>To:</strong> <span class="fw-bold text-primary"><?= htmlspecialchars($row['pin_location']); ?></span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Third Card: Goal -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Goal</h5>
        
                                                                <ul class="list-unstyled">
                                                                    <li><span class="fw-bold text-success">Service:</span> <?= htmlspecialchars($row['service_type']); ?></li>
                                                                    <li><span class="fw-bold text-success">Product Type:</span> <?= htmlspecialchars($row['product_type']); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card mt-4">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Requirements Checklist</h5>
                                                        </div>
                                                        <div class="card-body">
                                                        <form action="function.php" method="POST">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th>Unit</th>
                                                                        <th>Quantity</th>
                                                                        <th>Check</th>
                                                                        <th>Damage Report</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- ITEM -->
                                                                     <?php 
                                                                     if($row['is_custom_brand'] == 1){

                                                                     
                                                                     ?>
                                                                    <tr>
                                                             
                                                                        <td><?= htmlspecialchars($row['brand']) ?></td>
                                                                        <td>Custom</td>
                                                                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                                                                        <td>
                                                                            <div class="text-danger">not available</div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex gap-2">
                                                                                <div class="text-danger">not available</div>         
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php 
                                                                    }
                                                                    else if($row['is_custom_brand'] == 0){
                                                                        ?> 
                                                                         <tr>
                                                                            
                                                                            <td><?= htmlspecialchars($row['brand']) ?></td>
                                                                            <td><?= $row['unit'] ?></td>
                                                                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                                                                            <td>
                                                                                <input class="form-check-input" type="checkbox" name="checked_<?= htmlspecialchars($row['brand']); ?>">
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex gap-2">
                                                                                    <!-- Input for specifying damage -->
                                                                                    <input type="hidden" name="brand" value="<?=$row['brand']?>">
                                                                                    <input type="text" class="form-control damage_input" name="damage_brand" id="damage_brand_<?=$row['brand']?>" placeholder="Specify damage (if any)">
                                                                                    <!-- Input for number of damages -->
                                                                                    <input type="number" class="form-control number_input" name="number_brand" id="number_brand_<?=$row['brand']?>" placeholder="No. of damages" disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <!-- Dynamic List Rows -->
                                                                    <?php while ($listing = mysqli_fetch_assoc($result_list)){ ?>
                                                                        <tr>
                                                                            <td><?= htmlspecialchars($listing['description']); ?></td>
                                                                            <td><?= htmlspecialchars($listing['unit']); ?></td>
                                                                            <td><?= htmlspecialchars($listing['quantity']); ?></td>
                                                                            <td>
                                                                                <input class="form-check-input task-checkbox" type="checkbox">
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex gap-2">
                                                                                    <!-- Set name as arrays by appending [] -->
                                                                                    <input type="hidden" name="description[]" value="<?= htmlspecialchars($listing['description']); ?>">
                                                                                    <input type="text" class="form-control damage_input" name="damage[]" 
                                                                                        id="damage_<?= htmlspecialchars($listing['description']); ?>" 
                                                                                        placeholder="Specify damage (if any)">
                                                                                    <input type="number" class="form-control number_input" name="number[]" 
                                                                                        id="number_<?= htmlspecialchars($listing['description']); ?>" 
                                                                                        placeholder="No. of damages" 
                                                                                        max="<?= htmlspecialchars($listing['quantity']); ?>" 
                                                                                        disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <input type="text" name="book_id" value="<?= $row['booking_id'] ?>">
                                                                </tbody>
                                                            </table>

                                                            <div class="d-grid mt-3">
                                                                <?php 
                                                                if($row['second_reference'] == null && $status == 'arrive'){
                                                                    ?> 
                                                                    <button type="button" class="btn btn-primary" id="submitBtn">Submit Checklist</button>
                                                                    <?php
                                                                }
                                                                else if(!$row['second_reference'] == null){
                                                                    ?>
                                                                    <input type="text" name="sql" value="<?= $command ?>">
                                                                    <input type="text" name="status" value="<?= $status ?>">
                                                                    <input type="text" name="brand" value="<?= $row['brand'] ?>">
                                                                    <input type="text" name="quantity" value="<?= $row['quantity'] ?>">
                                                                    <input type="text" name="booking_id" value="<?= $row['booking_id'] ?>">
                                                                    <button id="submitButton" type="submit" class="btn btn-primary" disabled>Submit Checklist</button>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?> 
                                                                    <button id="submitButton" type="submit" class="btn btn-primary" disabled>Submit Checklist</button>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <input type="text" name="working_id" value="<?= htmlspecialchars($row['working_id']); ?>">
                                                            <?php endif; ?>
                                                        </form>
                                    </ul>
                                    
                                    <?php } 
                                    else if($status == 'delivery'){
                                    
                                    
                                    
                                            $statusMap = [
                                                'pick_up' => 16, // 1/6 of 100%
                                                'delivery' => 33, // 2/6 of 100%
                                                'arrive' => 50, // 3/6 of 100%
                                                'ongoing_construction' => 66, // 4/6 of 100%
                                                'checking' => 83, // 5/6 of 100%
                                                'completed' => 100 // 6/6 of 100%
                                            ];
                                        
                                        
                                            $status = $row['status'];
                                            $progressPercentage = $statusMap[$status] ?? 0; // Default to 0 if status is not found
                                            
                                        ?> 
                                        
                                                 <div class="row mt-4">
                                                    <!-- First Card: Where the item is from -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Item Origin</h5>
                                                                <p><strong>From:</strong> <span class="fw-bold text-primary" id="start-location"><?= htmlspecialchars("Pangil, Majayjay, Laguna, Calabarzon, 4005, Philippines"); ?></span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Second Card: Where it will deliver -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Delivery Location</h5>
                                                                <p><strong>To:</strong> <span class="fw-bold text-primary" id="end-location"><?= htmlspecialchars($row['pin_location']); ?></span></p>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Third Card: Goal -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Goal</h5>
        
                                                                <ul class="list-unstyled">
                                                                    <li><span class="fw-bold text-success">Service:</span> <?= htmlspecialchars($row['service_type']); ?></li>
                                                                    <li><span class="fw-bold text-success">Product Type:</span> <?= htmlspecialchars($row['product_type']); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <div class="container mt-4">
                                                <div class="card shadow">
                                                    <div class="card-header bg-primary text-white">
                                                        <h5 class="mb-0">Delivery Routing</h5>
                                                    </div>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                Below is the route from the warehouse to the delivery location. The blue line indicates the primary route.
                                                            </p>
                                                            <!-- Map Container -->
                                                            <div id="map"></div>
                                                        </div>
                                                </div>
                                    
                                            
                                            <form action="function.php" method="POST">
                                                <div class="d-grid mt-3">
                                                    <button type="submit" class="btn btn-primary">Arrive</button>
                                                    <!-- hidden data for booking_id -->
                                                    <input type="hidden" name="booking_id" value="<?= htmlspecialchars($row['booking_id']); ?>">
                                                    <input type="hidden" name="working_id" value="<?= htmlspecialchars($row['working_id']); ?>">
                                                </div>
                                            </form>
                                        </div>

                                        
                                        <?php
                                               
                                    }
                                    else if($status == 'ongoing_construction'){
                                        ?> 
                                        <form action="function.php" method="POST">
                                        <?php if (isset($result_list) && mysqli_num_rows($result_list) > 0): ?>
                                            <div class="row mt-4">
                                                    <!-- First Card: Where the item is from -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Item Origin</h5>
                                                                <p><strong>From:</strong> <span class="fw-bold text-primary">!NOTE: PUT LOCATION OF WAREHOUSE HERE</span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Second Card: Where it will deliver -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Delivery Location</h5>
                                                                <p><strong>To:</strong> <span class="fw-bold text-primary"><?= htmlspecialchars($row['pin_location']); ?></span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Third Card: Goal -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Goal</h5>
        
                                                                <ul class="list-unstyled">
                                                                    <li><span class="fw-bold text-success">Service:</span> <?= htmlspecialchars($row['service_type']); ?></li>
                                                                    <li><span class="fw-bold text-success">Product Type:</span> <?= htmlspecialchars($row['product_type']); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php 
                                                $ongoing_booking = $row['booking_id'];
                                                $ongoing_checklist = "select * from ongoing_checklist where booking_id = $ongoing_booking";
                                                $ongoing_result = mysqli_query($conn , $ongoing_checklist);

                                                ?>
                                                <div class="card mt-4">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Check if the </h5>
                                                        </div>
                                                        <div class="card-body">
                                                        <form action="process_requirements.php" method="POST">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th>Unit</th>
                                                                        <th>Quantity</th>
                                                                        <th>is_done?</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- Dynamic List Rows -->
                                                                    <?php while ($ongoing_listing = mysqli_fetch_assoc($ongoing_result)): ?>
                                                                        <tr>
                                                                            <td><?= htmlspecialchars($ongoing_listing['description']); ?></td>
                                                                            <td><?= htmlspecialchars($ongoing_listing['unit']); ?></td>
                                                                            <td><?= htmlspecialchars($ongoing_listing['quantity']); ?></td>
                                                                            <td>
                                                                                <!-- Checkbox with disabled logic -->
                                                                                <input class="form-check-input" type="checkbox" 
                                                                                    name="tasks[<?= htmlspecialchars($ongoing_listing['description']); ?>][checked]" 
                                                                                    <?= $ongoing_listing['is_done'] == 1 ? 'checked disabled' : ''; ?>>
                                                                            </td>
                                                                            <td>
                                                                                <!-- Display status -->
                                                                                <?php if ($ongoing_listing['is_done'] == 0): ?>
                                                                                    <span class="badge bg-warning text-dark">Not done installing</span>
                                                                                <?php else: ?>
                                                                                    <span class="badge bg-success text-white">Done</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endwhile; ?>
                                                                </tbody>
                                                            </table>

                                                            <div class="d-grid mt-3">
                                                                <button type="submit" class="btn btn-primary">Submit Checklist</button>
                                                                <!-- Hidden data for booking_id and working_id -->
                                                                <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
                                                                <input type="hidden" name="working_id" value="<?= $working_id ?>">
                                                            </div>
                                                        </form>

                                                        </div>
                                                    </div>                                                                               
                                        <?php endif; ?>
                                        
                                    </form>
                                        
                                        <?php
                                    }
                                    else if($status == 'checking'){
                                        ?> 
                                        <form action="function.php" method="POST">
                                        <?php if (isset($result_list) && mysqli_num_rows($result_list) > 0): ?>
                                            <div class="row mt-4">
                                                    <!-- First Card: Where the item is from -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Item Origin</h5>
                                                                <p><strong>From:</strong> <span class="fw-bold text-primary">!NOTE: PUT LOCATION OF WAREHOUSE HERE</span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Second Card: Where it will deliver -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Delivery Location</h5>
                                                                <p><strong>To:</strong> <span class="fw-bold text-primary"><?= htmlspecialchars($row['pin_location']); ?></span></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Third Card: Goal -->
                                                    <div class="col-md-4">
                                                        <div class="card mb-3 h-100">
                                                            <div class="card-body d-flex flex-column justify-content-between">
                                                                <h5 class="card-title">Goal</h5>
        
                                                                <ul class="list-unstyled">
                                                                    <li><span class="fw-bold text-success">Service:</span> <?= htmlspecialchars($row['service_type']); ?></li>
                                                                    <li><span class="fw-bold text-success">Product Type:</span> <?= htmlspecialchars($row['product_type']); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php 
                                                $ongoing_booking = $row['booking_id'];
                                                $ongoing_checklist = "select * from ongoing_checklist where booking_id = $ongoing_booking";
                                                $ongoing_result = mysqli_query($conn , $ongoing_checklist);

                                                ?>
                                                <div class="card mt-4">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Check if the </h5>
                                                        </div>
                                                        <div class="card-body">
                                                        <form action="process_requirements.php" method="POST">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th>Unit</th>
                                                                        <th>Quantity</th>
                                                                        <th>is good?</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- Dynamic List Rows -->
                                                                    <?php while ($ongoing_listing = mysqli_fetch_assoc($ongoing_result)): ?>
                                                                        <tr>
                                                                            <td><?= htmlspecialchars($ongoing_listing['description']); ?></td>
                                                                            <td><?= htmlspecialchars($ongoing_listing['unit']); ?></td>
                                                                            <td><?= htmlspecialchars($ongoing_listing['quantity']); ?></td>
                                                                            <td>
                                                                                <!-- Checkbox with disabled logic -->
                                                                                <input class="form-check-input" type="checkbox" 
                                                                                    name="tasks[<?= htmlspecialchars($ongoing_listing['description']); ?>][checked]" 
                                                                                    <?= $ongoing_listing['is_good'] == 1 ? 'checked disabled' : ''; ?>>
                                                                            </td>
                                                                            <td>
                                                                                <!-- Display status -->
                                                                                <?php if ($ongoing_listing['is_good'] == 0): ?>
                                                                                    <span class="badge bg-warning text-dark">Not done checking</span>
                                                                                <?php else: ?>
                                                                                    <span class="badge bg-success text-white">Done</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endwhile; ?>
                                                                </tbody>
                                                            </table>

                                                            <div class="d-grid mt-3">
                                                            <?php
                                                            $sql_check_good = "SELECT COUNT(*) AS pending_count FROM ongoing_checklist WHERE is_good = 0 AND booking_id = $booking_id";
                                                            $check_good = mysqli_query($conn , $sql_check_good);
                                                            $checker = mysqli_fetch_assoc($check_good);
                                                            $pending_count = $checker['pending_count'];
                                                               if($pending_count == 0){    
                                                               
                                                                    if($row['third_reference'] == null && $status == 'checking'){
                                                                        ?> 
                                                                       <button type="button" class="btn btn-primary" id="submitBtn">Submit Checklist</button>
                                                                        <?php
                                                                    }
                                                                    else if(!$row['third_reference'] == null){
                                                                        
                                                                        ?>
                                                                        <input type="text" name="booking_id" value="<?= $row['booking_id'] ?>">
                                                                        <input type="text" name="client_id" value="<?= $row['client_id'] ?>">
                                                                        <input type="text" name="working_id" value="<?= $row['working_id'] ?>">
                                                                        <input type="text" name="worker_id" value="<?= $row['worker_id'] ?>">
                                                                         <button type="submit" class="btn btn-primary">SubmitBBB Checklist</button>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?> 
                                                                        
                                                                        <button type="submit" class="btn btn-primary">SubmitBBB Checklist</button>
                                                                        <?php
                                                                    }
                                                                  
                                                                  
                                                                }
                                                                else if($pending_count >= 1){
                                                                    ?> 
                                                                     <button type="submit" class="btn btn-primary">Save checklist</button>
                                                                    <?php
                                                                }     
                                                                
                                                                    ?>
                                                
                                                                <!-- Hidden data for booking_id and working_id -->
                                                                <input type="hidden" name="booking_id" value="<?= $booking_id ?>">
                                                                <input type="hidden" name="working_id" value="<?= $working_id ?>">
                                                            </div>
                                                        </form>

                                                        </div>
                                                    </div>                                                                               
                                        <?php endif; ?>
                                        
                                    </form>
                                        <?php
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

<script>
// Initialize the Leaflet map with the Philippines as the default view
const map = L.map('map').setView([13.41, 122.56], 6); // Coordinates for the Philippines, zoom level 6

// Add the OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Get the start and end addresses from the page (from PHP)
const startAddress = document.getElementById('start-location').textContent.trim();
const endAddress = document.getElementById('end-location').textContent.trim();

// Function to geocode the address and return latitude/longitude
function geocode(address) {
    return new Promise((resolve, reject) => {
        const geocodeUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;
        fetch(geocodeUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = data[0].lat;
                    const lon = data[0].lon;
                    resolve({ lat, lon });
                } else {
                    reject('Address not found');
                }
            })
            .catch(error => reject(error));
    });
}

// Geocode the start address and add marker
geocode(startAddress)
    .then(({ lat, lon }) => {
        // Add a marker for the start location
        const startMarker = L.marker([lat, lon]).addTo(map)
            .bindPopup(`<b>Start Location:</b><br>${startAddress}`)
            .openPopup();

        // Optionally, set the map's view to include both locations
        map.setView([lat, lon], 7);  // Adjust zoom level for better fit

        // Store the start location lat/lon for routing
        window.startLatLon = [lat, lon];
    })
    .catch(error => {
        console.error(error);
        alert('Failed to geocode start address');
    });

// Geocode the end address (delivery location) and add marker

geocode(endAddress)
    .then(({ lat, lon }) => {
        // Add a marker for the end location (delivery location)
        const endMarker = L.marker([lat, lon]).addTo(map)
            .bindPopup(`<b>Delivery Location:</b><br>${endAddress}`)
            .openPopup();

        // Optionally, set the map's view to include both locations
        map.setView([lat, lon], 7);  // Adjust zoom level for better fit

        // Store the end location lat/lon for routing
        window.endLatLon = [lat, lon];

        // After both start and end locations are geocoded, create the route
        if (window.startLatLon && window.endLatLon) {
            // Create the route between the start and end locations
            L.Routing.control({
                waypoints: [
                    L.latLng(window.startLatLon),
                    L.latLng(window.endLatLon)
                ],
                routeWhileDragging: true
            }).addTo(map);
        }
    })
    .catch(error => {
        console.error(error);
        alert('Failed to geocode end address');
    });
</script>



<script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Waiting for client payment",
        footer: 'Please contact client'
        });
    });
</script>

<!-- this javascript handle if the pick up is not all check -->
<script>
    // Function to enable or disable the submit button
    function updateSubmitButtonState() {
        // Get all checkboxes with the 'task-checkbox' class
        const checkboxes = document.querySelectorAll('.task-checkbox');
        // Check if all checkboxes are checked
        const areAllChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

        // Enable the button if all checkboxes are checked, otherwise disable it
        document.getElementById('submitButton').disabled = !areAllChecked;
    }

    // Add event listeners to all checkboxes
    document.querySelectorAll('.task-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSubmitButtonState);
    });

    // Initial check on page load
    updateSubmitButtonState();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Handle all dynamic and static damage/number input pairs
    const form = document.querySelector('form'); // Form element

    const initializeInputBehavior = (damageInput, numberInput) => {
        damageInput.addEventListener("input", function () {
            // Enable or disable number input based on damage input value
            if (damageInput.value.trim() !== "") {
                numberInput.disabled = false;
                numberInput.required = true;
            } else {
                numberInput.disabled = true;
                numberInput.required = false;
                numberInput.value = ""; // Clear number input when disabled
            }
        });
    };

    // Apply behavior to dynamic rows
    const damageInputs = document.querySelectorAll(".damage_input");
    const numberInputs = document.querySelectorAll(".number_input");

    damageInputs.forEach((damageInput, index) => {
        const numberInput = numberInputs[index];
        initializeInputBehavior(damageInput, numberInput);
    });

    // Handle the first brand's input explicitly
    const firstBrandDamageInput = document.getElementById("damage_brand_<?=$row['brand']?>");
    const firstBrandNumberInput = document.getElementById("number_brand_<?=$row['brand']?>");
    if (firstBrandDamageInput && firstBrandNumberInput) {
        initializeInputBehavior(firstBrandDamageInput, firstBrandNumberInput);
    }

    // Ensure all inputs are enabled before form submission
    if (form) {
        form.addEventListener("submit", function () {
            const disabledInputs = form.querySelectorAll("input:disabled");
            disabledInputs.forEach((input) => {
                input.disabled = false; // Enable temporarily for submission
            });
        });
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const damageInputs = document.querySelectorAll('.damage_input'); // All damage input fields
    const numberInputs = document.querySelectorAll('.number_input'); // All number input fields

    // Handle enabling/disabling quantity fields based on damage input
    damageInputs.forEach(function (input, index) {
        input.addEventListener('input', function () {
            if (input.value.trim() !== "") {
                numberInputs[index].disabled = false; // Enable the quantity input
                numberInputs[index].required = true; // Make it required
            } else {
                numberInputs[index].disabled = true; // Disable the quantity input
                numberInputs[index].required = false; // Remove required
                numberInputs[index].value = ""; // Clear value when disabled
            }
        });
    });

    // Add event listener to enforce the max limit on number inputs
    numberInputs.forEach(function (input) {
        input.addEventListener('input', function () {
            const maxValue = parseInt(input.getAttribute('max'), 10); // Get the max value
            if (parseInt(input.value, 10) > maxValue) {
                // Display SweetAlert2 message
                Swal.fire({
                    title: 'Error!',
                    text: `The maximum allowed quantity is ${maxValue}.`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                input.value = maxValue; // Reset to max value
            }
        });
    });
});


</script>