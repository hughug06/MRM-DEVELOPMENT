<?php 
require_once '../../Database/database.php';
require_once '../authetincation.php';
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
                                    <a class="nav-link  active" data-bs-toggle="tab" id="about-tab" href="#pending">Tab 1
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#profile">Tab 2
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#chain">Tab 3
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#completed">Tab 4
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#contact">Tab 5
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="pending">
                                                <div class="mb-4 main-content-label">Pending</div>
                                                <div class="card-body border"> 
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover text-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-lg-2"><span>name</span></th>
                                                                    <th class="col-lg-2"><span>product</span></th>
                                                                    <th class="col-lg-3"><span>meeting link</span></th>
                                                                    <th class="col-lg-2"><span>date</span></th>
                                                                    <th class="col-lg-2"><span>time</span></th>
                                                                    <th class="col-lg-1">status</th>
                                                                    <th class="col-lg-1">action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                require '../../Database/database.php';
                                                                $select = "SELECT * FROM chaintercom_appointment";
                                                                $result = mysqli_query($conn, $select);
                                                                if(mysqli_num_rows($result) > 0) {
                                                                    foreach($result as $resultItem) {
                                                                        ?> 
                                                                        <tr>
                                                                            <td><?= $resultItem['name'] ?></td>    
                                                                            <td><?= $resultItem['product'] ?></td>    
                                                                            <?php
                                                                        
                                                                            if( $resultItem['date'] == date('Y-m-d') ) {?>
                                                                            <td><a href="meeting_room.php?app_id=<?= $resultItem['chaintercomappointid'] ?>&account_id=<?= $resultItem['account_id'] ?>">Meeting link</a></td> 
                                                                            <?php 
                                                                            }
                                                                            else{

                                                                            
                                                                            ?>
                                                                            <td>Not yet available</td> 
                                                                            <?php 
                                                                            }
                                                                            ?>
                                                                            <td><?= $resultItem['date'] ?></td>
                                                                            <td><?= $resultItem['start_time'] . " - " . $resultItem['end_time'] ?></td>                        
                                                                            <td><?= $resultItem['status'] ?></td>                          
                                                                            <td>
                                                                                <button class="btn btn-danger d-flex gap-2"><i class="fe fe-trash"></i>DECLINE</button>
                                                                            </td>
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
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="profile">
                                                <div class="mb-4 main-content-label">Waiting for Payment</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="chain">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="contact">
                                                <div class="mb-4 main-content-label">Cancelled Appointment</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
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
    <script src="../../../assets/js/sticky.js"></script>

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

<!-- Bootstrap 5 Icons CDN (for icons) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Flatpickr CSS (for custom date picker) -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<!-- Flatpickr JS (for custom date picker) -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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