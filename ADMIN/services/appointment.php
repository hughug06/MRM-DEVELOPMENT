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
                                                                    <button type="button" class="btn btn-success" 
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
                                                                            data-reject-booking-id="<?= $resultItem['booking_id']; ?>"                                                                        >
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
                    
                                            <d  iv class="main-content-body tab-pane p-4 border-top-0" id="on_going">
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
                                                                                <td><?= htmlspecialchars($row['total_cost']) ?></td>
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
                                                                                            data-first-payment="<?php echo $row['first_payment']; ?>"
                                                                                            data-second-payment="<?php echo $row['second_payment']; ?>"
                                                                                            data-third-payment="<?php echo $row['third_payment']; ?>"
                                                                                            data-first-reference="<?php echo $row['first_reference']; ?>"
                                                                                            data-second-reference="<?php echo $row['second_reference']; ?>"
                                                                                            data-third-reference="<?php echo $row['third_reference']; ?>">
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

                                                                               <!-- Modal -->
                                                                        <div class="modal fade" id="paymentLogModal" tabindex="-1" aria-labelledby="paymentLogModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="paymentLogModalLabel">Payment Log</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Initial Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Initial Payment</h6>
                                                                                    <p id="first-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="first-reference"></td>
                                                                                            <td id="first-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>

                                                                                    <!-- Second Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Second Payment</h6>
                                                                                    <p id="second-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="second-reference"></td>
                                                                                            <td id="second-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>

                                                                                    <!-- Last Payment Section -->
                                                                                    <div class="payment-section">
                                                                                    <h6 class="fw-bold">Last Payment</h6>
                                                                                    <p id="third-payment-status" class="text-muted"></p>
                                                                                    <table class="table table-sm">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">Reference Number</th>
                                                                                            <th scope="col">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td id="third-reference"></td>
                                                                                            <td id="third-payment"></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
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
                                            </d>
                                           
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                    

                                            
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $select = "SELECT * FROM service_booking     
                                                                        INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id   
                                                                        INNER JOIN user_info ON user_info.user_id = service_booking.user_id                                    
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
                                                                <td><?= htmlspecialchars($row['reference_number']); ?></td>
                                                                <td><?= htmlspecialchars($row['payment_date']); ?></td>
                                                                <td><span class="badge bg-warning"><?= htmlspecialchars($row['payment_status']); ?></span></td>
                                                                <td><span class="badge bg-danger"><?= htmlspecialchars($row['booking_status']); ?></span></td>
                                                                
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
                                                <form action="assign_worker.php" method="POST">
                                                    <!-- Hidden inputs for booking, admin, client, and availability IDs -->
                                                    <input type="text" class="bookingId" name="booking_id">
                                                    <input type="text" class="adminId" name="admin_id">
                                                    <input type="text" class="clientId" name="client_id">
                                                    <input type="text" class="availabilityId" name="availability_id">

                                                    <div class="card" style="width: 18rem;">
                                                        <?php 
                                                        $sql = "SELECT * FROM accounts  
                                                                INNER JOIN user_info ON user_info.user_id = accounts.user_id 
                                                                INNER JOIN worker_availability ON worker_availability.account_id = accounts.account_id
                                                                WHERE role = 'worker' AND is_available=1";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0) {                
                                                            while ($resultitem = mysqli_fetch_assoc($result)) {                
                                                        ?>
                                                            <div class="card-body">
                                                                <!-- Worker ID -->
                    
                                                                
                                                                <!-- Display Worker Name and Role -->
                                                                <h5 class="card-title">NAME: <?= htmlspecialchars($resultitem['first_name'] . " " . $resultitem['last_name']) ?></h5>
                                                                <p class="card-text">ROLE: <?= htmlspecialchars($resultitem['role']) ?></p>
                                                                
                                                                <!-- Submit Button -->
                                                                <button type="submit" name="pick" class="btn btn-primary">Pick Worker</button>
                                                                
                                                                <!-- Hidden input for id of user -->
                                                                <input type="text" name="worker_id" value="<?= $resultitem['user_id'] ?>">
                                                                <input type="text" name="account_id" value="<?= $resultitem['account_id'] ?>">
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

                                 <!-- MODAL FOR CHOOSE WORKER -->
                             <div class="modal fade" id="reject_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reject_userModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">REJECT PAYMENT</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form for assigning a worker -->
                                                <form action="reject_payment.php" method="POST">
                                                    <!-- Hidden inputs for booking, admin, client, and availability IDs -->
                                                    <input type="text" class="bookingId" name="booking_id">
                                                 

                                                    <h5 class="card-title">Enter Reason for Rejection</h5>
                                                    <textarea name="reason" class="form-control" placeholder="Provide the reason for rejection here..." rows="5" required></textarea>
                                                    <button type="submit">SUBMIT</button>
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

                    rejectModal.addEventListener('show.bs.modal', (event) => {
                        // Button that triggered the modal
                        const button = event.relatedTarget;

                        // Extract data from data-* attributes
                        const bookingId = button.dataset.rejectBookingId;

                        // Populate the hidden input field
                        bookingInput_reject.value = bookingId;
                    });
                });


        </script>

<script>
  // JavaScript to populate modal with data when button is clicked
  var paymentLogModal = document.getElementById('paymentLogModal');
  paymentLogModal.addEventListener('show.bs.modal', function (event) {
    // Get the button that triggered the modal
    var button = event.relatedTarget;

    // Get data attributes from the button
    var firstPayment = button.getAttribute('data-first-payment');
    var secondPayment = button.getAttribute('data-second-payment');
    var thirdPayment = button.getAttribute('data-third-payment');
    var firstReference = button.getAttribute('data-first-reference');
    var secondReference = button.getAttribute('data-second-reference');
    var thirdReference = button.getAttribute('data-third-reference');

    // Set the modal content dynamically for the first payment
    if (firstPayment === 'null' || firstPayment === '') {
      document.getElementById('first-payment-status').textContent = 'The client has not paid';
      document.getElementById('first-reference').textContent = '';
      document.getElementById('first-payment').textContent = '';
    } else {
      document.getElementById('first-payment-status').textContent = '';
      document.getElementById('first-reference').textContent = firstReference;
      document.getElementById('first-payment').textContent = firstPayment;
    }

    // Set the modal content dynamically for the second payment
    if (secondPayment === 'null' || secondPayment === '') {
      document.getElementById('second-payment-status').textContent = 'The client has not paid';
      document.getElementById('second-reference').textContent = '';
      document.getElementById('second-payment').textContent = '';
    } else {
      document.getElementById('second-payment-status').textContent = '';
      document.getElementById('second-reference').textContent = secondReference;
      document.getElementById('second-payment').textContent = secondPayment;
    }

    // Set the modal content dynamically for the third payment
    if (thirdPayment === 'null' || thirdPayment === '') {
      document.getElementById('third-payment-status').textContent = 'The client has not paid';
      document.getElementById('third-reference').textContent = '';
      document.getElementById('third-payment').textContent = '';
    } else {
      document.getElementById('third-payment-status').textContent = '';
      document.getElementById('third-reference').textContent = thirdReference;
      document.getElementById('third-payment').textContent = thirdPayment;
    }
  });
</script>