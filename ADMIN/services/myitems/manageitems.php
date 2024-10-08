<?php 
  require_once '../../authetincation.php';
  require_once '../../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../../partials/head.php') ?>
        <title> Manage Items </title>
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

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once('../../../partials/header.php') ?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row row-sm mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                            <div class="card custom-card">
                                <div class="card-header border-bottom-0 d-block">                            
                                    <label class="main-content-label mb-0 pt-2">Items</label>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                            <thead>
                                                <tr>
                                                    <th class="wd-lg-8p"><span>Column 1</span></th>
                                                    <th class="wd-lg-20p"><span>Column 2</span></th>
                                                    <th class="wd-lg-20p"><span>Column 3</span></th>
                                                    <th class="wd-lg-20p"><span>Column 4</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>                        
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Start -->
            <?php include_once('../../../partials/footer.php') ?>
            <!-- Footer End -->
        </div>
        
        <!-- Scroll To Top -->
        <div class="scrollToTop">
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
