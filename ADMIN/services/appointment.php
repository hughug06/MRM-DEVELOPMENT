<?php 
   
    require_once '../../Database/database.php';
    require_once '../authetincation.php';
    $count_pending = 0;
    $count_waiting = 0;
    $count_checking = 0;
    $count_approved = 0;
    $count_canceled = 0;

    // // Pending
    // $pending_count = "SELECT COUNT(*) AS total_pending FROM service_booking WHERE status = 'Pending'";
    // $pending_result = mysqli_query($conn , $pending_count);
    // $row_count_pending = mysqli_fetch_assoc($pending_result);
    // $count_pending = $row_count_pending['total_pending'];

    // // waiting for payment
    // $waiting_count = "SELECT COUNT(*) AS total_waiting FROM service_booking WHERE status = 'Waiting'";
    // $waiting_result = mysqli_query($conn, $waiting_count);  
    // $row_count_waiting = mysqli_fetch_assoc($waiting_result);  // Fetch the result as an associative array
    // $count_waiting = $row_count_waiting['total_waiting']; 

    // //payment checking
    // $checking_count = "SELECT COUNT(*) AS total_checking FROM service_payment where payment_status = 'confirmed'";
    // $checking_result = mysqli_query($conn, $checking_count);  
    // $row_count_checking = mysqli_fetch_assoc($checking_result);  // Fetch the result as an associative array
    // $count_checking = $row_count_checking['total_checking']; 

 
    
    //  // Cancel
    //  $canceled_count = "SELECT COUNT(*) AS total_canceled FROM service_booking WHERE status = 'Canceled'";
    //  $canceled_result = mysqli_query($conn , $canceled_count);
    //  $row_count_canceled = mysqli_fetch_assoc($canceled_result);
    //  $count_canceled = $row_count_canceled['total_canceled'];
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'../../../partials/head.php')?>
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

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once( __DIR__.'../../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__.'../../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
               
        
                <div class="container-fluid">
                    
                    <div class="row square row-sm">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu ">

                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#payment_checking">Payment Checking
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_checking ?></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#on_going">On going
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#completed">Completed
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#cancel">Cancel
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_canceled ?></span>
                                    </a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                    
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="payment_checking">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <div class="row">
                                                        <?php 
                                                                                                                                                                        
                                                        $select = "SELECT * FROM service_booking     
                                                                    INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id   
                                                                    INNER JOIN user_info on user_info.user_id = service_booking.user_id    
                                                                    INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id                                
                                                                    WHERE payment_status ='advance_payment' AND booking_status = 'pending'";
                                                        $result = mysqli_query($conn , $select);
                                                        $row = mysqli_fetch_assoc($result);

                                                        
                                                        if (mysqli_num_rows($result) > 0) {
                                                            foreach ($result as $resultItem) { 
                                                        ?>
                                                            <div class="col-md-4">
                                                                <div class="card mb-4">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title"><?= htmlspecialchars($row['first_name']) .' '.htmlspecialchars($row['last_name']) ; ?></h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- Service and Product Info -->
                                                                        <h6><strong>Service Type:</strong> <?= htmlspecialchars($resultItem['service_type']); ?></h6>
                                                                        <h6><strong>Product Type:</strong> <?= htmlspecialchars($resultItem['product_type']); ?></h6>
                                                                        <h6><strong>Brand / Power / Running Hours:</strong> <?= htmlspecialchars($resultItem['brand'] . ' / ' . $resultItem['KVA'] . ' / ' . $resultItem['running_hours']); ?></h6>

                                                                        <!-- Schedule Info -->
                                                                        <h6><strong>Schedule:</strong> <?= htmlspecialchars($resultItem['date'] . ' / ' . $resultItem['start_time'] . ' - ' . $resultItem['end_time']); ?></h6>

                                                                        <!-- Payment Info -->
                                                                        <h6><strong>Payment Method:</strong> <?= htmlspecialchars($resultItem['payment_method']); ?></h6>
                                                                        <h6><strong>Bank Name:</strong> <?= htmlspecialchars($resultItem['bank_name']); ?></h6>
                                                                        <h6><strong>Initial Reference Number:</strong> <?= htmlspecialchars($resultItem['first_reference']); ?></h6>
                                                                        <h6><strong>Initial amount:</strong> <?= htmlspecialchars($resultItem['first_payment']); ?></h6>
                                                                        <h6><strong>Payment Date:</strong> <?= htmlspecialchars($resultItem['payment_date']); ?></h6>

                                                                        <!-- Payment and Booking Status -->
                                                                        <h6><strong>Payment Status:</strong> <?= htmlspecialchars($resultItem['payment_status']); ?></h6>
                                                                        <h6><strong>Booking Status:</strong> <?= htmlspecialchars($resultItem['booking_status']); ?></h6>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                    <button type="button" class="btn btn-success assign" 
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#assign_worker"
                                                                            booking-id="<?= $resultItem['booking_id'];?>"
                                                                            admin-id="<?= $_SESSION['admin_id']?>"
                                                                            user-id="<?= $resultItem['user_id'];?>"
                                                                            availability-id="<?=$resultItem['availability_id']; ?>">
                                                                        Assign Worker
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#reject_user"
                                                                            data-reject-booking-id="<?= $resultItem['booking_id']; ?>"     
                                                                            data-user-id="<?= $resultItem['user_id'];?>"      
                                                                            time-availability-id="<?= $resultItem['availability_id'];?>"                                                                 >
                                                                        Reject User
                                                                    </button>
                                        
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
                    
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="on_going">
                                                <div class="row row-sm">
                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                        <div class="card custom-card">
                                                            <div class="card-header border-bottom-0">
                                                                <div>
                                                                    <div class="card-title">On going projects</div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body pt-3">
                                                                <div class="table-responsive tasks">
                                                                    <table class="table card-table table-vcenter text-nowrap border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-lg-20p">#</th>
                                                                                <th class="wd-lg-20p">CLIENT NAME</th>
                                                                                <th class="wd-lg-20p">LOCATION</th>
                                                                                <th class="wd-lg-20p">PAYMENT STATUS</th>
                                                                                <th class="wd-lg-20p">AMOUNT TO PAY</th>
                                                                                <th class="wd-lg-20p">PROJECT PROGRESS</th>
                                                                                <th class="wd-lg-20p">STATUS</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                $ongoing = "SELECT * FROM service_booking
                                                                                            INNER JOIN worker_ongoing ON service_booking.booking_id = worker_ongoing.booking_id
                                                                                            INNER JOIN user_info on user_info.user_id = service_booking.user_id 
                                                                                            INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id  
                                                                                            where booking_status != 'completed'   
                                                                                            ";
                                                                                $result_ongoing = mysqli_query($conn, $ongoing);
                                                                                if (mysqli_num_rows($result_ongoing) > 0) {
                                                                                    // Define progress mapping for each enum status
                                                                                    $statusMap = [
                                                                                        'pick_up' => 16, // 1/6 of 100%
                                                                                        'delivery' => 33, // 2/6 of 100%
                                                                                        'arrive' => 50, // 3/6 of 100%
                                                                                        'ongoing_construction' => 66, // 4/6 of 100%
                                                                                        'checking' => 83, // 5/6 of 100%
                                                                                        'completed' => 100 // 6/6 of 100%
                                                                                    ];

                                                                                    while ($row = mysqli_fetch_assoc($result_ongoing)) {
                                                                                        // Get the current progress percentage based on the status
                                                                                        $status = $row['status'];
                                                                                        $progressPercentage = $statusMap[$status] ?? 0; // Default to 0 if status is not found
                                                                            ?>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td><?= htmlspecialchars($row['first_name']) .' '. htmlspecialchars($row['last_name'])  ?></td>
                                                                                <td><?= htmlspecialchars($row['pin_location']) ?></td>
                                                                                <td><?= htmlspecialchars($row['payment_status']) ?></td>
                                                                                <td>₱<?= number_format($row['total_cost'], 2) ?></td>
                                                                                <td>
                                                                                    <div class="progress" style="height: 20px;">
                                                                                        <div class="progress-bar bg-success" role="progressbar" 
                                                                                            style="width: <?= $progressPercentage; ?>%;" 
                                                                                            aria-valuenow="<?= $progressPercentage; ?>" 
                                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                                            <?= $progressPercentage; ?>%
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-start"><a href="javascript:void(0);" class="text-success"><?= htmlspecialchars($row['status']) ?></a></td>
                                                                                <!-- Button to trigger the modal with data attributes -->
                                                                                <td>
                                                                                    <button class="btn btn-primary" 
                                                                                            data-bs-toggle="modal" 
                                                                                            data-bs-target="#paymentLogModal"
                                                                                            data-booking-id="<?= htmlspecialchars($row['booking_id']); ?>" 
                                                                                            data-first-payment="<?= htmlspecialchars($row['first_payment']); ?>"
                                                                                            data-second-payment="<?= htmlspecialchars($row['second_payment']); ?>"
                                                                                            data-third-payment="<?= htmlspecialchars($row['third_payment']); ?>"
                                                                                            data-first-reference="<?= htmlspecialchars($row['first_reference']); ?>"
                                                                                            data-second-reference="<?= htmlspecialchars($row['second_reference']); ?>"
                                                                                            data-third-reference="<?= htmlspecialchars($row['third_reference']); ?>">
                                                                                        <i class="fas fa-credit-card"></i> <!-- Payment icon from FontAwesome -->
                                                                                    </button>
                                                                                </td>

                                                                            </tr>
                                                                            <?php 
                                                                                    }
                                                                                }
                                                                            ?>                                                     
                                                                        </tbody>

                                                                    </table>

                                                                     
                                                                    <!-- Modal for Payment Log -->
                                                                    <div class="modal fade" id="paymentLogModal" tabindex="-1" aria-labelledby="paymentLogModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="paymentLogModalLabel">Payment Log</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form id="paymentForm" action="update_payment.php" method="POST">
                                                                                        <input type="hidden" id="booking_id" name="booking_id" value="">
                                                                                        <div>
                                                                                            <label for="first-reference">First Reference</label>
                                                                                            <input type="text" id="first-reference" name="first_reference" class="form-control" disabled> <!-- Disabled by default -->
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="second-reference">Second Reference</label>
                                                                                            <input type="text" id="second-reference" name="second_reference" class="form-control" disabled> <!-- Disabled by default -->
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="third-reference">Third Reference</label>
                                                                                            <input type="text" id="third-reference" name="third_reference" class="form-control" disabled> <!-- Disabled by default -->
                                                                                        </div>
                                                                                        <button type="submit" class="btn btn-primary" id="updatePaymentBtn" disabled>Update Payment</button>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <!-- Add hidden field for booking_id -->
                                                                                    <input type="hidden" id="booking_id" value="">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>





                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                    <div class="row">
                                                    <?php
                                                        $completed = "SELECT 
                                                            service_booking.*,
                                                            worker_ongoing.*,
                                                            worker_info.user_id AS worker_id,
                                                            worker_info.first_name AS worker_first_name,
                                                            worker_info.last_name AS worker_last_name,
                                                            worker_info.email AS worker_email,
                                                            client_info.user_id AS client_id,
                                                            client_info.first_name AS client_first_name,
                                                            client_info.last_name AS client_last_name,
                                                            client_info.email AS client_email,
                                                            service_payment.*,
                                                            maintenance_complete.*,
                                                            service_history.*
                                                        FROM 
                                                            service_booking
                                                            INNER JOIN worker_ongoing ON worker_ongoing.booking_id = service_booking.booking_id
                                                            INNER JOIN user_info AS worker_info ON worker_info.user_id = worker_ongoing.worker_id
                                                            INNER JOIN user_info AS client_info ON client_info.user_id = service_booking.user_id
                                                            INNER JOIN service_payment ON service_payment.booking_id = service_booking.booking_id
                                                            INNER JOIN maintenance_complete ON maintenance_complete.booking_id = service_booking.booking_id
                                                            INNER JOIN service_history ON service_history.booking_id = service_booking.booking_id
                                                        WHERE 
                                                            service_booking.booking_status = 'completed'";

                                                        $result_completed = mysqli_query($conn, $completed);

                                                        if (!$result_completed) {
                                                            die("Error in query: " . mysqli_error($conn)); // Error handling for query execution
                                                        }

                                                        if (mysqli_num_rows($result_completed) > 0) {
                                                            while ($row_completed = mysqli_fetch_assoc($result_completed)) {
                                                        ?>
                                                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                                                    <div class="card h-100">
                                                                        <div class="card-body">
                                                                            <!-- Client and Worker Names -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Client Name:</strong>
                                                                                    <p id="client_name"><?= htmlspecialchars($row_completed['client_first_name'] . " " . $row_completed['client_last_name']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Worker Name:</strong>
                                                                                    <p id="worker_name"><?= htmlspecialchars($row_completed['worker_first_name'] . " " . $row_completed['worker_last_name']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Location -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-12">
                                                                                    <strong>Location:</strong>
                                                                                    <p id="location"><?= htmlspecialchars($row_completed['pin_location']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Service Type and Product Type -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Service Type:</strong>
                                                                                    <p id="service_type"><?= htmlspecialchars($row_completed['service_type']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Product Type:</strong>
                                                                                    <p id="product_type"><?= htmlspecialchars($row_completed['product_type']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Start and Completion Times -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Start Time:</strong>
                                                                                    <p id="start_time"><?= htmlspecialchars($row_completed['start_time']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Pick-up Completion Time:</strong>
                                                                                    <p id="pick_up_time"><?= htmlspecialchars($row_completed['pick_up']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Delivery Completion Time:</strong>
                                                                                    <p id="delivery_time"><?= htmlspecialchars($row_completed['delivery']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Arrival Completion Time:</strong>
                                                                                    <p id="arrive_time"><?= htmlspecialchars($row_completed['arrive']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Construction Completion Time:</strong>
                                                                                    <p id="ongoing_construction_time"><?= htmlspecialchars($row_completed['ongoing_construction']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Final Checking Completion Time:</strong>
                                                                                    <p id="checking_time"><?= htmlspecialchars($row_completed['checking']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>End Time:</strong>
                                                                                    <p id="end_time"><?= htmlspecialchars($row_completed['end_time']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php 
                                                            }
                                                        } else {
                                                            echo "<p>No completed bookings found.</p>"; // Handle no data scenario
                                                        }
                                                        ?>


                                            
                                                </div>
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="cancel">
                                                <div class="mb-4 main-content-label">Cancelled Appointment</div>
                                                <div class="card-body border">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Service Type</th>
                                                                <th>Product Type</th>
                                                                <th>Brand / Power / Running Hours</th>
                                                                <th>Schedule</th>
                                                                <th>Payment Method</th>
                                                                <th>Bank Name</th>
                                                                <th>Reference Number</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Status</th>
                                                                <th>Booking Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $select = "SELECT * FROM service_booking     
                                                                        INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id   
                                                                        INNER JOIN user_info ON user_info.user_id = service_booking.user_id  
                                                                        INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id                                  
                                                                        WHERE payment_status ='advance_payment' AND booking_status = 'canceled'";
                                                            $result = mysqli_query($conn, $select);
                                                            
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']); ?></td>
                                                                <td><?= htmlspecialchars($row['service_type']); ?></td>
                                                                <td><?= htmlspecialchars($row['product_type']); ?></td>
                                                                <td><?= htmlspecialchars($row['brand'] . ' / ' . $row['KVA'] . ' / ' . $row['running_hours']); ?></td>
                                                                <td><?= htmlspecialchars($row['date'] . ' / ' . $row['start_time'] . ' - ' . $row['end_time']); ?></td>
                                                                <td><?= htmlspecialchars($row['payment_method']); ?></td>
                                                                <td><?= htmlspecialchars($row['bank_name']); ?></td>
                                                                <td><?= htmlspecialchars($row['first_reference']); ?></td>
                                                                <td><?= htmlspecialchars($row['payment_date']); ?></td>
                                                                <td><span class="badge bg-warning"><?= htmlspecialchars($row['payment_status']); ?></span></td>
                                                                <td><span class="badge bg-danger"><?= htmlspecialchars($row['booking_status']); ?></span></td>                                                            
                                                                    <td>
                                                                    <button type="button" class="btn btn-success"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#recover_booking"
                                                                            recover-payment-id="<?= $row['payment_id']; ?>"                              
                                                                            recover-booking-id="<?= $row['booking_id'];?>"
                                                                            recover-user-id="<?= $row['user_id'];?>"                                                                       >
                                                                        Recover account
                                                                    </button>
                                                                    </td>                                                                                 
                                                            </tr>
                                                            <?php 
                                                                }
                                                            } else {
                                                                echo '<tr><td colspan="12" class="text-center">No records found</td></tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Recover Booking Modal -->
                    <div class="modal fade" id="recover_booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="recoverBookingLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recoverBookingLabel">Recover Booking</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="recover_booking.php" method="POST">
                                        <!-- Hidden Inputs for Payment and Booking IDs -->
                                        <input type="hidden" class="paymentId" name="payment_id">
                                        <input type="hidden" class="bookingId" name="booking_id">
                                        <input type="hidden" class="userId" name="user_id">
                                        <!-- Reason for Recovery -->
                                        <h5 class="card-title">Enter new reference number</h5>
                                        <input type="number" name="new_reference_number">
                                        
                                        <!-- Submit Button -->
                                        <div class="mt-3 text-end">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                            <?php 
                            $sql2 = "select * from accounts where role = 'worker'";
                            $result_sql2 = mysqli_query($conn , $sql2);
                            if (mysqli_num_rows($result_sql2) > 0){
                                
                            
                            ?>
                             <!-- MODAL FOR CHOOSE WORKER -->
                             <div class="modal fade" id="assign_worker" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assign_workerModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">APPROVE BOOK AND CHOOSE WORKER </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form for assigning a worker -->
                                                <form class="assign_worker" action="assign_worker.php" method="POST">
                                                    <!-- Hidden inputs for booking, admin, client, and availability IDs -->
                                                    <input type="hidden" data-value="" class="bookingId booking_id" name="booking_id">
                                                    <input type="hidden" data-value="" class="adminId admin_id" name="admin_id">
                                                    <input type="hidden" data-value="" class="clientId client_id" name="client_id">
                                                    <input type="hidden" data-value="" class="availabilityId availability_id" name="availability_id">

                                                    <div class="card" style="width: 18rem;">
                                                        <?php 
                                                        $sql = "SELECT * FROM worker_availability
                                                                INNER JOIN user_info ON user_info.user_id = worker_availability.user_id 
                                                                WHERE is_available=1";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0) {                
                                                            while ($resultitem = mysqli_fetch_assoc($result)) {                
                                                        ?>
                                                            <div class="card-body">
                                                                <!-- Worker ID -->
                    
                                                                
                                                                <!-- Display Worker Name and Role -->
                                                                <h5 class="card-title">NAME: <?= htmlspecialchars($resultitem['first_name'] . " " . $resultitem['last_name']) ?></h5>
                                                                <p class="card-text">ROLE: <span class="text-info">worker</span></p>
                                                                
                                                                <!-- Submit Button -->
                                                                <button type="submit" name="pick" class="btn btn-primary pick">Pick Worker</button>
                                                                
                                                                <!-- Hidden input for id of user -->
                                                                <input type="hidden" class="user_id" name="user_id" data-user-id="<?= $resultitem['user_id'] ?>" value="<?= $resultitem['user_id'] ?>">
                                                            </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                        <?php 
                                                        }
                                                        ?>
                            <div class="modal fade" id="reject_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reject_userModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="reject_userModal">Reject Payment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form id="reject_form" action="reject_payment.php" method="POST">
                                                <!-- Hidden Inputs for Booking ID and User ID -->
                                                <input type="hidden" id="bookingId" class="bookingId" name="booking_id">
                                                <input type="hidden" id="user_id" class="userId" name="user_id">
                                                <input type="hidden" id="availability_id" class="availabilityId" name="availability_id">

                                                <!-- Rejection Reason -->
                                                <div class="mb-3">
                                                    <label for="reason" class="form-label">Enter Reason for Rejection</label>
                                                    <textarea id="reason" name="reason" class="form-control" placeholder="Provide the reason for rejection here..." rows="5" required></textarea>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




            <!--APP-CONTENT CLOSE-->

            <!-- Footer Start -->
            <?php include_once(__DIR__.'../../../partials/footer.php') ?>
            
            <!-- Footer End -->  
        </div>

        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>

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

        <!-- SWEET ALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      

    

    </body>

</html>

            <script>
                    document.addEventListener('DOMContentLoaded', () => {
                    const modal = document.getElementById('assign_worker');
                    const reject_modal = document.getElementById('reject_user');
                    const bookingInput = modal.querySelector('.bookingId');
                    const adminInput = modal.querySelector('.adminId');
                    const clientInput = modal.querySelector('.clientId');
                    const availabilityInput = modal.querySelector('.availabilityId');

                    // Event listener for the modal show event
                    modal.addEventListener('show.bs.modal', (event) => {
                        // Button that triggered the modal
                        const button = event.relatedTarget;

                        // Extract info from data-* attributes
                        const bookingId = button.getAttribute('booking-id');
                        const adminId = button.getAttribute('admin-id');
                        const clientId = button.getAttribute('user-id');
                        const availabilityId = button.getAttribute('availability-id');

                        // Populate the hidden input fields
                        bookingInput.value = bookingId;
                        adminInput.value = adminId;
                        clientInput.value = clientId;
                        availabilityInput.value = availabilityId;
                    });


                    //FOR REJECT MODAL
                    const rejectModal = document.getElementById('reject_user');
                    const bookingInput_reject = rejectModal.querySelector('.bookingId');
                    const userInputReject = rejectModal.querySelector('.userId');
                    const availabilityInputReject = rejectModal.querySelector('.availabilityId');
                    rejectModal.addEventListener('show.bs.modal', (event) => {
                        // Button that triggered the modal
                        const button = event.relatedTarget;

                        // Extract data from data-* attributes
                        const bookingId = button.dataset.rejectBookingId;
                        const userId = button.getAttribute('data-user-id');
                        const availabilityId = button.getAttribute('time-availability-id');
                        // Populate the hidden input field
                        bookingInput_reject.value = bookingId;
                        userInputReject.value = userId;
                        availabilityInputReject.value = availabilityId;
                    });

                    // FOR RECOVER MODAL
                    const recoverModal = document.getElementById('recover_booking');
                    const paymentInput = recoverModal.querySelector('.paymentId');
                    const booking = recoverModal.querySelector('.bookingId');
                    const userInput = recoverModal.querySelector('.userId');
                    recoverModal.addEventListener('show.bs.modal', (event) => {
                        // Button that triggered the modal
                        const button = event.relatedTarget;

                        // Extract data from data-* attributes
                        const paymentId = button.getAttribute('recover-payment-id');
                        const bookingId = button.getAttribute('recover-booking-id');
                        const userId = button.getAttribute('recover-user-id');
                        // Populate the hidden input fields
                        paymentInput.value = paymentId;
                        booking.value = bookingId;
                        userInput.value = userId;
                    });

                });


        </script>

<script>
    
// JavaScript to populate modal with data when button is clicked
var paymentLogModal = document.getElementById('paymentLogModal');
paymentLogModal.addEventListener('show.bs.modal', function (event) {
    // Get the button that triggered the modal
    var button = event.relatedTarget;
    var bookingId = button.getAttribute('data-booking-id'); // Get booking ID
    document.getElementById('booking_id').value = bookingId; // Set the hidden field
      // Get other data attributes as before
    var firstReference = button.getAttribute('data-first-reference');
    var secondReference = button.getAttribute('data-second-reference');
    var thirdReference = button.getAttribute('data-third-reference');

    // Set the modal content dynamically for the first reference
    if (firstReference && firstReference !== 'null' && firstReference !== '') {
        document.getElementById('first-reference').value = firstReference;
        document.getElementById('first-reference').disabled = false;  // Enable input field
    } else {
        document.getElementById('first-reference').value = '';
        document.getElementById('first-reference').disabled = true;  // Disable input field
    }

    // Set the modal content dynamically for the second reference
    if (secondReference && secondReference !== 'null' && secondReference !== '') {
        document.getElementById('second-reference').value = secondReference;
        document.getElementById('second-reference').disabled = false;  // Enable input field
    } else {
        document.getElementById('second-reference').value = '';
        document.getElementById('second-reference').disabled = true;  // Disable input field
    }

    // Set the modal content dynamically for the third reference
    if (thirdReference && thirdReference !== 'null' && thirdReference !== '') {
        document.getElementById('third-reference').value = thirdReference;
        document.getElementById('third-reference').disabled = false;  // Enable input field
    } else {
        document.getElementById('third-reference').value = '';
        document.getElementById('third-reference').disabled = true;  // Disable input field
    }

    // Enable or disable the Update button based on whether there are valid references
    var updateButton = document.getElementById('updatePaymentBtn');
    if (
        (firstReference && firstReference !== 'null' && firstReference !== '') ||
        (secondReference && secondReference !== 'null' && secondReference !== '') ||
        (thirdReference && thirdReference !== 'null' && thirdReference !== '')
    ) {
        updateButton.disabled = false;  // Enable Update button if any reference is valid
    } else {
        updateButton.disabled = true;   // Disable Update button if no valid reference
    }
});

</script>

<script>
    $(document).ready(function () {
    $("#reject_form").on("submit", function (e) { // Target the form, not the button
        e.preventDefault(); // Prevent default form submission
        if ($("#reason").val() == "") {
            Swal.fire({
                title: "Error!",
                text: "Enter a reason first",
                icon: "warning",
                confirmButtonText: "OK",
            });
            return; // Stop further execution
        }else{
            Swal.fire({
            title: 'Confirmation',
            html: "Are you sure to reject this project?",
            icon: 'warning',
            confirmButtonText: 'Confirm',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) { // Only proceed if the confirm button is clicked
                // Gather form data
                var formData = {
                    reason: $("#reason").val().trim(),
                    booking_id: $("#bookingId").val(),
                    user_id: $("#user_id").val(),
                    availability_id: $("#availability_id").val(),
                };

                // AJAX call
                $.ajax({
                    type: "POST",
                    url: "reject_payment.php",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Success",
                                text: "Rejection complete!",
                                icon: "success",
                                allowOutsideClick: false,
                            }).then(() => {
                                window.location.href = "appointment.php"; // Redirect
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error",
                                confirmButtonText: "OK",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "SQL Error!",
                            text: xhr.responseJSON ? xhr.responseJSON.message : "An unexpected error occurred.",
                            icon: "error",
                            confirmButtonText: "OK",
                        });
                    },
                });
            }
        });

        }

    });
});

</script>

<script>
    $(document).ready(function () {
        $(".assign_worker").on("submit", function (e) { 
            e.preventDefault(); // Prevent default form submission

            // Get the "Pick Worker" button that was clicked
            var button = $(document.activeElement); // The button that triggered the form submit event
            var cardBody = button.closest(".card-body"); // Find the closest card-body to this button

            // Retrieve values specific to this worker
            var bookingId = $(".booking_id").val(); // Global form-level values
            var adminId = $(".admin_id").val();
            var clientId = $(".client_id").val();
            var availabilityId = $(".availability_id").val();
            var userId = cardBody.find(".user_id").val(); // Get the user_id for the worker in this card

          

            // Show confirmation dialog
            Swal.fire({
                title: 'Confirmation',
                html: "Are you sure to assign this worker?",
                icon: 'warning',
                confirmButtonText: 'Confirm',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) { // Only proceed if the confirm button is clicked
                    // Gather form data
                    var formData = {
                        pick: true,
                        booking_id: bookingId,
                        admin_id: adminId,
                        client_id: clientId,
                        availability_id: availabilityId,
                        user_id: userId
                    };

                    // AJAX call
                    $.ajax({
                        type: "POST",
                        url: "assign_worker.php",
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Success",
                                    text: "Worker Assigned!",
                                    icon: "success",
                                    allowOutsideClick: false,
                                }).then(() => {
                                    window.location.href = "appointment.php"; // Redirect
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "OK",
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: "SQL Error!",
                                text: xhr.responseJSON ? xhr.responseJSON.message : "An unexpected error occurred.",
                                icon: "error",
                                confirmButtonText: "OK",
                            });
                        },
                    });
                }
            });
        });
    });



</script>
