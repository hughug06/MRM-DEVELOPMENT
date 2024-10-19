
<?php 
require_once '../../../ADMIN/authetincation.php';
require_once '../../../Database/database.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'/../../../partials/head.php'); ?>

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

        <!-- Prism CSS -->
        <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>

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
                                    <a class="nav-link  active" data-bs-toggle="tab" href="#pending">Pending</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#payment">Payment</a>         
                                    <a class="nav-link" data-bs-toggle="tab" href="#payment">Payment Checking</a>                
                                    <a class="nav-link" data-bs-toggle="tab" href="#approved">Approved</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#cancelled">Cancelled</a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="pending">
                                                <div class="mb-4 main-content-label">Pending</div>
                                                    <div class="card-body border">  
                                                            <!-- Content Here -->
                                                            <?php 
                                                                $userid = $_SESSION['account_id'];
                                                                $sql = "SELECT * FROM appointments WHERE account_id = '$userid' AND status = 'Pending'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $count = 0; // Counter to track the number of cards per row
                                                                    echo '<div class="row">'; // Open the row before starting the loop

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        if ($row['status'] === "Canceled") { 
                                                                            continue; 
                                                                        }

                                                                        // Check if a new row needs to be opened for every two cards
                                                                        if ($count % 2 == 0 && $count != 0) {
                                                                            echo '</div><div class="row">'; // Close the previous row and open a new row after two cards
                                                                        }
                                                                    ?>

                                                                    <div class="col-md-6">
                                                                        <div class="card shadow-sm mb-4">
                                                                            <div class="card-header bg-primary text-white text-center">
                                                                                <h4 class="card-title mb-0">Appointment Summary</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Name</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['name']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Address</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['location']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Date</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['date']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Time</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['start_time']) . "-" . htmlspecialchars($row['end_time']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Amount</h6>
                                                                                        <p class="text-muted">Unpaid</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Payment Status</h6>
                                                                                        <span class="badge bg-success"><?= htmlspecialchars($row['status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-12 text-center">
                                                                                        <h6 class="fw-bold">Appointment Status</h6>
                                                                                        <span class="badge bg-warning"><?= htmlspecialchars($row['status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-center">
                                                                                <button type="button" class="btn btn-primary">Check Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php 
                                                                        $count++; // Increment counter

                                                                    } // End of while loop

                                                                    echo '</div>'; // Close the final row
                                                                }
                                                            ?>

                                                </div>
                                                
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="payment">
                                                <div class="mb-4 main-content-label">Quotation</div>
                                                <div class="card-body border">
                                                <?php 
                                                        $userid = $_SESSION['account_id'];
                                                        $sql = "SELECT * FROM service_quotation 
                                                                INNER JOIN appointments 
                                                                ON service_quotation.appointment_id = appointments.appointment_id 
                                                                WHERE service_quotation.account_id = appointments.account_id 
                                                                AND appointments.status = 'Waiting'";

                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            $current_appointment_id = null; // Track the current appointment ID
                                                            $item_no = 1; // Counter for item numbers
                                                            $numbering = 1;
                                                            $last_row = null; // To hold the last row for final card footer details
                                                            $total_amount = 0; // To sum up the total cost for the final amount

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                // Check if appointment_id has changed
                                                                if ($current_appointment_id !== $row['appointment_id']) {
                                                                    // Close the previous card (if not the first iteration)
                                                                    if ($current_appointment_id !== null) {
                                                                        echo '</tbody>';
                                                                        echo '</table>';
                                                                    
                                                                        echo '<div class="card-footer text-center">';
                                                                        echo '<a href="/MRM-DEVELOPMENT/USER/services/bookappointments/service_payment.php?account_id=' . htmlspecialchars($last_row['account_id']) . '&appointment_id=' . htmlspecialchars($last_row['appointment_id']) . '" style="color: white; text-decoration: none;" class="btn btn-sm btn-info">Proceed to payment</a>';
                                                                        echo '</div>';
                                                                        echo '</div>'; // End of previous card

                                                                        // Display the final amount for the previous appointment
                                                                        echo '<div class="alert alert-info text-center"><strong>Total Amount: $' . number_format($total_amount, 2) . '</strong></div>';

                                                                        // Reset the total amount for the next appointment
                                                                        $total_amount = 0;
                                                                    }

                                                                    // Start a new card for the new appointment_id
                                                                    
                                                                    echo '<div class="card shadow-sm mb-4">';
                                                                    echo $numbering;
                                                                    echo '<div class="card-header bg-primary text-white text-center">';
                                                                    echo '<h4 class="card-title mb-0">Quotation Summary (Appointment ID: ' . htmlspecialchars($row['appointment_id']) . ')</h4>';
                                                                    echo '</div>';
                                                                    echo '<table class="table table-bordered table-hover mt-4">';
                                                                    echo '<thead class="table-dark">';
                                                                    echo '<tr>';
                                                                    echo '<th>Item No.</th>';
                                                                    echo '<th>Description</th>';
                                                                    echo '<th>Unit</th>';
                                                                    echo '<th>Quantity</th>';
                                                                    echo '<th>Amount</th>';
                                                                    echo '<th>Total Cost</th>';  // Calculated amount * quantity
                                                                    echo '</tr>';
                                                                    echo '</thead>';
                                                                    echo '<tbody>';

                                                                    // Reset item number and update the current appointment ID
                                                                    $item_no = 1;
                                                                    $numbering++;
                                                                    $current_appointment_id = $row['appointment_id'];
                                                                }

                                                                // Calculate total cost for this item (amount * quantity)
                                                                $item_total_cost = $row['amount'] * $row['quantity'];

                                                                // Add this item's total cost to the running total for the appointment
                                                                $total_amount += $item_total_cost;

                                                                // Output each item within the same appointment
                                                                echo '<tr>';
                                                                echo '<td>' . $item_no++ . '</td>';  // Increment item number
                                                                echo '<td>' . htmlspecialchars($row['item_description']) . '</td>';
                                                                echo '<td>' . htmlspecialchars($row['unit']) . '</td>';
                                                                echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
                                                                echo '<td>$' . htmlspecialchars($row['amount']) . '</td>';
                                                                echo '<td>$' . number_format($item_total_cost, 2) . '</td>';  // Display calculated total cost
                                                                echo '</tr>';

                                                                // Store the last row for proper footer link generation
                                                                $last_row = $row;
                                                            }

                                                            // Close the last card after the loop ends
                                                            echo '</tbody>';
                                                            echo '</table>';
                                                            echo '<div class="card-footer text-center">';
                                                            echo '<a href="/MRM-DEVELOPMENT/USER/services/bookappointments/service_payment.php?account_id=' . htmlspecialchars($last_row['account_id']) . '&appointment_id=' . htmlspecialchars($last_row['appointment_id']) . '" style="color: white; text-decoration: none;" class="btn btn-sm btn-info">Proceed to payment</a>';
                                                            echo '</div>';
                                                            echo '</div>'; // End of last card

                                                            // Display the final amount for the last appointment
                                                            echo '<div class="alert alert-info text-center"><strong>Total Amount: $' . number_format($total_amount, 2) . '</strong></div>';
                                                        } else {
                                                            echo 'No data found.';
                                                        }
                                                    ?>


                                                        </div>


                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="paymentchecking">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                   <!-- Content Here -->
                                                </div>
                                            </div>           
                                            <div class="main-content-body  tab-pane p-4 border-top-0 p-0" id="approved">
                                                <div class="mb-4 main-content-label">Approved</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                     <?php 
                                                                $userid = $_SESSION['account_id'];
                                                                $sql = "SELECT * FROM service_worker
                                                                inner join appointments on appointments.appointment_id = service_worker.appointment_id
                                                                inner join accounts on accounts.account_id = service_worker.account_id
                                                                inner join service_payment on service_payment.payment_id = service_worker.payment_id
                                                                WHERE appointments.account_id = '$userid' AND appointments.status = 'Approved'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $count = 0; // Counter to track the number of cards per row
                                                                    echo '<div class="row">'; // Open the row before starting the loop

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                       
                                                                        // Check if a new row needs to be opened for every two cards
                                                                        if ($count % 2 == 0 && $count != 0) {
                                                                            echo '</div><div class="row">'; // Close the previous row and open a new row after two cards
                                                                        }
                                                                    ?>

                                                                    <div class="col-md-6">
                                                                    <div class="card shadow-sm mb-4" style="border: 2px solid orange;">
                                                                        <div class="card-header bg-primary text-white text-center">
                                                                            <h4 class="card-title mb-0">Appointment Summary</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Your Name</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['name']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Worker name</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['worker_name']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Address</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['location']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Service Type</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['service_type']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Brand</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['brand']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Product</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['product']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Power / Running hours</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['power']) .  htmlspecialchars($row['running_hours']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Product</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['product']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Appointment Date</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['date']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Appointment Time</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['start_time']) . "-" . htmlspecialchars($row['end_time']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Amount</h6>
                                                                                    <p class="text-muted">Paid</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Payment Status</h6>
                                                                                    <span class="badge bg-success"><?= htmlspecialchars($row['payment_status']) ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Worker Update</h6>
                                                                                    <p class="text-muted"><?= htmlspecialchars($row['worker_update']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="fw-bold">Appointment Status</h6>
                                                                                    <span class="badge bg-success"><?= htmlspecialchars($row['status']) ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    </div>

                                                                    <?php 
                                                                        $count++; // Increment counter

                                                                    } // End of while loop

                                                                    echo '</div>'; // Close the final row
                                                                }
                                                            ?>
                                                </div>
                                            </div>   
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                     <!-- Content Here -->
                                                     <?php 
                                                                $userid = $_SESSION['account_id'];
                                                                $sql = "select * from appointments 
                                                                inner join service_payment on appointments.appointment_id = service_payment.appointment_id
                                                                where appointments.account_id = '$userid' and appointments.status = 'Completed'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $count = 0; // Counter to track the number of cards per row
                                                                    echo '<div class="row">'; // Open the row before starting the loop

                                                                    while ($row = mysqli_fetch_assoc($result)) {                                                                  
                                                                        // Check if a new row needs to be opened for every two cards
                                                                        if ($count % 2 == 0 && $count != 0) {
                                                                            echo '</div><div class="row">'; // Close the previous row and open a new row after two cards
                                                                        }
                                                                    ?>

                                                                    <div class="col-md-6">
                                                                        <div class="card shadow-sm mb-4">
                                                                            <div class="card-header bg-primary text-white text-center">
                                                                                <h4 class="card-title mb-0">Appointment Summary</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Name</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['name']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Address</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['location']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Date</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['date']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Time</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['start_time']) . "-" . htmlspecialchars($row['end_time']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Amount</h6>
                                                                                        <p class="text-muted"> FIX THIS </p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Payment Status</h6>
                                                                                        <span class="badge bg-success"><?= htmlspecialchars($row['payment_status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-12 text-center">
                                                                                        <h6 class="fw-bold">Appointment Status</h6>
                                                                                        <span class="badge bg-warning"><?= htmlspecialchars($row['status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-center">
                                                                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#receiptModal"
                                                                            data-account-id="<?= $row['account_id'] ?>" 
                                                                            data-appointment-id="<?= $row['appointment_id'] ?>">
                                                                                Show Receipt
                                                                            </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php 
                                                                        $count++; // Increment counter

                                                                    } // End of while loop

                                                                    echo '</div>'; // Close the final row
                                                                }
                                                            ?>
                                                </div>
                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cancelled">
                                                <div class="mb-4 main-content-label">Cancelled</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    <?php 
                                                                $userid = $_SESSION['account_id'];
                                                                $sql = "SELECT * FROM appointments WHERE account_id = '$userid' AND status = 'Canceled'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $count = 0; // Counter to track the number of cards per row
                                                                    echo '<div class="row">'; // Open the row before starting the loop

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        

                                                                        // Check if a new row needs to be opened for every two cards
                                                                        if ($count % 2 == 0 && $count != 0) {
                                                                            echo '</div><div class="row">'; // Close the previous row and open a new row after two cards
                                                                        }
                                                                    ?>

                                                                    <div class="col-md-6">
                                                                        <div class="card shadow-sm mb-4">
                                                                            <div class="card-header bg-primary text-white text-center">
                                                                                <h4 class="card-title mb-0">Appointment Summary</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Name</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['name']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Address</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['location']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Date</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['date']) ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Appointment Time</h6>
                                                                                        <p class="text-muted"><?= htmlspecialchars($row['start_time']) . "-" . htmlspecialchars($row['end_time']) ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Amount</h6>
                                                                                        <p class="text-muted">Unpaid</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h6 class="fw-bold">Payment Status</h6>
                                                                                        <span class="badge bg-success"><?= htmlspecialchars($row['status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-md-12 text-center">
                                                                                        <h6 class="fw-bold">Appointment Status</h6>
                                                                                        <span class="badge bg-warning"><?= htmlspecialchars($row['status']) ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-center">
                                                                                <button type="button" class="btn btn-primary">Proceed to payment</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php 
                                                                        $count++; // Increment counter

                                                                    } // End of while loop

                                                                    echo '</div>'; // Close the final row
                                                                }
                                                            ?>
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

            <!-- MODAL FOR RECEIPT -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="receiptContent" style="padding: 20px; font-family: Arial, sans-serif;">
            <div style="border: 2px solid #000; padding: 20px;">
                <div class="text-center mb-4">
                    <h2 style="margin-bottom: 5px;">MRM Electric Power Generation Services</h2>
                    <p style="margin: 0;">Official Service Receipt</p>
                    <p style="margin: 0;">1234 Business Ave, City, Country</p>
                    <p style="margin: 0;">Phone: (123) 456-7890</p>
                    <hr style="border-top: 1px solid #000; margin-top: 10px;">
                </div>

                <?php 
                    $receipt = "
                    SELECT * 
                    FROM service_or
                    INNER JOIN accounts AS client_account ON client_account.account_id = service_or.client_id
                    INNER JOIN appointments ON appointments.appointment_id = service_or.appointment_id
                    INNER JOIN service_payment ON service_payment.payment_id = service_or.payment_id
                    INNER JOIN accounts AS worker_account ON worker_account.account_id = service_or.worker_id
                    
                    ";
                    $receipt_result = mysqli_query($conn , $receipt);
                    $row = mysqli_fetch_assoc($receipt_result);
                    $workername = $row['worker_id'];
                    $username = $row['client_id'];
                    $appointment_id = $row['appointment_id'];

                    $worker = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$workername'";
                    $user = "select * from accounts inner join user_info on user_info.user_id = accounts.user_id where account_id = '$username'";

                    $worker_result = mysqli_query($conn , $worker);
                    $user_result = mysqli_query($conn , $user);

                    $row_worker = mysqli_fetch_assoc($worker_result);
                    $row_user = mysqli_fetch_assoc($user_result);
                ?>

                <table class="table table-borderless" style="width: 100%;">
                    <tr>
                        <td><strong>Receipt No:</strong></td>
                        <td><?= $row['receiptid'] ?></td>
                        <td><strong>Date:</strong></td>
                        <td><?= $row['date'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Customer Name:</strong></td>
                        <td><?= $row_user['first_name'] . " " . $row_user['last_name'] ?></td>
                        <td><strong>Worker Name:</strong></td>
                        <td><?= $row_worker['first_name'] . " " . $row_worker['last_name'] ?></td>
                    </tr>
                </table>
                <hr>

                <h5 class="mt-3">Service Details</h5>
                <table class="table table-bordered" style="width: 100%;">
                    <tr>
                        <td><strong>Brand</strong></td>
                        <td><?= $row['brand'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Product</strong></td>
                        <td><?= $row['product'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Power</strong></td>
                        <td><?= $row['power'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Running Hours</strong></td>
                        <td><?= $row['running_hours'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Service Type</strong></td>
                        <td><?= $row['service_type'] ?></td>
                    </tr>
                </table>

                <div class="text-right mt-4">
                    <!-- Content where account_id and appointment_id will be displayed -->
                   
                    <?php 
                    // $account_id = $['']
                    // $price_id = $row['pricing_id'];
                    // $price = "select * from service_pricing where pricingid = '$price_id' and account_id = '$username' AND appointment_id = '$appointment_id'";
                    // $price_result = mysqli_query($conn , $price);
                    // $row_price = mysqli_fetch_assoc($price_result);
                    ?>
                     <p><strong>Total Amount Paid: </strong> $<?= "NOT YET" ?></p>
                </div>
                <div class="text-center mt-5">
                    <p>Thank you for your business!</p>
                    <p><em>Please retain this receipt for your records.</em></p>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="downloadReceipt">Download Receipt</button>
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

        <!-- Prism JS -->
        <script src="../../../assets/libs/prismjs/prism.js"></script>
        <script src="../../../assets/js/prism-custom.js"></script>

        <!-- Custom JS -->
        <script src="../../../assets/js/custom.js"></script>

    </body>

</html>

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




