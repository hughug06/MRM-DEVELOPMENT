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
                                                                    WHERE payment_status ='advance_payment' AND booking_status = 'pending'";
                                                        $result = mysqli_query($conn , $select);
                                                        $row = mysqli_fetch_assoc($result);
                                                        $account_id = $row['account_id'];
                                                        $name = "select * from accounts 
                                                                inner join user_info on user_info.user_id = accounts.user_id
                                                                where account_id = '$account_id'";
                                                        $result_name = mysqli_query($conn , $name);
                                                        $row_name = mysqli_fetch_assoc($result_name);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            foreach ($result as $resultItem) { 
                                                        ?>
                                                            <div class="col-md-4">
                                                                <div class="card mb-4">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title"><?= htmlspecialchars($row_name['first_name']) .' '.htmlspecialchars($row_name['last_name']) ; ?></h5>
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
                                                                        <h6><strong>Reference Number:</strong> <?= htmlspecialchars($resultItem['reference_number']); ?></h6>
                                                                        <h6><strong>Payment Date:</strong> <?= htmlspecialchars($resultItem['payment_date']); ?></h6>

                                                                        <!-- Payment and Booking Status -->
                                                                        <h6><strong>Payment Status:</strong> <?= htmlspecialchars($resultItem['payment_status']); ?></h6>
                                                                        <h6><strong>Booking Status:</strong> <?= htmlspecialchars($resultItem['booking_status']); ?></h6>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <button class="btn btn-primary">APPROVE</button>
                                                                        <button class="btn btn-primary">DECLINE</button>
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
                                            <div class="modal fade" id="paymentCheckModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentCheckModal" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">CHOOSE WORKER</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="card" style="width: 18rem;">
                                                            <?php 
                                                                $sql = "SELECT * FROM user_info 
                                                                        INNER JOIN accounts ON user_info.user_id = accounts.user_id 
                                                                        WHERE role = 'service_worker'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {                
                                                                    while ($resultitem = mysqli_fetch_assoc($result)) {                
                                                                ?>
                                                                        <div class="card-body">
                                                                            <form action="assign_worker.php" method="POST">
                                                                                <!-- Worker ID -->
                                                                                <input type="hidden" name="worker_id" value="<?= htmlspecialchars($resultitem['account_id']) ?>">
                                                                                
                                                                                <!-- Display Worker Name and Role -->
                                                                                <h5 class="card-title">NAME: <?= htmlspecialchars($resultitem['first_name'] . " " . $resultitem['last_name']) ?></h5>
                                                                                <p class="card-text">ROLE: <?= htmlspecialchars($resultitem['role']) ?></p>
                                                                                
                                                                                <!-- Submit Button -->
                                                                                <button type="submit" name="pick" class="btn btn-primary">Pick Worker</button>
                                                                                
                                                                                <!-- Hidden Input Fields for Account, Appointment, and Payment IDs -->
                                                                                <input type="hidden" class="accountId" name="account_id">
                                                                                <input type="hidden" class="appointmentId" name="appointment_id">
                                                                                <input type="hidden" class="paymentId" name="payment_id">
                                                                            </form>                                                                        
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>


                                                                            
                                                                </div>
                                                            </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="on_going">
                                                <div class="mb-4 main-content-label">On going projects</div>
                                                <div class="card-body border">
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Total Cost</span></th> 
                                                                    <th class="wd-lg-8p"><span>Service Type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Schedule</span></th>
                                                                    <th class="wd-lg-20p"><span>Mode of Payment</span></th>     
                                                                    <th class="wd-lg-20p"><span>Reference Number</span></th>     
                                                                    <th class="wd-lg-20p"><span>Bank Name</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                         
                                                        </table>
                                                    </div>             
                                                </div>
                                            </div>
                                           
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                    

                                            
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="cancel">
                                                <div class="mb-4 main-content-label">Cancelled Appointment</div>
                                                <div class="card-body border">
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Service type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Brand/product/power/running hours</span></th>
                                                                    <th class="wd-lg-20p"><span>Schedule</span></th>     
                                                                    <th class="wd-lg-20p"><span>Payment Status</span></th>     
                                                                    <th class="wd-lg-20p"><span>Appointment Status</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                           
                                                           
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

        <script>
            $(document).ready(function() {
                // When the assign button is clicked
                $('.assign-btn').on('click', function() {
                
                    // Get the account_id and appointment_id from data attributes
                    var userId = $(this).data('account-id');
                    var appointmentId = $(this).data('appointment-id');

                    // Set the values in the modal's hidden fields or display them as needed
                    $('#user_id').val(userId);
                    $('#appointment_id').val(appointmentId);
                    
                });
            });
        </script>

        <!-- For Add Item Quotation -->
        <script>
            let itemCount = 0;

            // Function to update item numbers dynamically
            function updateItemNumbers() {
                const rows = document.querySelectorAll('#itemTableBody tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCount = rows.length; // Adjust itemCount to the current number of rows
            }

            document.getElementById('addItemButton').addEventListener('click', function() {
                itemCount++;

                // Create a new row
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>${itemCount}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                                            $result = mysqli_query($conn, $query);
                        
                                            // Check if there are results and populate the options
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                                }
                                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById('itemTableBody').appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                newRow.querySelector('select[name="item_description[]"]').addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;
                    amountField.value = amount;
                    unitField.value = unit;
                });

                // Add event listener to update total cost when quantity changes
                newRow.querySelector('input[name="quantity[]"]').addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0;
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbers(); // Update item numbers after removing a row
                });
            });
        </script>

    </body>

</html>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const paymentButtons = document.querySelectorAll('.payment-check-button');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function() {
            const accountId = this.getAttribute('data-account-id');
            const appointmentId = this.getAttribute('data-appointment-id');
            const paymentId = this.getAttribute('data-payment-id');

            // Populate all elements with the class 'accountId'
            document.querySelectorAll('.accountId').forEach(el => {
                el.value = accountId;
            });

            // Populate all elements with the class 'appointmentId'
            document.querySelectorAll('.appointmentId').forEach(el => {
                el.value = appointmentId;
            });

            // Populate all elements with the class 'paymentId'
            document.querySelectorAll('.paymentId').forEach(el => {
                el.value = paymentId;
            });
        });
    });
});


</script>
