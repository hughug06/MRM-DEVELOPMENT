<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../../USER/partials/head.php') ?>

    <title> Product control</title>
    
    <!-- Favicon -->
    <link rel="icon" href="../../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../../assets/libs/choices.js/public/assets/styles/choices.min.css">


<!-- Prism CSS -->
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    


    

    <div class="page">

         <!-- app-header -->
         <?php include_once('../../../USER/partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
                <div class="main-content app-content">
                    <div class="container-fluid">
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Id</th>
                                                <th scope="col">Created</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">MRM SOLAR</th>
                                                <td>#12345</td>
                                                <td>24 May 2022</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-success-transparent rounded-pill"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                                class="ri-edit-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">MRM SOLAR</th>
                                                <td>#12345</td>
                                                <td>02 July 2022</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-success-transparent rounded-pill"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                                class="ri-edit-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">MRM SOLAR</th>
                                                <td>#12345</td>
                                                <td>15 April 2022</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-success-transparent rounded-pill"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                                class="ri-edit-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">MRM SOLAR</th>
                                                <td>#123456</td>
                                                <td>17 March 2022</td>
                                                <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-success-transparent rounded-pill"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                                class="ri-edit-line"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
        <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once('../../../USER/partials/footer.php') ?>
        <!-- Footer End -->
       
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

   <!-- Popper JS -->
   <script src="../../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="../../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Defaultmenu JS -->
<script src="../../../../assets/js/defaultmenu.min.js"></script>

<!-- Node Waves JS-->
<script src="../../../../assets/libs/node-waves/waves.min.js"></script>

<!-- Sticky JS -->
<script src="../../../../assets/js/sticky.js"></script>

<!-- Simplebar JS -->
<script src="../../../../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../../../../assets/js/simplebar.js"></script>

<!-- Color Picker JS -->
<script src="../../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>



<!-- Custom-Switcher JS -->
<script src="../../../assets/js/custom-switcher.min.js"></script>

<!-- Custom JS -->
<script src="../../../assets/js/custom.js"></script>

</body>

</html>