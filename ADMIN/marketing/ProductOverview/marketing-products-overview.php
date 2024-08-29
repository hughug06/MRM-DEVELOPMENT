<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php')?>
    <title> Products Overview </title>
    <!-- Favicon -->
    <link rel="icon" href="../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">


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
                      <h2 class="main-content-title fs-24 mb-1">Products</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">overview</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                    <div class="col-md-8 col-lg-9">
                        <div class="row row-sm">
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/2.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/1.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/4.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/3.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>                                           
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/7.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/8.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/9.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/10.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/11.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/12.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/2.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/2.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/5.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/6.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/13.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/31.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                                <div class="card custom-card">
                                    <div class="p-0 ht-100p">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="ecommerce-product-details.html" class="image">
                                                    <img class="pic-1" alt="product-image-1" src="../assets/images/pngs/33.png">
                                                    <img class="pic-2" alt="product-image-2" src="../assets/images/pngs/32.png">
                                                </a>
                                                <a class="product-like-icon" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                <div class="product-link">
                                                    <a href="ecommerce-cart.html">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="ecommerce-product-details.html">
                                                        <i class="fas fa-eye"></i>
                                                        <span>Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="title"><a href="javascript:void(0);">SOLAR</a></h3>
                                                <ul class="rating">
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="fas fa-star"></li>
                                                    <li class="far fa-star"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="row row-sm">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <span class="">
                                                <button class="btn ripple btn-primary" type="button">Search</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-md-12 col-lg-12">
                                <div class="card custom-card">
                                    <div class="card-header custom-card-header">
                                        <h6 class="main-content-label mb-3">Categories</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">MRM POWER</label>
                                            <select name="beast" id="select-beast" class="form-control" data-trigger>
                                                <option value="1">MRM POWER</option>
                                                <option value="2">MRM POWER</option>
                                                <option value="3">MRM POWER</option>
                                                <option value="4">MRM POWER</option>
                                                <option value="5">MRM POWER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">MRM POWER</label>
                                            <select name="beast" id="select-beast1" class="form-control" data-trigger>
                                                <option value="1">MRM POWER</option>
                                                <option value="2">MRM POWER</option>
                                                <option value="3">MRM POWER</option>
                                                <option value="4">MRM POWER</option>
                                                <option value="5">MRM POWER</option>
                                                <option value="6">MRM POWER</option>
                                                <option value="7">MRM POWER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">MRM POWER</label>
                                            <select name="beast" id="select-beast2" class="form-control" data-trigger>
                                                <option value="1">MRM POWER</option>
                                                <option value="2">MRM POWER</option>
                                                <option value="3">MRM POWER</option>
                                                <option value="4">MRM POWER</option>
                                                <option value="5">MRM POWER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">MRM POWER</label>
                                            <select name="beast" id="select-beast3" class="form-control" data-trigger>
                                                <option value="1">MRM POWER</option>
                                                <option value="2">MRM POWER</option>
                                                <option value="3">MRM POWER</option>
                                                <option value="4">MRM POWER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">MRM POWER </label>
                                            <select name="beast" id="select-beast4" class="form-control" data-trigger>
                                                <option value="1">MRM POWER</option>
                                                <option value="2">MRM POWER</option>
                                                <option value="3">MRM POWER</option>
                                                <option value="4">MRM POWER</option>
                                                <option value="5">MRM POWER</option>
                                            </select>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <a class="btn ripple btn-primary btn-block" href="javascript:void(0);">Apply Filter</a>
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
        <?php  include_once('partials/footer.php')?>
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
    <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../../../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../../../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../../../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../../../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../../../assets/js/custom-switcher.min.js"></script>

    <!-- Prism JS -->
    <script src="../../../assets/libs/prismjs/prism.js"></script>
    <script src="../../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../../assets/js/custom.js"></script>
    

</body>

</html>