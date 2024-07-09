<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> Calendar</title>
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

<!-- Full Calendar CSS -->
<link rel="stylesheet" href="../assets/libs/fullcalendar/main.min.css">

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
                      <h2 class="main-content-title fs-24 mb-1">Calender</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Schedule</a></li>
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

                <!-- Start::row-1 -->
                <div class="row row-sm">
                    <div class="col-xl-3">
                        <div class="card custom-card">
                            <div class="card-header d-grid">
                                <button class="btn btn-primary-light btn-wave"><i class="ri-add-line align-middle me-1 fw-semibold d-inline-block"></i>Create New Event</button>
                            </div>
                            <div class="card-body p-0">
                                <div id="external-events" class="border-bottom p-3">
                                    <div
                                      class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-primary border border-primary">
                                      <div class="fc-event-main">Calendar Events</div>
                                    </div>
                                    <div
                                      class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-secondary border border-secondary"
                                      data-class="bg-secondary">
                                      <div class="fc-event-main">Birthday EVents</div>
                                    </div>
                                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-success border border-success"
                                      data-class="bg-success">
                                      <div class="fc-event-main">Holiday Calendar</div>
                                    </div>
                                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-info border border-info"
                                      data-class="bg-info">
                                      <div class="fc-event-main">Office Events</div>
                                    </div>
                                    <div
                                      class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-warning border border-warning"
                                      data-class="bg-warning">
                                      <div class="fc-event-main">Other Events</div>
                                    </div>
                                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-danger border border-danger"
                                      data-class="bg-danger">
                                      <div class="fc-event-main">Festival Events</div>
                                    </div>
                                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-teal border border-teal"
                                      data-class="bg-danger">
                                      <div class="fc-event-main">Timeline Events</div>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom">
                                  <div class="d-flex align-items-center mb-4 justify-content-between">
                                    <h6 class="fw-semibold">
                                      Activity :
                                    </h6>
                                    <button class="btn btn-primary-light btn-sm btn-wave">View All</button>
                                  </div>
                                  <ul class="list-unstyled mb-0 fullcalendar-events-activity" id="full-calendar-activity">
                                    <li>
                                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                          Monday, Jan 1,2023
                                        </p>
                                        <span class="badge bg-light text-default mb-1">12:00PM - 1:00PM</span>
                                      </div>
                                      <p class="mb-0 text-muted fs-12">
                                        Meeting with a client about new project requirement.
                                      </p>
                                    </li>
                                    <li>
                                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                          Thursday, Dec 29,2022
                                        </p>
                                        <span class="badge bg-success mb-1">Completed</span>
                                      </div>
                                      <p class="mb-0 text-muted fs-12">
                                        Birthday party of niha suka
                                      </p>
                                    </li>
                                    <li>
                                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                          Wednesday, Jan 3,2023
                                        </p>
                                        <span class="badge bg-warning-transparent mb-1">Reminder</span>
                                      </div>
                                      <p class="mb-0 text-muted fs-12">
                                        Work target for new project is completing
                                      </p>
                                    </li>
                                    <li>
                                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                          Friday, Jan 20,2023
                                        </p>
                                        <span class="badge bg-light text-default mb-1">06:00PM - 09:00PM</span>
                                      </div>
                                      <p class="mb-0 text-muted fs-12">
                                        Watch new movie with family
                                      </p>
                                    </li>
                                    <li>
                                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                          Saturday, Jan 07,2023
                                        </p>
                                        <span class="badge bg-danger-transparent mb-1">Due Date</span>
                                      </div>
                                      <p class="mb-0 text-muted fs-12">
                                        Last day to pay the electricity bill and water bill.need to check the bank details.
                                      </p>
                                    </li>
                                  </ul>
                                </div>
                                <div class="p-3">
                                  <img src="../assets/images/media/media-80.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Full Calendar</div>
                            </div>
                            <div class="card-body">
                                <div id='calendar2'></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

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
    
    <!-- Moment JS -->
    <script src="../assets/libs/moment/moment.js"></script>

    <!-- Fullcalendar JS -->
    <script src="../assets/libs/fullcalendar/main.min.js"></script>
    <script src="../assets/js/fullcalendar.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>