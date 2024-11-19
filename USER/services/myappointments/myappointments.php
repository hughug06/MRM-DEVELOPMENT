<?php 
    require_once '../../../ADMIN/authetincation.php';
    require_once '../../../Database/database.php';
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
                                                                            <div class="card mb-4">
                                                                                    <div class="card-header">
                                                                                        <h5 class="card-title">Book Details</h5>
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
                                                                                        <h6><strong>Reference Number:</strong> <?= htmlspecialchars($resultItem['first_reference']); ?></h6>
                                                                                        <h6><strong>Payment Date:</strong> <?= htmlspecialchars($resultItem['payment_date']); ?></h6>

                                                                                        <!-- Payment and Booking Status -->
                                                                                        <h6><strong>Payment Status:</strong> <?= htmlspecialchars($resultItem['payment_status']); ?></h6>
                                                                                        <h6><strong>Booking Status:</strong> <?= htmlspecialchars($resultItem['booking_status']); ?></h6>
                                                                                    </div>
                                                                                    <div class="card-footer">                                         
                                                                                        <button class="btn btn-primary">Request for refund</button>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                            <?php }} ?>
                                                </div>
                                            </div>           
                                            <div class="main-content-body  tab-pane p-4 border-top-0 p-0" id="approved">
                                                <div class="mb-4 main-content-label">Approved</div>
                                                <div class="card-body border">
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
                                                                                <th class="wd-lg-20p">WORKER NAME</th>
                                                                                <th class="wd-lg-20p">LOCATION</th>
                                                                                <th class="wd-lg-20p">PAYMENT STATUS</th>
                                                                                <th class="wd-lg-20p">AMOUNT TO PAY</th>
                                                                                <th class="wd-lg-20p">PROJECT PROGRESS</th>
                                                                                <th class="wd-lg-20p">STATUS</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                $ongoing = "SELECT * FROM worker_ongoing
                                                                                            INNER JOIN service_booking ON service_booking.booking_id = worker_ongoing.booking_id
                                                                                            INNER JOIN user_info on user_info.user_id = worker_ongoing.worker_id      
                                                                                            where client_id = '$user_id' AND booking_status = 'ongoing'
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
                                                                            </tr>
                                                                            <?php 
                                                                                    }
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
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                     <!-- Content Here -->
                                                </div>
                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cancelled">
                                                <div class="mb-4 main-content-label">Cancelled</div>
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
                                                                <td><?= htmlspecialchars($resultItem['reference_number']); ?></td>
                                                                <td><?= htmlspecialchars($resultItem['payment_date']); ?></td>
                                                                <td><span class="badge bg-warning"><?= htmlspecialchars($resultItem['payment_status']); ?></span></td>
                                                                <td><span class="badge bg-danger"><?= htmlspecialchars($resultItem['booking_status']); ?></span></td>
                                                                <td><span class="text-info"><?= htmlspecialchars($resultItem['reason']); ?></span></td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-sm">Request for refund</button>
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




