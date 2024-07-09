<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> Account Control </title>
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
                      <h2 class="main-content-title fs-24 mb-1">Userlist</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Advanced UI</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Userlist</li>
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
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0 d-block">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0 pt-1">User Table</label>
                                    <div class="ms-auto float-end">
                                        <div class="">
                                            <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:void(0);">Today</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                    <table class="table card-table table-striped table-vcenter border text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-8p"><span>User</span></th>
                                                <th class="wd-lg-20p"><span></span></th>
                                                <th class="wd-lg-20p"><span>Created</span></th>
                                                <th class="wd-lg-20p"><span>Status</span></th>
                                                <th class="wd-lg-20p"><span>Email</span></th>
                                                <th class="wd-lg-20p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/1.jpg">
                                                    </div>
                                                </td>
                                                <td>Megan Peters</td>
                                                <td>
                                                    08/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-muted d-flex"><span class="dot-label bg-gray-300 me-1"></span>Inactive</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">mila@kunis.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/2.jpg">
                                                    </div>
                                                </td>
                                                <td>George Clooney</td>
                                                <td>
                                                    12/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><span class="dot-label bg-success me-1"></span>Active</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">marlon@brando.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/3.jpg">
                                                    </div>
                                                </td>
                                                <td>Ryan Gossling</td>
                                                <td>
                                                    14/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-danger d-flex"><span class="dot-label bg-danger me-1"></span> Banned</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">jack@nicholson</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/1.jpg">
                                                    </div>
                                                </td>
                                                <td> Emma Watson</td>
                                                <td>
                                                    16/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-warning d-flex"><span class="dot-label bg-warning me-1"></span>Pending</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">jack@nicholsonm</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/12.jpg">
                                                    </div>
                                                </td>
                                                <td>Mila Kunis</td>
                                                <td>
                                                    18/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-muted d-flex"><span class="dot-label bg-gray-300 me-1"></span>Inactive</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">mila@kunis.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/4.jpg">
                                                    </div>
                                                </td>
                                                <td>Phil Watson</td>
                                                <td>
                                                    23/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><span class="dot-label bg-success me-1"></span>active</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">phil@watson.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/5.jpg">
                                                    </div>
                                                </td>
                                                <td>Sonia Robertson</td>
                                                <td>
                                                    25/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><span class="dot-label bg-success me-1"></span>active</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">robertson@sonia.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/7.jpg">
                                                    </div>
                                                </td>
                                                <td>Adam Hamilton</td>
                                                <td>
                                                    31/06/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-danger d-flex"><span class="dot-label bg-danger me-1"></span>Banned</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">mila@kunis.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/9.jpg">
                                                    </div>
                                                </td>
                                                <td>Leah Morgan</td>
                                                <td>
                                                    02/07/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-warning d-flex"><span class="dot-label bg-warning me-1"></span>pending</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">morganleah@.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/11.jpg">
                                                    </div>
                                                </td>
                                                <td>Amelia McDonald</td>
                                                <td>
                                                    08/07/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><span class="dot-label bg-success me-1"></span>active</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">amelia23@kunis.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-md">
                                                        <img alt="avatar" class="rounded-circle me-2" src="../assets/images/faces/6.jpg">
                                                    </div>
                                                </td>
                                                <td>Paul Molive</td>
                                                <td>
                                                    12/07/2020
                                                </td>
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><span class="dot-label bg-success me-1"></span>active</span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);">paul45@kunis.com</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                        <i class="fe fe-search"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="...">
                                    <ul class="pagination mt-4 mb-0 float-end">
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">2</span>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>
                <!--End::row-1 -->

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