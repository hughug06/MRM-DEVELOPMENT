
<?php 
require_once '../authetincation.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__.'../../../partials/head.php')?>
    <title> Inquries </title>
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



</head>

<body>


    <div class="page">

             <!-- app-header -->
             <?php include_once( __DIR__.'../../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__.'../../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
        
                        
                <!-- MODAL FOR SET AVAILABILITY -->                       


                <!--  SHOW ALREADY CREATED TIME -->
                <div class="row row-sm mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 d-block">                            
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0">Inventory</label>
                                    
                                    <a href="item-add-form.php">
                                        <button type="button" class="btn btn-primary d-inline-flex align-items-center" >
                                        <i class="fe fe-download-cloud pe-2"></i>ADD PRODUCT
                                        </button>
                                    </a>
                                   
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                    <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                        <thead>
                                            <tr>
                                            <th class="wd-lg-20p"><span>Item Name</span></th>       
                                                <th class="wd-lg-8p"><span>Type</span></th>
                                                <th class="wd-lg-20p"><span>Power output</span></th>
                                                <th class="wd-lg-20p"><span>Stock</span></th>  
                                                <th class="wd-lg-20p"><span>Min Price</span></th> 
                                                <th class="wd-lg-20p"><span>Max Price</span></th>                                                 
                                                <th class="wd-lg-20p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           require '../../Database/database.php';                                          
                                           $select = "Select * from inventory";
                                           $result = mysqli_query($conn , $select);
                                           if(mysqli_num_rows($result) > 0){
                                            foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                 <td><?= $resultItem['item_name']?></td>     
                                                <td><?= $resultItem['item_type']?></td>                                        
                                                <td><?= $resultItem['power_output']?></td>                        
                                                <td><?= $resultItem['stock']?></td>   
                                                <td><?= $resultItem['min_price']?></td> 
                                                <td><?= $resultItem['max_price']?></td>                                         
                                                <td>                                                 
                                                    <a href="item-edit-form.php?id=<?= $resultItem['itemID'];  ?>" class="btn btn-sm btn-info"><i class="fe fe-edit-2"></i></a>
                                                    <a href="item-delete.php?id=<?= $resultItem['itemID'];  ?>" class="btn btn-sm btn-danger delete-btn-Product"><i class="fe fe-trash"></i></a>
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


                
               </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'../../../partials/footer.php') ?>
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
    <script src="../../../assets/js/sticky.js"></script>

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

<!-- Bootstrap 5 Icons CDN (for icons) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Flatpickr CSS (for custom date picker) -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $(".delete-btn-Product").click(function(event) {
            event.preventDefault(); // Prevent the default action (navigating to the delete URL)
            var deleteUrl = $(this).attr('href');
            Swal.fire({
                title: 'Confirmation',
                html: "Are you sure to delete this product?",
                icon: 'warning',
                confirmButtonText: 'Confirm',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, send AJAX request for deletion of product
                    $.ajax({
                        url: deleteUrl,
                        type: 'GET', // Ensure you're using the correct method if the backend expects GET
                        success: function(response) {
                            // Handle successful deletion of product
                            Swal.fire({
                                title: 'Product Deleted!',
                                text: 'You have successfully deleted the product.',
                                icon: 'success',
                                allowOutsideClick: false,
                                timer: 2000, // 2 seconds timer
                                showConfirmButton: false // Hide the confirm button
                            }).then(() => {
                                // Redirect after the timer ends
                                window.location.href = 'inventory-control.php';
                            });
                        },
                        error: function() {
                            // Handle error
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the product. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
    </script>



<!-- Flatpickr JS (for custom date picker) -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <!-- SWEET ALERT JS -->
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
</script>