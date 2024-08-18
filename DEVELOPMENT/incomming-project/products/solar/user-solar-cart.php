<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php')?>
    
    <title> CART </title>
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
         <?php include_once('partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('partials/sidebar.php')?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">Cart</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">ECommerce</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
                    <div class="col-lg-12 col-xl-9 col-md-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">Shopping cart</div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="table-responsive">
                                    <table class="table border table-hover text-nowrap table-shopping-cart mb-0">
                                        <thead class="text-muted">
                                            <tr class="small text-uppercase">
                                                <th scope="col">Product</th>
                                                <th scope="col"></th>
                                                <th scope="col" class="wd-120">Quantity</th>
                                                <th scope="col" class="text-center " >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/14.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">SOLAR</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Black color</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-danger small mb-0 mt-1 fs-12">Out of stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity1" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>
                                                
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/15.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">Solar</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Pink</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-success small mb-0 mt-1 fs-12">In stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity2" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>                                               
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/19.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">SOLAR</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Black color</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-danger small mb-0 mt-1 fs-12">Out of stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity3" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/16.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">SOLAR</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Green and Black color</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-success small mb-0 mt-1 fs-12">In stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity4" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/17.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">SOLAR</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Green and Black color</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-success small mb-0 mt-1 fs-12">In stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity5" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="card-aside-img">
                                                            <img src="../assets/images/pngs/18.png" alt="img" class="img-sm">
                                                        </div>
                                                        <div class="media-body mt-2">
                                                            <div class="card-item-desc mt-0">
                                                                <h6 class="fw-medium mt-0 text-uppercase">SOLAR</h6>
                                                                <dl class="card-item-desc-1 mb-0">
                                                                  <dt>Color: </dt>
                                                                  <dd>Green and Black color</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-danger small mb-0 mt-1 fs-12">Out of stock</p>
                                                </td>
                                                <td class="product-quantity-container">
                                                    <div class="input-group br-3 border flex-nowrap">
                                                        <button class="btn btn-icon btn-light rounded-start-0 input-group-text flex-fill product-quantity-minus" ><i class="ri-subtract-line"></i></button>
                                                        <input type="text" class="form-control form-control-sm border-0 text-center w-100" aria-label="quantity" id="product-quantity6" value="2">
                                                        <button class="btn btn-icon btn-light rounded-end-0 input-group-text flex-fill product-quantity-plus" ><i class="ri-add-line"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="ecommerce-cart.html" class="remove-list text-danger fs-20 remove-button" data-abc="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group mb-0 "> <label class="form-label fw-medium">TRIVIA</label>
                                        <h3 class="mt-2">SOLAR IS ABOUT BLAH BLAH BLAH</h2>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card custom-card cart-details">
                            <div class="card-body">
                                
                                <div class="d-grid">
                                    <a class="btn btn-primary" href="ecommerce-products.html">START NEGOTIATION</a>
                                </div>
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
        <?php include_once('partials/footer.php')?>
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

    <!-- Internal Cart JS -->
    <script src="../assets/js/cart.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
    

</body>

</html>