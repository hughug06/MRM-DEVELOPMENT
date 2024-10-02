<?php 
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php
    include_once(__DIR__.'/../../partials/head.php');
    
    ?>
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #343a40; /* Dark background for the page */
            color: white; /* White text for contrast */
        }
        .card {
            transition: transform 0.2s; /* Smooth zoom effect */
            background-color: #495057; /* Darker card background */
            width: 100%; /* Full width of the column */
            max-width: 600px; /* Set maximum width */
            margin: auto; /* Center the card */
        }
        .card:hover {
            transform: scale(1.05); /* Scale card on hover */
        }
        .card-header {
            background-color: #007bff; /* Primary color */
            color: white; /* White text for contrast */
        }
        .status-active {
            color: #28a745; /* Green for active status */
        }
        .status-pending {
            color: #ffc107; /* Yellow for pending status */
        }
        .status-on-hold {
            color: #dc3545; /* Red for on-hold status */
        }
    </style>

</head>

<body>





    <div class="page">

             <!-- app-header -->
             <?php include_once(__DIR__.'/../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">         
            <div class="container mt-5">
                    <div class="row">
                        
                        <!-- Single Worker Card -->
                        <div class="col-md-6 offset-md-3 mb-4">
                            <div class="card shadow">
                            <div class="card-header">
                                     <?php 
                                  // Validate appointment_id
                                        if (isset($_GET['id'])) {
                                            $appointment_id = $_GET['id'];

                                            // Prepare the SQL statement to prevent SQL injection
                                            $select = "SELECT * FROM service_worker WHERE appointment_id = '$appointment_id'";
                                            $select_exec = mysqli_query($conn, $select);
                                            
                                            if ($select_exec) {
                                                // Check if there are any results
                                                if (mysqli_num_rows($select_exec) > 0) {
                                                    $row = mysqli_fetch_assoc($select_exec);       
                                                    ?>
                                                    <h5 class="card-title">Worker Name: <strong><?= htmlspecialchars($row['worker_name']) ?></strong></h5>
                                                    <?php 
                                                } else {
                                                    // No results found
                                                    ?>
                                                    <h5 class="card-title text-danger">Worker Name: <strong>Not Assigned</strong></h5>
                                                    <?php
                                                }
                                            } else {
                                                // Query execution failed
                                                ?>
                                                <h5 class="card-title">Worker Name: <strong>Error fetching data</strong></h5>
                                                <?php
                                            }
                                        } else {
                                            // appointment_id is not set
                                            ?>
                                            <h5 class="card-title">Worker Name: <strong>Invalid appointment ID</strong></h5>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                <div class="card-body">
                                    <?php                                 
                                  

                                    $sql = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <p><strong>Your Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
                                    <p><strong>Your Address:</strong> <?= htmlspecialchars($row['location']) ?></p>
                                    <p><strong>Contact:</strong> N/A yet</p>
                                    <p><strong>Inquire Brand:</strong> <?= htmlspecialchars($row['brand']) ?> X</p>
                                    <p><strong>Worker Update:</strong> Completed</p>
                                    <p><strong>Status:</strong> <span class="status-active"><?= htmlspecialchars($row['status']) ?></span></p>
                                    <p><strong>Product:</strong> <?= htmlspecialchars($row['product']) ?></p>
                                    <p><strong>Power:</strong> <?= htmlspecialchars($row['power']) ?></p>
                                    <p><strong>Running Hours:</strong> <?= htmlspecialchars($row['running_hours']) ?></p>
                                    <p><strong>Service Type:</strong> <?= htmlspecialchars($row['service_type']) ?></p>
                                    <p><strong>Date:</strong> <?= htmlspecialchars($row['date']) ?></p>
                                    <p><strong>Time:</strong> <?= htmlspecialchars($row['start_time']) . " - " . htmlspecialchars($row['end_time']) ?></p>

                                    <?php 
                                        }
                                    }
                                    ?>
                                    <div class="d-flex justify-content-center">
                                    <button class="btn-danger">CANCEL THIS SHIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            

            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'/../../partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
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

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>








