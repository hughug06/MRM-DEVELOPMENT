<?php 
    require_once '../../../ADMIN/authetincation.php';
    require_once '../../../Database/database.php';
    $user_id = $_SESSION['user_id'];
    $name = "select * from user_info where user_id = '$user_id'";
    $name_result = mysqli_query($conn , $name);
    $name_row = mysqli_fetch_assoc($name_result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'/../../../partials/head.php'); ?>

        <title>Appointments</title>
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

        <!-- Prism CSS -->
        <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6744c1904304e3196ae86e53/1idi987he';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
<!--End of Tawk.to Script-->
        <div class="page">

            <!-- app-header -->
            <?php include_once(__DIR__.'/../../../partials/header.php')?>
            <!-- app-sidebar -->
            <?php include_once(__DIR__.'/../../../partials/sidebar.php')?>

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row square row-sm">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu ">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#paymentchecking">Payment Checking</a>              
                                    <a class="nav-link" data-bs-toggle="tab" href="#approved">Approved</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#cancelled">Cancelled</a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body p-4 border tab-pane border-top-0 active" id="paymentchecking">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                                <?php 
                                                                $user_id = $_SESSION['user_id'];
                                                                $sql = "select * from service_booking
                                                                inner join service_availability on service_availability.availability_id = service_booking.availability_id
                                                                INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id
                                                                where booking_status = 'pending' and user_id = '$user_id'";
                                                                $result = mysqli_query($conn , $sql);
                                                                if(mysqli_num_rows($result) > 0)
                                                                {
                                                                    while($resultItem = mysqli_fetch_assoc($result)){
                                                                
                                                                ?>

                                                                <div class="col-md-4">
                                                                    <div class="card mb-4 shadow-lg border-primary">
                                                                        <div class="card-header bg-primary text-white">
                                                                            <h5 class="card-title mb-0">Book Details</h5>
                                                                        </div>
                                                                        <div class="card-body bg-light">
                                                                            <!-- Service and Product Info -->
                                                                            <h6 class="text-secondary"><strong>Service Type:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['service_type']); ?></p>

                                                                            <h6 class="text-secondary"><strong>Product Type:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['product_type']); ?></p>

                                                                            <h6 class="text-secondary"><strong>Brand / Power / Running Hours:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['brand'] . ' / ' . $resultItem['KVA'] . ' / ' . $resultItem['running_hours']); ?></p>

                                                                            <!-- Schedule Info -->
                                                                            <h6 class="text-secondary"><strong>Schedule:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['date'] . ' / ' . $resultItem['start_time'] . ' - ' . $resultItem['end_time']); ?></p>

                                                                            <!-- Payment Info -->
                                                                            <h6 class="text-secondary"><strong>Payment Method:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['payment_method']); ?></p>

                                                                            <h6 class="text-secondary"><strong>Bank Name:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['bank_name']); ?></p>

                                                                            <h6 class="text-secondary"><strong>Reference Number:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['first_reference']); ?></p>

                                                                            <h6 class="text-secondary"><strong>Payment Date:</strong></h6>
                                                                            <p class="text-dark"><?= htmlspecialchars($resultItem['payment_date']); ?></p>

                                                                            <!-- Payment and Booking Status -->
                                                                            <h6 class="text-secondary"><strong>Payment Status:</strong></h6>
                                                                            <p class="<?= htmlspecialchars($resultItem['payment_status'] === 'Paid' ? 'text-success' : 'text-danger'); ?>">
                                                                                <?= htmlspecialchars($resultItem['payment_status']); ?>
                                                                            </p>

                                                                            <h6 class="text-secondary"><strong>Booking Status:</strong></h6>
                                                                            <p class="<?= htmlspecialchars($resultItem['booking_status'] === 'Confirmed' ? 'text-success' : 'text-warning'); ?>">
                                                                                <?= htmlspecialchars($resultItem['booking_status']); ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                
                                                            <?php }} ?>
                                                </div>
                                            </div>           
                                            <div class="main-content-body tab-pane p-4 border-top-0 p-0" id="approved">
                                                <div class="mb-4 main-content-label text-center">Approved Projects</div>
                                                <div class="card border-0 shadow-sm">
                                                    <div class="card-header bg-primary text-white border-bottom-0">
                                                        <h5 class="mb-0">Ongoing Projects</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover table-bordered text-nowrap">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Worker Name</th>
                                                                        <th>Location</th>
                                                                        <th>Payment Status</th>
                                                                        <th>Amount</th>
                                                                        <th>Project Progress</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $ongoing = "SELECT * FROM service_booking
                                                                                INNER JOIN worker_ongoing ON service_booking.booking_id = worker_ongoing.booking_id
                                                                                INNER JOIN user_info on user_info.user_id = worker_ongoing.worker_id    
                                                                                INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id 
                                                                                WHERE client_id = '$user_id' AND booking_status = 'ongoing' AND status != 'completed'";
                                                                    $result_ongoing = mysqli_query($conn, $ongoing);

                                                                    // Progress mapping for each enum status
                                                                    $statusMap = [
                                                                        'pick_up' => 16,
                                                                        'delivery' => 33,
                                                                        'arrive' => 50,
                                                                        'ongoing_construction' => 66,
                                                                        'checking' => 83,
                                                                        'completed' => 100
                                                                    ];

                                                                    if (mysqli_num_rows($result_ongoing) > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result_ongoing)) {
                                                                            $status = $row['status'];
                                                                            $progressPercentage = $statusMap[$status] ?? 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><?= htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) ?></td>
                                                                        <td><?= htmlspecialchars($row['pin_location']) ?></td>
                                                                        <td>
                                                                            <span class="badge <?= $row['payment_status'] == 'Paid' ? 'bg-success' : 'bg-warning' ?>">
                                                                                <?= htmlspecialchars($row['payment_status']) ?>
                                                                            </span>
                                                                        </td>
                                                                        <td>₱<?= number_format($row['total_cost'], 2) ?></td>
                                                                        <td>
                                                                            <div class="progress" style="height: 20px;">
                                                                                <div class="progress-bar" role="progressbar" 
                                                                                    style="width: <?= $progressPercentage; ?>%;" 
                                                                                    aria-valuenow="<?= $progressPercentage; ?>" 
                                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                                    <?= $progressPercentage; ?>%
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <span class="badge bg-<?= $status == 'completed' ? 'success' : 'primary' ?>">
                                                                                <?= ucfirst($status) ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php 
                                                                    if($row['status'] == 'arrive' && $row['second_payment'] == null){
                                                                        
                                                                        ?> 
                                                                      <!-- Displaying the total cost and booking ID on the page -->
                                                                        <input type="hidden" id="total_cost_input" name="total_cost" value="<?= $row['total_cost'] ?>">
                                                                        <input type="hidden" id="booking_id_input" name="booking_id" value="<?= $row['booking_id'] ?>">

                                                                        <!-- Button to open the payment modal -->
                                                                        <button class="btn btn-primary open-payment-modal-btn" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                                                            Payment
                                                                        </button>
                                                                        
                                                                        <?php
                                                                    }
                                                                    else if($row['status'] == 'checking' && $row['third_payment'] == null){
                                                                        ?> 
                                                                                                   <!-- Displaying the total cost and booking ID on the page -->
                                                                        <input type="text" id="total_cost_input_third" name="total_cost" value="<?= $row['total_cost'] ?>">
                                                                        <input type="text" id="booking_id_input_third" name="booking_id" value="<?= $row['booking_id'] ?>">

                                                                        <button type="button" class="btn btn-primary open-third-payment-modal-btn" data-bs-toggle="modal" data-bs-target="#paymentThirdModal">
                                                                            Payment
                                                                        </button>

                                                                        <?php
                                                                    }
                                                                    
                                                                        }
                                                                    }
                                                                    ?>                                 
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            <!-- Modal SECOND payment -->
                                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentModalLabel">Second Payment Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Centered Blank Image Placeholder -->
                                                            <div class="text-center mb-3">
                                                                <img src="../../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                                            </div>
                                                            <div class="text-center mx-4">
                                                                <!-- Displaying Total Cost and Booking ID -->
                                                                <p id="paymentnow">TOTAL: ₱0.00</p>
                                                                <p id="totalCostModal">TOTAL: ₱0.00</p>
                                                                <p id="bookingIdModal">Booking ID: N/A</p>
                                                            </div>

                                                            <form action="process_second_payment.php" method="POST" enctype="multipart/form-data">
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        <label for="firstField" class="form-label">Reference Number</label>
                                                                        <input class="form-control" type="text" id="firstField" name="reference_number" required>
                                                                    </div>                                                             
                                                                </div>                                         
               
                                                                <!-- Hidden input for total cost and booking ID (to submit in the form) -->
                                                                <input type="hidden" id="booking_id_modal_input" name="booking_id">
                                                                <input type="hidden" id="duePaymentInput" name="due_payment" readonly>

                                                                <!-- Submit Button -->
                                                                <div class="text-center mt-3">
                                                                    <button type="submit" class="btn btn-primary" name="save_payment">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                   
                                            <!-- Modal THIRD payment -->
                                            <div class="modal fade" id="paymentThirdModal" tabindex="-1" aria-labelledby="paymentThirdModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentModalLabel">Third Payment Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Centered Blank Image Placeholder -->
                                                            <div class="text-center mb-3">
                                                                <img src="../../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                                            </div>
                                                            <div class="text-center mx-4">
                                                                <!-- Displaying Total Cost and Booking ID -->
                                                                <p id="Thirdpaymentnow">TOTAL: ₱0.00</p>
                                                                <p id="ThirdtotalCostModal">TOTAL: ₱0.00</p>
                                                                <p id="ThirdbookingIdModal">Booking ID: N/A</p>
                                                            </div>

                                                            <form action="process_third_payment.php" method="POST" enctype="multipart/form-data">
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        <label for="firstField" class="form-label">Reference Number</label>
                                                                        <input class="form-control" type="text" id="firstField" name="reference_number" required>
                                                                    </div>                                                             
                                                                </div>                                         
               
                                                                <!-- Hidden input for total cost and booking ID (to submit in the form) -->
                                                                <input type="text" id="booking_id_third" name="booking">
                                                                <input type="text" id="duePayment_third" name="due" readonly>

                                                                <!-- Submit Button -->
                                                                <div class="text-center mt-3">
                                                                    <button type="submit" class="btn btn-primary" name="save_payment">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>

 
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <?php 
                                                $completed = "SELECT * FROM service_booking
                                                INNER JOIN worker_ongoing ON worker_ongoing.booking_id = service_booking.booking_id  
                                                INNER JOIN user_info on user_info.user_id = worker_ongoing.worker_id    
                                                INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id 
                                                INNER JOIN maintenance_complete on maintenance_complete.booking_id = service_booking.booking_id 
                                                WHERE booking_status = 'completed' and service_booking.user_id = '$user_id'";
                                                $result_completed = mysqli_query($conn, $completed);
                                                if(mysqli_num_rows($result_completed)){
                                                    while($row_completed = mysqli_fetch_assoc($result_completed)){

                                                   
                                                
                                                
                                                ?>

                                               <!-- Card -->
                                               <div class="card shadow-lg mt-4">
                                                    <!-- Card Header -->
                                                    <div class="card-header bg-success text-white text-center">
                                                        <h5>Completed</h5>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <!-- Full Name and Worker Name -->
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <strong>Client Name:</strong>
                                                                <p id="client_name"><?= htmlspecialchars($name_row['first_name'] . " " . $name_row['last_name']); ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Worker Name:</strong>
                                                                <p id="worker_name"><?= htmlspecialchars($row_completed['first_name'] . " " . $row_completed['last_name']); ?></p>
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
                                                        <!-- Start Time and End Time -->
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <strong>Start Time:</strong>
                                                                <p id="start_time"><?= htmlspecialchars($row_completed['start_time']); ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>End Time:</strong>
                                                                <p id="end_time"><?= htmlspecialchars($row_completed['end_time']); ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- Note -->
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <strong>Note:</strong>
                                                                <p class="text-muted">
                                                                    Contact us through Chaintercom or email for maintenance/warranty issues. 
                                                                    <a href="#" class="text-decoration-underline" data-bs-toggle="modal" data-bs-target="#maintenanceCoverageModal">Click me to know what is the coverage of maintenance</a>.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- Receipt Button -->
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-primary" onclick="generateReceipt('<?= $row_completed['total_cost']; ?>')">Download Receipt</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php  }}?>

                                                <!-- Modal for Maintenance Coverage -->
                                                    <div class="modal fade" id="maintenanceCoverageModal" tabindex="-1" aria-labelledby="maintenanceCoverageModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="maintenanceCoverageModalLabel">Maintenance Coverage</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>The maintenance coverage includes the following:</p>
                                                                    <ul>
                                                                        <li>Regular inspections and tune-ups</li>
                                                                        <li>Repair of defects covered under the warranty</li>
                                                                        <li>Replacement of parts as per the terms and conditions</li>
                                                                        <li>Support for operational issues</li>
                                                                        <li>Comprehensive warranty terms available in your service agreement</li>
                                                                    </ul>
                                                                    <p>For detailed information, please contact our support team.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cancelled">
                                                
                                                <div class="mb-4 main-content-label">Cancelled</div>
                                                <div class="text-danger">Note!:Contact us on chaintercom module if you have any question</div>
                                                <div class="text-danger"></div>
                                                <div class="card-body border">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="table-primary">
                                                            <tr>
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
                                                                <th>Cancellation reason</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $user_id = $_SESSION['user_id'];
                                                            $sql = "SELECT * FROM service_booking
                                                                    INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id
                                                                    INNER JOIN cancel_reason ON cancel_reason.booking_id = service_booking.booking_id
                                                                    INNER JOIN service_payment on service_payment.booking_id = service_booking.booking_id            
                                                                    WHERE booking_status = 'canceled' AND user_id = '$user_id'";
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($resultItem = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($resultItem['service_type']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['product_type']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['brand'] . ' / ' . $resultItem['KVA'] . ' / ' . $resultItem['running_hours']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['date'] . ' / ' . $resultItem['start_time'] . ' - ' . $resultItem['end_time']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['payment_method']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['bank_name']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['first_reference']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['payment_date']); ?></td>
                                                                <td><span class="badge bg-warning"><?= htmlspecialchars($resultItem['payment_status']); ?></span></td>
                                                                <td><span class="badge bg-danger"><?= htmlspecialchars($resultItem['booking_status']); ?></span></td>
                                                                <td><span class="text-info"><?= htmlspecialchars($resultItem['reason']); ?></span></td>
                                                                <td>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                                }
                                                            } else {
                                                                echo '<tr><td colspan="11" class="text-center">No records found</td></tr>';
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
            <!-- Footer Start -->
            <?php include_once(__DIR__.'/../../../partials/footer.php') ?>
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

        <script>
            var receiptModal = document.getElementById('receiptModal');
            receiptModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;  // Button that triggered the modal
                var accountId = button.getAttribute('data-account-id');  // Extract account_id
                var appointmentId = button.getAttribute('data-appointment-id');  // Extract appointment_id

                // Now you can use accountId and appointmentId to modify the modal content
                var modalBody = receiptModal.querySelector('.modal-body');

                // For example, you could display them inside the modal dynamically
                modalBody.innerHTML += '<p><strong>Account ID:</strong> ' + accountId + '</p>';
                modalBody.innerHTML += '<p><strong>Appointment ID:</strong> ' + appointmentId + '</p>';
            });
        </script>

        <script>
            document.getElementById('downloadReceipt').addEventListener('click', function() {
                var { jsPDF } = window.jspdf;
                var doc = new jsPDF();

                // Grab the content of the modal (text only, no HTML tags)
                var content = document.getElementById('receiptContent').innerText;

                // Split the content by new lines and add each line to the PDF
                var lines = content.split('\n');
                for (var i = 0; i < lines.length; i++) {
                    doc.text(10, 10 + (10 * i), lines[i]);
                }

                // Save the PDF
                doc.save('receipt.pdf');
            });
        </script> 

        <script>
            const paymentModal = document.getElementById('paymentModal');
            paymentModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const accountId = button.getAttribute('data-account-id');
                const appointmentId = button.getAttribute('data-appointment-id');
                const totalAmount = parseInt(button.getAttribute('data-total-amount').replace(/,/g, ''), 10);
                
                document.getElementById('modalTotalAmount').textContent = `$${totalAmount}`;
                
                // Here, you can use accountId and appointmentId in your form or display it in the modal
                document.getElementById('modalAccountId').value = accountId;
                document.getElementById('modalAppointmentId').value = appointmentId;
                document.getElementById('modalTotalCost').value = totalAmount;
            });
        </script>
    </body>

</html>


<script>
    // Function to open the modal and populate with the total cost and booking ID
    function openPaymentModal() {
        // Get the total cost and booking ID from the hidden input and text input fields
        var totalCost = document.getElementById('total_cost_input').value;
        var bookingId = document.getElementById('booking_id_input').value;
        
        // Calculate 40% of the total cost
        var duePayment = totalCost * 0.40;
        var totalCost = parseFloat(document.getElementById('total_cost_input').value);
        // Format the amounts with commas as thousand separators
        var formattedDuePayment = duePayment.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        var formattedTotalCost = totalCost.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });

        // Update the text content of the paymentnow and totalCostModal elements
        document.getElementById('paymentnow').innerText = 'Due payment: ' + formattedDuePayment;
        document.getElementById('totalCostModal').innerText = 'TOTAL: ' + formattedTotalCost;
        document.getElementById('bookingIdModal').innerText = 'Booking ID: ' + bookingId;
        
        // Optionally, populate the form with the total cost and booking ID
        document.getElementById('booking_id_modal_input').value = bookingId;
        document.getElementById('duePaymentInput').value = duePayment.toFixed(2); 
    }

    // Event listener for button click to open the modal
    document.querySelector('.open-payment-modal-btn').addEventListener('click', openPaymentModal);
</script>
<script>
    // Function to open the modal and populate with the total cost and booking ID for third payment
    function openThirdPaymentModal() {
        // Get the total cost and booking ID from the input fields
        var totalCost = document.getElementById('total_cost_input_third').value;
        var bookingId = document.getElementById('booking_id_input_third').value;
        
        // Calculate 40% of the total cost
        var duePayment = totalCost * 0.15;
        var totalCost = parseFloat(totalCost);
        
        // Format the amounts with commas as thousand separators
        var formattedDuePayment = duePayment.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        var formattedTotalCost = totalCost.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });

        // Update the text content of the Thirdpaymentnow, ThirdtotalCostModal, and ThirdbookingIdModal elements
        document.getElementById('Thirdpaymentnow').innerText = 'Due payment: ' + formattedDuePayment;
        document.getElementById('ThirdtotalCostModal').innerText = 'TOTAL: ' + formattedTotalCost;
        document.getElementById('ThirdbookingIdModal').innerText = 'Booking ID: ' + bookingId;
        
        // Populate the form with the total cost and booking ID
        document.getElementById('booking_id_third').value = bookingId;
        document.getElementById('duePayment_third').value = duePayment.toFixed(2); 
    }

    // Event listener for button click to open the third payment modal
    document.querySelector('.open-third-payment-modal-btn').addEventListener('click', openThirdPaymentModal);
</script>

<!-- JavaScript for Receipt Button -->
<script>
    function generateReceipt(totalCost) {
    // Retrieve data from the HTML
    const clientName = document.getElementById('client_name')?.innerText || "Client Name Unavailable";
    const workerName = document.getElementById('worker_name')?.innerText || "Worker Name Unavailable";
    const location = document.getElementById('location')?.innerText || "Location Unavailable";
    const serviceType = document.getElementById('service_type')?.innerText || "Service Type Unavailable";
    const productType = document.getElementById('product_type')?.innerText || "Product Type Unavailable";
    const startTime = document.getElementById('start_time')?.innerText || "Start Time Unavailable";
    const endTime = document.getElementById('end_time')?.innerText || "End Time Unavailable";
    const amount = totalCost ? parseFloat(totalCost).toLocaleString('en-US', { style: 'currency', currency: 'PHP' }) : "Amount Unavailable";

    // Create receipt content
    const receiptContent = `
        <h3 style="text-align: center;">ACKNOWLEDGEMENT RECEIPT</h3>
        <p>
            This is to acknowledge receipt of the total amount of ${amount}, 
            from ${clientName} of ${location}, as payment for ${serviceType} services of ${productType} 
            provided by MRM EG Electric Power Generation Services.
        </p>
        <p>This amount covers all labor and material costs associated with the installation as per our agreed terms.</p>
        <p>We appreciate your prompt payment and look forward to supporting your energy needs with reliable and efficient services.</p>
        <p><strong>RECEIVED BY:</strong></p>
        <p>ENGR. MARIA L. SANTOS<br>MRM EG Electric Power Generation Services</p>
        <p><strong>Date:</strong> ${new Date().toLocaleDateString()}</p>
    `;

    // Open a new window for the receipt
    const receiptWindow = window.open('', '_blank', 'width=800,height=600');
    if (receiptWindow) {
        receiptWindow.document.write('<html><head><title>Receipt</title></head><body>' + receiptContent + '</body></html>');
        receiptWindow.document.close();
        receiptWindow.print();
    } else {
        alert("Please enable popups to download the receipt.");
    }
}


</script>




