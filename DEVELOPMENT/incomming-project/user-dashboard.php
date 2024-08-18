<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> SPRUHA - Bootstrap 5 Premium Admin & Dashboard Template </title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../assets/js/main.js"></script>


     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">


<link rel="stylesheet" href="../assets/libs/jsvectormap/css/jsvectormap.min.css">

<link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">

</head>

<body>

<div class="page">        

 <!-- app-header -->
 <?php include_once('partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            
        </div>
        <!-- End::app-content -->

        
       

    </div>

  <!-- Footer Start -->
  <?php include_once('partials/footer.php') ?>
        <!-- Footer End -->
    

    
    

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    <!-- JSVector Maps JS -->
    <script src="../assets/libs/jsvectormap/js/jsvectormap.min.js"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="../assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Apex Charts JS -->
    <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Main-Dashboard -->
    <script src="../assets/js/index.js"></script>

    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>

<nav class="main-menu-container nav nav-pills flex-column sub-open">
        <div class="slide-left" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
        </div>
        <ul class="main-menu">
            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">ADMIN</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="dashboard.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-home side-menu__icon"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="task.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-app-indicator side-menu__icon"></i> 
                    <span class="side-menu__label">Task</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="message.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-chat side-menu__icon"></i>
                    <span class="side-menu__label">Message</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="incomming-project.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-book side-menu__icon"></i>
                    <span class="side-menu__label">Incomming project</span>
                </a>
            </li>
            <!-- End::slide -->

             <!-- Start::slide -->
             <li class="slide">
                <a href="ongoing-project.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-book-half side-menu__icon"></i>
                    <span class="side-menu__label">On going project</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="employee.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-person side-menu__icon"></i>
                    <span class="side-menu__label">Employee</span>
                </a>
            </li>
            <!-- End::slide -->
            
            <!-- Start::slide -->
            <li class="slide">
                <a href="report.php" class="side-menu__item">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="bi-flag side-menu__icon"></i>
                    <span class="side-menu__label">Report</span>
                </a>
            </li>
            <!-- End::slide -->
 
        </ul>
    
    </nav>