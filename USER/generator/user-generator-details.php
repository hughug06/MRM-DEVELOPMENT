<?php 
require_once '../../ADMIN/authetincation.php';
include_once '../../Database/database.php';
global $conn;
  $id="";
  $ProductName="";
  $Image = "";
  $error="";
  $success="";
  $Description="";
  $Specification="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: solar.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from products where ProductID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: solar.php");
      exit;
    }

    $ProductName=$row["ProductName"];
    $Image = $row["Image"];
    $Description = $row["Description"];
    $Specification = $row["Specification"];
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    include_once(__DIR__. '/../../partials/head.php');

    ?>
    <title> DETAILS </title>
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">


</head>

<body>

    


   

    <div class="page">
         <!-- app-header -->
         <?php include_once(__DIR__. '/../../partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php') ?>
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
                                            <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                <div class="product-carousel">
                                                    <div id="carousel" class="carousel slide" data-bs-ride="false">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active"><img src="<?php echo $Image == true? '../../assets/images/'.$Image :"../../assets/images/Product-Images/No-Image-Avail.png" ?>" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/26.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/25.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                            <div class="carousel-item"> <img src="../assets/images/pngs/23.png" alt="img" class="img-fluid mx-auto d-block"></div>
                                                        </div>
                                                        <div class="text-center mt-4 mb-4 btn-list">
                                                            <a href="ecommerce-cart.html" class="btn ripple btn-primary d-inline-flex align-items-center"><i class="fe fe-shopping-cart me-1"> </i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-12">
                                        <div class="mt-4 mb-4">
                                            <h4 class="mt-1 mb-3"><?= $ProductName ?></h4>
                                            <h6 class="mt-4 fs-16">Description</h6>
                                            <p><?= $Description ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="mb-3">Specifications :</h5>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <pre><?= $Specification ?></pre>
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
        <?php include_once(__DIR__. '/../../partials/footer.php') ?>
        <!-- Footer End -->
        



    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

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

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>
    

</body>

</html>