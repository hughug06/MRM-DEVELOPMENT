<?php 
session_start();
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__. '/../../partials/head.php')?>
    <title> Products Overview </title>
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
    <!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>


</head>

<body>

    <div class="page">
         <!-- app-header -->
         <?php include_once(__DIR__. '/../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php')?>

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-8">
                        <div class="row row-sm banner-img">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card bg-primary custom-card card-box">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12">
                                                <h4 class="d-flex mb-3">
                                                    <span class="fw-bold text-fixed-white ">Hello Marvie Cutiepie!</span>
                                                </h4>
                                                <p class="text-fixed-white mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto molestias pariatur laboriosam adipisci ab, velit expedita libero voluptatum sunt nihil nisi voluptates. Dignissimos aperiam harum praesentium distinctio necessitatibus recusandae corrupti!
                                                </p>
                                            </div>
                                            <img src="../../assets/images/mrm-images/mrm-banner2.png" alt="user-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/media/media-4.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Mountains<span class="badge bg-primary float-end fs-10">New</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/media/media-9.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/media/media-9.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <img src="../../assets/images/media/media-9.jpg" class="card-img mb-3" alt="...">
                                        <h6 class="card-title fw-semibold mb-3">Product<span class="badge bg-secondary float-end fs-10">Hot</span></h6>
                                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-md-12 col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header border-bottom-0 d-flex pb-0">
                                        <div>
                                            <label class="main-content-label mb-2 pt-1">Request Lists</label>
                                            <p class="fs-12 mb-3 text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, sit aspernatur quibusdam corporis mollitia quam nobis sed ducimus omnis? Optio tempore nostrum enim aliquam voluptatum blanditiis corporis molestiae aspernatur est?</p>
                                        </div>
                                        <div class="card-options float-end">
                                            <a href="javascript:void(0);" class="me-0 text-default" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="fe fe-more-vertical fs-17 float-end"></span> </a>
                                            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                                                <li><a href="javascript:void(0);"><i class="fe fe-eye me-2"></i>View</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-plus-circle me-2"></i>Add</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i>Remove</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-download-cloud me-2"></i>Download</a></li>
                                                <li><a href="javascript:void(0);"><i class="fe fe-settings me-2"></i>More</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter border mb-0 text-nowrap table-product">
                                                <thead>
                                                    <tr>
                                                        <th>Request ID</th>
                                                        <th>Request</th>
                                                        <!-- <th>Product Cost</th>
                                                        <th>Total</th> -->
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#C234</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/14.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$14,500</b></td>
                                                        <td>2,977</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C389</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/15.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$30,000</b></td>
                                                        <td>678</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C936</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/16.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$13,200</b></td>
                                                        <td>4,922</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C493</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/17.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$15,100</b></td>
                                                        <td>1,234</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C729</td>
                                                        <td class="d-flex my-auto"><img src="../../assets/images/pngs/18.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">BService Request</span></td>
                                                        <!-- <td><b>$5,987</b></td>
                                                        <td>4,789</td> -->
                                                        <td><span class="badge bg-primary op-5">Approved</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#C529</td>
                                                        <td class="my-auto"><img src="../../assets/images/pngs/19.png" alt="" class="ht-40 wd-40 me-3"><span class="my-auto text-truncate">Service Request</span></td>
                                                        <!-- <td><b>$11,987</b></td>
                                                        <td>938</td> -->
                                                        <td><span class="badge bg-primary">Approved</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-xl-4 banner-img">
                        <div class="card custom-card card-dashboard-calendar">
                            <label class="main-content-label mb-2 pt-1">Recent transactions</label>
                            <span class="d-block fs-12 mb-2 text-muted">Projects where development work is on completion</span>
                            <table class="table m-b-0 transcations mt-2">
                                <tbody>
                                    <tr>
                                        <td class="wd-5p">
                                            <div class="main-img-user avatar-md">
                                                <img alt="avatar" class="rounded-circle me-3"
                                                    src="../../assets/images/faces/5.jpg">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-middle ms-3">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1">Flicker</h6>
                                                    <p class="mb-0 fs-13 text-muted">App improvement</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-block">
                                                <h6 class="mb-2 fs-15 fw-semibold">$45.234<i
                                                        class="fas fa-level-up-alt ms-2 text-success m-l-10"></i>
                                                </h6>
                                                <p class="mb-0 tx-11 text-muted">12 Jan 2020</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wd-5p">
                                            <div class="main-img-user avatar-md">
                                                <img alt="avatar" class="rounded-circle me-3"
                                                    src="../../assets/images/faces/6.jpg">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-middle ms-3">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1">Intoxica</h6>
                                                    <p class="mb-0 fs-13 text-muted">Milestone</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-block">
                                                <h6 class="mb-2 fs-15 fw-semibold">$23.452<i
                                                        class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                                </h6>
                                                <p class="mb-0 tx-11 text-muted">23 Jan 2020</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wd-5p">
                                            <div class="main-img-user avatar-md">
                                                <img alt="avatar" class="rounded-circle me-3"
                                                    src="../../assets/images/faces/7.jpg">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-middle ms-3">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1">Digiwatt</h6>
                                                    <p class="mb-0 fs-13 text-muted">Sales executive</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-block">
                                                <h6 class="mb-2 fs-15 fw-semibold">$78.001<i
                                                        class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                                </h6>
                                                <p class="mb-0 tx-11 text-muted">4 Apr 2020</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wd-5p">
                                            <div class="main-img-user avatar-md">
                                                <img alt="avatar" class="rounded-circle me-3"
                                                    src="../../assets/images/faces/8.jpg">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-middle ms-3">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1">Flicker</h6>
                                                    <p class="mb-0 fs-13 text-muted">Milestone2</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-block">
                                                <h6 class="mb-2 fs-15 fw-semibold">$37.285<i
                                                        class="fas fa-level-up-alt ms-2 text-success m-l-10"></i>
                                                </h6>
                                                <p class="mb-0 tx-11 text-muted">4 Apr 2020</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wd-5p pb-0">
                                            <div class="main-img-user avatar-md">
                                                <img alt="avatar" class="rounded-circle me-3"
                                                    src="../../assets/images/faces/4.jpg">
                                            </div>
                                        </td>
                                        <td class="pb-0">
                                            <div class="d-flex align-middle ms-3">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-1">Flicker</h6>
                                                    <p class="mb-0 fs-13 text-muted">App improvement</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pb-0">
                                            <div class="d-inline-block">
                                                <h6 class="mb-2 fs-15 fw-semibold">$25.341<i
                                                        class="fas fa-level-down-alt ms-2 text-danger m-l-10"></i>
                                                </h6>
                                                <p class="mb-0 tx-11 text-muted">4 Apr 2020</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Services</div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title fw-semibold">Special title treatment</h6>
                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi mollitia alias nesciunt optio totam facere voluptatibus unde deserunt? Architecto, fugiat minus molestias soluta sint officiis.</p>
                                <a href="javascript:void(0);" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Projects</div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title fw-semibold">Special title treatment</h6>
                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi mollitia alias nesciunt optio totam facere voluptatibus unde deserunt? Architecto, fugiat minus molestias soluta sint officiis.</p>
                                <a href="javascript:void(0);" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::app-content -->

        <div class="scrollToTop d-none"></div>
        <!-- Footer Start -->
        <?php  include_once(__DIR__. '/../../partials/footer.php')?>
        <!-- Footer End -->
       
    </div>

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