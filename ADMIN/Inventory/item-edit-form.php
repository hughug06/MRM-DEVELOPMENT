<?php 

require_once '../authetincation.php';
include_once '../../Database/database.php';
global $conn;
  $id="";
  $item_name="";
  $item_type="";
  $stocks = "";
  $error="";
  $success="";
  $price="";
  $power_output="";
  $phase="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: inventory-control.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from products where ProductID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: inventory-control.php");
      exit;
    }

    $item_name=$row["ProductName"];
    $Availability = $row["Availability"];
    $phase = $row["item_phase"];
    $Image = $row["Image"];
    $Description = $row["Description"];
    $Specification = $row["Specification"];
    $stocks = $row["stock"];
    $price = $row["price"];
    $power_output = $row["Watts_KVA"];
    $item_type = $row["ProductType"];

  }
  else{
    header("location: inventory-control.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../partials/head.php') ?>
    <title> Account Control </title>
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
         <?php include_once('../../partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row row-sm">
                    <div class="col-xl-12 p-3">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Edit Item</div>
                                <a href="inventory-control.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="item-edit-form.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                            <input type="hidden" id="id" value="<?php echo $id; ?>" class="form-control">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" id="item_name" class="form-control" placeholder="Full Name"
                                                aria-label="Full Name" required value="<?= $item_name?>">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Product Type (Solar Panel or Generator):</label>
                                            <select id="item_type" class="form-select py-2">
                                                <option <?= $item_type == "Generator"? 'selected value="Generator"':'value="Generator"'?>>Generator</option>
                                                <option <?= $item_type == "Solar Panel"? 'selected value="Solar Panel"':'value="Solar Panel"'?>>Solar Panel</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Select Product Phase:</label>
                                            <select id="item_phase" class="form-select py-2" required>
                                                <option value="">Select Phase</option>
                                                <option <?= $phase == "2phase"? 'selected value="2phase"':'value="2phase"'?>>2-Phase</option>
                                                <option <?= $phase == "3phase"? 'selected value="3phase"':'value="3phase"'?>>3-Phase</option>
                                            </select>
                                        </div>
                                        <div id="power_input_display" class="col-md-6 mb-3">
                                            <label class="form-label">Select Power Output of the product (Watts/KVA)</label>
                                            <select id="power_list" class="form-select py-2"> 
                                                <option><?= $power_output ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-6 mb-3" id="Custom_power_Container" style="display: none;">
                                            <label class="form-label">Custom Power Output of the product (Watts/KVA)</label>
                                            <p>Note: In Solar Panel, this form accepts Kilowatts up to 100kVa. And Generators accepts Watts from 50,000W to 750,000W</p>
                                            <input type="number" class="form-control py-2" id="InputCustomPower" placeholder="Watts/KVA" name="custom_power_output">
                                        </div>
                                        <div class="col-md-6 col-6 d-flex pt-2 align-items-center gap-2">
                                            <input id="Custom" type="checkbox" value="1" onclick="toggleCustomWattsKVA()">
                                            <label for="Custom" class="fw-bold">Custom Power Output</label>
                                            <p>Check this box if you want to manually input the Power Output</p>
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Stocks of the product</label>
                                            <input type="number" value="<?= $stocks ?>" class="form-control py-2" id="stocks">
                                        </div>
                                        <div class="col-md-6 col-6 mb-3">
                                            <label class="form-label" required>Price of the product</label>
                                            <input type="number" value="<?= $price ?>" class="form-control py-2" id="price">
                                        </div>
                                        <div class="col-xl-12  mb-3">
                                            <label class="form-label">Description of the product</label>
                                            <textarea id="Description" class="col-xl-12 col-md-12 col-12" rows="6"><?= $Description?></textarea>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Specification of the product</label>
                                            <textarea id="Specification" class="col-xl-12 col-md-12 col-12" rows="6"><?= $Specification?></textarea>                            
                                        </div>
                                        <div class="col-xl-12 mb-3 d-flex gap-2 justify-content-end">
                                            <input id="availability" type="checkbox" <?= $Availability == true ? 'checked' : ''?>>
                                            <label for="availability">Enable availability display of the product</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="file" id="image">
                                        </div>
                                        <div class="col-xl-12 d-flex justify-content-end">
                                            <button id="save" type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div> 
            </div>
        </div>
        <!-- End::app-content -->
        
        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->
    </div>

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
                                $('#power_list').empty();
                            }
                        }
                    });
                } else {
                    $('#power_list').empty();
                    $('#power_list').append('<option value="">Select Product Type</option>');
                }
            });

            $('#save').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var item_id = document.getElementById("id");
                var IName = document.getElementById("item_name");
                var IType = document.getElementById("item_type");
                var customCheckbox = document.getElementById("Custom");
                var custom_ID = document.getElementById("Custom");
                var specification_ID = document.getElementById("Specification");
                var description_ID = document.getElementById("Description");
                var availability_ID = document.getElementById("availability");
                var stocks = document.getElementById("stocks");
                var price = document.getElementById("price");
                var phase = document.getElementById("item_phase").value;
                var power_checker;
                if(customCheckbox.checked){
                    var PPower = document.getElementById("InputCustomPower");
                }else {
                    var PPower = document.getElementById("power_list");
                }
                var item_id_value = item_id.value;
                var IType_value = IType.value;
                var IName_value = IName.value;
                var PPower_value = PPower.value;
                var custom = custom_ID.value;
                var stocks_value = parseFloat(stocks.value);
                var price_value = parseFloat(price.value);
                var specification_ID_value = specification_ID.value;
                var description_ID_value = description_ID.value;
                if(availability_ID.checked){
                    var availability_ID_value = 1;
                }
                else{
                    var availability_ID_value = 0;
                }
                var image = document.getElementById("image").files[0];
                if(IType_value == 'Solar Panel'){
                    power_checker = 350;
                }
                else{
                    power_checker = 20;
                    power_checker3 = 50000;
                    power_checker4 = 750000;
                }
                if(IName_value == "" || IType_value == "" || PPower_value == "" || stocks.value == "" || price.value == "" || phase == ""){
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
                else if(PPower_value < 20 && IType_value == 'Generator' ||  PPower_value < 350 && IType_value == 'Solar Panel' ) {
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
                else if( PPower_value > 1000 && PPower_value < 50000 && IType_value == 'Generator') {
                    Swal.fire({
                        title: 'ERROR',
                        html: IType_value+" Power output cannot be less than "+ power_checker3 +" or greater than " + power_checker4 + " Watts.",
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
                        html: "Minimum Price cannot be less than 0.",
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
                else if(PPower_value >= 50000 && PPower_value <= 750000 && IType_value == 'Generator'){
                    PPower_value = PPower_value / 1000;
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
                            formData.append('save', true);
                            formData.append('id', item_id_value);
                            formData.append('ProductName', IName_value);
                            formData.append('editType', 'item');
                            formData.append('stocks', stocks_value);
                            formData.append('price', price_value);
                            formData.append('Availability', availability_ID_value);
                            formData.append('item_phase', phase);
                            formData.append('Description', description_ID_value);
                            formData.append('Specification', specification_ID_value);
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
                                        title: 'Product Edited!',
                                        text: 'You have successfully Edited the product.',
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
                                        'There was an error Editing the product. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                }
                else{
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
                            formData.append('save', true);
                            formData.append('id', item_id_value);
                            formData.append('ProductName', IName_value);
                            formData.append('editType', 'item');
                            formData.append('stocks', stocks_value);
                            formData.append('price', price_value);
                            formData.append('Availability', availability_ID_value);
                            formData.append('item_phase', phase);
                            formData.append('Description', description_ID_value);
                            formData.append('Specification', specification_ID_value);
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
                                        title: 'Product Edited!',
                                        text: 'You have successfully Edited the product.',
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
                                        'There was an error Editing the product. Please try again.',
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

    
    <!-- Scroll To Top -->
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