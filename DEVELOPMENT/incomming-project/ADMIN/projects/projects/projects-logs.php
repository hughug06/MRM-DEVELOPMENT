<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> Logs </title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../assets/js/main.js"></script>

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
            <div class="container-fluid">

                <!-- Page Header -->

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">PROJECT LOGS</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Notifications-list</li>
                      </ol>
                  </div>
                  <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-download me-2 fs-14"></i> Import
                        </button>
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-filter me-2 fs-14"></i> Filter
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text d-inline-flex align-items-center">
                          <i class="fe fe-download-cloud me-2 fs-14"></i> Download Report
                        </button>
                    </div>
                  </div>
                </div>

                <!-- Page Header Close -->

                <!-- Start::container -->
                <div class="container">
                    <ul class="notification">
                        <li>
                            <div class="notification-time">
                                <span class="date">Today</span>
                                <span class="time">02:31</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">Today</span>
                                <span class="time ms-2">02:31</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/1.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Dennis Trexy</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">2 Hrs ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">Yesterday</span>
                                <span class="time">18:47</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">Yesterday</span>
                                <span class="time ms-2">18:47</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md offline">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/2.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Robbie Ruder</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">18:47</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">Yesterday</span>
                                <span class="time">06:43</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">Yesterday</span>
                                <span class="time ms-2">06:43</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/3.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Elida Distefa</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">06:43</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">23 Oct</span>
                                <span class="time">03:15</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">23 Oct</span>
                                <span class="time ms-2">03:15</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/4.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Harvey Mattos</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">03:15</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">15 Oct</span>
                                <span class="time">12:14</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">15 Oct</span>
                                <span class="time ms-2">12:14</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md offline">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/5.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Catrice Doshier</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">12:14</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">30 Sep</span>
                                <span class="time">14:04</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">30 Sep</span>
                                <span class="time ms-2">14:04</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md offline">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/6.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Mercy Ritia</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">14:04</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">18 Sep</span>
                                <span class="time">12:26</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">18 Sep</span>
                                <span class="time ms-2">12:26</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/7.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Mark Jhon</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">12:26</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">03 Sep</span>
                                <span class="time">05:37</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">03 Sep</span>
                                <span class="time ms-2">05:37</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md offline">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/8.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Benedict Vallone</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">05:37</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="notification-time">
                                <span class="date">28 Aug</span>
                                <span class="time">15:24</span>
                            </div>
                            <div class="notification-icon">
                                <a href="javascript:void(0);"></a>
                            </div>
                            <div class="notification-time-date mb-2 d-block d-md-none">
                                <span class="date">28 Aug</span>
                                <span class="time ms-2">15:24</span>
                            </div>
                            <div class="notification-body">
                                <div class="media mt-0">
                                    <div class="main-avatar avatar-md online">
                                        <img alt="avatar" class="rounded-6" src="../assets/images/faces/9.jpg">
                                    </div>
                                    <div class="media-body ms-3 d-flex">
                                        <div class="">
                                            <p class="tx-14 text-dark mb-0 tx-semibold">Paul Johny</p>
                                            <p class="mb-0 tx-13 text-muted">ACCEPTED REQUEST</p>
                                        </div>
                                        <div class="notify-time">
                                            <p class="mb-0 text-muted tx-11">15:24</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mb-4">
                        <a href="javascript:void(0);" class="btn ripple btn-primary w-md" role="button">Load more</a>
                    </div>
                </div>
                <!--End::container -->

            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php include_once('partials/footer.php') ?>
        <!-- Footer End -->
      



    </div>

    
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


    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
    

</body>

</html>