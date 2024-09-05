<?php 
require_once '../authetincation.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../USER/partials/head.php') ?>

    <title> Product control</title>
    
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

    <!-- Simplebar Css 
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

               
                <form action="function.php" method="POST" enctype="multipart/form-data">
                <div class="row row-sm">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Add Product
                                    </div>
                                    <div class="">
                                       <a href="marketing-product-control.php"> BACK</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name"
                                                aria-label="Full Name" name="ProductName">
                                        </div>
                                        <div class="col-xxl-6 col-xl-12 mb-3">
                                            <label class="form-label">Type</label>
                                            <select id="ProdType" class="form-select" name="" required>
                                                <option value="">Select Type</option>
                                                <option value="Generator">Generator</option>
                                                <option value="Solar Panel">Solar Panel</option>
                                            </select>
                                        </div>

                                        <div class="col-xxl-6 col-xl-12 mb-3">
                                            <label class="form-label">Watts/KVA</label>
                                            <select id="WattsKVAList" class="form-select" name="ProductTypeID">
                                            </select>
                                        </div>

                                        

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Stock</label>
                                            <input type="number" class="form-control" placeholder="Stock"
                                                aria-label="email" name="Stock">                                                                             
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Availability</label>
                                            <input type="checkbox" name="Availability" required>
                                        </div>    
                                        <div class="col-xl-12 mb-3">
                                            <label for="Description">Description</label>
                                            <textarea id="Description" name="Description" rows="6" cols="50"></textarea>                                                                      
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label for="Specification">Specification</label>
                                            <textarea id="Specification" name="Specification" rows="6" cols="50"></textarea>                                                                      
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                                <input type="file" name="image">
                                        </div>    
                                       
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="AddProduct">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#ProdType').change(function() {
                $('#WattsKVAList').append('<option value="">Select Product Type</option>');
                var ProdType = $(this).val();
                if (ProdType) {
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        data: { PrType: ProdType },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#WattsKVAList').empty();
                                $.each(response.data.WattsKVA, function(index, item) {
                                    $('#WattsKVAList').append('<option value="' + item.value + '">' + item.text + '</option>');
                                });
                            } else {
                                alert('No Watts/KVA');
                            }
                        }
                    });
                } else {
                    $('#WattsKVAList').empty();
                    $('#WattsKVAList').append('<option value="">Select Product Type</option>');
                }
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