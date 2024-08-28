<?php 
include '../../verify.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../../USER/partials/head.php') ?>

    <title> Product control</title>
    
    <!-- Favicon -->
    <link rel="icon" href="../../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../../assets/libs/choices.js/public/assets/styles/choices.min.css">


<!-- Prism CSS -->
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    


    

    <div class="page">

         <!-- app-header -->
         <?php include_once('../../../USER/partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">

               

                <!-- Start::row-1 -->
                 
                <div class="row row-sm mt-5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0 d-block">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0 pt-1">PRODUCT TABLE</label>
                                    
                                    <div class="position-absolute bottom-0 end-0 me-3 ">                                      
                                      <a href="product-add-form.php">  <button type="button" class="btn btn-primary my-2 btn-icon-text d-inline-flex align-items-center" >
                                        <i class="fe fe-download-cloud me-2 fs-14"></i>ADD PRODUCT
                                        </button></a>
                                    </div>
                             
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="wd-lg-8p"><span>ProductID</span></th>
                                                <th class="wd-lg-20p"><span>Product Name</span></th>
                                                <th class="wd-lg-20p"><span>Type</span></th>
                                                <th class="wd-lg-20p"><span>Watts</span></th>
                                                <th class="wd-lg-20p"><span>Stock</span></th>
                                                <th class="wd-lg-20p"><span>Availability</span></th>
                                                <th class="wd-lg-20p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           require '../../Database/database.php';
                                           require 'function.php';
                                           $select = "Select * from products";
                                           $result = mysqli_query($conn , $select);
                                           if(mysqli_num_rows($result) > 0){
                                            foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                <td><?= $resultItem['ProductID']?></td>
                                                <td><?= $resultItem['ProductName']?></td>
                                                <td><?= $resultItem['Type']?></td>
                                                <td><?= $resultItem['Watts']?>w </td>
                                                <td><?= $resultItem['Stock']?></td>
                                                <td><?= $resultItem['Availability'] == 1 ? "Available":"Not Available"?></td>
                                                <td>                                                 
                                                    <a href="product-edit-form.php?id=<?= $resultItem['ProductID'];  ?>" class="btn btn-sm btn-info">  <i class="fe fe-edit-2"></i> </a>
                                                    <a href="product-delete.php?id=<?= $resultItem['ProductID'];  ?>" class="btn btn-sm btn-danger"> <i class="fe fe-trash"></i>  </a>
                                                    <a href="product-Availability-switch.php?id=<?= $resultItem['ProductID'];  ?>" class="btn btn-sm btn-success"> <i class="ri-add-box-line"></i>  </a>
                                                </td>
                                            </tr>

                                                <?php 
                                            }
                                            
                                           }
                                           else{

                                           }
                                           ?>
                                                    
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
        <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once('../../../USER/partials/footer.php') ?>
        <!-- Footer End -->

    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

   <!-- Popper JS -->
   <script src="../../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="../../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Defaultmenu JS -->
<script src="../../../../assets/js/defaultmenu.min.js"></script>

<!-- Node Waves JS-->
<script src="../../../../assets/libs/node-waves/waves.min.js"></script>

<!-- Sticky JS -->
<script src="../../../../assets/js/sticky.js"></script>

<!-- Simplebar JS -->
<script src="../../../../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../../../../assets/js/simplebar.js"></script>

<!-- Color Picker JS -->
<script src="../../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>



<!-- Custom-Switcher JS -->
<script src="../../../assets/js/custom-switcher.min.js"></script>

<!-- Custom JS -->
<script src="../../../assets/js/custom.js"></script>

</body>

</html>