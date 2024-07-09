<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> DETAILS </title>
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
                      <h2 class="main-content-title fs-24 mb-1">Product-Details</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">ECommerce</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Product-Details</li>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card productdesc">
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="clearfix carousel-slider">
                                                    <div id="thumbcarousel" class="carousel slide" data-bs-interval="false">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <div data-bs-target="#carousel" data-bs-slide-to="0" class="thumb my-2"><img src="../assets/images/pngs/24.png" alt="img"></div>
                                                                <div data-bs-target="#carousel" data-bs-slide-to="1" class="thumb my-2"><img src="../assets/images/pngs/26.png" alt="img"></div>
                                                                <div data-bs-target="#carousel" data-bs-slide-to="2" class="thumb my-2"><img src="../assets/images/pngs/25.png" alt="img"></div>
                                                                <div data-bs-target="#carousel" data-bs-slide-to="3" class="thumb my-2"><img src="../assets/images/pngs/23.png" alt="img"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                <div class="product-carousel">
                                                    <div id="carousel" class="carousel slide" data-bs-ride="false">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active"><img src="../assets/images/pngs/24.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/26.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/25.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/23.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                        </div>
                                                        <div class="text-center mt-4 mb-4 btn-list">
                                                            <a href="ecommerce-cart.html" class="btn ripple btn-primary d-inline-flex align-items-center"><i class="fe fe-shopping-cart me-1"> </i> Add to cart</a>
                                                            <a href="ecommerce-checkout.html" class="btn ripple btn-secondary d-inline-flex align-items-center"><i class="fe fe-credit-card me-1"> </i> Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-12">
                                        <div class="mt-4 mb-4">
                                            <h4 class="mt-1 mb-3">GENERATOR</h4>

                                            <p class="text-muted float-start me-3">
                                                <span class="fe fe-star text-warning"></span>
                                                <span class="fe fe-star text-warning"></span>
                                                <span class="fe fe-star text-warning"></span>
                                                <span class="fe fe-star text-warning"></span>
                                                <span class="fe fe-star"></span>
                                            </p>
                                            <p class="text-muted mb-4">( 135 Customers Review )</p>
                                            <h6 class="mt-4 fs-16">Description</h6>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized .</p>
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                                        </div>
                                        <div class="d-flex  mt-2">
                                            <div class="mt-2 sizes">Quantity:</div>
                                            <div class="d-flex ms-2">
                                                <div class="form-group">
                                                    <select name="quantity" id="select-countries17" class="form-control  wd-150" data-trigger>
                                                        <option value="1" selected="">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="colors d-flex me-3 mt-2">
                                            <span class="mt-2">colors:</span>
                                            <div class="d-flex gutters-xs ms-4">
                                                <div class="me-2">
                                                    <label class="colorinput">
                                                        <input name="color" type="radio" value="azure" class="colorinput-input" checked="">
                                                        <span class="colorinput-color bg-info"></span>
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <label class="colorinput">
                                                        <input name="color" type="radio" value="indigo" class="colorinput-input">
                                                        <span class="colorinput-color bg-secondary"></span>
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <label class="colorinput">
                                                        <input name="color" type="radio" value="purple" class="colorinput-input">
                                                        <span class="colorinput-color bg-danger"></span>
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <label class="colorinput">
                                                        <input name="color" type="radio" value="pink" class="colorinput-input">
                                                        <span class="colorinput-color bg-pink"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="mb-3">Specifications :</h5>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 border table-bordered text-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Category</th>
                                                                <td>Watches</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Brand</th>
                                                                <td>Willful</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Color</th>
                                                                <td>White</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Connections</th>
                                                                <td>Bluetooth</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Application</th>
                                                                <td>Messages, Phone, Pedometer, Heart Rate Monitor</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Supported </th>
                                                                <td>Fitness Tracker, Sleep Monitor, Reminders</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Warranty Summary</th>
                                                                <td>1 Year</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-4">
                                                <div class="card">
                                                    <div>
                                                        <div class="d-flex p-3">
                                                            <h5 class="float-start main-content-label mb-0 mt-2">All Ratings and Reviews</h5>
                                                            <a href="javascript:void(0);" class="btn btn-outline-primary btn-sm float-end ms-auto">Top Rated</a>
                                                        </div>
                                                        <div class="media mt-0 p-4 border-bottom border-top">
                                                            <div class="d-flex me-3">
                                                                <a href="javascript:void(0);"><img class="media-image avatar avatar-md rounded-circle" alt="64x64" src="../assets/images/faces/8.jpg"> </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mt-0 mb-1 fw-medium fs-16">Bruce Tran
                                                                    <span class="fs-14 ms-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                                                </h5>
                                                                <span class="text-muted fs-13">Tue, 20 Mar 2020</span>
                                                                <div class="text-warning mt-1">
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star"></i>
                                                                 </div>
                                                                <p class="font-13  mb-2 mt-2">
                                                                   Lorem Ipsum available, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                                                </p>
                                                                <a href="javascript:void(0);" class="me-2"><span class="badge bg-primary">Helpful</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Comment</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Report</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="media mt-0  p-4 border-bottom">
                                                            <div class="d-flex me-3">
                                                                <a href="javascript:void(0);"><img class="media-image avatar avatar-md rounded-circle" alt="64x64" src="../assets/images/faces/3.jpg"> </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mt-0 mb-1 fw-medium fs-16">Mina Harpe
                                                                    <span class="fs-14 ms-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                                                </h5>
                                                                <span class="text-muted fs-13">Tue, 20 Mar 2020</span>
                                                                <div class="text-warning mt-1">
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star"></i>
                                                                 </div>
                                                                <p class="font-13  mb-2 mt-2">
                                                                   Lorem Ipsum available, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                                                </p>
                                                                <a href="javascript:void(0);" class="me-2"><span class="badge bg-primary">Helpful</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Comment</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Report</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="media mt-0 p-4 border-bottom">
                                                            <div class="d-flex me-3">
                                                                <a href="javascript:void(0);"><img class="media-image avatar avatar-md rounded-circle" alt="64x64" src="../assets/images/faces/5.jpg"> </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mt-0 mb-1 fw-medium fs-16">Maria Quinn
                                                                    <span class="fs-14 ms-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                                                </h5>
                                                                <span class="text-muted fs-13">Tue, 20 Mar 2020</span>
                                                                <div class="text-warning mt-1">
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star active"></i>
                                                                    <i class="bx bxs-star text-light"></i>
                                                                 </div>
                                                                <p class="font-13  mb-2 mt-2">
                                                                   Lorem Ipsum available, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                                                </p>
                                                                <a href="javascript:void(0);" class="me-2"><span class="badge bg-primary">Helpful</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Comment</span></a>
                                                                <a href="javascript:void(0);" class="me-2"><span class="">Report</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-grid">
                                                            <a class="text-center w-100 p-3 fw-medium" href="javascript:void(0);">See All Reviews</a>
                                                        </div>
                                                    </div>
                                                    <div class="border-top px-4 pb-2 pt-4">
                                                        <h5 class="mb-4">Leave Comment</h5>
                                                        <div class="mb-1">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="mb-3 fw-medium">Your Name</div> <input class="form-control" placeholder="Your Name" type="text">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="mb-3 fw-medium">Email Address</div> <input class="form-control" placeholder="Email Address" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="star-rating">
                                                            <a href="javascript:void(0);"><i class="icofont-ui-rating icofont-2x"></i></a>
                                                            <a href="javascript:void(0);"><i class="icofont-ui-rating icofont-2x"></i></a>
                                                            <a href="javascript:void(0);"><i class="icofont-ui-rating icofont-2x"></i></a>
                                                            <a href="javascript:void(0);"><i class="icofont-ui-rating icofont-2x"></i></a>
                                                            <a href="javascript:void(0);"><i class="icofont-ui-rating icofont-2x"></i></a>
                                                        </span>
                                                        <form>
                                                            <div class="form-group">
                                                                <div class="mb-3 fw-medium">Your Comment</div>
                                                                <textarea class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary mt-3 mb-0" type="button">Post your review</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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