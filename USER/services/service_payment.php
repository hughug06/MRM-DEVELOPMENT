<?php 
session_start();
require_once '../../Database/database.php';

// Check if account ID is set in the URL
if (isset($_GET['id'])) {
    
    $_SESSION['service_account_id'] = $_GET['id'];
} 

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Handle the image upload
        $image = $_FILES['image'];
        $account_id = $_SESSION['service_account_id'];
        // Define the directory where the image will be uploaded
        $targetDir = "../../assets/images/service-payment/";
        $targetFile = $targetDir . basename($image['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a valid image type
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $validExtensions)) {
            // Ensure the directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Insert the image path into the database
                $sql = "INSERT INTO service_payment (account_id, payment) VALUES ('$account_id', '$targetFile')";

                if ($conn->query($sql) === TRUE) {
                  // SUCCESS
                    unset($_SESSION['service_account_id']);
                    header("Location: /MRM-DEVELOPMENT/USER/dashboard/user-dashboard.php");
                } else {
                    echo "Error inserting record: " . $conn->error;
                    unset($_SESSION['service_account_id']);
                }
            } else {
                echo "Error uploading the file.";
                unset($_SESSION['service_account_id']);
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
            unset($_SESSION['service_account_id']);
        }
    } else {
        echo "No image uploaded or file upload error.";
        unset($_SESSION['service_account_id']);
    }
}
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
        <!-- Display a blank image placeholder -->
        <div class="card p-5 ">
        <div class="mb-3 text-center">
            <div class="card">
            <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid" style="max-height: 300px; display: none;">
            </div>
            
        </div>
        
        <!-- Image Upload Form -->
        <form action="service_payment.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input class="form-control" type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        </div>
    </div>

    <script>
        // JavaScript to display image preview
        document.getElementById('image').onchange = function (event) {
            const [file] = event.target.files;
            if (file) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block';
            }
        };
    </script>

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








