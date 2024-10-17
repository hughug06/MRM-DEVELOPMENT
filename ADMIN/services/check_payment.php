<?php 
    require_once '../../Database/database.php';
    require_once '../authetincation.php';

    // Process payment if account_id is set
    // Process payment confirmation or rejection if account_id and action are provided
if (isset($_POST['account_id']) && isset($_POST['appoint_id'])  && isset($_POST['action'])) {
    $account_id = $_POST['account_id'];
    $appoint_id = $_POST['appoint_id'];
    $action = $_POST['action'];
    // Confirm or Reject based on the action value
   if ($action == 'reject') {
        // Update queries for rejecting payment
        $sql = "UPDATE appointments SET status = 'Canceled' WHERE account_id = '$account_id' AND  appointment_id = '$appoint_id'";
        $sql2 = "UPDATE service_payment SET payment_status = 'rejected' WHERE account_id = '$account_id' AND  appointment_id = '$appoint_id'";
        $sql3 = "UPDATE accounts SET service_count = service_count - 1 WHERE account_id = '$account_id'";
    }

    // Execute the queries
    if ($conn->query($sql) === TRUE) {
        if ($action == 'reject') {
            // Execute additional queries for rejection
            if ($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
                // All queries executed successfully
                header("Location: /MRM-DEVELOPMENT/ADMIN/services/appointment.php");
            } else {
                // Error executing sql2 or sql3
                echo "Error updating records: " . $conn->error;
            }
        } else {
            // Confirmation action
            header("Location: /MRM-DEVELOPMENT/ADMIN/services/appointment.php");
        }
    } else {
        // Error executing the first query
        echo "Error updating record: " . $conn->error;
    }
}

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

            <!-- MODAL -->
            <div class="main-content app-content">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                $result = mysqli_query($conn , $sql);

                                if(mysqli_num_rows($result) > 0) {                
                                    foreach($result as $resultitem) {                
                                ?>
                                    <div class="card-body">
                                    <form action="assign_worker.php" method="POST">
                                            <input type="hidden" name="worker_id" value="<?= $resultitem['account_id'] ?>">
                                            <h5 class="card-title">NAME: <?= $resultitem['first_name'] . " " . $resultitem['last_name'] ?></h5>
                                            <p class="card-text">ROLE: <?= $resultitem['role'] ?></p>
                                            <button type="submit" name="pick" class="btn btn-primary">Pick Worker</button>
                                            <input type="hidden" name="user_id"  value="<?= $_GET['id'] ?>">
                                            <input type="hidden" name="appointment_id" value="<?= $_GET['appoint_id'] ?>">
                                            <input type="hidden" name="payment_id" value="<?= $_GET['payment_id'] ?>">
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
                <div class="container-fluid">
    <div class="card">
        <?php 
            if (isset($_GET['id']) && isset($_GET['appoint_id'])) {
                $account_id = $_GET['id']; 
                $appoint_id = $_GET['appoint_id']; 
                $sql = "SELECT * FROM service_payment WHERE account_id = '$account_id' AND appointment_id = '$appoint_id'";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Assuming the 'payment' column contains the image file path
                        $imagePath = $row['payment'];

                        // Check if the file exists to avoid broken image
                        if (file_exists($imagePath)) {
        ?>
                            <!-- Display the image -->
                            <img src="<?php echo $imagePath; ?>" alt="Payment Image" style="max-width: 100%; height: auto;">
        <?php 
                        } else {
                            echo '<p>Image not found.</p>'; // Error message if image not found
                        }
                    }
                } else {
                    echo '<p>No payment data found.</p>'; // Error message if no data
                }
            }
        ?>

        <!-- Assign Trigger Modal Button -->
        <a href="#" class="btn btn-sm btn-info assign-btn"        
                data-bs-toggle="modal" 
                data-bs-target="#staticBackdrop">
                <i class="fe fe-edit-2">ASSIGN</i>
        </a>

        <!-- Reject Payment Button -->
        <a href="javascript:void(0);" onclick="rejectPayment(<?php echo $account_id; ?>, <?php echo $appoint_id; ?>)" class="btn btn-danger mt-3 ml-2">Reject Payment</a>

        <!-- Hidden form for rejecting the payment -->
        <form id="rejectPaymentForm" action="check_payment.php" method="POST" style="display:none;">
            <input type="hidden" name="account_id" id="reject_account_id" value="">
            <input type="hidden" name="appoint_id" id="reject_appoint_id" value="">
            <input type="hidden" name="action" value="reject">
        </form>
    </div>                       
</div>


                <!-- Include SweetAlert2 from CDN -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
           
                    function rejectPayment(account_id , appointment_id) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Do you want to reject the payment?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, reject it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If the user confirms, set the account ID and submit the form for rejection
                                document.getElementById('reject_account_id').value = account_id;
                                document.getElementById('reject_appoint_id').value = appointment_id;
                                document.getElementById('rejectPaymentForm').submit();
                            }
                        });
                    }
                </script>

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



