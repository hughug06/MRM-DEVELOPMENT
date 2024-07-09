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
            <div class="container-fluid">

               

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">ANALYTICS</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Widgets</li>
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
       
                <!-- Start::row-1 -->
                <div class="row row-sm">
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <p class="mb-1 ">Number Of Sales</p>
                                <div>
                                    <h4 class="dash-25 mb-2">568</h4>
                                </div>
                                <div class="expansion-value d-flex ">
                                    <strong><i class="bi bi-caret-down-fill me-1 text-danger fs-11"></i> 0.5%</strong>
                                    <strong class="ms-auto"><i class="bi bi-caret-up-fill fs-11 me-1 text-success"></i>0.7%</strong>
                                </div>
                                <div class="progress progress-sm progress-animate">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                                </div>
                                <div class="expansion-label d-flex text-muted">
                                    <span>Target</span>
                                    <span class="ms-auto">Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <p class="mb-1 ">New Revenue</p>
                                <div>
                                    <h4 class="dash-25 mb-2">$12,897</h4>
                                </div>
                                <div class="expansion-value d-flex ">
                                    <strong><i class="bi bi-caret-up-fill me-1 text-success fs-11"></i> 0.72%</strong>
                                    <strong class="ms-auto"><i class="bi bi-caret-down-fill me-1 text-danger fs-11"></i>0.43%</strong>
                                </div>
                                <div class="progress progress-sm progress-animate">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
                                </div>
                                <div class="expansion-label d-flex text-muted">
                                    <span>Target</span>
                                    <span class="ms-auto">Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <p class="mb-1 ">Total Cost</p>
                                <div>
                                    <h4 class="dash-25 mb-2">$11,234</h4>
                                </div>
                                <div class="expansion-value d-flex ">
                                    <strong><i class="bi bi-caret-down-fill me-1 text-danger fs-11"></i> 1.4%</strong>
                                    <strong class="ms-auto"><i class="bi bi-caret-down-fill me-1 text-danger fs-11"></i>1.44%</strong>
                                </div>
                                <div class="progress progress-sm progress-animate">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                                </div>
                                <div class="expansion-label d-flex text-muted">
                                    <span>Target</span>
                                    <span class="ms-auto">Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <p class="mb-1 ">Profit By Sale</p>
                                <div>
                                    <h4 class="dash-25 mb-2">$789</h4>
                                </div>
                                <div class="expansion-value d-flex ">
                                    <strong><i class="bi bi-caret-down-fill me-1 text-danger fs-11"></i> 0.4%</strong>
                                    <strong class="ms-auto"><i class="bi bi-caret-up-fill me-1 text-success fs-11"></i>0.9%</strong>
                                </div>
                                <div class="progress progress-sm progress-animate">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                                </div>
                                <div class="expansion-label d-flex text-muted">
                                    <span>Target</span>
                                    <span class="ms-auto">Last Month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->

                <!-- Start::row-2 -->
                <div class="row row-sm">
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                                    <i class="fe fe-user"></i>
                                </div>
                                <p class="mb-1 text-muted">Total Users</p>
                                <h3 class="mb-0">34,789</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
                                    <i class="fe fe-trending-up"></i>
                                </div>
                                <p class="mb-1 text-muted">Total Sales</p>
                                <h3 class="mb-0">98,674</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="icon-service bg-info-transparent rounded-circle text-info">
                                    <i class="fe fe-dollar-sign"></i>
                                </div>
                                <p class="mb-1 text-muted">Total Profits</p>
                                <h3 class="mb-0"><span>$</span>45,078</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="icon-service bg-success-transparent rounded-circle text-success">
                                    <i class="fe fe-shopping-cart"></i>
                                </div>
                                <p class="mb-1 text-muted">Total Orders</p>
                                <h3 class="mb-0">35,897</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-2 -->

                <!-- Start::row-3 -->
                <div class="row row-sm">
                    <div class="col-md-12">
                        <div class="card custom-card">
                            <div class="row row-sm">
                                <div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Gross profit Margin</h6>
                                        <h2 class="mb-1 mt-2 number-font"><span class="counter">77</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="mb-0 text-danger fs-13 ms-1"><i class="fe fe-arrow-down"></i> 1.68%</span> for Last month</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Opex Ratio</h6>
                                        <h2 class="mb-1 mt-2 number-font"><span class="counter">60</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 ms-1"><i class="fe fe-arrow-up"></i> 0.27%</span> for Last month</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Operating Profit Margin</h6>
                                        <h2 class="mb-1 mt-2 number-font"><span class="counter">57</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="mb-0 text-danger fs-13 ms-1"><i class="fe fe-arrow-down"></i> 0.87%</span> for Last month</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6 pe-0 ps-0">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Net Profit Margin</h6>
                                        <h2 class="mb-1 mt-2 number-font"><span class="counter">35</span>%</h2>
                                        <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 ms-1"><i class="fe fe-arrow-up"></i> 22%</span> for Last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-3 -->

                <!-- Start::row-4 -->
                <div class="row row-sm">
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body user-card text-center">
                                <div class="main-img-user avatar avatar-lg text-center">
                                    <img alt="avatar" class="rounded-circle" src="../assets/images/faces/5.jpg">
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-1">Reynante</h5>
                                    <p class="mb-1 ">Web Developer</p>
                                    <span class="text-muted"><i class="far fa-check-circle text-success me-1"></i>Verified</span>
                                </div>
                                <a href="javascript:void(0);" class="btn ripple btn-primary mt-3">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body user-card text-center">
                                <div class="main-img-user avatar avatar-lg text-center">
                                    <img alt="avatar" class="rounded-circle" src="../assets/images/faces/4.jpg">
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-1">Joyce Chua</h5>
                                    <p class="mb-1 ">Team Leader</p>
                                    <span class="text-muted"><i class="far fa-check-circle text-success me-1"></i>Verified</span>
                                </div>
                                <a href="javascript:void(0);" class="btn ripple btn-primary mt-3">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body user-card text-center">
                                <div class="main-img-user avatar avatar-lg text-center">
                                    <img alt="avatar" class="rounded-circle" src="../assets/images/faces/6.jpg">
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-1">Owen Bongcaras</h5>
                                    <p class="mb-1 ">Web Designer</p>
                                    <span class="text-muted"><i class="far fa-check-circle text-success me-1"></i>Verified</span>
                                </div>
                                <a href="javascript:void(0);" class="btn ripple btn-primary mt-3">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body user-card text-center">
                                <div class="main-img-user avatar avatar-lg text-center">
                                    <img alt="avatar" class="rounded-circle" src="../assets/images/faces/7.jpg">
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-1">Mariane Galeon</h5>
                                    <p class="mb-1 ">Php Developer</p>
                                    <span class="text-muted"><i class="far fa-check-circle text-success me-1"></i>Verified</span>
                                </div>
                                <a href="javascript:void(0);" class="btn ripple btn-primary mt-3">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-4 -->

                <!-- Start::row-5 -->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6>Click Through Conversions</h6>
                                    <h6><span class="fs-30 me-2">14,678</span><span class="badge bg-success">1.5%</span></h6>
                                    <span class="text-muted">The number of clicks to the ad that consist of a single impression.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6>View Through Conversions</h6>
                                    <h6><span class="fs-30 me-2">2,971</span><span class="badge bg-danger">0.55%</span></h6>
                                    <span class="text-muted">Estimated daily unique views  through conversions per visitor on the ads.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6>Total Conversions</h6>
                                    <h6><span class="fs-30 me-2">1,896</span><span class="badge bg-success">1.8%</span></h6>
                                    <span class="text-muted">Estimated total conversions on ads per impressions to the ads.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-5 -->

                <!-- Start::row-6 -->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-order ">
                                    <label class="main-content-label mb-3 pt-1">New Users</label>
                                    <h2 class="text-end card-item-icon card-icon">
                                    <i class="mdi mdi-account-multiple icon-size float-start text-primary"></i><span class="fw-bold">3,672</span></h2>
                                    <p class="mb-0 text-muted">Monthly users<span class="float-end">50%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-widget">
                                    <label class="main-content-label mb-3 pt-1">Total tax</label>
                                    <h2 class="text-end"><i class="mdi mdi-cube icon-size float-start text-primary fs-27"></i><span class="fw-bold">$89,265</span></h2>
                                    <p class="mb-0 text-muted">Monthly Income<span class="float-end">$7,893</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-widget">
                                    <label class="main-content-label mb-3 pt-1">Total Profit</label>
                                    <h2 class="text-end"><i class="icon-size mdi mdi-poll-box   float-start text-primary fs-27"></i><span class="fw-bold">$23,987</span></h2>
                                    <p class="mb-0 text-muted">Monthly Profit<span class="float-end">$4,678</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-widget">
                                    <label class="main-content-label mb-3 pt-1">Total Sales</label>
                                    <h2 class="text-end"><i class="mdi mdi-cart icon-size float-start text-primary fs-27"></i><span class="fw-bold">46,486</span></h2>
                                    <p class="mb-0 text-muted">Monthly Sales<span class="float-end">3,756</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <!--End::row-6 -->

                <!-- Start::row-7 -->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-4">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pt-4">
                                <h6 class="main-content-label mb-0">Projects Overview</h6>
                            </div>
                            <div class="card-body">
                                <div class="border">
                                    <div class="p-3">
                                        <h6>HTML Project</h6>
                                        <div class="main-traffic-detail-item">
                                            <div>
                                                <span>Project status</span> <span>35%</span>
                                            </div>
                                            <div class="progress progress-sm progress-animate">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar wd-35p" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-top">
                                        <h6>Wordpress Project</h6>
                                        <div class="main-traffic-detail-item">
                                            <div>
                                                <span>Project status</span> <span>50%</span>
                                            </div>
                                            <div class="progress progress-sm progress-animate">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar wd-50p bg-secondary" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-top">
                                        <h6>Angular Project</h6>
                                        <div class="main-traffic-detail-item">
                                            <div>
                                                <span>Project status</span> <span>40%</span>
                                            </div>
                                            <div class="progress progress-sm progress-animate">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar wd-40p bg-info" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="p-3 border-top">
                                        <h6>React Project</h6>
                                        <div class="main-traffic-detail-item">
                                            <div>
                                                <span>Project status</span> <span>10%</span>
                                            </div>
                                            <div class="progress progress-sm progress-animate">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar wd-10p bg-danger" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="p-3 border-top">
                                        <h6>React Project</h6>
                                        <div class="main-traffic-detail-item">
                                            <div>
                                                <span>Project status</span> <span>10%</span>
                                            </div>
                                            <div class="progress progress-sm progress-animate">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar wd-10p bg-danger" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-6">
                                <div class="card custom-card our-team">
                                    <div class="card-body">
                                        <div class="picture avatar-lg online text-center">
                                            <img alt="avatar" class="rounded-circle" src="../assets/images/faces/5.jpg">
                                        </div>
                                        <div class="text-center mt-3">
                                            <h5 class="pro-user-username text-dark mt-2 mb-0">Mariane Galeon</h5>
                                            <p class="pro-user-desc text-muted mb-1">Web Developer</p>
                                            <p class="user-info-rating">
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                            </p>
                                        </div>
                                        <div class="contact-info mb-0 text-center">
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-facebook-f"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-twitter"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-google"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-dribbble"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card custom-card our-team">
                                    <div class="card-body">
                                        <div class="picture avatar-lg online text-center">
                                            <img alt="avatar" class="rounded-circle" src="../assets/images/faces/6.jpg">
                                        </div>
                                        <div class="text-center mt-3">
                                            <h5 class="pro-user-username text-dark mt-2 mb-0">Joyce Chua</h5>
                                            <p class="pro-user-desc text-muted mb-1">App Developer</p>
                                            <p class="user-info-rating">
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                                <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                            </p>
                                        </div>
                                        <div class="contact-info mb-0 text-center">
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-facebook-f"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-twitter"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-google"></i></a>
                                            <a href="javascript:void(0);" class="contact-icon border text-primary"><i class="fab fa-dribbble"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card custom-card">
                                    <div class="row row-sm">
                                        <div class="col-sm-6 col-lg-6 border-end">
                                            <div class="card-body iconfont text-center">
                                                <h6 class="">Total Cost Reduction</h6>
                                                <h3 class="mt-1">$23,567</h3>
                                                <p class="text-muted"><span class="text-purple"><i class="fa fa-arrow-up text-success me-1"> </i>23% </span> in this year</p>
                                                <div class="progress progress-sm mb-0 progress-animate">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info wd-50p"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="card-body iconfont text-center">
                                                <h6>Total Cost Savings</h6>
                                                <h3 class="mt-1">15.2%</h3>
                                                <p class="text-muted"><span><i class="fa fa-arrow-down text-danger me-1"> </i>12%</span> in this year</p>
                                                <div class="progress progress-sm mb-0 progress-animate">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger wd-70p"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-7 -->

                <!-- Start::row-8 -->
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-12 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-auto user-lock">
                                            <img class="img-fluid rounded-circle" src="../assets/images/faces/8.jpg" alt="avatar">
                                        </div>
                                        <div class="col">
                                            <h5>Joyce Chua</h5>
                                            <span>UX Designer</span>
                                        </div>
                                    </div>
                                    <ul class="task-list">
                                        <li>
                                            <i class="task-icon bg-primary"></i>
                                            <h6>Task Finished<span class="float-end text-muted fs-11">29 Oct 2020</span></h6>
                                            <p class="text-muted fs-12">Adam Berry finished task on<a href="javascript:void(0);" class="fw-medium"> Project Management</a></p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-secondary"></i>
                                            <h6>New Comment<span class="float-end text-muted fs-11">25 Oct 2020</span></h6>
                                            <p class="text-muted fs-12">Victoria commented on Project <a href="javascript:void(0);" class="fw-medium"> AngularJS Template</a></p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-secondary"></i>
                                            <h6>Project Completed<span class="float-end text-muted fs-11">22 Aug 2020</span></h6>
                                            <p class="text-muted fs-12">Victoria commented on Project <a href="javascript:void(0);" class="fw-medium"> AngularJS Template</a></p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-secondary"></i>
                                            <h6>New Request<span class="float-end text-muted fs-11">24 Oct 2022</span></h6>
                                            <p class="text-muted fs-12">Victoria commented on Project <a href="javascript:void(0);" class="fw-medium"> AngularJS Template</a></p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-danger"></i>
                                            <h6>Task Overdue<span class="float-end text-muted fs-11">14 Oct 2020</span></h6>
                                            <p class="text-muted mb-0 fs-12">Petey Cruiser finished task <a href="javascript:void(0);" class="fw-medium"> Integrated management</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0">
                                <div>
                                    <label class="main-content-label mb-2">Top Ongoing Projects</label> <span class="d-block fs-12 mb-2 text-muted">Projects where development work is on completion</span>
                                </div>
                            </div>
                            <div class="card-body pt-2 mt-0">
                                <div class="list-group border projects-list">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column border-end-0 border-start-0 align-items-start border-top-0">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1 fw-medium ">PSD Projects</h6>
                                            <small class="text-danger"><i class="fa fa-caret-down me-1"></i>5 days ago</small>
                                        </div>
                                        <p class="mb-0 text-muted mb-0 fs-12">Started:17-02-2020</p>
                                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</small>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column border-end-0 border-start-0 align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1 fw-medium">Wordpress Projects</h6>
                                            <small class="text-success"><i class="fa fa-caret-up me-1"></i>2 days ago</small>
                                        </div>
                                        <p class="mb-0 text-muted mb-0 fs-12">Started:15-02-2020</p>
                                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action border-end-0 border-start-0 flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1 fw-medium">HTML &amp; CSS3 Projects</h6>
                                            <small class="text-danger"><i class="fa fa-caret-down me-1"></i>1 days ago</small>
                                        </div>
                                        <p class="mb-0 text-muted mb-0 fs-12">Started:26-02-2020</p>
                                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column border-end-0 border-bottom-0 border-start-0 align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1 fw-medium">Excel Projects</h6>
                                            <small class="text-success"><i class="fa fa-caret-up me-1"></i>2 days ago</small>
                                        </div>
                                        <p class="mb-0 text-muted mb-0 fs-12">Started:15-02-2020</p>
                                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-2 custom-card-header">
                                <h6 class="main-content-label mb-0">Visitors</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mg-b-0">
                                        <tbody>
                                            <tr>
                                                <td class="bd-t-0 bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/2.jpg"></div>
                                                </td>
                                                <td class="bd-t-0 bd-l-0">
                                                    <h6 class="mg-b-0">Socrates Itumay</h6><small class="tx-11 tx-gray-500">Web Developer</small>
                                                </td>
                                                <td class="bd-t-0 bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-primary btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/3.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Reynante Labares</h6><small class="tx-11 tx-gray-500">CEO</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-secondary btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/4.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Manager</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-danger btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/5.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Administrator</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-info btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/6.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Steven Watson</h6><small class="tx-11 tx-gray-500">Founder</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-success btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/2.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Wilson Rose</h6><small class="tx-11 tx-gray-500">Auditor</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-success btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bd-l-0">
                                                    <div class="main-img-user"><img alt="avatar" src="../assets/images/faces/7.jpg"></div>
                                                </td>
                                                <td class="bd-l-0">
                                                    <h6 class="mg-b-0">Sonia	Fraser</h6><small class="tx-11 tx-gray-500">App Developer</small>
                                                </td>
                                                <td class="bd-l-0">
                                                    <a href="javascript:void(0);" class="btn ripple btn-warning btn-sm">Follow</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-8 -->

            </div>
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