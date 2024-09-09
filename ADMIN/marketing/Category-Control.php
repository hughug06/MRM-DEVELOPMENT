<?php 
require_once '../authetincation.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../USER/partials/head.php') ?>

    <title> Category control</title>
    
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
         <?php include_once('../../USER/partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">

               

                <!-- Start::row-1 -->
                 
                <div class="row row-sm mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">

                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 d-block">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label">Product Specification Category TABLE</label>
                                    <a href="watts_KVA-add-form.php">
                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" >
                                        <i class="fe fe-download-cloud pe-2"></i>ADD new Watts/KVA Category
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                        <thead>
                                            <tr class="">
                                                <th class="wd-lg-8p"><span>ID</span></th>
                                                <th class="wd-lg-8p"><span>Product Type</span></th>
                                                <th class="wd-lg-8p"><span>Watts/KVA</span></th>
                                                <th class="wd-lg-8p"><span>Actions</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           require '../../Database/database.php';
                                           $select = "Select * from product_type";
                                           $result = mysqli_query($conn , $select);
                                           if(mysqli_num_rows($result) > 0){
                                            foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                    <td><?= $resultItem['ProductTypeID']?></td>
                                                    <td><?= $resultItem['ProductType']?></td>
                                                    <td><?= $resultItem['ProductType'] == 'Solar Panel'? $resultItem['Watts_KVA'].'W':$resultItem['Watts_KVA'].'KVA'; ?></td>
                                                <td>                                   
                                                    <a href="watts_KVA-edit-form.php?id=<?= $resultItem['ProductTypeID'];  ?>" class="btn btn-sm btn-info"><i class="fe fe-edit-2"></i></a>
                                                    <a href="watts_KVA-delete.php?id=<?= $resultItem['ProductTypeID'];  ?>" class="btn btn-sm btn-danger delete-btn-WattsKVA"><i class="fe fe-trash"></i></a>
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
        <?php include_once('../../USER/partials/footer.php') ?>
        <!-- Footer End -->

    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- SWEET ALERT JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $(".delete-btn-WattsKVA").click(function(event){
            event.preventDefault(); // Prevent the default action (navigating to the delete URL)

                var deleteUrl = $(this).attr('href');

                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if(response.status === true) {
                            // Handle the successful response
                            Swal.fire({
                                title: "Category Deleted",
                                icon: "success",
                                confirmButtonText: 'OK' // Add an OK button
                            }).then((result) => {
                                // Reload the page when the user clicks the OK button
                                location.reload();
                            });
                        } else if(response.status === false) {
                            // Handle the error response
                            Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'ok'
                            })
                        }
                    }
                });
        });
    });
    </script>

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