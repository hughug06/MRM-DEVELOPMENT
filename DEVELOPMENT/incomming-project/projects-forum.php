<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> INQUIRY</title>
    
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

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                <div class="card custom-card mt-3">
                                <div class="card-header">
                                    <div class="card-title">
                                        Enable flex behaviors
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="bd-example flex-container mb-3">
                                        <div class="d-flex p-2">
                                                    <div class="card custom-card">
                                            <img src="../assets/images/media/media-22.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h6 class="card-title fw-semibold">Card title</h6>
                                                <p class="card-text text-muted">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                                <a href="javascript:void(0);" class="btn btn-primary">Read More</a>
                                            </div>
                                            <div class="card-footer">
                                                <span class="card-text">Last updated 3 mins ago</span>
                                            </div>

                                            
                                        </div>
                                        </div>
                                    </div>
                                    <div class="bd-example flex-container">
                                        <div class="d-inline-flex p-2"><div class="card custom-card">
                                <img src="../assets/images/media/media-22.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title fw-semibold">Card title</h6>
                                    <p class="card-text text-muted">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <a href="javascript:void(0);" class="btn btn-primary">Read More</a>
                                </div>
                                <div class="card-footer">
                                    <span class="card-text">Last updated 3 mins ago</span>
                                </div>
                            </div></div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                  <span class="input-group">
                    <input type="search" class="form-control px-2 " placeholder="Search..." aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text bg-primary text-white" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                  </span>
                  <div class="mt-3">
                    <div class="">
                        <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                        <div class="ps-2">
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                        <ul class="ps-2">
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="full-calendar.html"><span><i class='bx bx-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Calendar</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="mail.html"><span><i class='bx bx-envelope me-2 fs-14 bg-primary-transparent p-2 rounded-circle'></i>Mail</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="buttons.html"><span><i class='bx bx-dice-1 me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Buttons</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3">
                      <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                      <ul class="ps-2">
                          <li class="p-1 align-items-center  mb-1 search-app">
                                  <a href="javascript:void(0)" class="text-primary"><u>http://spruko/html/spruko.com</u></a>
                          </li>
                          <li class="p-1 align-items-center mb-1 search-app">
                                  <a href="javascript:void(0)"  class="text-primary"><u>http://spruko/demo/spruko.com</u></a>
                          </li>
                      </ul>
                    </div>
                  </div>
              </div>
              <div class="modal-footer d-block">
                <div class="text-center">
                    <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all results</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-semibold">Spruha</a>.
                    Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                        <span class="fw-semibold text-primary text-decoration-underline">Spruko</span>
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- Start Right-Sidebar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="right-sidebar-canvas" aria-labelledby="offcanvasRightLabel1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title text-default" id="offcanvasRightLabel1">Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0 sidebar-right">
                    <div class="d-flex p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm1" checked="">
                            <label class="form-check-label" for="checkebox-sm1"> Hangout With friends </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm2">
                            <label class="form-check-label" for="checkebox-sm2"> Prepare for presentation </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm3">
                            <label class="form-check-label" for="checkebox-sm3"> Prepare for presentation </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm4" checked="">
                            <label class="form-check-label" for="checkebox-sm4"> System Updated </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm5">
                            <label class="form-check-label" for="checkebox-sm5"> Do something more </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm6">
                            <label class="form-check-label" for="checkebox-sm6"> System Updated </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm7" checked="">
                            <label class="form-check-label" for="checkebox-sm7"> Find an Idea </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm8" checked="">
                            <label class="form-check-label" for="checkebox-sm8"> Project review </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <h5 class="px-4 Overviews">Overview</h5>
                    <div class="p-4">
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Founder &amp; CEO</span> <span>24</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-primary" style="width: 25%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>UX Designer</span> <span>1</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-secondary" style="width: 10%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Recruitment</span> <span>87</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 45%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Software Engineer</span> <span>32</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info" style="width: 30%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Project Manager</span> <span>32</span>
                            </div>
                            <div class="progress progress-sm progress-animate" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                            </div><!-- progress -->
                        </div>
                    </div>
            </div>
        </div>
        <!-- End Right-Sidebar -->



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