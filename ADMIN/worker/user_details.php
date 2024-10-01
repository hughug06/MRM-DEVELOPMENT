<?php 
//require_once '../authetincation.php';
session_start();
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../partials/head.php') ?>

        <title>User Details</title>
        
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

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once('../../partials/header.php') ?>
            <!-- /app-header -->

            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <?php 
                                    $account_id = $_GET['user_id'];
                                    $appointment_id = $_GET['appointment_id'];
                                    $sql = "select * from appointments where account_id = '$account_id' and appointment_id = '$appointment_id'";
                                    $result = mysqli_query($conn , $sql);                                   
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){

                                     
                            ?>
                            <h5 class="card-title">User Information</h5>
                            <p class="card-text">Name: <span class="text-success"><?= $row['name'] ?></span></p>
                            <p class="card-text">Address: <span class="text-success"><?= $row['location'] ?></span></p>
                            <p class="card-text">Brand: <span class="text-success"><?= $row['brand'] ?></span></p>
                            <p class="card-text">Product: <span class="text-success"><?= $row['product'] ?></span></p>
                            <p class="card-text">Power: <span class="text-success"><?= $row['power'] ?></span></p>
                            <p class="card-text">Running hours: <span class="text-success"><?= $row['running_hours'] ?></span></p>
                            <p class="card-text">Service_type: <span class="text-success"><?= $row['service_type'] ?></span></p>
                            <p class="card-text">date/time: <span class="text-success"><?= $row['date'] ." | " . $row['start_time'] . " - " . $row['end_time']?></span></p>
                         
                            <hr>
                            <form method="POST" action="upload.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="imageUpload" class="form-label">Upload proof of service</label>
                                    <input type="file" class="form-control" id="imageUpload" name="image" accept=".png, .jpg, .jpeg" required>
                                    <div class="form-text">Only PNG or JPG images are allowed.</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload Image</button>
                                <div class="mb-3 text-center">
                                <div class="card">
                                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid" style="max-height: 300px; display: none;">
                                </div>
                                
                            </div>
                            </form>

                            <?php 
                               }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->
        </div>

        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
            <!-- Footer End -->
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

        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

    </body>

</html>

<script>
        // JavaScript to display image preview
        document.getElementById('imageUpload').onchange = function (event) {
            const [file] = event.target.files;
            if (file) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block';
            }
        };
    </script>