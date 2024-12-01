<?php 
require_once '../authetincation.php';
include_once '../../Database/database.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../partials/head.php') ?>

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
         <?php include_once('../../partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row row-sm">
                    <div class="col-xl-12 p-3">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Add Item</div>
                                <a href="inventory-control.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form action="function.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" id="item_name" class="form-control" placeholder="Product Name" aria-label="Full Name" name="item_name" required>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Product Type (Solar Panel or Generator):</label>
                                            <select id="item_type" class="form-select py-2" required>
                                                <option value="">Select Type</option>
                                                <option value="Generator">Generator</option>
                                                <option value="Solar Panel">Solar Panel</option>
                                            </select>
                                        </div>
                                        <div id="power_input_display" class="col-md-6 col-6 mb-3">
                                            <label class="form-label">Power Output of the product (Watts/KVA)</label>
                                            <select id="power_list" class="form-select py-2" name="power_output">
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-6 mb-3" id="Custom_power_Container" style="display: none;">
                                            <label class="form-label">Custom Power Output of the product (Watts/KVA)</label>
                                            <p>Note: In Solar Panel, this form accepts Kilowatts up to 100kVa. And Generators accepts Watts from 50,000W to 750,000W</p>
                                            <input type="number" class="form-control py-2" id="InputCustomPower" placeholder="Watts/KVA" name="custom_power_output">
                                        </div>
                                        <div class="col-md-6 col-6 d-flex pt-2 align-items-center gap-2">
                                            <input id="Custom" type="checkbox" value="1" onclick="toggleCustomWattsKVA()">
                                            <label for="Custom" class="fw-bold">Custom</label>
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Stocks  of the product</label>
                                            <input type="number" class="form-control py-2"  placeholder="Stocks" id="stocks">
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Price</label>
                                            <input type="number" id="price" class="form-control py-2"  placeholder="Price">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea id="Description" rows="6" class="col-xl-12 col-md-12 col-12"></textarea>                              
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Specification</label>
                                            <textarea id="Specs" rows="6" class="col-xl-12 col-md-12 col-12"></textarea>                              
                                        </div>
                                        <div class="col-xl-12 mb-3 d-flex gap-2 justify-content-end">
                                            <input id="availability" type="checkbox" name="Availability">
                                            <label for="availability" class="fw-bold">Availability</label>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <input id="image" type="file">
                                        </div> 
                                        <div class="col-md-12">
                                            <button id="ConfirmAdd" type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--APP-CONTENT CLOSE-->

        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
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
            $('#item_type').change(function() {
                $('#power_list').append('<option value="">Select Product Type</option>');
                var item_type = $(this).val();
                if (item_type) {
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        data: { PrType: item_type },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#power_list').empty();
                                var existingValues = []; // Array to track existing values
                                
                                $.each(response.data.Watts_KVA, function(index, item) {
                                    // Check if the value is already in the existingValues array
                                    if (!existingValues.includes(item.value)) {
                                        $('#power_list').append('<option value="' + item.value + '">' + item.text + '</option>');
                                        existingValues.push(item.value); // Add value to the array
                                    }
                                });
                            } else {
                                alert('No Watts/KVA found.');
                            }
                        }
                    });
                } else {
                    $('#power_list').empty();
                    $('#power_list').append('<option value="">Select Product Type</option>');
                }
            });

            
            $('#ConfirmAdd').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var IName = document.getElementById("item_name");
                var IType = document.getElementById("item_type");
                var customCheckbox = document.getElementById("Custom");
                var custom_ID = document.getElementById("Custom");
                var stocks = document.getElementById("stocks");
                var price = document.getElementById("price");
                var specification_ID = document.getElementById("Specs");
                var description_ID = document.getElementById("Description");
                var availability_ID = document.getElementById("availability");
                var power_checker;
                if(customCheckbox.checked){
                    var PPower = document.getElementById("InputCustomPower");
                }else {
                    var PPower = document.getElementById("power_list");
                }
                var IName_value = IName.value;
                var IType_value = IType.value;
                var PPower_value = PPower.value;
                var custom = custom_ID.value;
                var stocks_value = parseFloat(stocks.value);
                var price_value = parseFloat(price.value);
                var specification = specification_ID.value;
                var description = description_ID.value;
                if(availability_ID.checked){
                    var availability = 1;
                }
                else{
                    var availability = 0;
                }
                var image = document.getElementById("image").files[0];
                if(IType_value == 'Solar Panel'){
                    power_checker = 9;
                }
                else{
                    power_checker = 20;
                }
                if(IName_value == "" || IType_value == "" || PPower_value == "" || stocks.value == "" || price.value == "" ){
                    Swal.fire({
                        title: 'ERROR',
                        html: "There seems to be missing information. Please complete the form",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
                else if(PPower_value < 20 && IType_value == 'Generator' || PPower_value < 9 && IType_value == 'Solar Panel'){
                    Swal.fire({
                        title: 'ERROR',
                        html: IType_value+" Power output cannot be less than "+ power_checker +".",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                } 
                else if(price_value <= 0){
                    Swal.fire({
                        title: 'ERROR',
                        html: "Price cannot be less than 0.",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
                else if(stocks_value < 0){
                    Swal.fire({
                        title: 'ERROR',
                        html: "Stocks cannot be less than 0.",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                }
                else if(PPower_value < 100 && PPower_value >= 10 && IType_value == 'Solar Panel'){
                    PPower_value * 1000;
                    Swal.fire({
                        title: 'Confirmation',
                        html: "Please Confirm the details of the Product!<br>Product Name: "+IName_value+"<br>Product Type: "+IType_value+"<br>Power Output: "+PPower_value,
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('AddItem', true);
                            formData.append('ProductName', IName_value);
                            formData.append('stocks', stocks_value);
                            formData.append('price', price_value);
                            formData.append('Availability', availability);
                            formData.append('Description', description);
                            formData.append('Specification', specification);
                            formData.append('WattsKVA', PPower_value);
                            formData.append('ProductType', IType_value);
                            if (image) {
                                formData.append('image', image);
                            } // Add the file to FormData
                            
                            $.ajax({
                                url: 'function.php',
                                type: 'POST',
                                dataType: 'json',
                                data:formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Handle successful add
                                    Swal.fire({
                                        title: 'Product Added!',
                                        text: 'You have successfully added the product.',
                                        icon: 'success',
                                        allowOutsideClick: false,
                                        timer: 2000, // 2 seconds timer
                                        showConfirmButton: false // Hide the confirm button
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'inventory-control.php';
                                    });
                                },
                                error: function(response) {
                                    // Handle erro
                                    Swal.fire(
                                        'Error!',
                                        'There was an error Adding product. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                }
                else if(PPower_value >= 50000 && PPower_value <= 750000 && IType_value == 'Generator'){
                    PPower_value / 1000;
                    Swal.fire({
                        title: 'Confirmation',
                        html: "Please Confirm the details of the Product!<br>Product Name: "+IName_value+"<br>Product Type: "+IType_value+"<br>Power Output: "+PPower_value,
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('AddItem', true);
                            formData.append('ProductName', IName_value);
                            formData.append('stocks', stocks_value);
                            formData.append('price', price_value);
                            formData.append('Availability', availability);
                            formData.append('Description', description);
                            formData.append('Specification', specification);
                            formData.append('WattsKVA', PPower_value);
                            formData.append('ProductType', IType_value);
                            if (image) {
                                formData.append('image', image);
                            } // Add the file to FormData
                            
                            $.ajax({
                                url: 'function.php',
                                type: 'POST',
                                dataType: 'json',
                                data:formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Handle successful add
                                    Swal.fire({
                                        title: 'Product Added!',
                                        text: 'You have successfully added the product.',
                                        icon: 'success',
                                        allowOutsideClick: false,
                                        timer: 2000, // 2 seconds timer
                                        showConfirmButton: false // Hide the confirm button
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'inventory-control.php';
                                    });
                                },
                                error: function(response) {
                                    // Handle erro
                                    Swal.fire(
                                        'Error!',
                                        'There was an error Adding product. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                }
            });
        });
        
        
        function toggleCustomWattsKVA() {
            var customCheckbox = document.getElementById("Custom");
            var customWattsInput = document.getElementById("Custom_power_Container");
            var power_input_display = document.getElementById("power_input_display");

            if (customCheckbox.checked) {
                customWattsInput.style.display = "block";
                power_input_display.style.display = "none";
            } else {
                customWattsInput.style.display = "none";
                power_input_display.style.display = "block";
            }
        }
        
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