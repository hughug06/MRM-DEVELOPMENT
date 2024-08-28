
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php
    include_once(__DIR__.'/../partials/head.php');
    // include '../../ADMIN/authetincation.php';  CURRENTLY ON COMMENT FOR REVISION OF FILE
    ?>
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
            <div class="main-content app-content">
                <div class="container-fluid">
                <!-- <div class="div-text-start mt-3 justify-self-center"><h1>SERVICES</h1></div> -->
                    <div class="d-flex flex-xl-row flex-md-column flex-column justify-content-center mt-4 gap-4">
                        <div class="card custom-card">
                            <img src="../../assets/images/media/media-44.jpg" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-semibold">Generator</h6>
                                <p class="card-text"> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                <button type="button" class="btn btn-primary btn-wave align-self-end" data-bs-toggle="modal" data-bs-target="#generator-services-modal">Avail Now</button>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <img src="../../assets/images/media/media-44.jpg" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-semibold">Solar Panel</h6>
                                <p class="card-text"> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                <button type="button" class="btn btn-primary btn-wave align-self-end" data-bs-toggle="modal" data-bs-target="#solar-services-modal">Avail Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="generator-services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generator-services-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                    <div class="modal-content">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
                        <div class="login_form">
                            <div class="main-container container-fluid">
                                <div class="card-body p-5">
                                    <form action="user/signup/function.php" method="POST">
                                        <h1 class="text-start pb-4 d-flex justify-content-center text-warning">GENERATORS' SERVICES</h1>
                                        <div class="form-group text-start mb-3">
                                            <label for="g_fName" class="text-muted">Full Name</label>
                                            <input class="form-control" placeholder="" type="text" name="name" id="g_fName" disabled>
                                        </div>
                                        <div class="form-group text-start mb-3">
                                            <label for="g_Brand" class="text-muted">Brand</label>
                                            <input class="form-control" placeholder="" type="text" name="username" id="g_Brand">
                                        </div>
                                        <label for="g_KVA" class="text-muted">KVA Type</label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="g_KVA">
                                            <option value="">Select...</option>
                                            <option value="Choice 1">Choice 1</option>
                                            <option value="Choice 2">Choice 2</option>
                                            <option value="Choice 3">Choice 3</option>
                                        </select>
                                        <div class="form-group text-start mb-3">
                                            <label for="g_RHU" class="text-muted">Running Hours Unit</label>
                                            <input class="form-control" placeholder="" type="text" name="email" id="g_RHU">
                                        </div>
                                        <label for="g_Type" class="text-muted">Service Type</label>
                                        <select class="form-control" data-trigger name="choices-single-default" id="g_Type">
                                            <option value="Choice 1">Maintenance</option>
                                            <option value="Choice 2">Repair</option>
                                            <option value="Choice 3">Installation</option>
                                            <option value="Choice 4">Tune Up</option>
                                        </select>
                                        <div class="d-flex flex-column align-items-stretch flex-grow mt-5">
                                            <button type="submit" name="Sumbit_Srv" class="btn btn-warning text-white py-2">Submit</button>   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="solar-services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="solar-services-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                    <div class="modal-content">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
                        <div class="login_form">
                            <div class="main-container container-fluid">
                                <div class="card-body p-5">
                                    <form action="function.php" method="POST">
                                        <h1 class="text-start pb-4 d-flex justify-content-center text-warning">Solar Panels' Services</h1>
                                        <div class="form-group text-start mb-3">
                                            <label for="su_FullName" class="text-muted">Full Name</label>
                                            <input class="form-control" placeholder="" value="" type="text" name="Name" id="s_fName">
                                        </div>
                                        <div class="form-group text-start mb-3">
                                            <label for="su_UserName" class="text-muted">Brand</label>
                                            <input class="form-control" placeholder="" type="text" name="Brand" id="s_Brand">
                                        </div>
                                        <label for="s_KVA" class="text-muted">KVA</label>
                                        <select class="form-control" data-trigger name="KVA" id="s_KVA">
                                            <option value="Choice 1">12</option>
                                            <option value="Choice 2">Choice 2</option>
                                            <option value="Choice 3">Choice 3</option>
                                        </select>
                                        <div class="form-group text-start mb-3">
                                            <label for="su_Email" class="text-muted">Running Hours Unit</label>
                                            <input class="form-control" placeholder="" type="numbers" name="RunningHoursUnit" id="su_Email">
                                        </div>
                                        <label for="s_Type" class="text-muted">Service Type</label>
                                        <select class="form-control" data-trigger name="ServiceType" id="s_Type">
                                            <option value="Choice 1">Maintenance</option>
                                            <option value="Choice 2">Repair</option>
                                            <option value="Choice 3">Installation</option>
                                        </select>
                                        <div class="d-flex flex-column align-items-stretch flex-grow mt-5">
                                            <button type="submit" name="Sumbit_Srv" class="btn btn-warning text-white py-2">Submit</button>   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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