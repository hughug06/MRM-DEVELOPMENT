<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__.'/../partials/head.php')?>
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

</head>

<body>





    <div class="page">

             <!-- app-header -->
             <?php include_once(__DIR__.'/../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content d-flex align-items-center">
                <div class="container-fluid w-50">
                    <div class="card-body shadow rounded p-5">
                        <div class="d-flex mb-4 rounded-2 justify-content-center btn btn-warning-light btn-border-down disabled"><h2 class="mt-2">SERVICES</h2></div>
                        <form method="" action="">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control"
                                        aria-label="First name">
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label class="form-label">Company's Name</label>
                                    <input type="text" class="form-control"
                                        aria-label="Last name">
                                </div> -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="inputGroupSelect01">Product Type</label>
                                    <select class="form-select p-2" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">Solar Panel</option>
                                        <option value="2">Generator</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Specification</label>
                                    <input type="email" class="form-control"
                                    aria-label="email">
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="number" class="form-control"
                                        aria-label="Phone number">
                                </div> -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="inputGroupSelect01">Service Type</label>
                                    <select class="form-select p-2" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">Maintenance</option>
                                        <option value="2">Tune-up</option>
                                        <option value="3">Repair</option>
                                        <option value="4">Installation</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning btn-w-lg btn-wave">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'/../partials/footer.php') ?>
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