<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php')?>
    <title> Inquries </title>
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


<!-- Prism CSS -->
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>





    <div class="page">

             <!-- app-header -->
             <?php include_once('partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid border border border-warning mt-4">
                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="First name"
                                                aria-label="First name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last name"
                                                aria-label="Last name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                    aria-label="email">
                                                </div>
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">DATE</label>
                                                    <input type="date" class="form-control"
                                                    aria-label="dateofbirth">
                                                </div>
                                                <div class="col-xl-12">
                                                
                                 
                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="number" class="form-control" placeholder="Phone number"
                                                aria-label="Phone number">
                                        </div>
                                        <?php include_once('user-forum-form.php')?>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-info btn-w-lg btn-wave">Submit</button>
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

    <!-- Prism JS -->
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>